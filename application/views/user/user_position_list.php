<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#" style="color:white;">Position List</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
			<h3 class="heading">Position List</h3>
				<div class="row-fluid">
					<div class="span12">
						<ul class="dshb_icoNav tac">
							<li><a href="<?php echo site_url('user/add_user_position'); ?>" style="background-image: url(<?php echo base_url(); ?>assets/img/gCons/add-item.png)">Add Position</a></li>
						</ul>
					</div>
				</div>
				<?php $name = array('name'=>'demo'); echo form_open('user/checkbox_user_position_delete', $name); ?>
				 <div id="button_show_hide">
				 <div class="well" >
				<input type="submit" class="btn-danger btn" value="Delete"> <a href="#" class="ttip_t" title="This button is working when you checked the checkbox, It support delete multiple records at the same time" style="text-decoration:none;color:grey;">[?]</a>
				</div>
				</div>
				<table class="table table-bordered table-striped table_vam table-hover" <?php if(isset($data_records)){ ?> id="dt_d" <?php } ?>>
                    <thead>
                        <tr>
							<th>No</th>
                        	<th>Position Name</th>
							<th>Action</th>
							<th><input type="checkbox" name="checkall" value="" class="select_group"></th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
						?>
						<tr id="<?php echo $row->position_id; ?>">
							<td><?php echo $num; ?></td>
							<td><?php echo $row->position_name; ?></td>
							<td>
                              <a href="<?php $hash = md5($row->position_id.SECRETTOKEN); echo site_url('user/edit_user_position/'.$row->position_id.'/'.$hash); ?>" title="Edit"><i class="icon-edit"></i></a>
                              <a href="#" class="delete_user_position" id="<?php echo $row->position_id; ?>" data-id="<?php echo $row->position_id; ?>" title="Delete"><i class="icon-trash"></i></a>
                          	</td>						
							<td>
							<input type="checkbox" name="position_id[]" class="check_me" value="<?php echo $row->position_id; ?>" />
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
