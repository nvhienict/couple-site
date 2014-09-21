
	function setcountdown(theyear,themonth,theday){
	yr=theyear;mo=themonth;da=theday
	}
	//////////CONFIGURE THE COUNTDOWN SCRIPT HERE//////////////////
	//STEP 1: Configure the countdown-to date, in the format year, month, day:
	var getD = $('#getD0').text();
	var getM = $('#getD1').text();
	var getY = $('#getD2').text();

	setcountdown(getY,getM,getD);
	//STEP 2: Change the two text below to reflect the occasion, and message to display on that occasion, respectively
	var occasion="tới"
	var message_on_occasion="Xíu Nữa Thôi À"
	//STEP 3: Configure the below 5 variables to set the width, height, background color, and text style of the countdown area
	var countdownwidth='500px'
	var countdownheight='20px'
	var countdownbgcolor='#ffffff'
	var opentags='<font face="Verdana"><b><large>'
	var closetags='</large></b</font>'
	//////////DO NOT EDIT PASS THIS LINE//////////////////
	var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")
	var crosscount=''
	function start_countdown(){
	if (document.layers)
	document.countdownnsmain.visibility="show"
	else if (document.all||document.getElementById)
	crosscount=document.getElementById&&!document.all?document.getElementById("countdownie") : countdownie
	countdown()
	}
	if (document.all||document.getElementById)
	document.write('<span id="countdownie" style="width:'+countdownwidth+'; background-color:'+countdownbgcolor+'"></span>')
	window.onload=start_countdown
	function countdown(){
	var today=new Date()
	var todayy=today.getYear()
	if (todayy < 1000)
	todayy+=1900
	var todaym=today.getMonth()
	var todayd=today.getDate()
	var todayh=today.getHours()
	var todaymin=today.getMinutes()
	var todaysec=today.getSeconds()
	var todaystring=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec
	futurestring=montharray[mo-1]+" "+da+", "+yr
	dd=Date.parse(futurestring)-Date.parse(todaystring)
	dday=Math.floor(dd/(60*60*1000*24)*1)
	dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1)
	dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1)
	dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1)
	//if on day of occasion
	if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=1&&todayd==da){
	if (document.layers){
	document.countdownnsmain.document.countdownnssub.document.write(opentags+message_on_occasion+closetags)
	document.countdownnsmain.document.countdownnssub.document.close()
	}
	else if (document.all||document.getElementById)
	crosscount.innerHTML=opentags+message_on_occasion+closetags
	return
	}
	//if passed day of occasion
	else if (dsec<=-5){
	if (document.layers){
	document.countdownnsmain.document.countdownnssub.document.write(opentags+"Occasion already passed! "+closetags)
	document.countdownnsmain.document.countdownnssub.document.close()
	}
	else if (document.all||document.getElementById)
	crosscount.innerHTML=opentags+"Chúng mình đã cưới nhau rùi...ZuiZuiZui "+closetags
	return
	}
	//else, if not yet
	else{
	if (document.layers){
	// document.countdownnsmain.document.countdownnssub.document.write(opentags+"Còn, "+dday+ " ngày, "+dhour+" giờ, "+dmin+" phút, và "+dsec+" giây nữa là đến "+occasion+closetags)
	// document.countdownnsmain.document.countdownnssub.document.close()
		// get day
		$('#echo_dday').append(dday);
		$('#echo_dday').text("");
		$('#echo_dday').append(dday);
		// get hour
		$('#echo_dhour').append(dhour);
		$('#echo_dhour').text("");
		$('#echo_dhour').append(dhour);
		// get minus
		$('#echo_dmin').append(dmin);
		$('#echo_dmin').text("");
		$('#echo_dmin').append(dmin);
		// get second
		$('#echo_dsec').append(dsec);
		$('#echo_dsec').text("");
		$('#echo_dsec').append(dsec);
	}
	else if (document.all||document.getElementById)
	// crosscount.innerHTML=opentags+dday+ " ngày, "+dhour+" giờ, "+dmin+" phút, và "+dsec+" giây nữa là "+occasion+closetags
		// get day
		$('#echo_dday').append(dday);
		$('#echo_dday').text("");
		$('#echo_dday').append(dday);
		// get hour
		$('#echo_dhour').append(dhour);
		$('#echo_dhour').text("");
		$('#echo_dhour').append(dhour);
		// get minus
		$('#echo_dmin').append(dmin);
		$('#echo_dmin').text("");
		$('#echo_dmin').append(dmin);
		// get second
		$('#echo_dsec').append(dsec);
		$('#echo_dsec').text("");
		$('#echo_dsec').append(dsec);
	}
	setTimeout("countdown()",1000)
	}