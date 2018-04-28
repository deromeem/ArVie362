<?php
defined('_JEXEC') or die('Restricted access');

class ArvieModelUtilisateur_discu_maps extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id',             'ud.id',
				'utilisateur',    'u.nom',
				'discussion',     'd.nom',
				'admin',          'ud.est_admin',
				'published',      'ud.published',
				'created',        'ud.created',
				'created_by',     'ud.created_by',
				'modified',       'ud.modified',
				'modified_by',    'ud.modified_by',
				'hits',           'ud.hits'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		// récupère les informations de la session groupe nécessaires au paramétrage de l'écran
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		parent::populateState('modified', 'desc');
	}
	
	protected function getListQuery(){
	
		// construit la requête d'affichage de la liste
		$query = $this->_db->getQuery(true);
		$query->select('ud.id, ud.utilisateur, ud.discussion, ud.est_admin, ud.published, ud.created, ud.modified, ud.modified_by, ud.hits');
		$query->from('#__arvie_utilisateur_discu_map ud');

		// joint la table utilisateurs pour les prenoms
		$query->select('u.nom AS nom_utilisateur')->join('LEFT', '#__arvie_utilisateurs AS u ON ud.utilisateur=u.id');

		// joint la table discussion pour les noms
		$query->select('d.nom AS nom_discussion')->join('INNER', '#__arvie_discussions AS d ON ud.discussion=d.id');


		// filtre de recherche rapide textuel
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('ud.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'ud.utilisateur LIKE '.$search;
				$searches[]	= 'ud.discussion LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre selon l'état du filtre 'filter_published'
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('ud.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publié et dépublié
			$query->where('(ud.published=0 OR ud.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'u.nom');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		//echo nl2br(str_replace('#__','arvie_',$query));			// TEST/DEBUG
		return $query;
	}

}
