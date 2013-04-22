<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('home/index'); ?>"><i class="icon-home"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#">News List</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
			<h3 class="heading">News List</h3>
				<div class="row-fluid">
					<div class="span12">
						<ul class="dshb_icoNav tac">
							<li><a href="<?php echo site_url('home/add_news'); ?>" style="background-image: url(<?php echo base_url(); ?>assets/img/gCons/add-item.png)">Add News</a></li>
						</ul>
					</div>
				</div>
				<?php $name = array('name'=>'demo'); echo form_open('home/checkbox_news_delete', $name); ?>
				 <div id="button_show_hide">
				 <div class="well" >
				<input type="submit" class="btn-danger btn" value="Delete"> <a href="#" class="ttip_t" title="This button is working when you checked the checkbox, It support delete multiple records at the same time" style="text-decoration:none;color:grey;">[?]</a>
				</div>
				</div>
				<table class="table table-bordered table-striped table_vam" <?php if(isset($data_records)){ ?> id="dt_d" <?php } ?>>
                    <thead>
                        <tr>
							<th>No</th>
                        	<th>News Title</th>
                        	<th>News Content</th>
							<!--<th>News Image</th>-->
							<th>News Date</th>
							<th>Date Created</th>
							<th>Action</th>
							<th><input type="checkbox" name="checkall" value="" class="select_group"></th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
						?>
						<tr id="<?php echo $row->news_id; ?>">
							<td><?php echo $num; ?></td>
							<!--<td><?php //echo $row->IMAGE; ?></td>-->
							<td><?php echo $row->news_title; ?></td>
							<td><?php

							$explode_data = explode("<img>",$row->news_content);
							
							$content = substr($row->news_content, 0, 250);

							echo $content."...";

							?></td>
							<!--<td><?php echo $row->news_image; ?></td>-->
							<td><?php echo $row->news_date; ?></td>
							<td><?php echo $row->news_last_update;  ?></td>
							<!--<td><?php if($row->activity == 1){ ?><span class="label label-success">Active</span> <?php }else{ ?> <span class="label label-important">Non Active</span><?php } ?></td>-->
							<td>
                              <a href="<?php echo site_url('home/edit_news/'.$row->news_id); ?>" title="Edit"><i class="icon-edit"></i></a>
                              <a href="#" class="deletenews" id="<?php echo $row->news_id; ?>" title="Delete"><i class="icon-trash"></i></a>
                          	</td>
							<!--<td>
							<?php if($row->activity == 1){ ?><a href="#" class="button_update_ajax btn btn-danger btn-small" id="<?php echo $row->news_id; ?>" title="Non Active">Update To Inactive</a> <?php }else{ ?><a href="#" class="button_update_ajax btn btn-success btn-small" id="<?php echo $row->news_id; ?>" title="Active">Update To Active</a><?php } ?>
							</td>-->
							<td>
							<input type="checkbox" name="news_id[]" class="check_me" value="<?php echo $row->news_id; ?>" />
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
