<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('home/index'); ?>"><i class="icon-home"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#">Add News</a>
  </li>
</ul>

	<div class="row-fluid">
		<div class="span12">
		<?php echo form_open_multipart('home/add_news_data'); ?>

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

			<div class="control-group formSep template">
			<label for="input01" class="control-label">News Title*: <a href="#" class="ttip_t" title="Your News Title" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input id="title" name="title" size="30" type="text"   class="span8" value="<?php echo set_value('title'); ?>" placeholder="News Title"  title="Eg: Your News Title"  />
			</div>
			</div>

			<!--<div class="control-group formSep template">
			<label for="input01" class="control-label">News Content*: <a href="#" class="ttip_t" title="Your News Content" style="text-decoration:none;">[?]</a></label>
			<div class="controls">
			<textarea class="span8" id="content" name="content" rows="3"  ><?php echo set_value('content'); ?></textarea>
			</div>
			</div>-->
			<div class="control-group formSep  image">
			<label class="control-label" for="fileInput">News Image*: <a href="#" class="ttip_t" title="Generate Your News Image" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<div style="margin-top:10px;" id="file-uploader">
			<noscript>
			<p>Please enable JavaScript to use file uploader.</p>
			</noscript>
			</div>
			<p class="help-block">This field only support jpg , gif, png file</p>
			</div>
			</div>

			<div class="control-group formSep  ">
			<label class="control-label" for="fileInput">Image Path*: <a href="#" class="ttip_t" title="Copy This Image path for upload News Image" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">

			<input size="30" type="text" id="image_value"  class="span8 "  onclick="this.select()"/>

			<p class="help-block"><h5>Copy the path and paste it to editor image url</h5></p>
			</div>
			</div>

			<div class=" control-group formSep">
			<label for="input01" class="control-label">News Content*: <a href="#" class="ttip_t" title="Your News Content" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<textarea class="ckeditor" name="content"><?php echo set_value('content'); ?></textarea>
			</div>
			</div>

			<div class=" control-group formSep">
			<label for="input01" class="control-label">Enhanced Select*: <a href="#" class="ttip_t" title="Your News Content" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
				<select name="chosen_a" id="chosen_a" data-placeholder="Choose a Country..." class="chzn_a">
					<option value=""></option>
					<option value="DZ">Algeria</option><option value="AO">Angola</option><option value="BJ">Benin</option><option value="BW">Botswana</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="CM">Cameroon</option><option value="CV">Cape Verde</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="KM">Comoros</option><option value="CD">Congo [DRC]</option><option value="CG">Congo [Republic]</option><option value="DJ">Djibouti</option><option value="EG">Egypt</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="ET">Ethiopia</option><option value="GA">Gabon</option>
				</select>
			</div>
			</div>

			<div class="control-group formSep form-inline template">
			<label class="control-label" for="fileInput">News Date*: <a href="#" class="ttip_t" title="Select Your Date" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input type="text" class="span3" name="start_date" id="start_date" placeholder="News Date" value="<?php echo date('d-m-Y'); ?>" >
			<p class="help-block">Date format : DD-MM-YYYY</p>
			</div>
			</div>

			<div class=" control-group formSep">
			<label for="input01" class="control-label">Color picker*: <a href="#" class="ttip_t" title="Your News Content" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input type="text" class="span2" id="cp1" value="#2eb97a" />
			<span class="help-block">Hex format</span>
			</div>
			</div>

			<div class=" control-group formSep">
			<label for="input01" class="control-label">Time picker*: <a href="#" class="ttip_t" title="Your News Content" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
			<input type="text" class="span3" id="tp_2" />
			<span class="help-block">Show as dropdown (12h)</span>
			</div>
			</div>

			<div class=" control-group formSep">
			<label for="input01" class="control-label">File Uploads*: <a href="#" class="ttip_t" title="Your News Content" style="text-decoration:none;color:grey;">[?]</a></label>
			<div class="controls">
				<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden">
					<div style="width: 200px; height: 150px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /></div>
					<div style="max-width: 200px; max-height: 150px; line-height: 0px;" class="fileupload-preview fileupload-exists thumbnail"></div>
					<div>
						<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
							<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
					</div>
				</div>
			</div>
			</div>
		</div>
		<!--end product-->
		<!-- /single_form -->
		<div class="control-group template">
		<div class="controls">
		<input type="hidden" name="module_index" id="module_index" value="<?php echo base_url('home/index/'); ?>" />
		<input type="submit" class="btn-primary btn" value="Save Change">&nbsp;<button type="reset" class="btn" id="cancel">Cancel</button>
		</div>
		</div>
		</div>
		</fieldset>
		</form>
		</div>
</div><!-- /row -->
