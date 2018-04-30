<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class ArvieModelUtilisateurs extends JModelList
{
	public function __construct($config = array())
	{
		// precise les colonnes activant le tri
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'id', 'u.id',
				'nom', 'u.nom',
				'prenom', 'u.prenom',
				'email', 'u.email',
				'published', 'u.published',
				'hits', 'u.hits',
				'modified', 'u.modified'
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

		$search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		parent::populateState('nom', 'ASC');
	}

	protected function _getListQuery()
	{
		$user = JFactory::getUser();					// gets current user object
		$isProf = (in_array('14', $user->groups));		// sets flag when user group is '14' that is 'ArVie Professeur'
		$isEleve = (in_array('15', $user->groups));		// sets flag when user group is '12' that is 'ArVie Direction'
		
		// construit la requete d'affichage de la liste
		$query = $this->_db->getQuery(true);
		$query->select('u.id, u.nom, u.prenom, u.email, u.mobile, u.published, u.hits, u.modified');
		$query->from('#__arvie_utilisateurs AS u');
		$query->join('LEFT', "#__arvie_utilisateurs AS cuser ON cuser.email = '$user->email'");
		if ($isProf) {
			$query->join('LEFT', "#__arvie_groupe_utilisateur_map gup ON gup.utilisateur=cuser.id");
			$query->join('LEFT', "#__arvie_groupes AS g ON g.id = gup.groupe");
			$query->select('gue.role')->join('INNER', "#__arvie_groupe_utilisateur_map AS gue ON gue.groupe=gup.groupe AND gue.utilisateur = u.id");
		}

		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('u.id = ' . (int)substr($search, 3));
			} else {
				// recherche textuelle classique (sans prefixe)
				$search = $this->_db->Quote('%' . $this->_db->escape($search, true) . '%');
				// Compile les clauses de recherche
				$searches = array();
				$searches[] = 'u.nom LIKE ' . $search;
				$searches[] = 'u.prenom LIKE ' . $search;
				// Ajoute les clauses a la requete
				$query->where('(' . implode(' OR ', $searches) . ')');
			}
		}
		
		// filtre les elements publies
		$query->where('u.published = 1');
		$query->where('u.id != cuser.id');
		if ($isProf) {
			$query->where('gue.role IN(2,4)'); // est eleve / delegué / suppléant
			$query->where('g.est_groupe_interet = 0');
			$query->where('g.published = 1');
		}
		
		// tri des colonnes
		$orderCol = $this->getState('list.ordering', 'nom');
		$orderDirn = $this->getState('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol . ' ' . $orderDirn));

		// echo nl2br(str_replace('#__','arvie_',$query));			// TEST/DEBUG
		return $query;
	}
}
