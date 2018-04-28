<?php
defined('_JEXEC') or die('Restricted access');

class ArvieModelPublications extends JModelList
{
	public function __construct($config = array())
	{
		// précise les colonnes activant le tri
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id',             'p.id',
				'titre',          'p.titre',
				'parent',		  'pp.titre',
				'groupe',         'g.nom',
				'auteur',		  'u.nom',
				'texte',          'p.texte',
				'date_publi',     'p.date_publi',
				'est_public',     'p.est_public',
				'published',      'p.published',
				'created',        'p.created',
				'created_by',     'p.created_by',
				'modified',       'p.modified',
				'modified_by',    'p.modified_by',
				'hits',           'p.hits'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		// récupère les informations de la session publication nécessaires au paramétrage de l'écran
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$etat = $this->getUserStateFromRequest($this->context.'.filter.publications', 'filter_publications', '');
		$this->setState('filter.etat', $etat);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		parent::populateState('p.titre', 'ASC');
	}
	
	protected function getListQuery()
	{
		// construit la requête d'affichage de la liste
		$query = $this->_db->getQuery(true);
		$query->select('p.id, p.titre, p.publication_parent, p.est_public, p.groupe, p.auteur, p.texte, p.date_publi, p.published, p.created, p.created_by, p.modified, p.modified_by, p.hits');
		$query->from('#__arvie_publications p');
		
		// joint la table utilisateur pour l'auteur
		$query->select('u.nom AS nom_auteur')->join('LEFT', '#__arvie_utilisateurs AS u ON u.id=p.auteur');
		
		// joint la table groupes
		$query->select('g.nom AS nom_groupe')->join('LEFT', '#__arvie_groupes AS g ON g.id=p.groupe');

		// joint la table publication pour la publication parente
		$query->select('pp.titre AS titre_parent')->join('LEFT', '#__arvie_publications AS pp ON pp.id=p.publication_parent');

		// filtre de recherche rapide textuel
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			// recherche prefixée par 'id:'
			if (stripos($search, 'id:') === 0) {
				$query->where('p.id = '.(int) substr($search, 3));
			}
			else {
				// recherche textuelle classique (sans préfixe)
				$search = $this->_db->Quote('%'.$this->_db->escape($search, true).'%');
				// Compile les clauses de recherche
				$searches	= array();
				$searches[]	= 'p.titre LIKE '.$search;
				$searches[]	= 'u.nom LIKE '.$search;
				// Ajoute les clauses à la requête
				$query->where('('.implode(' OR ', $searches).')');
			}
		}

		// filtre selon l'état du filtre 'filter_published'
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('p.published=' . (int) $published);
		}
		elseif ($published === '') {
			// si aucune sélection, on n'affiche que les publié et dépublié
			$query->where('(p.published=0 OR p.published=1)');
		}

		// tri des colonnes
		$orderCol = $this->state->get('list.ordering', 'id');
		$orderDirn = $this->state->get('list.direction', 'ASC');
		$query->order($this->_db->escape($orderCol.' '.$orderDirn));

		// echo nl2br(str_replace('#__','arvie_',$query));			// TEST/DEBUG
		return $query;
	}
}
