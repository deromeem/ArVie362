<?php
defined('_JEXEC') or die('Restricted access');

class ArvieModelUtilisateur_even_maps extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id',             'ue.id',
				'participant',    'u.nom',
				'evenement',      'e.lieu',
				'published',      'ue.published',
				'created',        'ue.created',
				'created_by',     'ue.created_by',
				'modified',       'ue.modified',
				'modified_by',    'ue.modified_by',
				'hits',           'ue.hits'
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
		$query->select('ue.id, ue.participant, ue.evenement, ue.published, ue.created, ue.modified, ue.modified_by, ue.hits');
		$query->from('#__arvie_utilisateur_even_map ue');

		// joint la table utilisateurs
		$query->select('u.nom AS nom_utilisateur')->join('INNER', '#__arvie_utilisateurs AS u ON ue.participant=u.id');

		// joint la table evenements
		$query->select('e.lieu AS lieu_evenement')->join('INNER', '#__arvie_evenements AS e ON ue.evenement=e.id');

		// joint la table publications
		$query->select('p.titre AS titre_publication')->join('INNER', '#__arvie_publications AS p ON e.publication=p.id');


		// filtre de recherche rapide textuel
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('ue.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'ue.utilisateur LIKE '.$search;
				$searches[]	= 'ue.discussion LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre selon l'état du filtre 'filter_published'
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('ue.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publié et dépublié
			$query->where('(ue.published=0 OR ue.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'id');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','arvie_',$query));			// TEST/DEBUG
		return $query;
	}

}
