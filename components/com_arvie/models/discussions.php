<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.modellist');
 
class ArvieModelDiscussions extends JModelList
{
	public function __construct($config = array())
	{
		// precise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'd.id',
				'admin','u.nom',
				'estAdmin','ud.est_admin',
				'nom', 'd.nom',
				'created', 'd.created',
				'published', 'd.published',
				'modified', 'd.modified',
				'hits', 'd.hits'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication();

		// informations de pagination de la liste
		$limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'), 'uint');
		$this->setState('list.limit', $limit);

		$limitstart = $app->input->get('limitstart', 0, 'uint');
		$this->setState('list.start', $limitstart);

		// informations du tri de la liste
		$orderCol = $app->input->get('filter_order', $ordering);
		$this->setState('list.ordering', $orderCol);

		$listOrder = $app->input->get('filter_order_Dir', $direction);
		$this->setState('list.direction', $listOrder);
		
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		parent::populateState('nom', 'ASC');
	}

	protected function _getListQuery()
	{
		// construit la requete d'affichage de la liste
		$query	= $this->_db->getQuery(true);
		$query->select('d.id, d.nom, d.published,d.created, d.modified, d.hits');
		$query->from('#__arvie_discussions d');

		// joint la table utilisateur_discu_map
		$query->select('ud.est_admin AS estAdmin')->join('LEFT','#__arvie_utilisateur_discu_map AS ud ON ud.discussion=d.id');

		// joint la table utilisateur
		$query->select('u.nom AS admin')->join('LEFT','#__arvie_utilisateurs AS u ON u.id=ud.utilisateur');


		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixee par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('d.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans prefixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'd.nom LIKE '.$search;
				// Ajoute les clauses e la requete
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre les elements publies
		$query->where('d.published=1');

		// filtre les elements est_admin
		$query->where('ud.est_admin=1');

		
		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'nom');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','arvie_',$query));			// TEST/DEBUG
		return $query;
	}
}
