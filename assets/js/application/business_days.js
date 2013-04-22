function calcBusinessDays(dDate1, dDate2) {         // input given as Date objects

  var iWeeks, iDateDiff, iAdjust = 0;

  if (dDate2 < dDate1) return -1;                 // error code if dates transposed

  var iWeekday1 = dDate1.getDay();                // day of week
  var iWeekday2 = dDate2.getDay();

  iWeekday1 = (iWeekday1 == 0) ? 7 : iWeekday1;   // change Sunday from 0 to 7
  iWeekday2 = (iWeekday2 == 0) ? 7 : iWeekday2;
  
  if ((iWeekday1 > 5) && (iWeekday2 > 5)) iAdjust = 1;  // adjustment if both days on weekend

  iWeekday1 = (iWeekday1 > 5) ? 5 : iWeekday1;    // only count weekdays
  iWeekday2 = (iWeekday2 > 5) ? 5 : iWeekday2;

  // calculate differnece in weeks (1000mS * 60sec * 60min * 24hrs * 7 days = 604800000)
  iWeeks = Math.floor((dDate2.getTime() - dDate1.getTime()) / 604800000)

  if (iWeekday1 <= iWeekday2) {
    iDateDiff = (iWeeks * 5) + (iWeekday2 - iWeekday1)
  } else {
    iDateDiff = ((iWeeks + 1) * 5) - (iWeekday1 - iWeekday2)
  }

  iDateDiff -= iAdjust                            // take into account both days on weekend

  return (iDateDiff + 1);                         // add 1 because dates are inclusive

}


function listdate(dDate1, dDate2)
{

// var startDate = new Date(dDate1);
// var endDate = new Date(dDate2);
var startDate=dDate1;
var endDate=dDate2;
var Weekday = new Array("Sun","Mon","Tue","Wed","Thuy","Fri","Sat");
var dateArr = new Array();

while (startDate.valueOf()<=endDate.valueOf())
  {
  var weekDay = startDate.getDay();
  if (weekDay < 6 && weekDay > 0) {
			// dateArr.push(startDate.getFullYear()+"-"+startDate.getMonth()+"-"+getUTCDate());
    // var month = startDate.getMonth()+1;
				var month = (startDate.getMonth())+1;
    if( month <= 9 ) { month = "0"+month; }
    var day = startDate.getDate();
    if( day <= 9 ) { day = "0"+day; }
				
    // dateArr = day+"-"+month+"-"+startDate.getFullYear();
				// dateArr.push(startDate.getFullYear()+"-"+month+"-"+day);
				dateArr.push(day+"-"+month+"-"+startDate.getFullYear()); // human readable date
  }
  startDate.setDate(startDate.getDate()+1) 
    
  }
  
return dateArr;  
}





