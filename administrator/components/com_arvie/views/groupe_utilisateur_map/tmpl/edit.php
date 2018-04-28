<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'groupe.cancel' || document.formvalidator.isValid(document.id('arvie-form')))
		{
			Joomla.submitform(task, document.getElementById('arvie-form'));
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_arvie&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="arvie-form" class="form-validate">

	<div class="form-inline form-inline-header">
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('utilisateur'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('utilisateur'); ?></div>
		</div>
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('role'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('role'); ?></div>
		</div>
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('groupe'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('groupe'); ?></div>
		</div>
	</div>

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'groupe')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'groupe', JText::_('COM_ARVIE_GROUPE')); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="form-vertical">
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('date_deb'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('date_deb'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('date_fin'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('date_fin'); ?></div>
				</div>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('JGLOBAL_FIELDSET_PUBLISHING', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span9">
				<?php echo JLayoutHelper::render('joomla.edit.publishingdata', $this); ?>
			</div>
			<div class="span3">
				<?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>
				<?php echo JLayoutHelper::render('joomla.edit.metadata', $this); ?>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php echo JLayoutHelper::render('joomla.edit.params', $this); ?>

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>