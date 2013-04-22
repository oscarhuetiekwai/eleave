

$(document).ready(function() {


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
	$(".delete_user").click(function() {
		var staff_id = $(this).closest('tr').attr('id');
		var arr = staff_id.split('_');
		var staff_id = arr[0];
		var answ = confirm('Delete this row?');
		if(answ)
		{
			deletehomeAjax(staff_id);
		}
		else
		{
			return false;
		}
	});

	function deletehomeAjax(staff_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'user/ajax_delete_user',
			dataType: 'json',
			data : {
				staff_id : staff_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('The User has been deleted');
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
		var leave_data_id = $(this).closest('tr').attr('id');
		var arr = leave_data_id.split('_');
		var product_name = arr[1];
		var apps_id = arr[0];
		var answ = confirm('Update this User Leave row?');
		if(answ)
		{
			updateappsAjax(leave_data_id);
		}
		else
		{
			return false;
		}
	});
	function updateappsAjax(leave_data_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'user/ajax_update_user_leave_data',
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

});