<div id="subject_list">
	<table>
		<thead>
		<tr>
			<th>Ämne kort</th>
			<th>Ämne</th>
			<th>&nbsp</th>
		</tr>
		</thead>
		<tbody id="table_list">
		<?php foreach ($subjects as $subject) : ?>
		<tr id="<?php echo $subject['subject_id']; ?>">
			<td><?php echo $subject['subject_short']; ?></td>
			<td><?php echo $subject['subject_name']; ?></td>
			
			<td><img class="edit" src="images/edit.gif" >
				<img class="delete" src="images/del.gif" ></td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>