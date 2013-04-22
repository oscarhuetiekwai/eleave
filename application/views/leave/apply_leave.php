<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#"  style="color:white;">Apply Leave</a>
  </li>
</ul>
	<div class="row-fluid">
		<div class="span12">
		<?php echo form_open('leave/apply_leave'); ?>
		<fieldset>
		<?php
			$this->load->view('template/show_error');
		?>
		<div class="form-horizontal">
		<div class="product_well" id="product1">
		<fieldset>
			<div class="control-group">
			<div class="control">
			<label for="control-label" class="control-label"></label>
			<code>Note :</code> All field mark with <code>*</code> are required.
			</div>
			</div><!-- /control-group -->

			<div class="control-group formSep ">
			<label for="input01" class="control-label">Leave Type Name*: <a href="#" class="ttip_t" title="Leave Type" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<select name="chosen_a" id="chosen_a" data-placeholder="Select Leave" class="chzn_z span7">
			<option value=""></option>
			<?php if(isset($leave_records)) : foreach($leave_records as $row) : ?>
			<option value="<?php echo $row->leave_type_id; ?>" <?php echo set_select('leave_type', $row->leave_type); ?> ><?php echo $row->leave_type; ?></option>
			<?php endforeach; ?>
			<?php endif; ?>
			</select>
			</div>
			</div>

			<div class="control-group formSep">
			<label class="control-label" for="inputEmail">Start Date <a href="#" class="ttip_t" title="Start Date" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input type="text" class="span8" name="start_date" id="start_date" data-start-date="start_date" placeholder="Start Date" value="" class="input-xlarge uneditable-input dp_leave_start_date">
			</div>
			</div>

			<div class="control-group formSep">
			<label class="control-label" for="inputEmail">End Date <a href="#" class="ttip_t" title="End Date" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input type="text" class="span8"  id="end_date" name="end_date" data-end-date="end_date" placeholder="End Date"  value="" class="input-xlarge uneditable-input dp_leave_end_date">
			</div>
			</div>

			<div class="control-group formSep ">
			<label class="control-label" for="inputEmail">Leave of Day <a href="#" class="ttip_t" title="End Date" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<div id='pa'></div>
			<label class="radio">
			  <input type="radio" name="period" id="period" value="f">Full Day
			</label>
			<label class="radio">
			  <input type="radio" name="period" id="period" value="a">Half Day ( <span class="label label-info">AM</span> )
			</label>
			<label class="radio">
			  <input type="radio" name="period" id="period" value="p">Half Day ( <span class="label label-warning">PM</span> )
			</label>
			</div>
			</div>

			<div class="control-group formSep">
			<label for="select01" class="control-label">No of Days</label>
			<div class="controls">
				<input readonly="readonly" type="text" name="no_of_days" id="no_of_days" value="<?php echo set_value('no_of_days'); ?>" class="input-mini"  >
				<button type="button" class="btn btn-info apply_leave">Calculate</button>
				</div>
			</div>


			<div class="control-group formSep">
			<label class="control-label" for="inputEmail">Reason <a href="#" class="ttip_t" title="Leave Reason" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<textarea rows="3"  class="span8"  name="reason" placeholder="reason"></textarea>

			<input type='hidden' name='staff_id' value="<?php echo $staff_id; ?>" >
			</div>
			</div>

		</div>
		<!--end product-->
		<!-- /single_form -->
		<div class="control-group template">
		<div class="controls">
		<input type="hidden" name="module_index" id="module_index" value="<?php echo base_url('leave/apply_leave_list/'); ?>" />
		<input type="submit" class="btn-primary btn" value="Apply Leave" >&nbsp;<button type="reset" class="btn" id="cancel">Cancel</button>
		</div>
		</div>
		</div>
		</fieldset>
		</form>
		</div>
</div><!-- /row -->

