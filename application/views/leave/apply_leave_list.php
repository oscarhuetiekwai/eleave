<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#"  style="color:white;">Apply Leave List</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
			<h3 class="heading">Apply Leave List</h3>
				<div class="row-fluid">
					<div class="span12">
						<ul class="dshb_icoNav tac">
							<li><a href="<?php echo site_url('leave/apply_leave'); ?>" style="background-image: url(<?php echo base_url(); ?>assets/img/gCons/add-item.png)">Apply Leave</a></li>
						</ul>
					</div>
				</div>
				<?php $name = array('name'=>'demo'); echo form_open('leave/checkbox_leave_type_delete', $name); ?>
				 <div id="button_show_hide">
				 <div class="well" >
				<input type="submit" class="btn-danger btn" value="Delete"> <a href="#" class="ttip_t" title="This button is working when you checked the checkbox, It support delete multiple records at the same time" style="text-decoration:none;color:grey;">[?]</a>
				</div>
				</div>
				<table class="table table-bordered table-striped table_vam table-hover" <?php if(isset($data_records)){ ?> id="dt_d" <?php } ?>>
                    <thead>
                        <tr>
							<th>No</th>
                        	<th>Leave Type</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Number of Day(s)</th>
							<th>Reason</th>
							<th>Leave Status</th>
							<th>Reject Reason</th>
							<th>Date Apply</th>
							<th>Action</th>
							<?php if(($this->session->userdata('role_id')==ADMIN) || ($this->session->userdata('role_id')==SUPERIOR))	{ ?>
							<th><input type="checkbox" name="checkall" value="" class="select_group"></th>
							<?php } ?>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
						?>
						<tr id="<?php echo $row->leave_application_id; ?>">
							<td><?php echo $num; ?></td>
							<td><?php echo $row->leave_type; ?></td>
							<td><?php echo $row->start_date; ?></td>
							<td><?php echo $row->end_date; ?></td>
							<td><?php echo $row->no_of_day; ?></td>
							<td><?php echo $row->reason; ?></td>
							<td><?php if($row->leave_status == "a"){ echo "<span class='label label-success'>Approved</span>"; }else if($row->leave_status == "w"){ echo "<span class='label label-inverse'>Withdraw</span>"; }else if($row->leave_status == "c"){ echo "<span class='label label-important'>Cancelled</span>"; }else if($row->leave_status == "r"){ echo "<span class='label label-info'>Rejected</span>"; }else{  echo "<span class='label label-warning'>Pending</span>"; }?></td>
							<td><?php echo $row->reject_reason; ?></td>
							<td><?php echo $row->date_apply; ?></td>
							<td>
                              <?php if($row->leave_status == "a" || $row->leave_status == "p" || $row->leave_status == "c"){ ?><a href="#" class="deactived" id="" data-id="<?php echo $row->leave_application_id; ?>" title="Withdraw"><i class="icon-remove"></i></a><?php } ?>
                          	</td>
							<?php if(($this->session->userdata('role_id')==ADMIN) || ($this->session->userdata('role_id')==SUPERIOR))	{ ?>
							<td>
							<input type="checkbox" name="leave_application_id[]" class="check_me" value="<?php echo $row->leave_application_id; ?>" />
							</form>
							</td>
							<?php } ?>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						  <tr><td colspan="11">No Result Found.</td></tr>
						<?php endif; ?>
                    </tbody>
            	</table>
      	</div>
		<?php //echo $this->pagination->create_links(); ?>
 	</div>
