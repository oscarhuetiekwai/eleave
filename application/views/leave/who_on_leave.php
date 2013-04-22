<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#" style="color:white;">Whos On Leave</a>
  </li>
</ul>
	<div class="row-fluid">
		<div class="span12">
			<h3 class="heading">Whos On Leave</h3>
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
							<?php } ?>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						  <tr><td colspan="5">No Result Found.</td></tr>
						<?php endif; ?>
                    </tbody>
            	</table>
      	</div>
		<?php //echo $this->pagination->create_links(); ?>
 	</div>
