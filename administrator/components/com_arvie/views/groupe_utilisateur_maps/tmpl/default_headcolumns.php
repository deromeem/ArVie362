<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>
	<tr>
                <th width="1%" class="hidden-phone">
                        <?php echo JHtml::_('grid.checkall'); ?>
                </th>                   
                <th width="2%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_UTILISATEUR', 'u.nom', $listDirn, $listOrder) ?>
                </th>
                <th width="2%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_ROLE', 'r.label', $listDirn, $listOrder) ?>
                </th>
                <th width="2%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_GROUPE', 'g.nom', $listDirn, $listOrder) ?>
                </th>
                <th width="1%" style="min-width:55px" class="">
                        <?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'gum.published', $listDirn, $listOrder) ?>
                </th>
                <th width="2%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_CREATED_DATE', 'gum.created', $listDirn, $listOrder) ?>
                </th>
                <th width="1%">
                        <?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'gum.hits', $listDirn, $listOrder); ?>
                </th>		
                <th width="1%" class="nowrap center hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'gum.id', $listDirn, $listOrder) ?>
                </th>
	</tr>
