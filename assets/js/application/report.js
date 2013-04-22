$(document).ready(function() {


	$(".button_update_ajax").click(function() {
		var product_id = $(this).closest('tr').attr('id');
		var arr = product_id.split('_');
		var product_name = arr[1];
		var leave_type_id = arr[0];
		var answ = confirm('Update this leave type status row?');
		if(answ)
		{
			updateappsAjax(leave_type_id);
		}
		else
		{
			return false;
		}
	});

	function updateappsAjax(leave_type_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'leave/ajax_update_leave_type_status',
			dataType: 'json',
			data : {
				leave_type_id : leave_type_id,
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