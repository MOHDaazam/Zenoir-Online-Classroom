<!--teachers class settings-->
<!--
1. invite existing students to the current classroom
2. enable/disable modules
3. remove students from the current classroom
-->
<h4>[Classroom Settings]</h4>
<ul class="tabs left">
	<li><a href="#invite_students">Invite Students</a></li>
	<li><a href="#remove_students">Remove Students</a></li>
	<li><a href="#modules">Enable/Disable Modules</a></li>
	<li><a href="#export">Export</a></li>
</ul>
<div id="invite_students" class="tab-content">
<?php 
$invites = $table['invited'];
$modules = $table['modules'];
$exports = $table['exports'];
$remove  = $table['remove'];


$export_class	= array(
				'id'=>'btn_export',
				'name'=>'btn_export',
				'value'=>'Export',
				'content'=>'Export',
				'class'=>'medium green'
				);
if(!empty($invites)){ 
?>
<table class="tbl_classes">
	<thead>
		<tr>
			<th>ID</th>
			<th>Student</th>
			<th>Invite</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($invites as $row){ ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo strtoupper($row['lname']) .', '. ucwords($row['fname']) .' '. ucwords($row['mname']); ?></td>
			<td><img src="/zenoir/img/add.png" class="icons" data-invitename="<?php echo strtoupper($row['lname']) .', '. ucwords($row['fname']); ?>" data-inviteid="<?php echo $row['id']; ?>"/></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
</div><!--end of invite students-->

<div id="remove_students" class="tab-content">
<?php if(!empty($remove)){ ?>
<table class="tbl_classes">
	<thead>
		<tr>
			<th>ID</th>
			<th>Student</th>
			<th>Remove</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($remove as $row){ ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo strtoupper($row['lname']) .', '. ucwords($row['fname']) .' '. ucwords($row['mname']); ?></td>
			<td><img src="/zenoir/img/decline.png" class="icons" data-removename="<?php echo strtoupper($row['lname']) .', '. ucwords($row['fname']); ?>" data-removeid="<?php echo $row['id']; ?>"/></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
</div><!--end of remove students-->

<div id="modules" class="tab-content">
<?php if(!empty($modules)){ ?>
<table>
	<thead>
		<tr>
			<th>Module</th>
			<th>Description</th>
			<th>Enable/Disable</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($modules as $row){ ?>
		<tr>
			<td><?php echo $row['mod_title']; ?></td>
			<td><?php echo $row['mod_description']; ?></td>
			<td>
			<?php if($row['status'] == 1){ ?>
			<input type="checkbox" class="endis_module" data-classmoduleid="<?php echo $row['classmodule_id']; ?>" checked/>
			<?php }else{ ?>
			<input type="checkbox" class="endis_module" data-classmoduleid="<?php echo $row['classmodule_id']; ?>"/>
			<?php } ?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
</div><!--end of modules-->

<div id="export" class="tab-content">
	What to export?
	<div id="export_group">
		<span class="export_type">
			<label for="exp_student">Student</label>
			<input type="checkbox" name="exp_student" id="exp_student"/>
		</span>
		<span class="export_type">
			<label for="exp_handout">Handout</label>
			<input type="checkbox" name="exp_handout" id="exp_handout"/>
		</span>
	</div>
	
	<label for="export_to">Export to</label>
	<?php if(!empty($exports)){ ?>
	<select name="export_to" id="export_to">
		<?php foreach($exports as $row){ ?>
			<?php if($row[5] != $this->session->userdata('current_class')){ ?>
			<option value="<?php echo $row[5]; ?>"><?php echo $row[2]; ?></option>
			<?php } ?>
		<?php } ?>
	</select>
	<p>
	<?php echo form_button($export_class); ?>
	</p>
	<?php } ?>
</div><!--end of export-->
