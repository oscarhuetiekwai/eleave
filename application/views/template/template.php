<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Eleave System</title>

		  <?php
			   ##Bootstrap framework -->
                echo css('bootstrap.css');
                echo css('bootstrap-responsive.css');
                //main styles
                echo css('style.css');
				echo css('jquery-ui-1.8.24.custom.css');

            ?>

        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/qtip2/jquery.qtip.min.css" />

        <!-- splashy icons -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/img/splashy/splashy.css" />
		<!-- flags -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/img/flags/flags.css" />

            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />

			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/chosen/chosen.css" />
			<!-- Favicon -->
    		<!-- tooltips-->
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/qtip2/jquery.qtip.min.css" />
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
            <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/as.jpg" />

			<!-- 2col multiselect -->
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/multiselect/css/multi-select.css" />
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/colorpicker/css/colorpicker.css" />
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/datepicker/datepicker.css" />
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/datatables/extras/TableTools/media/css/TableTools.css">
			<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico.png" />

        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
			<script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->

		<script>
			//* hide all elements & show preloader
			document.documentElement.className += 'js';
			var config = {
               'base_url': '<?php echo base_url(); ?>'
            };
		</script>
    </head>
    <body class="ptrn_c">
		<div id="loading_layer" style="display:none"><img src="<?php echo base_url(); ?>assets/img/ajax_loader.gif" alt="" /></div>

		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top navbar-inverse">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <?php $this->load->view('template/header'); ?>
                        </div>
                    </div>
                </div>
            </header>

			<!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
					<?php if(isset($main)){ $this->load->view($main); } else { echo 'Main content'; } ?>
                </div>
            </div>

			<!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">

				<div class="antiScroll">
					<div class="antiscroll-inner">
						<div class="antiscroll-content">
							<div class="sidebar_inner">
								<?php $this->load->view('template/sidebar'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
echo js('jquery.min.js');
//smart resize event
echo js('jquery.debouncedresize.min.js');

echo js('jquery.actual.min.js');
// js cookie plugin
echo js('jquery.cookie.min.js');
// main bootstrap js
echo js('bootstrap.min.js');
// tooltips
echo js('lib/qtip2/jquery.qtip.min.js');

echo js('ios-orientationchange-fix.js');

echo js('lib/antiscroll/antiscroll.js');

echo js('lib/antiscroll/jquery-mousewheel.js');

echo js('gebo_common.js');

echo js('lib/jquery-ui/jquery-ui-1.8.20.custom.min.js');

echo js('forms/jquery.ui.touch-punch.min.js');

echo js('jquery.mediaTable.min.js');

echo js('lib/list_js/list.min.js');

echo js('lib/list_js/plugins/paging/list.paging.min.js');

echo js('lib/chosen/chosen.jquery.min.js');

echo js('bootstrap-datepicker.js');

echo js('jquery.dataTables.sorting.js');

echo js('jquery.dataTables.min.js');

echo js('lib/datatables/extras/TableTools/media/js/TableTools.min.js');

echo js('lib/datatables/extras/TableTools/media/js/ZeroClipboard.js');

echo js('easing.js');

echo js('jquery.ui.totop.js');

echo js('fileuploader.js');

echo js('ckeditor/ckeditor.js');

echo js('ckeditor/_samples/sample.js');

//echo js('lib/multiselect/js/jquery.multi-select.min.js');

echo js('lib/colorpicker/bootstrap-colorpicker.js');

echo js('bootstrap-datepicker.js');

echo js('lib/datepicker/bootstrap-timepicker.js');

echo js('easing.js');

echo js('jquery.ui.totop.js');


if(isset($js_list))
{
    foreach($js_list as $js_row)
    {
      $js_file = $js_row.'.js';
      echo js($js_file);
    }
}
?>
<?php
  //load the js function
  if(isset($js_function))
  {
    foreach($js_function as $js)
    {

      $js = $js.'.js';
      ?>
      <script src="<?php echo base_url(); ?>assets/js/application/<?php echo $js; ?>"></script>
      <?php
    }
  }
?>
<script>

$(document).ready(function() {
    // Show loading
	setTimeout('$("html").removeClass("js")',1000);
	//$("#period").hide();

	// scroll to top
	var defaults = {
	  	containerID: 'toTop', // fading element id
		containerHoverID: 'toTopHover', // fading element hover id
		scrollSpeed: 1200,
		easingType: 'linear'
	};
	$().UItoTop({ easingType: 'easeOutQuart' });

	// search table
	$('#dt_d').dataTable({
            "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sSearch": "Search all columns:"
            }
    });

	$('#dt_tools').dataTable({
        "sPaginationType": "bootstrap",
        "sDom": "<'row'<'span4'l><'span2'T><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
        "oTableTools": {
        "aButtons": [
        "csv",
		"xls",
		"pdf",
        ],
        "sSwfPath": "<?php echo base_url();?>assets/js/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
        }
    });

	// cancel button
	$("#cancel").click(function()
	{
	var index = $("#module_index").val();
	window.location = index;
	});

/* 	$('#start_date').datepicker({format: "dd-mm-yyyy"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#start_date').datepicker('hide');
	});

	$('#end_date').datepicker({format: "dd-mm-yyyy"}).on('changeDate', function(ev){
			var dateText = $(this).data('date');
            $('#end_date').datepicker('hide');
    }); */
	$('#start_date').datepicker({format: "yyyy-mm-dd"});
	$('#end_date').datepicker({format: "yyyy-mm-dd"});
	$('#edit_date').datepicker({format: "yyyy-mm-dd"});
	
	// for report date picker
	$('#start_date_report').datepicker({format: "dd-mm-yyyy",beforeShowDay: $.datepicker.noWeekends});
	$('#end_date_report').datepicker({format: "dd-mm-yyyy",beforeShowDay: $.datepicker.noWeekends});
	
	
        $("#search_leave_detail_excel").click(function() {
          var form_action = "<?php echo site_url('report/search_leave_detail_excel');?>";
          $("#myForm").attr("action", form_action);
          $("#myForm").submit();
        });
		
		$("#search_admin_history_excel").click(function() {
          var form_action = "<?php echo site_url('report/search_admin_history_excel');?>";
          $("#myForm").attr("action", form_action);
          $("#myForm").submit();
        });

	$(".chzn_z").chosen({
		allow_single_deselect: true
	});

	// add staff
	$(".chzn_a").chosen({
		allow_single_deselect: true
	});
	$(".chzn_b").chosen({
		allow_single_deselect: true
	});
	$(".chzn_c").chosen({
		allow_single_deselect: true
	});
	$(".chzn_d").chosen({
		allow_single_deselect: true
	});
	$(".chzn_e").chosen({
		allow_single_deselect: true
	});
	// navigation drop down

});
	jQuery('ul.nav li.dropdown').hover(function() {
	  jQuery(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn();
	}, function() {
	  jQuery(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut();
	});
</script>