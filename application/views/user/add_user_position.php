<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#" style="color:white;">Add Position</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
		<?php echo form_open('user/add_user_position'); ?>
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
			<label for="input01" class="control-label">Position Name*: <a href="#" class="ttip_t" title="Position Name" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="position_name" size="30" type="text"   class="span8" value="<?php echo set_value('position_name'); ?>" placeholder="Position Name"  title="Eg: Position Name"  />
			</div>
			</div>

		</div>
		<!--end product-->
		<!-- /single_form -->
		<div class="control-group template">
		<div class="controls">
		<input type="hidden" name="module_index" id="module_index" value="<?php echo base_url('user/user_position_list/'); ?>" />
		<input type="submit" class="btn-primary btn" value="Save Change">&nbsp;<button type="reset" class="btn" id="cancel">Cancel</button>
		</div>
		</div>
		</div>
		</fieldset>
		</form>
		</div>
</div><!-- /row -->
