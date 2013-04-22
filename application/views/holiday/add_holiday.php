<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#"  style="color:white;">Add Holiday</a>
  </li>
</ul>
	<div class="row-fluid">
		<div class="span12">
		<?php echo form_open('holiday/add_holiday'); ?>
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
			<label for="input01" class="control-label">Holiday Name*: <a href="#" class="ttip_t" title="Holiday Name" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="holiday" size="30" type="text" class="span6" value="<?php echo set_value('holiday'); ?>" placeholder="Holiday Name"  title="Eg: Holiday Name"  />
			</div>
			</div>
			
			<div class="control-group formSep">
			<label class="control-label" for="inputEmail">Holiday Date*: <a href="#" class="ttip_t" title="Holiday Date" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input type="text" class="span2"  id="holiday_date" name="holiday_date" class="span6" placeholder="Holiday Date"  value="<?php echo set_value('holiday_date'); ?>" class="input-xlarge uneditable-input">
			</div>
			</div>
			
		

		</div>
		<!--end product-->
		<!-- /single_form -->
		<div class="control-group template">
		<div class="controls">
		<input type="hidden" name="module_index" id="module_index" value="<?php echo base_url('holiday/holiday_list/'); ?>" />
		<input type="submit" class="btn-primary btn" value="Save Change">&nbsp;<button type="reset" class="btn" id="cancel">Cancel</button>
		</div>
		</div>
		</div>
		</fieldset>
		</form>
		</div>
</div><!-- /row -->
