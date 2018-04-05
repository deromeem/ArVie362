<?php
defined('_JEXEC') or die('Restricted access');
 
class ArvieModelDiscussion extends JModelItem
{
	protected $_item = null;
	protected $_context = 'com_arvie.discussion';

	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		
		// Charge et mémorise l'état (state) de l'id depuis le contexte
		$pk = $app->input->getInt('id');
		$this->setState($this->_context.'.id', $pk);
		// $this->setState('discussion.id', $pk);
	}

	public function getItem($pk = null)
	{
		// Initialise l'id
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->_context.'.id');

		// Si pas de données chargées pour cet id
		if (!isset($this->_item[$pk])) {
			$db = $this->getDbo();
			$query = $db->getQuery(true);
			$query->select('d.id, d.nom,d.created');
			$query->from('#__arvie_discussions d');

			// join la table utilisateur_discu_map pour recuperer est_admin
			$query->select('ud.est_admin AS estAdmin')->join('LEFT','#__arvie_utilisateur_discu_map AS ud ON ud.discussion=d.id');
		
			// join la table utilisateur pour recuperer le nom utilisateur
			$query->select('u.nom AS admin')->join('LEFT','#__arvie_utilisateurs AS u ON u.id=ud.utilisateur');

			$query->where('d.id = ' . (int) $pk);
			$db->setQuery($query);
			$data = $db->loadObject();
			$this->_item[$pk] = $data;
		}
  		return $this->_item[$pk];
	}
}
