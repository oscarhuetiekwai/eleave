// enchanced select

$(document).ready(function() {

	$('#holiday_date').datepicker({format: "yyyy-mm-dd"});

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

	//delete Leave type part
	$(".delete_holiday").click(function() {
		var date = $(this).closest('tr').attr('id');
		var arr = date.split('_');
		var date = arr[0];
		var answ = confirm('Delete this row?');
		if(answ)
		{
			delete_holiday(date);
		}
		else
		{
			return false;
		}
	});

	function delete_holiday(date)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'holiday/ajax_delete_holiday',
			dataType: 'json',
			data : {
				date : date,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('The Holiday has been deleted');
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

	function select_all()
	{
		var text_val=eval("document.image_value.type");
		text_val.focus();
		text_val.select();
	}

});