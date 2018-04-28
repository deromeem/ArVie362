<?php
defined('_JEXEC') or die('Restricted access');
 
class ArvieViewgroupe_utilisateur_maps extends JViewLegacy
{
	function display($tpl = null) 
	{
		// récupère la liste des items à afficher
		$this->items = $this->get('Items');
		// récupère l'objet jPagination correspondant à la liste
		$this->pagination = $this->get('Pagination');

		// récupère l'état des information de tri des colonnes
		$this->state = $this->get('State');
		$this->listOrder = $this->escape($this->state->get('list.ordering'));
		$this->listDirn	= $this->escape($this->state->get('list.direction'));			

		// récupère les paramêtres du fichier de configuration config.xml
		$params = JComponentHelper::getParams('com_arvie');
		$this->paramDescShow = $params->get('jarvie_show_desc', 0);
		$this->paramDescSize = $params->get('jarvie_size_desc', 70);
		$this->paramDateFmt = $params->get('jarvie_date_fmt', "d F Y");

		// affiche les erreurs éventuellement retournées
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}

		// ajoute la toolbar contenant les boutons d'actions
		$this->addToolBar();
		// invoque la méthode addSubmenu du fichier de soutien (helper)
		ArvieHelper::addSubmenu('groupe_utilisateur_maps');
		// prépare et affiche la sidebar à gauche de la liste
		$this->prepareSideBar();
		$this->sidebar = JHtmlSidebar::render();

		// affiche les calques par appel de la méthode display() de la classe parente
		parent::display($tpl);
	}
 
	protected function addToolBar() 
	{
		// affiche le titre de la page
		JToolBarHelper::title(JText::_('COM_ARVIE')." : ".JText::_('COM_ARVIE_GROUPE_UTILISATEUR_MAP'));
		
		// affiche les boutons d'action
		JToolBarHelper::addNew('groupe_utilisateur_maps.add');
		JToolBarHelper::editList('groupe_utilisateur_maps.edit');
		JToolBarHelper::deleteList('COM_ARVIE_DELETE_CONFIRM', 'groupe_utilisateur_maps.delete');
		JToolbarHelper::publish('groupe_utilisateur_maps.publish', 'JTOOLBAR_PUBLISH', true);
		JToolbarHelper::unpublish('groupe_utilisateur_maps.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolbarHelper::archiveList('groupe_utilisateur_maps.archive');
		JToolbarHelper::checkin('groupe_utilisateur_maps.checkin');
		JToolbarHelper::trash('groupe_utilisateur_maps.trash');
		JToolbarHelper::preferences('com_arvie');
	}

	protected function prepareSideBar()
	{
		// definit l'action du formulaire sidebar
		JHtmlSidebar::setAction('index.php?option=com_arvie');
		
		// ajoute le filtre standard des statuts dans le bloc des sous-menus
		JHtmlSidebar::addFilter( JText::_('JOPTION_SELECT_PUBLISHED'), 'filter_published',
			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'),
			'value', 'text', $this->state->get('filter.published'),true)
		);
	}

 	protected function getSortFields()
	{
		// prépare l'affichage des colonnes de tri du calque
		return array(
			'u.nom' => JText::_('COM_ARVIE_UTILISATEUR'),
			'r.label' => JText::_('COM_ARVIE_ROLE'),
			'g.nom' => JText::_('COM_ARVIE_GROUPE'),
			'gum.published' => JText::_('JSTATUS'),
			'gum.created' => JText::_('COM_ARVIE_CREATED_DATE'),
			'gum.hits' => JText::_('JGLOBAL_HITS'),
			'gum.id' => JText::_('JGRID_HEADING_ID')
		);
	}

}
 