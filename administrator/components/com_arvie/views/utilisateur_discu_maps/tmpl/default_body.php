<?php
defined('_JEXEC') or die('Restricted Access');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));

$saveOrder	= $listOrder == 'ordering';
if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_arvie&task=utilisateur_discu_map.saveOrderAjax&tmpl=component';
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
				<a href="<?php echo JRoute::_('index.php?option=com_arvie&task=utilisateur_discu_map.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->id); ?>
				</a>
				<div class="small hidden-phone">
					<?php // extrait description selon les paramètres de configuration
					if ($this->paramDescShow) {
						$desc = JFilterOutput::cleanText($item->id);
						echo substr($desc, 0, $this->paramDescSize);
						echo (strlen($desc)>$this->paramDescSize?"...":"") ;
					}
					?>
				</div>
			</div>
                </td>
                <td align="small">
                        <?php echo $item->utilisateur; ?>
		</td>

		<td align="small">
                        <?php echo $item->discussion; ?>
		</td>
		<td align="small">
                        <?php echo $item->est_admin; ?>
		</td>

		<td>
			<?php echo JHtml::_('jgrid.published', $item->published, $i, 'utilisateur_discu_map.', true); ?>
		</td>

		<td class="hidden-tablet hidden-phone">
				<?php echo (int) $item->hits; ?>
		</td>
        </tr>
<?php endforeach; ?>
 