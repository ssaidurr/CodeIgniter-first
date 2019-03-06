<div class="box-content">
	<p>
		<?php
			$message = $this->session->userdata('message');
			if ($message) {
				echo "<span class='alert alert-danger'>$message</span>";
				$this->session->unset_userdata('message');
				}
		?>
	</p>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
		<thead>
			<tr>
				<th>Category Id</th>
				<th>Student Name</th>
				<th>Phone</th>
				<th>Roll</th>
				<th>Action</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
				foreach ($all_student_info as $v_student) {
			?>
			<tr>
				<td class="center"><?php echo $v_student->student_id ?></td>
				<td class="center"><?php echo $v_student->student_name ?></td>
				<td class="center"><?php echo $v_student->student_phone ?></td>
				<td class="center"><?php echo $v_student->student_roll ?></td>
				<td>
					<a class="btn btn-info" href="<?php echo base_url();?>edit-student/<?php echo $v_student->student_id ?>">
						<i class="halflings-icon white edit"></i>
					</a>

					<a class="btn btn-danger" href="<?php echo base_url();?>delete-student/<?php echo $v_student->student_id ?>" id="delete">
						<i class="halflings-icon white trash"></i>
					</a>
				</td>
			</tr>
			<?php } ?>
			

		</tbody>
	</table>
</div>