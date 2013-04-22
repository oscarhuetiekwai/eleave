// enchanced select
	$(".chzn_a").chosen({
		allow_single_deselect: true
	});
	$(".chzn_b").chosen();

	// color picker
	$('#cp1').colorpicker({
				format: 'hex'
	});

	// time picker
	$('#tp_1').timepicker({
				defaultTime: 'current',
				minuteStep: 10,
				disableFocus: true,
				template: 'modal',
				showMeridian: false
	});
	$('#tp_2').timepicker({
				defaultTime: 'current',
				minuteStep: 1,
				disableFocus: true,
				template: 'dropdown'
	});
	$('#tp_modal').timepicker({
				defaultTime: 'current',
				minuteStep: 1,
				disableFocus: true,
				template: 'dropdown'
	});

$(document).ready(function() {

	$('#start_date').datepicker({format: "dd-mm-yyyy"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#start_date').datepicker('hide');
	});

	$('#edit_date').datepicker({format: "dd-mm-yyyy"}).on('changeDate', function(ev){
			var dateText = $(this).data('date');
            $('#edit_date').datepicker('hide');
    });
	
   

	//check box hide and show
	$("#button_show_hide").hide(100);
    $('.check_me').click(function() {
        if ( $('.check_me:checked').length >= 1) {
            $("#button_show_hide").show(500);
        } else {
            $("#button_show_hide").hide(500);
        }
    });

	//check box hide and show
    $('.select_group').click(function() {
        if ( $('.select_group:checked').length >= 1) {
            $("#button_show_hide").show(500);
        } else {
            $("#button_show_hide").hide(500);
        }
    });

	//check all check box
	$(".select_group").click(function() {
		var table_id12 = $(this).closest('table').attr('id');
		if($(this).is(':checked'))
		{
			$("#"+table_id12+" :checkbox").attr('checked', $(this).attr('checked'));
		}
		else
		{
			 $("#"+table_id12+" :checkbox").attr('checked', false);
		}

	});

	//delete APPS part
	$(".deletenews").click(function() {
		var news_id = $(this).closest('tr').attr('id');
		var arr = news_id.split('_');
		var news_id = arr[0];
		var answ = confirm('Delete this row?');
		if(answ)
		{
			deletehomeAjax(news_id);
		}
		else
		{
			return false;
		}
	});

	function deletehomeAjax(news_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'home/ajax_delete_news',
			dataType: 'json',
			data : {
				news_id : news_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('The News has been deleted');
					location.reload();
				}
				else if(data=='error')
				{
					alert('Error.');
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
			}
		});
	}
	
	
	//delete APPS part
	$(".delete_notification").click(function() {
	       
        var notification_id =  $(this).attr('data-id');

		var answ = confirm('Delete this row?');
		if(answ)
		{
			deletenotificationAjax(notification_id);
		}
		else
		{
			return false;
		}
	});

	function deletenotificationAjax(notification_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'dashboard/ajax_delete_notification',
			dataType: 'json',
			data : {
				notification_id : notification_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('The Announcement has been deleted');
					location.reload();
				}
				else if(data=='error')
				{
					alert('Error.');
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
			}
		});
	}

	$(".button_update_ajax").click(function() {
		var product_id = $(this).closest('tr').attr('id');
		var arr = product_id.split('_');
		var product_name = arr[1];
		var apps_id = arr[0];
		var answ = confirm('Update this apps row?');
		if(answ)
		{
			updateappsAjax(apps_id);
		}
		else
		{
			return false;
		}
	});
	function updateappsAjax(apps_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'backend/ajax_update_apps',
			dataType: 'json',
			data : {
				apps_id : apps_id,
			},
			success : function(data){
				if(data=='success')
				{
					alert('Successfully Updated');
					location.reload();
				}
				else if(data=='error')
				{
					alert('Error.');
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
			}
		});
	}

	function createUploader(){
            var uploader = new qq.FileUploader({
                element: document.getElementById('file-uploader'),
                action: config.base_url + 'system/ajax_upload.php',
                debug: true,
                onComplete: function(id, fileName, responseJSON){

                    var upload_filename = responseJSON.filename;
                    ajax_read_contact_file(upload_filename);
                }
            });
    }

	function ajax_read_contact_file(upload_filename)
    {
            $.ajax({
                type: "POST",
                url: config.base_url + 'home/ajax_read_contact_file',
                dataType: 'json',
                data : {
                    contact_filename : upload_filename
                },
                success : function(data) {
                   //console.log(data);
					var get_path = config.base_url;
					var name = data;
					var toRemove = './';
					var gorge = name.replace(toRemove,'');
					var final_data = get_path+gorge;
					//$('#image_value').empty().append(final_data);
					$('#image_value').val(final_data);
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
                }
            });
    }

	function select_all()
	{
		var text_val=eval("document.image_value.type");
		text_val.focus();
		text_val.select();
	}
	
});