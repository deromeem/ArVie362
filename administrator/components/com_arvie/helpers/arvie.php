<?php
defined('_JEXEC') or die;

class ArvieHelper extends JHelperContent
{
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_ABONNEMENTS'),
			'index.php?option=com_arvie&view=abonnements',
			$vName == 'abonnements'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_DISCUSSIONS'),
			'index.php?option=com_arvie&view=discussions',
			$vName == 'discussions'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_EVENEMENTS'),
			'index.php?option=com_arvie&view=evenements',
			$vName == 'evenements'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('Groupe_util_map'),
			'index.php?option=com_arvie&view=groupe_utilisateur_maps',
			$vName == 'groupe_utilisateur_maps'
		);		
	
		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_GROUPES'),
			'index.php?option=com_arvie&view=groupes',
			$vName == 'groupes'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_MESSAGES'),
			'index.php?option=com_arvie&view=messages',
			$vName == 'messages'
		);

		JHtmlSidebar::addEntry(
			JText::_('Metier_groupe_map'),
			'index.php?option=com_arvie&view=metier_groupe_maps',
			$vName == 'metier_groupe_maps'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_METIERS'),
			'index.php?option=com_arvie&view=metiers',
			$vName == 'metiers'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_PARRAINS'),
			'index.php?option=com_arvie&view=parrains',
			$vName == 'parrains'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_PUBLICATIONS'),
			'index.php?option=com_arvie&view=publications',
			$vName == 'publications'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_ROLES'),
			'index.php?option=com_arvie&view=roles',
			$vName == 'roles'
		);

		JHtmlSidebar::addEntry(
			JText::_('Utilisateur_discu_map'),
			'index.php?option=com_arvie&view=utilisateur_discu_maps',
			$vName == 'utilisateur_discu_maps'
		);		

		JHtmlSidebar::addEntry(
			JText::_('Utilisateur_even_map'),
			'index.php?option=com_arvie&view=utilisateur_even_maps',
			$vName == 'utilisateur_even_maps'
		);		
		
		JHtmlSidebar::addEntry(
			JText::_('COM_ARVIE_UTILISATEURS'),
			'index.php?option=com_arvie&view=utilisateurs',
			$vName == 'utilisateurs'
		);		
				
		
	}
}
