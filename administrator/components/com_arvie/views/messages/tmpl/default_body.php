<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));

$saveOrder	= $listOrder == 'ordering';
if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_arvie&task=messages.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'articleList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
?>

<?php foreach($this->items as $i => $item): ?>
<tr class="row<?php echo $i % 2; ?>">
	<td class="center hidden-phone">
		<?php echo JHtml::_('grid.id', $i, $item->id); ?>
	</td>
	<td class="wrap has-context">
		<div class="pull-left">
			<a href="<?php echo JRoute::_('index.php?option=com_arvie&task=message.edit&id='.(int) $item->id); ?>">
				<?php echo $this->escape($item->nom_auteur); ?>
			</a>
		</div>
	</td>
	<td align="small">
		<?php echo $item->nom_discussion; ?>
	</td>
	<td align="small">
		<?php echo $item->contenu; ?>
	</td>
	<td align="center">
		<?php echo JHtml::_('jgrid.published', $item->published, $i, 'messages.', true); ?>
	</td>
	<td class="center hidden-phone">
		<?php echo JHtml::_('date', $item->created, $this->paramDateFmt); ?>
	</td>
	<td class="center hidden-tablet hidden-phone">
		<?php echo (int) $item->hits; ?>
	</td>
	<td class="center hidden-phone">
		<?php echo (int) $item->id; ?>
	</td>
</tr>
<?php endforeach; ?>
