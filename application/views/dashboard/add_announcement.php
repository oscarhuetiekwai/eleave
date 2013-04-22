<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#"  style="color:white;">Add Announcement</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
		<?php echo form_open_multipart('dashboard/add_Announcement'); ?>

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

			<?php $error = ''; if(form_error('announcement_title')){ $error = 'error'; } ?>
			<div class="control-group formSep template">
			<label for="input01" class="control-label">Announcement Title*: <a href="#" class="ttip_t" title="Your Announcement Title" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="announcement_title" size="30" type="text"   class="span8" value="<?php echo set_value('title'); ?>" placeholder="Announcement Title"  title="Eg: Your Announcement Title"  />			
			<?php echo form_error('announcement_title', '<span style="color:red">', '</span>'); ?>
			</div>
			
			</div>

			<?php $error = ''; if(form_error('announcement_content')){ $error = 'error'; } ?>
			<div class=" control-group formSep">
			<label for="input01" class="control-label">Announcement Content*: <a href="#" class="ttip_t" title="Your Announcement Content" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<textarea class="ckeditor" name="announcement_content"><?php echo set_value('content'); ?></textarea>
			<?php echo form_error('announcement_content', '<span style="color:red">', '</span>'); ?>
			</div>
			</div>


		<!--end product-->
		<!-- /single_form -->
		<div class="control-group template">
		<div class="controls">
		<input type="hidden" name="module_index" id="module_index" value="<?php echo base_url('dashboard/index/'); ?>" />
		<input type="submit" class="btn-primary btn" value="Save Change">&nbsp;<button type="reset" class="btn" id="cancel">Cancel</button>
		</div>
		</div>
		</div>
		</fieldset>
		</form>
		</div>
</div><!-- /row -->