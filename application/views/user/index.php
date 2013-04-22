<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('home/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#" style="color:white;">Staff List</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
			<h3 class="heading">Staff List</h3>
				<div class="row-fluid">
					<div class="span12">
						<ul class="dshb_icoNav tac">
							<li><a href="<?php echo site_url('user/add_user'); ?>" style="background-image: url(<?php echo base_url(); ?>assets/img/gCons/add-item.png)">Add Staff</a></li>
						</ul>
					</div>
				</div>
				<?php $name = array('name'=>'demo'); echo form_open('user/checkbox_user_delete', $name); ?>
				 <div id="button_show_hide">
				 <div class="well" >
				<input type="submit" class="btn-danger btn" value="Delete"> <a href="#" class="ttip_t" title="This button is working when you checked the checkbox, It support delete multiple records at the same time" style="text-decoration:none;color:grey;">[?]</a>
				</div>
				</div>
				<table class="table table-bordered table-striped table_vam table-hover " <?php if(isset($data_records)){ ?> id="dt_d"<?php } ?>>
				<!--<table class="table table-bordered table-striped table_vam table-hover dTableR" <?php //if(isset($data_records)){ ?> id="dt_tools"<?php //} ?>>-->
                    <thead>
                        <tr>
							<th>No</th>
                        	<th>Username</th>
							<th>Role</th>
							<th>Position</th>
							<th>Department</th>
                        	<th>Email Address</th>
							<th>Gender</th>
							<th>Date Created</th>
							<th>Superior</th>
							<th>Action</th>
							<th><input type="checkbox" name="checkall" value="" class="select_group"></th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
						?>
						<tr id="<?php echo $row->staff_id; ?>">
							<td><?php echo $num; ?></td>
							<td><?php echo $row->username; ?></td>
							<td><?php if($row->role_id == 3){ ?><span class="label label-info"><?php echo $row->role_position; ?></span><?php }else{ ?><span class="label label-warning"><?php echo $row->role_position; ?></span><?php } ?></td>
							<td><?php echo $row->position_name; ?></td>
							<td><?php echo $row->department_name; ?></td>
							<td><?php echo $row->email_address; ?></td>
							<td><?php if($row->gender == "M"){echo "Male";}else{echo "Female";} ?></td>
							<td><?php echo $row->date_created; ?></td>
							<?php
							foreach($data_get_approval_id as $row2){
								if($row2->staff_id == $row->superior_id){
									$username =  $row2->username;
								}
							}
							?>
							<td><?php echo $username;	?></td>
							<td>
                              <a href="<?php $hash = md5($row->staff_id.SECRETTOKEN); echo site_url('user/edit_user/'.$row->staff_id.'/'.$hash); ?>" title="Edit"><i class="icon-edit"></i></a>
                              <a href="#" class="delete_user" id="<?php echo $row->staff_id; ?>" title="Delete"><i class="icon-trash"></i></a>
                          	</td>

							<td>
							<input type="checkbox" name="staff_id[]" class="check_me" value="<?php echo $row->staff_id; ?>" />
							</form>
							</td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						  <tr><td colspan="8">No Result Found.</td></tr>
						<?php endif; ?>
                    </tbody>
            	</table>
      	</div>

		<?php //echo $this->pagination->create_links(); ?>
 	</div>
