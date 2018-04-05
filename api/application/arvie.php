<?php
/**
 * @copyright  Copyright (C) 2016 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
 
defined('_JEXEC') or die;

JLoader::import('joomla.user.authentication');
JLoader::import('joomla.application.component.helper');

class AppArvieWeb extends JApplicationWeb
{
	public function __construct()
	{
		parent::__construct();
		require_once JPATH_CONFIGURATION.'/configuration.php';
	}

	private function LoadViewResult($view, $id = 0, $email = "")
	{
		$this->_db = JFactory::getDBO();
		$query = $this->_db->getQuery(true);
		$query->select('*');
		$query->from($this->_db->quoteName('#__vue_'.$view));
		if ($id != 0){
			$query->where('id = '.$id);
		}
		if ($email != ""){
			$query->where('email = "'.$email.'"');
		}
		// echo nl2br(str_replace('#__','arvie_',$query));			// TEST/DEBUG
		$this->_db->setQuery($query);
		return $this->_db->loadObjectList();
	}
	
	public function doExecute()
	{
		// Initialisation du tableau pour la r�ponse JSON :
		$response = array();
		// Initialisation des param�tres de l'url :
		$login = "";
		$pwd = "";
		$task = "";
		$id = 0;
		$email = "";
		
		// R�cup�ration des param�tres de connexion de l'url (en GET ou POST) :
		if ((isset($_GET["login"])) and (isset($_GET["pwd"]))) {
			$login = $_GET['login'];
			$pwd = $_GET['pwd'];
		} elseif ((isset($_POST["login"])) and (isset($_POST["pwd"]))) {
			$login = $_POST['login'];
			$pwd = $_POST['pwd'];
		}
		// R�cup�ration du param�tre d'action, si existant, de l'url (en GET ou POST) :
		if (isset($_GET["task"])) {
			$task = $_GET['task'];
		} elseif (isset($_POST["task"])) {
			$task = $_POST['task'];
		}
		// R�cup�ration du param�tre id, si existant, de l'url (en GET ou POST) :
		if (isset($_GET["id"])) {
			$id = $_GET['id'];
		} elseif (isset($_POST["id"])) {
			$id = $_POST['id'];
		}
		// echo ("DEBUG login = " . $login . " pwd = " . $pwd . " task =>" . $task . " id =>" . $id . "<");    // TEST/DEBUG
		
		if (($login != "") and ($pwd != "")) {

			$credentials = array();
			$credentials['username']  = $login;
			$credentials['password']  = $pwd;
			$credentials['secretkey'] = '';      // 6 digits user secret for Two-Factor Authentication

			$config = JFactory::getConfig();
			$authenticate = JAuthentication::getInstance();
			$resp = $authenticate->authenticate($credentials);
			
			if (1 !== $resp->status)
			{
				// Echec de connexion !
				$response["success"] = 0;
				$response["message"] = "Echec de connexion";
				$response["user"] = "";		
				echo json_encode($response);
			}else{
				// Connexion r�ussie !
				$response["success"] = 1;
				$response["message"] = "Connexion reussie";
				
				// Recherche le nom et l'email de l'utilisateur connect� :
				$this->_db = JFactory::getDBO();
				$query = $this->_db->getQuery(true);
				$query->select('name, email');
				$query->from($this->_db->quoteName('#__users'));
				$query->where('username = "'.$login.'"');
				$this->_db->setQuery($query);
				$response["user"] = $this->_db->loadObject();
				$email = $response["user"]->email;
				
				// Recherche la vue �ventuellement demand�e :
				if ($task !== ""){
					if ($task == "modeles"){
						$response[$task] = $this->LoadViewResult($task, $id);
					} else {
						$response[$task] = $this->LoadViewResult($task, $id, $email);
					}
				}
				echo json_encode($response);
			}
			
		} else {
			// Param�tre(s) de connexion manquant(s) :
			$response["success"] = 0;
			$response["message"] = "Echec de connexion";
			$response["user"] = "";
			echo json_encode($response);
		}

	}
	
	public function isAdmin()
	{
		// fonction appel� quand l'utilisateur est connect�
		return false;
    }

}
