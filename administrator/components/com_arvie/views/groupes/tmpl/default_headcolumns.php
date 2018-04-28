<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>
        <tr>
                <th width="5%" class="hidden-phone">
                        <?php echo JHtml::_('grid.checkall'); ?>
                </th> 
                <th width="20%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_GROUPE', 'g.nom', $listDirn, $listOrder) ?>
                </th>
                <th width="20%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_GROUPES_GROUPE_PARENT', 'gp.nom', $listDirn, $listOrder) ?>
                </th>
                <th width="7%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_GROUPES_EST_GROUPE_INTERET_BACKEND', 'g.est_groupe_interet', $listDirn, $listOrder) ?>
                </th>
                <th width="8%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_GROUPES_EST_PUBLIC_BACKEND', 'g.est_public', $listDirn, $listOrder) ?>
                </th>
                <th width="15%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_GROUPES_CREE_PAR', 'u.name', $listDirn, $listOrder) ?>
                </th>
                <th width="5%" style="min-width:55px" class="nowrap hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'g.published', $listDirn, $listOrder) ?>
                </th>
                <th width="10%" style="min-width:120px" class="nowrap center hidden-tablet hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_MODIFIED_DATE', 'g.modified', $listDirn, $listOrder) ?>
                </th>
                <th width="5%" class="nowrap center hidden-tablet hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'g.hits', $listDirn, $listOrder); ?>
                </th>
                <th width="5%" class="nowrap center hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'g.id', $listDirn, $listOrder); ?>
                </th>
	</tr>

