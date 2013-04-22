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
	
	// start delete tab
	$(".delete").click(function() {

		var product_id = $(this).closest('tr').attr('id');

		var arr = product_id.split('_');

		var product_name = arr[1];
		var tab_id = arr[0];

		var answ = confirm('Delete this tab?');

		if(answ)
		{
			deleteAjax(tab_id);
		}
		else
		{
			return false;
		}
	});

	function deleteAjax(tab_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'backend/ajax_delete_tab',
			dataType: 'json',
			data : {
				tab_id : tab_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('The tab has been deleted');
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


	$(".button_ajax").click(function() {

		var product_id = $(this).closest('tr').attr('id');

		var arr = product_id.split('_');

		var product_name = arr[1];
		var tab_id = arr[0];

		var answ = confirm('Update this tab row?');

		if(answ)
		{
			updateAjax(tab_id);
		}
		else
		{
			return false;
		}
	});
	
	function updateAjax(tab_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'backend/ajax_update_tab',
			dataType: 'json',
			data : {
				tab_id : tab_id,
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
	
	
$("#product_manufacturer").change(function()
{
var manufacturer = $(this).val();
if(manufacturer=='Others')
{

$("#product_manufacturer_others").fadeIn();
}
else
{
$("#product_manufacturer_others").fadeOut();
}

});
$(".alert-message").alert();

var product_div = Array(2,3,4,5);
$("#add_product").click(function()
{
//get random product div
//var item = product_div[Math.floor(Math.random()*product_div.length)];

//get first item product div

var item = product_div[0];

$('#product'+item).show();

$('#have_product'+item).val('yes');
removeItem(product_div, item);

if (product_div.length <1)
{
$("#add_product").hide();

$("#maximum_product").show();

}

producl_label();

});

function removeItem(array, item){
for(var i in array){
if(array[i]==item){
array.splice(i,1);
break;
}
}
}

function producl_label()
{
$("a[id^='close_']:visible").each(function (index) {

//alert(index);

var div_id = $(this).closest("div").attr("id");

if(index=='0')
{
$("#label_"+div_id).text('2nd Tab');
}
else if(index=='1')
{
$("#label_"+div_id).text('3rd Tab');
}
else if(index=='2')
{
$("#label_"+div_id).text('4th Tab');
}
else if(index=='3')
{
$("#label_"+div_id).text('5th Tab');
}

});
}

$(".close-reveal-modal").live("click", function()
{
//eg product5

var div_id =  $(this).closest("div").attr("id");
var id = div_id.charAt(div_id.length-1);
//eg 5
var id = parseFloat(id);

//remove the div form value

$("#"+div_id).find("input").val("");
$("#"+div_id).find("select#product_manufacturer"+id).val("Audi");
$("#"+div_id).find("select#vehicle_type"+id).val("Saloon/Sedan");

//hide the others manufacturer

$("#product_manufacturer_others"+id).hide();

//reset back to dont have product#id
$('#have_product'+id).val('no');

//push back the id into the array

product_div.push(id);

//fade and hide the div
$(this).closest("div").fadeOut('fast', function() {

//clone the div, put at the last and remove the original div

$("#product"+id).clone().insertAfter("div.product_well:last");
$("#product"+id+":first").remove();

//change the product label

producl_label();

});

//show back the add button
$("#add_product").show();
$("#maximum_product").hide();

});


});