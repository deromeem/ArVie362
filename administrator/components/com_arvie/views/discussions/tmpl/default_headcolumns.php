<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>

<tr>
	<th width="1%"  class="hidden-phone">
		<?php echo JHtml::_('grid.checkall'); ?> 
	</th>
	<th width="30%">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_DISCUSSIONS_NOM', 'd.nom', $listDirn, $listOrder) ?>
	</th>
	<th width="10%" class="nowrap center">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_DISCUSSIONS_NB_MESSAGES', 'nb_messages', $listDirn, $listOrder) ?>
	</th>
	<th width="5%" style="min-width:55px" align="center">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_PUBLISHED', 'd.published', $listDirn, $listOrder) ?>
	</th>
	<th width="10%" style="min-width:120px" class="nowrap center hidden-tablet hidden-phone">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_CREATED_DATE', 'd.created', $listDirn, $listOrder) ?>
	</th>
	<th width="5%" class="center hidden-tablet hidden-phone">
		<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'd.hits', $listDirn, $listOrder); ?>
	</th>
	<th width="5%" class="nowrap center hidden-phone">
		<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'd.id', $listDirn, $listOrder); ?>
	</th>
</tr>
