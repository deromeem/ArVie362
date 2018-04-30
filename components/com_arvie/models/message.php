<?php
defined('_JEXEC') or die('Restricted access');

class ArvieModelMessage extends JModelAdmin
{
	//protected $_compo = 'com_arvie';
	//protected $_context = 'message';
	protected $_item = null;
	public $typeAlias = 'com_arvie.message';
	
	// Surcharges des m�thodes de la classe m�re pour :
	
	// 1) d�finir la table de soutien � utiliser
	public function getTable($type = 'Message', $prefix = 'ArvieTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	// 2) pr�ciser le chemin du contexte � utiliser pour charger le fichier XML d�crivant les champs de saisie
	public function getForm($data = array(), $loadData = true) 
	{
		$form = $this->loadForm($this->typeAlias, $this->_context,
			array('control'=>'jform', 'load_data'=>$loadData));
		if (empty($form)) 
		{
			return false;
		}
		return $form;
	}

	// 3) contr�ler qu'un tableau de donn�es n'est pas d�j� initialis� dans la session
	protected function loadFormData() 
	{
		$data = JFactory::getApplication()->getUserState($this->_compo.'.edit.'.$this->_context.'.data', array());
		if (empty($data)) 
		{
			$data = $this->getItem();
		}
		return $data;
	}

	// 4) pr�parer les donn�es avant la sauvegarde en base de donn�es par l'objet JTable
	protected function prepareTable($table)
	{
		$table->alias = JApplication::stringURLSafe($table->alias);
		if (empty($table->alias))
		{
			$table->alias = JApplication::stringURLSafe($table->nom_auteur);
		}
	}

//	protected function populateState()
//	{
//		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
//		$pk = $app->input->getInt('id');
//		$this->setState($this->_context.'.id', $pk);
		// $this->setState('groupe.id', $pk);
//	}

//	public function getItem($pk = null)
//	{
		// Initialise l'id
//		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
//		if (!isset($this->_item[$pk])) {
//			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('m.id, m.auteur, m.discussion, m.contenu, m.alias, m.published, m.created, m.created_by, m.modified, m.modified_by, m.hits');
			$query->from('#__arvie_messages m');


			// joint la table utilisateurs
		    $query->select('u.nom AS nom_auteur')->join('LEFT', '#__arvie_utilisateurs AS u ON m.auteur=u.id');
		
			// joint la table discussions
			$query->select('d.nom AS discussion')->join('LEFT', '#__arvie_discussions AS d ON m.discussion=d.id');
		
			$query->where('m.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
