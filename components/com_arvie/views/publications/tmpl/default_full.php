<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1>Publications de arvie</h1>

<form action="<?php echo htmlspecialchars(JFactory::getURI()->toString()); ?>" method="post" name="adminForm" id="adminForm">

	<table class="category">
		<thead>
			<tr>
			<th class="title">Nom</th>
			<th class="title">Groupe</th>
			<th class="title">Titre</th>
		</tr>
		</thead>

		<tbody>
			<?php foreach($this->tickets as $i => $item) : ?>
			<tr>
				<td><?php echo $item->auteur_nom ?></td>
				<td><?php echo $item->groupe ?></td>
				<td><?php echo $item->titre ?></td>
			</tr>			
			<?php endforeach; ?>
		</tbody>
	</table>

</form>

<?php echo $this->pagination->getListFooter(); ?>
