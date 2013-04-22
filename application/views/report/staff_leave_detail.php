<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#" style="color:white;">Staff Leave Detail</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
			<h3 class="heading">Staff Leave Detail</h3>
	 		<?php $this->load->helper('search_helper'); ?>

	 		<form class="form-inline" action="<?php echo base_url('report/search_staff_leave'); ?>" method="post" id="myForm" >
	           <!-- <input type="text" class="input-small" name="start_date" id="start_date_report" placeholder="From Date" value="<?php //echo search_date('search_start_date'); ?>" >
	            <input type="text" class="input-small" name="end_date" id="end_date_report" placeholder="To Date" value="<?php //echo search_date('search_end_date'); ?>" >-->
				<input type="text" class="input-medium" name="name"  placeholder="Staff Name" value="<?php echo search_text('search_name'); ?>" >
				<select name="role">
			      <option value="" >All Role</option>
				  <option value="2" <?php if(search_text('search_role') == "2"){ ?>selected<?php } ?>>Superior</option>
				  <option value="3" <?php if(search_text('search_role') == "3"){ ?>selected<?php } ?>>Staff</option>
				</select>
				<input type="submit" class="btn" value="Filter Result">
				<button type="button" class="btn btn-warning" id="search_leave_detail_excel" >Excel</button>
          	</form>
				<table class="table table-bordered table-striped table_vam table-hover" >
                    <thead>
                        <tr>
							<th>No</th>
							<th>Staff Name</th>
							<th>Staff Role</th>
                        	<th>Staff Details</th>
							<th>Leave Detail</th>
							<th>Date Created</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
						?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><?php echo $row->username; ?></td>
							<td><?php if($row->role_id == 3){ ?><span class="label label-info"><?php echo $row->role_position; ?></span><?php }else{ ?><span class="label label-warning"><?php echo $row->role_position; ?></span><?php } ?></td>
							
							<td>Email: <span class="label label-inverse"><?php echo $row->email_address; ?></span><br>Contact: <span class="label label-inverse"><?php echo $row->mobile_phone; ?></span><br>Department: <span class="label label-inverse"><?php echo $row->department_name; ?></span><br>Position: <span class="label label-inverse"><?php echo $row->position_name; ?></span></td>
							
							<td class="span4">Total Annual Leave: <span class="badge badge-important pull-right"><?php echo $row->annual_leave; ?></span><br>Total Sick Leave: <span class="badge badge-important pull-right"><?php echo $row->sick_leave; ?></span><br>Annual Leave Balance: <span class="badge badge-success pull-right"><?php echo $row->annual_leave_balance; ?></span><br>Sick Leave Balance: <span class="badge badge-success pull-right"><?php echo $row->sick_leave_balance; ?></span></td>
							<td><?php echo $row->date_created; ?></td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						  <tr><td colspan="12">No Result Found.</td></tr>
						<?php endif; ?>
                    </tbody>
            	</table>
				<?php echo "Total Record: ".$num; ?>
				<?php echo $this->pagination->create_links(); ?>
      	</div>
		<?php //echo $this->pagination->create_links(); ?>
 	</div>
