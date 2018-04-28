<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>

	<tr>
		<th width="5%" class="hidden-phone">
			<?php echo JHtml::_('grid.checkall'); ?> 
		</th>
		<th width="20%">
			<?php echo JHtml::_('grid.sort', 'COM_ARVIE_UTILISATEURS_NOM', 'u.nom', $listDirn, $listOrder) ?>
		</th>
		<th width="15%" class="nowrap">
			<?php echo JHtml::_('grid.sort', 'COM_ARVIE_UTILISATEURS_PRENOM', 'u.prenom', $listDirn, $listOrder) ?>
		</th>
		<th width="20%" class="nowrap">
			<?php echo JHtml::_('grid.sort', 'COM_ARVIE_UTILISATEURS_EMAIL', 'u.email', $listDirn, $listOrder) ?>
		</th>
		<th width="5%" style="min-width:55px" class="nowrap hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'u.published', $listDirn, $listOrder) ?>
		</th>
		<th width="10%" style="min-width:120px" class="nowrap center hidden-tablet hidden-phone">
			<?php echo JHtml::_('grid.sort', 'COM_ARVIE_MODIFIED_DATE', 'u.modified', $listDirn, $listOrder) ?>
		</th>
		<th width="5%" class="nowrap center hidden-tablet hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'u.hits', $listDirn, $listOrder); ?>
		</th>
		<th width="5%" class="nowrap center hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'u.id', $listDirn, $listOrder); ?>
		</th>
	</tr>
