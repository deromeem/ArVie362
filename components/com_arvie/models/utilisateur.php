<?php
defined('_JEXEC') or die('Restricted access');
 
class ArvieModelUtilisateur extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_arvie.utilisateur';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		// $this->setState('utilisateur.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');
		
		if ($pk == 0) {
			$email = JFactory::getUser()->email;
			$user = $this->getArvieUser($email);
			$pk = $user->id;
		}
		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('u.id, u.nom, u.prenom, u.email, u.mobile');
			$query->from('#__arvie_utilisateurs AS u');


			$query->where('u.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
		return $this->_item[$pk];
	}

	public function getArvieUser($email)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('u.id');
		$query->from('#__arvie_utilisateurs AS u');
		$query->where("u.email = '$email'");
		$db->setQuery($query);
		$data = $db->loadObject();
		return $data;
	}
}
