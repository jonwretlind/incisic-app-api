/* =============================================
   ========== CALCULATOR DASHBOARD =============
   ============================================= */
   function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
	
	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}

	function checkUserCookie(cname, calcName) {
		var cValue = getCookie(cname);
		
		switch (cname) {
			case "userName" :
				console.log("Welcome " + cValue + "!");
				loggedInState = true;
				break;
			
			case "activeCalc" :
				console.log("Active Calculator: " + cValue);
				actv = cValue;
				break;
			
			case null :
				console.log("User is not logged-in.");
				loggedInState = false;
				break;
		};
		
	}	

 setCookie('userName', userName, 10);
   

$(document).ready(function(){
	var ver = version();
	console.log('Calculator Dashboard: version ' + ver + ' loaded!');
	$('#version').html("<span style='color: #666;'>"+ ver + "</span>");
	
	checkUserCookie("userName", null);
	if ( loggedInState ) { 
		checkUserCookie("activeCalc", calcName);
		switch (actv) {
			case "RORCalc" :
				// make RORCalc active
				$('#RORCalc .calbody').addClass('active');
				$('#WM_Calc #btn1').addClass('active');
				break;
			case "FVCalc" :
				// make FvCalc active
				$('#FVCalc .calbody').addClass('active');
				$('#WM_Calc #btn2').addClass('active');
				break;
		};
		
		$('#WM_Calc .loader').hide();
		
		$('#WM_Calc .calbody.active').removeClass('collapse');
	};
	
	function clearBtnStates() {
		$('#WM_Calc .calbody').addClass('collapse');
		$('#WM_Calc .calbody').removeClass('active');
		$('#WM_Calc button[id^="btn"]').removeClass('active');
	}

	// Dashboard button functions/links
	$('#WM_Calc #btn1').click(function(){
		clearBtnStates();
		calcName = "RORCalc";
        setCookie('activeCalc', calcName, 10);
		$('#RORCalc .calbody').removeClass('collapse');
		$('#WM_Calc #btn1').addClass('active');
		$('#WM_Calc .loader').hide();
	});
	
	$('#WM_Calc #btn2').click(function(){
		clearBtnStates();
		calcName = "FVCalc";
		setCookie('activeCalc', calcName, 10);
		$('#FVCalc .calbody').removeClass('collapse');
		$('#WM_Calc #btn2').addClass('active');
		$('#WM_Calc .loader').hide();
	});
	
	//fix header size
	var dashWd = $('#WM_Calc #calcDash').outerWidth()+"px";
	$('#WM_Calc .main-head').css({
				width:  dashWd 
	});
	
	$('#WM_Calc #calcDash.app-bg').css({ 
				background: "#9FB67E url('" + pluginDir + "img/asset_money_bg.png') left top", 
				backgroundSize: "350px auto"
	});
				
	$('#WM_Calc #btn1').css({
				background: "#fff url('" + pluginDir + "img/asset_BlackBox.svg') center -8px no-repeat",
				backgroundSize: "cover"
	});		
	
	$('#WM_Calc #btn2').css({
				background: "#fff url('" + pluginDir + "img/asset_FutureValue.svg') center -8px no-repeat",
				backgroundSize: "cover"
	});
	


}); // document.ready
