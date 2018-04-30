<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

$user = JFactory::getUser();					// gets current user object
$isAdmin = (in_array('11', $user->groups));		// sets flag when user group is '11' that is 'ArVie Administrateur' 
$isDirector = (in_array('12', $user->groups));	// sets flag when user group is '12' that is 'ArVie Direction'
$isAgent = (in_array('13', $user->groups));		// sets flag when user group is '13' that is 'ArVie Agent'
$isProf = (in_array('14', $user->groups));		// sets flag when user group is '14' that is 'ArVie Professeur'
$isEleve = (in_array('15', $user->groups));		// sets flag when user group is '15' that is 'ArVie Eleve'
$isAncien = (in_array('16', $user->groups));	// sets flag when user group is '16' that is 'ArVie Ancien'
?>

<?php if ( !$isAdmin && !$isDirector && !$isProf && !$isEleve) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_ARVIE_RESTRICTED_ACCESS') ); ?>
<?php else : ?>

	<h2><?php echo JText::_('COM_ARVIE_OPTIONS')." : ".JText::_('COM_ARVIE_UTILISATEURS'); ?>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
