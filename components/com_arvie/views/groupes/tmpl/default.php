<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework'); 				// javascript Joomla object for grid.sort !

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('11', $user->groups));		// sets flag when user group is '11' that is 'ArVie Administrateur' 
$isDirector = (in_array('12', $user->groups));  // sets flag when user group is '12' that is 'ArVie Direction'
?>

<?php if ( !$isAdmin && !$isDirector ) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_ARVIE_RESTRICTED_ACCESS') ); ?>
<?php else :

	$app = JFactory::getApplication();
	$egi = $app->input->getInt('estGroupeInteret');
	if (isset($egi)){
	if ($egi == 1){
		?>
		<h2><?php echo JText::_('COM_ARVIE')." : ".JText::_('COM_ARVIE_GROUPES_INTERETS')." - "; ?>
			<a style="font-size:75%;" href="<?php echo JRoute::_('index.php?option=com_arvie&view=groupes&estGroupeInteret=0'); ?>">
				<?php echo JText::_('COM_ARVIE_GROUPES_CLASSES'); ?>
			</a>
		</h2>
	<?php }
	elseif ($egi == 0){ ?>
		<h2><?php echo JText::_('COM_ARVIE')." : ".JText::_('COM_ARVIE_GROUPES_CLASSES')." - "; ?>
			<a style="font-size:75%;" href="<?php echo JRoute::_('index.php?option=com_arvie&view=groupes&estGroupeInteret=1'); ?>">
				<?php echo JText::_('COM_ARVIE_GROUPES_INTERETS'); ?>
			</a>
		</h2>
	<?php }
	}
	else{ ?>
		<h2><?php echo JText::_('COM_ARVIE')." : ".JText::_('COM_ARVIE_GROUPES_CLASSES')." - "; ?>
			<a style="font-size:75%;" href="<?php echo JRoute::_('index.php?option=com_arvie&view=groupes&estGroupeInteret=1'); ?>">
				<?php echo JText::_('COM_ARVIE_GROUPES_INTERETS'); ?>
			</a>
		</h2>
	<?php } ?> 

	<?php echo $this->loadTemplate('items'); ?>

	<?php echo $this->pagination->getListFooter(); ?>

<?php endif; ?>
