<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#" style="color:white;">Leave Type List</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
			<h3 class="heading">Leave Type List</h3>
				<div class="row-fluid">
					<div class="span12">
						<ul class="dshb_icoNav tac">
							<li><a href="<?php echo site_url('leave/add_leave_type'); ?>" style="background-image: url(<?php echo base_url(); ?>assets/img/gCons/add-item.png)">Add Leave Type</a></li>
						</ul>
					</div>
				</div>

				<table class="table table-bordered table-striped table_vam table-hover" <?php if(isset($data_records)){ ?> id="dt_d" <?php } ?>>
                    <thead>
                        <tr>
							<th>No</th>
                        	<th>Leave Type Name</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
						?>
						<tr id="<?php echo $row->leave_type_id; ?>">
							<td><?php echo $num; ?></td>
							<td><?php echo $row->leave_type; ?></td>
							<td><?php if($row->status == "Y"){ echo "<span class='label label-success'>Active</span>"; }else{ echo "<span class='label label-important'>Not Active</span>"; } ?></td>
							<td>
                              <a href="<?php $hash = md5($row->leave_type_id.SECRETTOKEN); echo site_url('leave/edit_leave_type/'.$row->leave_type_id.'/'.$hash); ?>" title="Edit"><i class="icon-edit"></i></a>
                              <a href="#" class="button_update_ajax" id="<?php echo $row->leave_type_id; ?>" <?php if($row->status == "Y"){?>title="Deactivate" <?php }else{ ?>title="Activate"  <?php } ?>><?php if($row->status == "Y"){?><i class="icon-thumbs-down"></i><?php }else{ ?><i class="icon-thumbs-up"></i><?php } ?></a>
                          	</td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						  <tr><td colspan="4">No Result Found.</td></tr>
						<?php endif; ?>
                    </tbody>
            	</table>
      	</div>
		<?php //echo $this->pagination->create_links(); ?>
 	</div>
