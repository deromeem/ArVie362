<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>

<tr>
	<th width="2%" align ="center">
		<?php echo JHtml::_('grid.checkall'); ?> 
	</th>
	<th width="10%" class="nowrap">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_PUBLICATIONS_TITRE', 'p.titre', $listDirn, $listOrder) ?>
	</th>
	<th width="10%" class="nowrap">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_PUBLICATIONS_PARENT', 'pp.titre', $listDirn, $listOrder) ?>
	</th>
	<th width="10%" class="nowrap">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_PUBLICATIONS_GROUPE', 'g.nom', $listDirn, $listOrder) ?>
	</th>
	<th width="15%" class="nowrap">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_PUBLICATIONS_AUTEUR', 'u.nom', $listDirn, $listOrder) ?>
	</th>
	<th width="5%" class="nowrap">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_PUBLICATIONS_EST_PUBLIC', 'p.est_public', $listDirn, $listOrder) ?>
	</th>
	<th width="5%" style="min-width:55px"  align="center">
		<?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'p.published', $listDirn, $listOrder) ?>
	</th>
	<th width="10%" style="min-width:120px" class="nowrap center hidden-tablet hidden-phone">
		<?php echo JHtml::_('grid.sort', 'COM_ARVIE_PUBLICATIONS_DATE_PUBLI', 'p.date_publi', $listDirn, $listOrder) ?>
	</th>
	<th width="10%" class="nowrap center hidden-tablet hidden-phone">
		<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'p.hits', $listDirn, $listOrder); ?>
	</th>
	<th width="5%">
		<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'p.id', $listDirn, $listOrder) ?>
	</th>
</tr>

