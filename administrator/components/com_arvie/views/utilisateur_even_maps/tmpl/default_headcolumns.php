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
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_UTILISATEUR_EVEN_MAP_PARTI', 'u.nom', $listDirn, $listOrder) ?>
                </th>
                <th width="25%">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_UTILISATEUR_EVEN_MAP_EVEN', 'e.lieu', $listDirn, $listOrder) ?>
                </th>       
		<th width="5%" style="min-width:55px" class="nowrap hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'ue.published', $listDirn, $listOrder) ?>
                </th>
		<th width="10%" style="min-width:120px" class="nowrap center hidden-tablet hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'COM_ARVIE_CREATED_DATE', 'ue.created', $listDirn, $listOrder) ?>
                </th>
		<th width="5%" class="nowrap center hidden-tablet hidden-phone">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'ue.hits', $listDirn, $listOrder); ?>
		</th>		
                <th width="5%" class="nowrap center hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'ue.id', $listDirn, $listOrder) ?>
                </th>
	</tr>
