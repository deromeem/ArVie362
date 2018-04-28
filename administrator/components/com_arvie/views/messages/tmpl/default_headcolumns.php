<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>

	<tr>
		<th width="1%" class="hidden-phone">
			<?php echo JHtml::_('grid.checkall'); ?> 
		</th>
		<th width="20%">
			<?php echo JHtml::_('grid.sort', 'COM_ARVIE_MESSAGES_AUTEUR', 'u.nom', $listDirn, $listOrder) ?>
		</th>
		<th width="15%" class="nowrap">
			<?php echo JHtml::_('grid.sort', 'COM_ARVIE_MESSAGES_DISCUSSION', 'd.nom', $listDirn, $listOrder) ?>
		</th>
		<th width="20%" class="nowrap">
			<?php echo JHtml::_('grid.sort', 'COM_ARVIE_MESSAGES_CONTENU', 'm.contenu', $listDirn, $listOrder) ?>
		</th>
		<th width="1%" style="min-width:55px" class="nowrap center ">
			<?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'm.published', $listDirn, $listOrder) ?>
		</th>
		<th width="1%" style="min-width:120px" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'COM_ARVIE_CREATED_DATE', 'm.created', $listDirn, $listOrder) ?>
		</th>
		<th width="10%" class="center hidden-tablet hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'm.hits', $listDirn, $listOrder); ?>
		</th>
		<th width="1%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'm.id', $listDirn, $listOrder); ?>
		</th>
	</tr>
