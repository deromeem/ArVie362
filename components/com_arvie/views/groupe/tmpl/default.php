<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('11', $user->groups));		// sets flag when user group is '11' that is 'ArVie Administrateur' 
$isDirector = (in_array('12', $user->groups));  // sets flag when user group is '12' that is 'ArVie Direction'
$isEleve = (in_array('15', $user->groups));		// sets flag when user group is '15' that is 'ArVie Eleve
$isProf = (in_array('14', $user->groups));		// sets flag when user group is '14' that is 'ArVie Professeur'
?>

<?php if ( !$isAdmin && !$isDirector && !$isEleve && !$isProf) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_ARVIE_RESTRICTED_ACCESS') ); ?>
<?php else : ?>
	<div class="form-inline form-inline-header">
		<div class="btn-group pull-left">
			<h2><?php echo JText::_('COM_ARVIE_GROUPE'); ?></h2>
		</div>
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_arvie&view=groupes'); ?>" class="btn" role="button">
				<span class="icon-cancel"></span></a>
		</div>	
		<div class="btn-group pull-right">
			<a href="<?php echo JRoute::_('index.php?option=com_arvie&view=form_g&layout=edit&id='.$this->item->id); ?>" class="btn" role="button">
				<span class="icon-edit"></span></a>
		</div>	
	</div>	
	<div>
		<table class="table">
			<tbody>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_ARVIE_GROUPES_NOM'); ?></span>
					</td>
					<td width="80%">
						<h4><?php echo $this->item->nom ?></h4>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_ARVIE_GROUPES_GROUPE_PARENT'); ?></span>
					</td>
					<td width="80%">
						<?php echo $this->item->groupe_parent_nom ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="nowrap right">
						<span class="label"><?php echo JText::_('COM_ARVIE_GROUPES_EST_GROUPE_INTERET_FRONTEND'); ?></span>
					</td>
					<td width="80%">
						<?php if($this->item->est_groupe_interet)
									{echo 'Interêt';} 
								else{echo 'Classe';} ?>
					</td>
				</tr>
				<tr>
				<td width="20%" class="nowrap right">
					<span class="label"><?php echo JText::_('COM_ARVIE_GROUPES_EST_PUBLIC_FRONTEND'); ?></span>
				</td>
				<td width="80%">
					<?php if($this->item->est_public)
								{echo 'Public';} 
							else{echo 'Privé';} ?>
				</td>
				</tr> 
			</tbody>
		</table>
	</div>
<?php endif; ?>
