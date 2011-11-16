<div id="halls_list">
	<table>
		<thead>
		<tr>
			<th>Rum</th>
			<th>&nbsp</th>
		</tr>
		</thead>
		<tbody id="table_list">
		<?php foreach ($halls as $hall) : ?>
		<tr id="<?php echo $hall['id']; ?>">
        	<td class="name"><?php echo $hall['name']; ?></td>
			<td><img class="edit" src="images/edit.gif" >
				<img class="delete" src="images/del.gif" ></td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>