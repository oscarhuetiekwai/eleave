// enchanced select
	$(".chzn_a").chosen({
		allow_single_deselect: true
	});
	$(".chzn_b").chosen();

$(document).ready(function() {
var weekday=new Array();
	weekday.push("Sun");
	weekday.push("Mon");
	weekday.push("Tue");
	weekday.push("Wed");
	weekday.push("Thu");
	weekday.push("Fri");
	weekday.push("Sat");
	
	if($('.leave_days_selection_ctr').size())
	{
		$('.leave_days_selection_ctr').click(function()
		{
			$('input[name="days_across"]').attr('value','');
			$('#no_of_days').attr('value','');
		});
	}
	$('form[name="leave_application_form"]').submit(function(e)
	{
		if(!$('input[name="no_of_days"]').val())
		{
			e.preventDefault();
			apprise('Please calculate the leave day before you apply a leave.');
		}
		$('form[name="leave_application_form"]').find('div#leave_days_time').empty();
		$('button.active').each(function(index,obj) // day_name_selection_0
		{ 
			var objName=$(this).attr('name');
			var objValue=$(this).attr('value');
			$('form[name="leave_application_form"]').find('div#leave_days_time').append($("<input>").attr("type", "hidden").attr("name", objName).val(objValue));
		});
		var start=($('#start_date').val()).split('-');
		var end=($('#end_date').val()).split('-');
		// startDateObj=new Date(start[2],start[1],start[0],0,0,0,0);
		// endDateObj=new Date(end[2],end[1],end[0],0,0,0,0);
		
		startDateObj=new Date();
		endDateObj=new Date();
		startDateObj.setFullYear(start[2],parseInt(start[1])-1,start[0]);
		endDateObj.setFullYear(end[2],parseInt(end[1])-1,end[0]);
		
		
		var dates_of_leave = listdate(startDateObj,endDateObj); // return the human friendly date string dd-mm-yyyy
		$('form[name="leave_application_form"]').find('div#leave_days_date').empty();
		$.each(dates_of_leave,function(index,value)
		{
			$('form[name="leave_application_form"]').find('div#leave_days_date').append($("<input>").attr("type", "hidden").attr("name", 'leave_dates[]').val(value));
		});
	});

	/*Calculate days is mandatory, system reject submit if user don't do this */
	$('#calculate_leave_days').click(calculate_leave_days);
	
	function calculate_leave_days()
	{
		if(!($('#start_date').val() && $('#end_date').val()))
		{
			apprise('Please choose a leave period that end date is greater than start date');
			return false;
		}
		var start=($('#start_date').val()).split('-');
		var end=($('#end_date').val()).split('-');
		
		startDateObj=new Date();
		endDateObj=new Date();
		startDateObj.setFullYear(parseInt(start[2]),parseInt(start[1])-1,parseInt(start[0]));
		endDateObj.setFullYear(parseInt(end[2]),parseInt(end[1])-1,parseInt(end[0]));
		var total_days_of_leave=calcBusinessDays(startDateObj,endDateObj);
		$('input[name="days_across"]').val(total_days_of_leave);
		var leave_on_pm=parseInt($("button.active[value='P.M.']").size());
		var leave_on_am=parseInt($("button.active[value='A.M.']").size());
		total_days_of_leave=total_days_of_leave-(0.5*(leave_on_pm+leave_on_am));
		
		$('#no_of_days').val(total_days_of_leave);
		return true;
	}

	$('#dp_leave_start_date').datepicker('setDaysOfWeekDisabled',[0,6]).on('changeDate', function(ev)
	{
		$('.datepickerdiv').datepicker('hide');
		if(complete_leave_period())
		{
			if(checkValidLeavePeriod(ev))
			{
				leave_days_details_control();
			}
			
		}
	});
	
	$('#dp_leave_end_date').datepicker('setDaysOfWeekDisabled',[0,6]).on('changeDate', function(ev)
	{
		if(checkValidLeavePeriod(ev))
		{
			leave_days_details_control();
		}
		else
		{
		}
	});	
	
	function leave_days_details_control()
	{
	
		var dates_of_leave = listdate(startDateObj,endDateObj);
		$('input[name="days_across"]').attr('value','');
		$('#no_of_days').attr('value','');
		count_day=0;
		$("#leave_periods_selections").empty();
		$.each(dates_of_leave,function(key,value_date){
		// value_date is humand readable date
		var leave_date = new Date();
		var date_portion=((value_date.split('-')).reverse());
		date_portion[1]=date_portion[1]-1;
		leave_date.setFullYear(date_portion[0],date_portion[1],date_portion[2]);
		weekday_num=leave_date.getDay();
			
			$("#leave_periods_selections").append(value_date+"("+weekday[weekday_num]+")"+' <div class="btn-group" data-toggle="buttons-radio">'+  
					'<button id="btn-one" type="button" data-toggle="button" name="day_leave_selection_'+count_day+'" value="Full" class="leave_days_selection_ctr btn active">Full day</button>'+
					'<button id="btn-two" type="button" data-toggle="button" name="day_leave_selection_'+count_day+'" value="A.M." class="leave_days_selection_ctr btn">A.M.</button>'+
					'<button id="btn-two" type="button" data-toggle="button" name="day_leave_selection_'+count_day+'" value="P.M." class="leave_days_selection_ctr btn">P.M.</button>'+
				'</div><br /><br />');
			$('button[name="day_leave_selection_'+count_day+'"]').click(function()
			{
				$('input[name="days_across"]').attr('value','');
				$('#no_of_days').attr('value','');
			});
			count_day+=1;
		}) 
	}
	
	function complete_leave_period()
	{
// 		alert(("")?("true"):("false"));
		var start=($('#start_date').val());
		var end=($('#end_date').val());
		
		if(start && end)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	function checkValidLeavePeriod(ev)
	{
		$('.datepickerdiv').datepicker('hide');
		
		var start=($('#start_date').val()).split('-');
		var end=($('#end_date').val()).split('-');
		
		startDateObj=new Date();
		endDateObj=new Date();
		startDateObj.setFullYear(start[2],parseInt(start[1])-1,start[0],0,0,0);
		endDateObj.setFullYear(end[2],parseInt(end[1])-1,end[0],0,0,0);
		
		var start_miliseconds=startDateObj.valueOf();
		var end_miliseconds=endDateObj.valueOf();
		//check valid period of the leaves
		if(!(end_miliseconds>=start_miliseconds))
		{
			
			$(ev.target).find('input').attr('value','');
			apprise('Start date cannot be greater than end date');
			return false; // if false no need proceed to next
		}
		else
		{
			return true;
		}
	}
	
	
	$("#calculate12").click(function() {
			var start_date = $(this).attr('data-start-date');
			var end_date = $(this).attr('data-end-date');
			//var start_date = $('#start_date').find('input[name="start_date"]').val();
			//var end_date = $('#end_date').find('input[name="end_date"]').val();

			alert(start_date);
			//var diff = Math.abs(start_date - end_date);
			$('#pa').val(start_date);
			//hashResponseAjax(credit,user_id,login);
   });

/* 	$('#start_date').datepicker({format: "dd-mm-yyyy"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#start_date').datepicker('hide');
	});


	$('#edit_date').datepicker({format: "dd-mm-yyyy"}).on('changeDate', function(ev){
			var dateText = $(this).data('date');
            $('#edit_date').datepicker('hide');
    }); */

	$('#start_date').datepicker({format: "yyyy-mm-dd"});
	$('#edit_date').datepicker({format: "yyyy-mm-dd"});

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
	$(".delete_leave_type").click(function() {
		var leave_type_id = $(this).closest('tr').attr('id');
		var arr = leave_type_id.split('_');
		var leave_type_id = arr[0];
		var answ = confirm('Delete this row?');
		if(answ)
		{
			deletehomeAjax(leave_type_id);
		}
		else
		{
			return false;
		}
	});

	function deletehomeAjax(leave_type_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'leave/ajax_delete_leave_type',
			dataType: 'json',
			data : {
				leave_type_id : leave_type_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('The Leave Type has been deleted');
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

		//delete Leave type part
	$(".delete_apply_leave").click(function() {
		var leave_application_id = $(this).closest('tr').attr('id');
		var arr = leave_application_id.split('_');
		var leave_application_id = arr[0];
		var answ = confirm('Delete this row?');
		if(answ)
		{
			deleteapplyleaveAjax(leave_application_id);
		}
		else
		{
			return false;
		}
	});

	function deleteapplyleaveAjax(leave_application_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'leave/ajax_delete_apply_leave',
			dataType: 'json',
			data : {
				leave_application_id : leave_application_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('Your Applies leave has been deleted');
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

	//delete Leave type part
	$(".apply_leave").click(function() {
		//var leave_type = $('#chosen_a').val();
		var start_date = $('#start_date').val();
		var end_date = $('#end_date').val();
		var period = $('input:radio[name=period]:checked').val();
		count_no_leave_day(start_date,end_date,period);

	});

	function count_no_leave_day(start_date,end_date,period)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'leave/count_no_leave_day',
			dataType: 'json',
			data : {
				start_date : start_date,
				end_date : end_date,
				period : period,
			},
			success : function(data){
				//alert(data);
				$('#no_of_days').val(data);
				
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
			}
		});
	}


		//delete APPS part
	$(".deactived").click(function() {

        var leave_application_id =  $(this).attr('data-id');

		var answ = confirm('Withdraw this row?');
		if(answ)
		{
			deactivatedajax(leave_application_id);
		}
		else
		{
			return false;
		}
	});

	function deactivatedajax(leave_application_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'leave/deactivated_leave',
			dataType: 'json',
			data : {
				leave_application_id : leave_application_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('Your Leave has been deleted');
					location.reload();
				}
				else if(data=='error')
				{
					alert('Your Leave unable to deactived!');
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
			}
		});
	}

	$(".approve_update_ajax").click(function() {

        var leave_application_id =  $(this).attr('data-id');

		var answ = confirm('Approve this row?');
		if(answ)
		{
			approvedajax(leave_application_id);
		}
		else
		{
			return false;
		}
	});

	function approvedajax(leave_application_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'leave/approved_leave',
			dataType: 'json',
			data : {
				leave_application_id : leave_application_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('The Leave has been approved');
					location.reload();
				}
				else if(data=='error')
				{
					alert('The Leave unable to approved!');
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
			}
		});
	}

	$(".reject_update_ajax").click(function() {
        var leave_application_id =  $(this).attr('data-id');
		//alert(leave_application_id);

		$('#leave_application_id').val(leave_application_id);
		$('#myModal').modal('show');
	});

});