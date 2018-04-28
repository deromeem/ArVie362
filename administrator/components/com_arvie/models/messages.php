<?php
defined('_JEXEC') or die('Restricted access');

class ArvieModelMessages extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id',			'm.id',
				'auteur',		'u.nom',
				'discussion',	'd.nom',
				'contenu',		'm.contenu',
				'published',	'm.published',
				'created',		'm.created',
				'created_by',	'm.created_by',
				'modified',		'm.modified',
				'modified_by',	'm.modified_by',
				'hits',			'm.hits'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		// récupère les informations de la session utilisateur nécessaires au paramétrage de l'écran
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$alias = $this->getUserStateFromRequest($this->context.'.filter.alias', 'filter_alias', '');
		$this->setState('filter.alias', $alias);

		$created = $this->getUserStateFromRequest($this->context.'.filter.created', 'filter_created', '');
		$this->setState('filter.created', $created);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		parent::populateState('m.created', 'DESC');
	}
	
	protected function getListQuery()
	{
		// construit la requête d'affichage de la liste
		$query = $this->_db->getQuery(true);
		$query->select('m.id, m.auteur, m.discussion, m.contenu, m.alias, m.published, m.created, m.created_by, m.modified, m.modified_by, m.hits');
		$query->from('#__arvie_messages m');

		// joint la table utilisateurs pour l'auteur
		$query->select('u.nom AS nom_auteur')->join('LEFT', '#__arvie_utilisateurs AS u ON m.auteur=u.id');

		// joint la table discussions
		$query->select('d.nom AS nom_discussion')->join('LEFT', '#__arvie_discussions AS d ON m.discussion=d.id');

		// filtre de recherche rapide textuelle
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('c.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'u.nom LIKE '.$search;
				$searches[]	= 'm.discussion LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre selon l'état du filtre 'filter_created'
		$created = $this->getState('filter.created');
		if (is_numeric($created)) {
			$query->where('m.created=' . (int) $created);
		}
		// filtre selon l'état du filtre 'filter_published'
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('m.published=' . (int) $published);
		}	
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publiés et dépubliés
			$query->where('(m.published=0 OR m.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'u.nom');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','arvie_',$query));			// TEST/DEBUG
		return $query;
	}
}
