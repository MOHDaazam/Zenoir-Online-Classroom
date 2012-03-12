<!--class management-->

<p>
<a href="/zenoir/index.php/ajax_loader/view/new_class" class="lightbox">Create New</a>
</p>

<table class="tbl_classes">
	<thead>
		<tr>
			<th>Class Code</th>
			<th>Description</th>
			<th>Subject</th>
			<th>Teacher</th>
			<th>Edit</th>
			<th>View</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($table as $v){ ?>
		<tr>
			<td><?php echo $v[4]; ?></td>
			<td><?php echo $v[3]; ?></td>
			<td><?php echo $v[5]; ?></td>
			<td><?php echo strtoupper($v[2]) .',  '. ucwords($v[0]) . ' ' . ucwords($v[1]); ?></td>
			<td><a href="" class="lightbox"><img class="icons" src="/zenoir/img/update.png"/></a></td>
			<td><a href="" class="lightbox"><img class="icons" src="/zenoir/img/view.png"/></a></td>
			
		</tr>
		<?php } ?>
	</tbody>
</table>