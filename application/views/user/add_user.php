<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#" style="color:white;">Add User</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
		<?php echo form_open('user/add_user'); ?>

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

			<div class=" control-group formSep template">
			<label for="input01" class="control-label">User Role *: <a href="#" class="ttip_t" title="Your User Role" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
				<select name="role" id="chosen_a" data-placeholder="Select Role" class="chzn_a span7">
					<option value=""></option>
					<?php if(isset($data_role_records)) : foreach($data_role_records as $row) : ?>
					<option value="<?php echo $row->role_id; ?>" <?php echo set_select('role', $row->role_id); ?> ><?php echo $row->role_position; ?></option>
					<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
			</div>

			<div class=" control-group formSep">
			<label for="input01" class="control-label">User Position *: <a href="#" class="ttip_t" title="Your User Position" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
				<select name="position" id="chosen_b" data-placeholder="Select Position" class="chzn_b span7">
					<option value=""></option>
					<?php if(isset($data_position_records)) : foreach($data_position_records as $row) : ?>
					<option value="<?php echo $row->position_id; ?>" <?php echo set_select('position', $row->position_id); ?> ><?php echo $row->position_name; ?></option>
					<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
			</div>

			<div class=" control-group formSep">
			<label for="input01" class="control-label">User Department *: <a href="#" class="ttip_t" title="Your User Department" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
				<select name="department" id="chosen_c" data-placeholder="Select Department" class="chzn_c span7">
					<option value=""></option>
					<?php if(isset($data_department_records)) : foreach($data_department_records as $row) : ?>
					<option value="<?php echo $row->department_id; ?>" <?php echo set_select('department', $row->department_id); ?> ><?php echo $row->department_name; ?></option>
					<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
			</div>

			<div class="control-group formSep ">
			<label for="input01" class="control-label">Username*: <a href="#" class="ttip_t" title="Username" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="username" size="30" type="text"   class="span8" value="<?php echo set_value('username'); ?>" placeholder="Username"  title="Eg: Username"  />
			</div>
			</div>

			<div class="control-group formSep ">
			<label for="input01" class="control-label">Password*: <a href="#" class="ttip_t" title="Password" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="password" size="30" type="password"   class="span8" value="<?php echo set_value('password'); ?>" placeholder="Password"  title="Eg: Password"  />
			</div>
			</div>

			<div class="control-group formSep ">
			<label for="input01" class="control-label">Confirm Password*: <a href="#" class="ttip_t" title="Confirm Password" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="confirm_password" size="30" type="password"   class="span8" value="<?php echo set_value('confirm_password'); ?>" placeholder="Confirm Password"  title="Eg: Confirm Password"  />
			</div>
			</div>

			<div class="control-group formSep ">
			<label for="input01" class="control-label">Email Address*: <a href="#" class="ttip_t" title="Email Address" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="email" size="30" type="text"   class="span8" value="<?php echo set_value('email'); ?>" placeholder="Email Address"  title="Eg: Email Address"  />
			</div>
			</div>


			<div class=" control-group formSep">
			<label for="input01" class="control-label">User Gender *: <a href="#" class="ttip_t" title="Your User Gender" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
				<select name="gender" id="chosen_d" data-placeholder="Select Gender" class="chzn_d span7">
					<option value=""></option>
					<option value="M" <?php echo set_select('gender'); ?> >Male</option>
					<option value="F" <?php echo set_select('gender'); ?> >Female</option>
				</select>
			</div>
			</div>

			<div class="control-group formSep ">
			<label for="input01" class="control-label">Mobile Phone*: <a href="#" class="ttip_t" title="Mobile Phone" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="mobile_phone" size="30" type="text"   class="span8" value="<?php echo set_value('mobile_phone'); ?>" placeholder="Mobile Phone"  title="Eg: Mobile Phone"  />
			</div>
			</div>
			
			<div class=" control-group formSep">
			<label for="input01" class="control-label">Superior *: <a href="#" class="ttip_t" title="Under Superior" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
				<select name="superior" id="chosen_e" data-placeholder="Select Superior" class="chzn_b span7">
					<option value=""></option>
					<?php if(isset($data_superior_records)) : foreach($data_superior_records as $row) : ?>
					<option value="<?php echo $row->staff_id; ?>" <?php echo set_select('superior', $row->staff_id); ?> ><?php echo $row->username; ?></option>
					<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
			</div>

		</div>
		<!--end product-->
		<!-- /single_form -->
		<div class="control-group template">
		<div class="controls">
		<input type="hidden" name="module_index" id="module_index" value="<?php echo base_url('user/index/'); ?>" />
		<input type="submit" class="btn-primary btn" value="Save Change">&nbsp;<button type="reset" class="btn" id="cancel">Cancel</button>
		</div>
		</div>
		</div>
		</fieldset>
		</form>
		</div>
</div><!-- /row -->
