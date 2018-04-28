<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

	<tr>
                <th width="1%" class="hidden-phone">
                        <?php echo JHtml::_('grid.checkall'); ?>
                </th>                   
                <th width="20%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_UTILISATEUR_DISCU_MAP_NOM', 'u.nom', $listDirn, $listOrder) ?>
                </th>
                <th width="20%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_UTILISATEUR_DISCU_MAP_DISCU', 'd.nom', $listDirn, $listOrder) ?>
                </th>
                <th width="10%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_UTILISATEUR_DISCU_MAP_ADMIN', 'ud.est_admin', $listDirn, $listOrder) ?>
                </th>
                <th width="1%" style="min-width:55px" class="">
                        <?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'ud.published', $listDirn, $listOrder) ?>
                </th>
                <th width="10%" style="min-width:120px" class="nowrap center hidden-tablet hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_CREATED_DATE', 'ud.created', $listDirn, $listOrder) ?>
                </th>
                <th width="5%" class="center hidden-tablet hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'ud.hits', $listDirn, $listOrder); ?>
                </th>		
                <th width="5%" class="nowrap center hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'ud.id', $listDirn, $listOrder) ?>
                </th>
	</tr>

