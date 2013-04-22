<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#" style="color:white;">Pending Leave</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
			<h3 class="heading">Pending Leave</h3>
				<?php $this->load->view('template/show_error'); ?>
				<?php $name = array('name'=>'demo'); echo form_open('leave/checkbox_leave_approve', $name); ?>
				 <div id="button_show_hide">
				 <div class="well" >
				<input type="submit" class="btn-success btn" value="Approve"> <a href="#" class="ttip_t" title="This button is working when you checked the checkbox, It support approve multiple records at the same time" style="text-decoration:none;color:grey;">[?]</a>
				</div>
				</div>
				<table class="table table-bordered table-striped table_vam table-hover" <?php if(isset($data_records)){ ?> id="dt_d" <?php } ?>>
                    <thead>
                        <tr>
							<th>No</th>
                        	<th>Start Date</th>
							<th>End Date</th>
							<th>Day</th>
							<th>Staff Name</th>
							<th>Leave Type</th>
							<?php if(($this->session->userdata('role_id')!=STAFF)){ ?>
							<th>Leave Reason</th>
							<th>Action</th>
							<th><input type="checkbox" name="checkall" value="" class="select_group"></th>
							<?php } ?>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
						?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><?php echo $row->start_date; ?></td>
							<td><?php echo $row->end_date; ?></td>
							<td><?php echo $row->no_of_day; ?></td>
							<td><?php echo $row->username; ?></td>
							<td><?php echo $row->leave_type; ?></td>
							<?php if(($this->session->userdata('role_id')!=STAFF)){ ?>
							<td><?php echo $row->reason; ?></td>

							<td>
                              <a href="#" class="approve_update_ajax btn btn-success" data-id="<?php echo $row->leave_application_id; ?>" title="Approve">Approve</a>
							  <a href="" title="Reject"  class="reject_update_ajax btn btn-danger" data-id="<?php echo $row->leave_application_id; ?>" role="button"  data-toggle="modal" >Reject</a>
                          	</td>
							<td>
							<input type="checkbox" name="leave_application_id[]" class="check_me" value="<?php echo $row->leave_application_id; ?>" />
							</form>
							</td>
							<?php } ?>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						  <tr><td colspan="9">No Result Found.</td></tr>
						<?php endif; ?>
                    </tbody>
            	</table>
      	</div>
		<?php //echo $this->pagination->create_links(); ?>
 	</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Reject Leave</h3>
  </div>
  <div class="modal-body">

	<?php
	$attributes = array('class' => 'form-horizontal');

	echo form_open('leave/reject_leave', $attributes);
	?>
	  <div class="control-group">
		<label class="control-label" for="inputEmail">Reject Reason: </label>
		<div class="controls">
		  <textarea rows="3" name="reject_reason"></textarea>
		  <input type="hidden" id="leave_application_id" value="" name="leave_application_id">
		</div>
	  </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	<input type="submit" class="btn-danger btn" value="Reject">
	</form>
  </div>
</div>