<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));

$saveOrder	= $listOrder == 'ordering';
if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_arvie&task=utilisateur_even_maps.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'articleList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
?>

<?php foreach($this->items as $i => $item): ?>
        <tr class="row<?php echo $i % 2; ?>">
                <td class="hidden-phone">
                        <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                </td>
		<td class="wrap has-context">
			<div class="pull-left">
				<a href="<?php echo JRoute::_('index.php?option=com_arvie&task=utilisateur_even_map.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->nom_utilisateur); ?>
				</a>
			</div>
                </td>
		<td align="small">
                        <?php echo $item->titre_publication; ?> - 
			<?php echo $item->lieu_evenement; ?>
		</td>
		<td width="5%" align="center">
			<?php echo JHtml::_('jgrid.published', $item->published, $i, 'utilisateur_even_maps.', true); ?>
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
 