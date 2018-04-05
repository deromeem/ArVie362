<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

	<tr>
        <th width="1%" class="hidden-phone">
                <?php echo JHtml::_('grid.checkall'); ?>
        </th>                   
        <th width="1%">
                <?php echo JHtml::_('grid.sort', 'id', 'ud.id', $listDirn, $listOrder) ?>
        </th>
        <th width="2%">
                <?php echo JHtml::_('grid.sort', 'Utilisateur', 'ud.utilisateur', $listDirn, $listOrder) ?>
        </th>
        <th width="2%">
                <?php echo JHtml::_('grid.sort', 'Discussion', 'ud.discussion', $listDirn, $listOrder) ?>
        </th></th>
        </th>
        <th width="2%">
                <?php echo JHtml::_('grid.sort', 'Admin', 'ud.est_admin', $listDirn, $listOrder) ?>
        </th>
        </th>
 
        <th width="1%" style="min-width:55px" class="">
                <?php echo JHtml::_('grid.sort', 'Publié', 'ud.published', $listDirn, $listOrder) ?>
        </th>
		<th width="1%">
			<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'ud.hits', $listDirn, $listOrder); ?>
		</th>
		
	</tr>

