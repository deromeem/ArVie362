<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.calendar');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$user = JFactory::getUser();               		// gets current user object
$isAdmin = (in_array('17', $user->groups));		// sets flag when user group is '17' that is 'Annuaire' 
?>

<?php if (!$isAdmin) : ?>
	<?php echo JError::raiseWarning( 100, JText::_('COM_ARVIE_RESTRICTED_ACCESS') ); ?>
<?php else : ?>

	<script type="text/javascript">
		// fonction javascript pour gérer les actions sur les boutons
		Joomla.submitbutton = function(task)
		{
			// si bouton 'Annuler' ou si les champs du formulaire sont valides alors on envoie le formulaire
			if (task == 'abonnement.cancel' || document.formvalidator.isValid(document.getElementById('adminForm')))
			{
				Joomla.submitform(task);
			}
		}
	</script>

	<div class="edit item-page">
		<form action="<?php echo JRoute::_('index.php?option=com_arvie&a_id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-vertical">
			
			<div class="form-inline form-inline-header">
				<div class="btn-group pull-left">
					<?php $isNew = ($this->item->id == 0); ?>
					<h2><?php echo JText::_('COM_ARVIE_ABONNEMENT')." ".($isNew ? JText::_('COM_ARVIE_ADD_PAR'): JText::_('COM_ARVIE_MODIF_PAR')); ?></h2>
				</div>
				<div class="btn-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn" onclick="Joomla.submitbutton('abonnement.cancel')">
							<span class="icon-cancel"></span>
						</button>
					</div>
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-primary validate" onclick="Joomla.submitbutton('abonnement.save')">
							<span class="icon-ok"></span>
						</button>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>

			<fieldset>
				<ul class="nav nav-tabs">
					<li><a href="#abonnement" data-toggle="tab"><?php echo JText::_('COM_ARVIE_ABONNEMENT'); ?></a></li>
					<li><a href="#avance" data-toggle="tab"><?php echo JText::_('COM_ARVIE_ADVANCED'); ?></a></li>
					<li><a href="#commentaire" data-toggle="tab"><?php echo JText::_('COM_ARVIE_COMMENT'); ?></a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="abonnement">
						<table class="table">
							<tbody>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('abonne'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('abonne'); ?></div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('suivi'); ?></div>
									</td>
									<td width="80%">
										<div class="controls"><?php echo $this->form->getInput('suivi'); ?></div>
									</td>
									<td width="80%">

									<td width="20%" class="nowrap right">
										<div class="control-label"><?php echo $this->form->getLabel('date'); ?></div>
									</td>
										<div class="controls"><?php echo $this->form->getInput('date'); ?></div>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
					
					<div class="tab-pane" id="avance">				

						<input type="hidden" name="task" value="" />
						<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
					</div>
					<div class="tab-pane" id="commentaire">
						<?php echo $this->form->getControlGroup('commentaire'); ?>
					</div>
					</div>
				<?php echo JHtml::_('form.token'); ?>
			</fieldset>
		</form>
	</div>

<?php endif; ?>
