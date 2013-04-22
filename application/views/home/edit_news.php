
 <ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('home/index'); ?>"><i class="icon-home"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#">Edit News</a>
  </li>
</ul>

		<div class="row-fluid">
		<div class="span12">
		<h3 class="heading">Edit News</h3>
		  <?php echo form_open_multipart('home/edit_news_data'); ?>
			<fieldset>
			  <?php $this->load->view('template/show_error'); ?>
			 <div class="form-horizontal">
			<div class="control-group formSep">
				<div class="control">
				<label for="xlInput" class="control-label"></label>
				  <code>Note :</code> All field mark with <code>*</code> are required.
				</div>
				</div><!-- /clearfix -->
				
			<div class="control-group formSep">
			<label for="input01" class="control-label">News Title*: <a href="#" class="ttip_t" title="Your News Title" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="title" size="30" type="text"   class="span8" value="<?php echo set_value('title',$data_records->news_title); ?>" placeholder="News Title"  title="Eg: Your News Title"  />
			</div>
			</div>

			<div class="control-group formSep  image">
			<label class="control-label" for="fileInput">News Image*: <a href="#" class="ttip_t" title="Generate Your News Image" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<!--<input class="input-file" type="file" name="image" id="image" value="">-->
			<div style="margin-top:10px;" id="file-uploader">
				<noscript>
				<p>Please enable JavaScript to use file uploader.</p>
				<!-- or put a simple form for upload here -->
				</noscript>
			</div>
			<p class="help-block">This field only support jpg , gif, png file</p>

			</div>
			</div>

			<div class="control-group formSep  ">
			<label class="control-label" for="fileInput">Image Path*: <a href="#" class="ttip_t" title="Copy This Image path for upload News Image" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
				<input size="30" type="text" id="image_value"  class="span8"  onclick="this.select()"/>
			<p class="help-block"><h5>Copy the path and paste it to editor image url</h5></p>
			</div>
			</div>

			<div class="formSep ">
			<label for="input01" class="control-label">News Content*: <a href="#" class="ttip_t" title="Your News Content" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<textarea class="ckeditor" name="content"><?php echo set_value('content',$data_records->news_content); ?></textarea>
			</div>
			</div>

				<div class="control-group formSep form-inline">
					<label class="control-label" for="fileInput" >News Date*: <a href="#" class="ttip_t" title="Your News Image" style="text-decoration:none;color:grey;">[?]</a></label>
					<div class="controls">
					<input type="text" class="span3" name="start_date" id="edit_date" placeholder="News Date" value="<?php  $date_data =  set_value('start_date',$data_records->news_date); $old_date = strtotime($date_data);$get_date = date("d-m-Y", $old_date); echo $get_date;?>" >
					<input type="hidden" name="news_id" id="news_id"  value="<?php echo set_value('news_id',$data_records->news_id); 	?>" >
					<p class="help-block">Date format : DD-MM-YYYY</p>
					</div>
				</div>

			  <!-- /single_form -->
			  <div class="control-group">
				<div class="controls">
				<input type="hidden" name="module_index" id="module_index" value="<?php echo base_url('home/index/'); ?>" />
				<input type="submit" class="btn-primary btn" value="Save Change">&nbsp;<button type="reset" class="btn" id="cancel">Cancel</button>
			  </div>
			    </div>


			  </div>
			</div>
			</fieldset>
		  </form>
		</div>