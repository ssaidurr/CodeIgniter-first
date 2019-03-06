
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
				<th>Admin Id</th>
				<th>Admin Name</th>
				<th>Phone</th>
				<th>Image</th>
				<th>Email</th>
			</tr>
		</thead>
		<style>
			tr{}
			tr td{}
			tr td img{width: 150px;height: 50px;}
		</style>
		<tbody>
			<?php
				foreach ($all_admin_info as $v_admin) {
			?>
			<tr>
				<td class="center"><?php echo $v_admin->admin_id ?></td>
				<td class="center"><?php echo $v_admin->admin_name ?></td>
				<td class="center"><?php echo $v_admin->phone ?></td>
				<td class="center"><img src="<?php echo $v_admin->admin_image ?>"></td>
				<td class="center"><?php echo $v_admin->email_address ?></td>		
			</tr>
			<?php } ?>
			

		</tbody>
	</table>
</div>