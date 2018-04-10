<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('11', $user->groups));		// sets flag when user group is '11' that is 'ArVie Administrateur' 
$isDirector = (in_array('12', $user->groups));  // sets flag when user group is '12' that is 'ArVie Direction'
?>

<?php if ( !$isAdmin && !$isDirector ) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_ARVIE_RESTRICTED_ACCESS') ); ?>
<?php else : ?>

	<h2><?php echo JText::_('COM_ARVIE_OPTIONS')." : ".JText::_('COM_ARVIE_PUBLICATIONS'); ?>
	</h2>

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
