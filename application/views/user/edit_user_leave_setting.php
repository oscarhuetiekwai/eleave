<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#" style="color:white;">Edit User Leave Setting</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
		<?php echo form_open('user/edit_user_leave_setting'); ?>

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
			<label for="input01" class="control-label">Username*: <a href="#" class="ttip_t" title="Username" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="username" size="30" type="text"  id="disabledInput" class="span8" value="<?php echo set_value('username',$data_records->username); ?>" placeholder="Username"  title="Eg: Username"  />
			</div>
			</div>
			
			<div class="control-group formSep ">
			<label for="input01" class="control-label">Annual Leave*: <a href="#" class="ttip_t" title="Annual Leave" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="annual_leave" size="30" type="text"  class="span8" value="<?php echo set_value('annual_leave',$data_records->annual_leave); ?>" placeholder="Annual Leave"  title="Eg: Annual Leave"  />
			</div>
			</div>

			<div class="control-group formSep ">
			<label for="input01" class="control-label">Sick Leave*: <a href="#" class="ttip_t" title="Sick Leave" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="sick_leave" size="30" type="text" class="span8" value="<?php echo set_value('sick_leave',$data_records->sick_leave); ?>" placeholder="Sick Leave"  title="Eg: Sick Leave"  />
			</div>
			</div>

			<div class="control-group formSep ">
			<label for="input01" class="control-label">Annual Leave Balance*: <a href="#" class="ttip_t" title="Annual Leave Balance" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="annual_leave_balance" size="30" type="text"  class="span8" value="<?php echo set_value('annual_leave_balance',$data_records->annual_leave_balance); ?>" placeholder="Annual Leave Balance"  title="Eg: Annual Leave Balance"  />
			</div>
			</div>
			
		<div class="control-group formSep ">
			<label for="input01" class="control-label">Sick Leave Balance*: <a href="#" class="ttip_t" title="Sick Leave Balance" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="sick_leave_balance" size="30" type="text"  class="span8" value="<?php echo set_value('sick_leave_balance',$data_records->sick_leave_balance); ?>" placeholder="Sick Leave Balance"  title="Eg: Sick Leave Balance"  />
			</div>
		</div>
			
		<div class="control-group formSep ">
			<label for="input01" class="control-label">Year*: <a href="#" class="ttip_t" title="Year" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="year" size="30" type="text" class="span8" value="<?php echo set_value('year',$data_records->year); ?>" placeholder="Year"  title="Eg: Year"  />
			<input name="leave_data_id"  type="hidden" value="<?php echo $data_records->leave_data_id; ?>" />
			</div>
			</div>
		</div>
		<!--end product-->
		<!-- /single_form -->
		<div class="control-group template">
		<div class="controls">
		<input type="hidden" name="module_index" id="module_index" value="<?php echo base_url('user/user_leave_setting/'); ?>" />
		<input type="submit" class="btn-primary btn" value="Save Change">&nbsp;<button type="reset" class="btn" id="cancel">Cancel</button>
		</div>
		</div>
		</div>
		</fieldset>
		</form>
		</div>
</div><!-- /row -->
