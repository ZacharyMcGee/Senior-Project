<html>
  <style>
  /*css for the table*/
    #Steele{
      /*css for the div that the table is printed into*/
      background-color: #f3f3f3;
    }
    .calendar-table{
      /*css for the actual table*/
      width: 100%;
      border-collapse: collapse;
      border: 1px solid black;
    }
    .current-day{
      /*css for the table data of the current day, turns the current day yellow*/
      background-color: yellow;
      border: 1px solid black;
    }
    .month{
      /*css for the table header that contains the month and year*/
      border: 1px solid black;
    }
    .head{
      /*css for table headers.  used only for the names of the week*/
      border: 1px solid black;
    }
    .data{
      /*css for table data.  used for the days of the week (excluding the current day)*/
      border: 1px solid black;
    }
    .week{
      /*css for table rows*/
      text-align:center;
    }
  </style>
  <body>
    <div id="Steele"></div>
    <script>
      var date=new Date();
      var week=date.getDay();
      var day=date.getDate();
      var year=date.getFullYear();
      var month=date.getMonth();
      var t=month;
      var u=year;
      var m;
      /*returns the name of the month. input is the integer returned from the getMonth() function.*/
      function nameMonth(month){
        var m;
        switch(month){
        	case 0:
        		m="January";
        		break;
        	case 1:
        		m="February";
        		break;
        	case 2:
        		m="March";
        		break;
        	case 3:
        		m="April";
        		break;
        	case 4:
        		m="May";
        		break;
        	case 5:
        		m="June";
        		break;
        	case 6:
        		m="July";
        		break;
        	case 7:
        		m="August";
        		break;
        	case 8:
        		m="September";
        		break;
        	case 9:
        		m="October";
        		break;
        	case 10:
        		m="November";
        		break;
        	case 11:
        		m="December";
        		break;
        	default:

        }
        return m;
      }
      m=nameMonth(month);

      /*finds the first day of the month. returns the numerical representation for the day of the week (0-6). inputs
      should be the results of getDate() and getDay().*/
      function findFirstDayOfMonth(day, week){
        var wnum=week;
				var dnum=day;
				while(dnum > 7){
					dnum=dnum-7;
				}
				while(dnum != 1){
					dnum--;
					if(wnum==0){
						wnum=6;
					}
					else{
						wnum--;
					}
				}
				return wnum;
      }

      /*decides whether the year is a leap year, returns 1 if so, 0 if not. input is the result of getFullYear()*/
      function leapYear(year){
      	var s=(year/4);
      	if(Math.floor(s)==s){
      		if(Math.ceil(s)==s){
      			var t=(year/100);
      			var p=(year/400);
      			if(Math.floor(t)==t){
      				if(Math.ceil(t)==t){
      					if(Math.floor(p)==p){
      						if(Math.ceil(p)==p){
      							return 1;
      						}
      						else{
      							return 0;
      						}
      					}
      					else{
      						return 0;
      					}
      				}
      				else{
      					return 0;
      				}
      			}
      			else{
      				return 1;
      			}
      		}
      		else{
      			return 0;
      		}
      	}
      	else{
      		return 0;
      	}
      }

      /*creates a table containing that month's calendar, inputs are the result of the findFirstDayOfMonth() function,
      getDate(), result of nameMonth(), and getFullYear(). highlights current day.*/
      function createCalendar(dayone, day, m, year){
      	var a=1;
      	var tone=32;
      	var tzero=31;
      	var teight=29;
      	var tnine=30;
      	var leap=leapYear(year);
      	var tcount=0;
      	var wcount=0;
      	var wk=7;
      	var calendar;
        calendar="<table class=\"calendar-table\"><tr><th class=\"month\" colspan=7>";
        calendar+=m;
        calendar+=" ";
        calendar+=year;
        calendar+="</th></tr><tr><th class=\"head\">Sunday</th><th class=\"head\">Monday</th><th class=\"head\">Tuesday</th><th class=\"head\">Wednesday</th><th class=\"head\">Thursday</th><th class=\"head\">Friday</th><th class=\"head\">Saturday</th></tr>";
        switch(dayone){
      		case 1:
      			calendar+="<tr class=\"week\"><td class=\"data\"></td>";
            if(day==a){
        			calendar+="<td class=\"current-day\">";
              calendar+=a;
              calendar+="</td>";
        		}
        		else{
              calendar+="<td class=\"data\">";
              calendar+=a;
              calendar+="</td>";
        		}
      			a++;
      			wcount=2;
      			break;
      		case 2:
      			calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td>";
            if(day==a){
        			calendar+="<td class=\"current-day\">";
              calendar+=a;
              calendar+="</td>";
        		}
        		else{
              calendar+="<td class=\"data\">";
              calendar+=a;
              calendar+="</td>";
        		}
      			a++;
      			wcount=3;
      			break;
      		case 3:
      			calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td>";
            if(day==a){
        			calendar+="<td class=\"current-day\">";
              calendar+=a;
              calendar+="</td>";
        		}
        		else{
              calendar+="<td class=\"data\">";
              calendar+=a;
              calendar+="</td>";
        		}
      			a++;
      			wcount=4;
      			break;
      		case 4:
      			calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td>";
            if(day==a){
        			calendar+="<td class=\"current-day\">";
              calendar+=a;
              calendar+="</td>";
        		}
        		else{
              calendar+="<td class=\"data\">";
              calendar+=a;
              calendar+="</td>";
        		}
      			a++;
      			wcount=5;
      			break;
      		case 5:
      			calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td>";
            if(day==a){
        			calendar+="<td class=\"current-day\">";
              calendar+=a;
              calendar+="</td>";
        		}
        		else{
              calendar+="<td class=\"data\">";
              calendar+=a;
              calendar+="</td>";
        		}
      			a++;
      			wcount=6;
      			break;
      		case 6:
      			calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td>";
            if(day==a){
        			calendar+="<td class=\"current-day\">";
              calendar+=a;
              calendar+="</td>";
        		}
        		else{
              calendar+="<td class=\"data\">";
              calendar+=a;
              calendar+="</td>";
        		}
      			a++;
      			calendar+="</tr>";
      			break;
      		default:

      	}
      	switch(m){
      		case 'January':
      			tcount=tone;
      			break;
      		case 'February':
      			if(leap==1){
      				tcount=tnine;
      			}
      			else{
      				tcount=teight;
      			}
      			break;
      		case 'March':
      			tcount=tone;
      			break;
      		case 'April':
      			tcount=tzero;
      			break;
      		case 'May':
      			tcount=tone;
      			break;
      		case 'June':
      			tcount=tzero;
      			break;
      		case 'July':
      			tcount=tone;
      			break;
      		case 'August':
      			tcount=tone;
      			break;
      		case 'September':
      			tcount=tzero;
      			break;
      		case 'October':
      			tcount=tone;
      			break;
      		case 'November':
      			tcount=tzero;
      			break;
      		case 'December':
      			tcount=tone;
      			break;
      		default:

      	}
      	while(a<tcount){
      		if(wcount==0){
      			calendar+="<tr class=\"week\">";
      		}
      		if(day==a){
      			calendar+="<td class=\"current-day\">";
            calendar+=a;
            calendar+="</td>";
      		}
      		else{
            calendar+="<td class=\"data\">";
            calendar+=a;
            calendar+="</td>";
      		}
      		a++;
      		wcount++;
      		if(wcount>=wk){
      			calendar+="</tr>";
      			wcount=0;
      		}
      	}
        switch(wcount){
      		case 1:
      			calendar+="<td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td></tr>";
      			break;
      		case 2:
      			calendar+="<td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td></tr>";
      			break;
      		case 3:
      			calendar+="<td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td></tr>";
      			break;
      		case 4:
      			calendar+="<td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td></tr>";
      			break;
      		case 5:
      			calendar+="<td class=\"data\"></td><td class=\"data\"></td></tr>";
      			break;
      		case 6:
      			calendar+="<td class=\"data\"></td></tr>";
      			break;
      		default:

      	}
        calendar+="</table>";
        return calendar;
      }
      //prints the calendar to the Steele div
      document.getElementById('Steele').innerHTML=createCalendar(findFirstDayOfMonth(day, week), day, m, year);

      /*creates a table containing that month's calendar, inputs are the result of the findFirstDayOfMonth() function,
      result of nameMonth(), and getFullYear(). only difference from createCalendar() is that it doesn't highlight the
      current day.*/
      function createNotCurrentCalendar(dayone, m, year){
        var a=1;
        var tone=32;
        var tzero=31;
        var teight=29;
        var tnine=30;
        var leap=leapYear(year);
        var tcount=0;
        var wcount=0;
        var wk=7;
        var calendar;
        calendar="<table class=\"calendar-table\"><tr><th class=\"month\" colspan=7>";
        calendar+=m;
        calendar+=" ";
        calendar+=year;
        calendar+="</th></tr><tr><th class=\"head\">Sunday</th><th class=\"head\">Monday</th><th class=\"head\">Tuesday</th><th class=\"head\">Wednesday</th><th class=\"head\">Thursday</th><th class=\"head\">Friday</th><th class=\"head\">Saturday</th></tr>";
        switch(dayone){
          case 1:
            calendar+="<tr class=\"week\"><td class=\"data\"></td>";
            calendar+="<td class=\"data\">";
            calendar+=a;
            calendar+="</td>";
            a++;
            wcount=2;
            break;
          case 2:
            calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td>";
            calendar+="<td class=\"data\">";
            calendar+=a;
            calendar+="</td>";
            a++;
            wcount=3;
            break;
          case 3:
            calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td>";
            calendar+="<td class=\"data\">";
            calendar+=a;
            calendar+="</td>";
            a++;
            wcount=4;
            break;
          case 4:
            calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td>";
            calendar+="<td class=\"data\">";
            calendar+=a;
            calendar+="</td>";
            a++;
            wcount=5;
            break;
          case 5:
            calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td>";
            calendar+="<td class=\"data\">";
            calendar+=a;
            calendar+="</td>";
            a++;
            wcount=6;
            break;
          case 6:
            calendar+="<tr class=\"week\"><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td>";
            calendar+="<td class=\"data\">";
            calendar+=a;
            calendar+="</td>";
            a++;
            calendar+="</tr>";
            break;
          default:

        }
        switch(m){
          case 'January':
            tcount=tone;
            break;
          case 'February':
            if(leap==1){
              tcount=tnine;
            }
            else{
              tcount=teight;
            }
            break;
          case 'March':
            tcount=tone;
            break;
          case 'April':
            tcount=tzero;
            break;
          case 'May':
            tcount=tone;
            break;
          case 'June':
            tcount=tzero;
            break;
          case 'July':
            tcount=tone;
            break;
          case 'August':
            tcount=tone;
            break;
          case 'September':
            tcount=tzero;
            break;
          case 'October':
            tcount=tone;
            break;
          case 'November':
            tcount=tzero;
            break;
          case 'December':
            tcount=tone;
            break;
          default:

        }
        while(a<tcount){
          if(wcount==0){
            calendar+="<tr class=\"week\">";
          }
          calendar+="<td class=\"data\">";
          calendar+=a;
          calendar+="</td>";
          a++;
          wcount++;
          if(wcount>=wk){
            calendar+="</tr>";
            wcount=0;
          }
        }
        switch(wcount){
          case 1:
            calendar+="<td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td></tr>";
            break;
          case 2:
            calendar+="<td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td></tr>";
            break;
          case 3:
            calendar+="<td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td></tr>";
            break;
          case 4:
            calendar+="<td class=\"data\"></td><td class=\"data\"></td><td class=\"data\"></td></tr>";
            break;
          case 5:
            calendar+="<td class=\"data\"></td><td class=\"data\"></td></tr>";
            break;
          case 6:
            calendar+="<td class=\"data\"></td></tr>";
            break;
          default:

        }
        calendar+="</table>";
        return calendar;
      }

      /*prints the calendar for the next month. inputs needed are the month and year*/
      function printNextMonthCalendar(month, year){
        month=month+1;
        var nxtdate;
        if(month==12){
          month=0;
          year++;
          nxtdate=new Date(year, month, 12);
        }
        else{
          nxtdate=new Date(year, month, 12);
        }
        var nxtmonth=nxtdate.getMonth();
        var nxtyear=nxtdate.getFullYear();
        var nxtday=nxtdate.getDate();
        var nxtweek=nxtdate.getDay();
        var nxtdayone=findFirstDayOfMonth(nxtday, nxtweek);
        var m=nameMonth(month);
        return createNotCurrentCalendar(nxtdayone, m, nxtyear);
      }
    </script>
    <button onclick=>Last Month</button>
    <button id="get-next-month" onclick="document.getElementById('Steele').innerHTML=printNextMonthCalendar(t++, u);">Next Month</button>
  </body>
</html>
