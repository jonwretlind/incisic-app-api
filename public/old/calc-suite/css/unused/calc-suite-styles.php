<?php
    header("Content-type: text/css; charset: UTF-8");
	
	// colors used
	$blue = 	"#09527F";
	$yellow = 	"#fff6ab";
	$green = 	"#9FB67E";
	$ltblue = 	"#7ea4ba";
	
?>
/* ============================ */
/*       THEME OVERRIDES        */
/* ============================ */

table { border: none; }


table, th, td {
    padding: 5px 10px !important;
}



/* ============================ */
/*         Custom CSS           */
/* ============================ */

#WM_Calc {
	font-size: 0.8rem !important;
}

#WM_Calc table, #WM_Calc th, #WM_Calc td { border: none !important; }

#WM_Calc .center { text-align: center; }

#WM_Calc .dash {
	padding: 60px 20px 20px 20px;
}


#WM_Calc #dashAppWindow {
	margin-top: 15px;
}

	#RORCalc button,
	#FVCalc button	{
		width: 80% !important;
		height: auto !important;
		display: inline;
		margin: 5px;
		float: none;
		border-radius: 10px;
		font-size: .8rem;
		font-weight: bold;
		padding: 10px !important;
	}
	
		#RORCalc button:hover,
		#FVCalc button:hover {
			margin: 10px !important;
			border: none;
		}
		
#WM_Calc .dash button {
	position: inline-block;
	vertical-align: text-top;
	width: 10vw;
	height: 10vw;
	margin: 10px;
	padding: 0px;
	border: none;
}

	#WM_Calc .dash button[id^="btn"]:hover {
		background-color: <?php echo $yellow; ?> !important;
		width: 9.7vw;
		height: 9.7vw;
		margin-left: calc(10px + 0.3vw);
		margin-top: calc(10px + 0.3vw);
	}
	
	#WM_Calc button[id^="btn"].active {
		background-color: <?php echo $ltblue; ?> !important;
	}
	
	#WM_Calc button[id^="btn"].active:hover {
		background-color: <?php echo $ltblue; ?> !important;
		width: 10vw;
		height: 10vw;
		height: 10vw;
		margin-left: 10px;
		margin-top: 10px;
	}

	#WM_Calc button:hover { background-color: <?php echo $blue; ?>; color: white; }

	#WM_Calc button:focus { outline: 0 !important; }


	#WM_Calc .button-wrap {
		clear: both;
		width: 100%;
		position: relative;
		text-align: center;
	}

	#WM_Calc .btn-label {
		background-color: <?php echo $blue; ?>;
		color: white;
		position: relative;
		margin-top: 90%;
	}

#WM_Calc .shadow {  
	box-shadow: 0px 3px 3px #666;
}

#WM_Calc .calbody {
	background-color: white;
	border: 1px solid silver;
	min-height: 200px;
	min-width: 200px;
	max-width: 100%;
	width: 100%;
    position: relative;
	padding: .5vw;
}

#WM_Calc .calculator {
	position: center;
}

#WM_Calc h5.calc-head {
	display: block;
	text-align: center;
	color: <?php echo $blue; ?>;
	font-size: 1.7em;
	/*width: calc(100% + 41px) !important;*/
}

#WM_Calc .main-head {
	background: #555;
	color: white !important;
	padding: 13px 0px 10px 20px;
	position: relative;
	left: 0; top 0;
	margin-top: -60px;
	text-align: left !important;
	margin-left: -20px;
}

#WM_Calc #userProfile {
	color: white; 
	float: right; 
	font-size: .7em;
	padding-right: 20px;
	font-weight: 300;
}

	#WM_Calc #userProfile span {
		margin-top: 1px;
	}

#WM_Calc .grp1, .grp2 { 
	width: 50%;
	padding: 1vw;
}
	
#WM_Calc .grp1 {
	float: left;
}

#WM_Calc .grp2 {
	float: right;
}

#WM_Calc label {
	clear: both;
	clear: both;
	display: block;
	float: left;
	font-weight: 700;
	position: relative;
	z-index: 10;
}

#WM_Calc input {
	display: block;
	float: right;
	width: 70%;
	min-width: 100px;
	border-radius: 20px;
	font-size: 1.25em;
	padding: 5px;
	margin-bottom: 10px;
	border-color: silver;
	outline: none;
	position: relative;
	z-index: 10;
}
	#WM_Calc #input6 input {
		    clear: both;
			float: none;
			display: inline;
			width: auto;
			padding: 0;
			margin: 0;
		    margin-bottom: -11px;
			min-width: 10px;
			vertical-align: text-bottom;
	}
	
	#WM_Calc #input6 label {
		    clear: both;
			float: none;
			display: inline;
			width: auto;
			padding: 0;
			margin: 0;
			font-weight: 700;
			font-size: .9em;
			padding-top: 5px;
	}
	
	#WM_Calc .checkbox {
		appearance: none;
		-webkit-appearance: none;
		background-color: #fafafa;
		border: 1px solid #cacece;
		box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
		padding: 13px !important;
		border-radius: 8px;
		display: inline-block;
		position: relative;
		width: 20px;
		font-size: .2em;
		margin-right: 10px !important;
	}
	
		#WM_Calc .checkbox:active, #WM_Calc checkbox:checked:active {
			box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
		}

		#WM_Calc .checkbox:checked {
			background-color: <?php echo $blue; ?>;
			border: 1px solid #fff;
			box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
			color: #fff;
		}
		
		#WM_Calc .checkbox:checked:after {
			content: '\2713';
			font-size: 20px;
			position: absolute;
			top: 1px;
			left: 6px;
			color: #fff;
		}

#WM_Calc label {
	display: inline-block;
	margin-right: 20px;
	padding-top: 6px;
}

#WM_Calc .controls {
	bottom: 0px;
}

#WM_Calc #warning {
	display: none;
    background-color: <?php echo $yellow; ?>;
    border-radius: 5px;
    padding: 5px;
    position: relative;
    left: 0px;
    z-index: 11;
    height: 2.5em;
    box-shadow: 3px 3px 3px #999;
    margin: 10px auto;
    top: 0;
	text-align: center;
	font-size: .9em; 
	color: red;
}


/* OUTPUT STYLES */

.nav-tabs .nav-link, 
.nav-pills .nav-link {
    background-color: #ddd;
    margin-left: 2px;
}

	.nav-tabs .nav-link:hover,
	.nav-pills .nav-link:hover {
		background-color: <?php echo $blue; ?>;
		color: white;
	}
	
	.nav-pills .nav-link {
		margin-bottom: 5px;
	}

#WM_Calc .caloutputStocks {
	background-color: #DDD;
    border-radius: 10px;
    min-height: 200px;
    width: 100%;
    position: relative;
    top: 0;
	z-index: 99;
	padding: 10px;
	margin-top: 1vw;
}

#WM_Calc .calwrapper {
    width: 100%;
    position: relative;
    z-index: 99;
    padding: 10px 0px;
    margin-top: 20px;	
	/*display: none;*/
}

#WM_Calc .caloutput .left,
#WM_Calc .caloutputBonds .left,
#WM_Calc .caloutputTreas .left,
#WM_Calc .caloutputIronLaw .left,
#WM_Calc .caloutputBlackBox .left 		{ text-align: left; }
#WM_Calc .caloutput .center,
#WM_Calc .caloutputBonds .center,
#WM_Calc .caloutputTreas .center,
#WM_Calc .caloutputIronLaw .center,
#WM_Calc .caloutputBlackBox .center 	{ text-align: center; }
#WM_Calc .caloutput .right,
#WM_Calc .caloutputBonds .right,
#WM_Calc .caloutputTreas .right,
#WM_Calc .caloutputIronLaw .right,
#WM_Calc .caloutputBlackBox .right 		{ text-align: right; }
#WM_Calc .caloutput .bold,
#WM_Calc .caloutputBonds .bold,
#WM_Calc .caloutputTreas .bold,
#WM_Calc .caloutputIronLaw .bold,
#WM_Calc .caloutputBlackBox .bold 		{ font-weight: bold; }

#WM_Calc #outputTable {
	width: 100%;
}

#WM_Calc .caloutput td, 
#WM_Calc .caloutputBonds td, 
#WM_Calc .caloutputTreas td, 
#WM_Calc .caloutputIronLaw td, 
#WM_Calc .caloutputBlackBox td
 {
	border-bottom: 1px solid #fff;
	font-size: 1em;
	padding: 3px;
	text-align: center;
	border-left: 1px solid silver;
}

#WM_Calc .caloutput, 
#WM_Calc .caloutputBonds, 
#WM_Calc .caloutputTreas, 
#WM_Calc .caloutputIronLaw, 
#WM_Calc .caloutputBlackBox {
	box-shadow: 0px 4px 3px #ccc;
	border-left: 1px solid silver;
	border-right: 1px solid silver;
	border-bottom: 1px solid silver;
	background-color: white;
}

#WM_Calc th {
	background-color: #333;
	color: white;
	font-size: .8em;
	text-align: center;
	padding: 5px;
	border-left: 1px solid silver;
	
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
}

#WM_Calc #outputTable .folding {
	cursor: pointer;
}

	#WM_Calc #outputTable th.open > span,
	#WM_Calc #outputTable td.open > span {
		display: inline-block;
	}
	
	#WM_Calc #outputTable th.closed > span,
	#WM_Calc #outputTable td.closed > span {
		display: none;
	}
	
	#WM_Calc div.tri {
		display: inline-block;
		padding-right: 3px;
		font-size: 1.75em;
		position: relative;
	}
	
	#WM_Calc .output-header-data span {s
		display: inline-block;
		top: -3px;
		position: relative;
	}
	
	#WM_Calc #outputTable th:hover {
		background-color: <?php echo $blue; ?>;
		color: white;
	}
	


#WM_Calc .caloutput tr:nth-child(even), 
#WM_Calc .caloutputBonds tr:nth-child(even), 
#WM_Calc .caloutputTreas tr:nth-child(even), 
#WM_Calc .caloutputIronLaw tr:nth-child(even), 
#WM_Calc .caloutputBlackBox tr:nth-child(even)
 {
	background-color: #f2f2f2;
}

#WM_Calc .caloutput #outputTable,
#WM_Calc .caloutputBonds #outputTableBonds,
#WM_Calc .caloutputTreas #outputTableTreas,
#WM_Calc .caloutputIronLaw #outputTableIronLaw,
#WM_Calc .caloutputBlackBox #outputTableBlackBox
{
	border-radius: 10px 10px 0 0 !important;
    background-color: white;
    overflow: hidden;
}

#WM_Calc .avgYield, #WM_Calc .actYield {
	display: inline-block;
	width: 48%;
	margin: 5px;
	background-color: white;
	font-size: 1.1em;
}

#WM_Calc .avgYield p, #WM_Calc .actYield p {
	display: block;
	margin-top: 5px;
	margin-bottom: 5px;
}

#WM_Calc .actYield {
	background-color: <?php echo $yellow; ?>;
}



		
/* ==================================================== 
   ================ POPUP MODAL WINDOW ================
   ==================================================== */
   
   /*#WM_Calc #resultsWindow {
	   position: absolute;
	   top: 0;
	   height: 100vh;
	   width: 100vw;
	   background-color: rgba(0,0,0,.6);
   }
   */
   
	#WM_Calc .loader {
		display: none;
	}
	/*
	#WM_Calc .closeBtn {
		position: absolute;
		right: 40px;
		top: 40px;
		background-color: white;
		border: 2px solid <?php echo $blue; ?>;
		border-radius: 20px;
		min-height: 40px;
		min-width: 40px;
	}*/
	

	#WM_Calc div.Loader {
		display: none;
	}
	
			/* Loader CSS by Luke Haas */
			.loader,
			.loader:before,
			.loader:after {
			  border-radius: 50%;
			  width: 2.5em;
			  height: 2.5em;
			  -webkit-animation-fill-mode: both;
			  animation-fill-mode: both;
			  -webkit-animation: load7 1.8s infinite ease-in-out;
			  animation: load7 1.8s infinite ease-in-out;
			}
			.loader {
			  color: <?php echo $blue; ?>;
			  font-size: 10px;
			  margin: 80px auto;
			  position: relative;
			  text-indent: -9999em;
			  -webkit-transform: translateZ(0);
			  -ms-transform: translateZ(0);
			  transform: translateZ(0);
			  -webkit-animation-delay: -0.16s;
			  animation-delay: -0.16s;
			}
			.loader:before,
			.loader:after {
			  content: '';
			  position: absolute;
			  top: 0;
			}
			.loader:before {
			  left: -3.5em;
			  -webkit-animation-delay: -0.32s;
			  animation-delay: -0.32s;
			}
			.loader:after {
			  left: 3.5em;
			}
			@-webkit-keyframes load7 {
			  0%,
			  80%,
			  100% {
				box-shadow: 0 2.5em 0 -1.3em;
			  }
			  40% {
				box-shadow: 0 2.5em 0 0;
			  }
			}
			@keyframes load7 {
			  0%,
			  80%,
			  100% {
				box-shadow: 0 2.5em 0 -1.3em;
			  }
			  40% {
				box-shadow: 0 2.5em 0 0;
			  }
			}


	#WM_Calc #calcResults.modal-content {
		max-height: 90vh;
		overflow: scroll;
	}
	
	#WM_Calc .ann-pay-table {
		margin: 0px;
	}
		
	#WM_Calc .ann-pay-table td {
		padding: 0px;
	}
	
	#WM_Calc .ann-pay-table input {
		float: none;
		padding: 0px;
		margin-bottom: 0px;
	}
	
	#WM_Calc .ann-pay-table .roll {
		color: #555;
	}
	
	#WM_Calc .ann-pay-table .roll:hover {
		color: <?php echo $ltblue; ?>;
		cursor: pointer;
	}
	
	#WM_Calc .ann-pay-table .recalc-btn, 
	#WM_Calc .ann-pay-table .ann-pay-entry-field
	{
		display: none;
	}
	
	
	.ui-front {
		z-index: 9999;
	}
				
/* ==================================================== 
   ================= MOBILE STYLES ====================
   ==================================================== */
   
   #WM_Calc .mobile-nav {
	   display: none;
	   border: 1px solid silver;
	   padding: 5px;
	   width: 100%;
   }
   
 @media screen and ( max-width: 961px ) {
	 
	#WM_Calc .grp1, .grp2 { 
		width: 100%;
		padding: 0 1vw;
		clear: both;
		}

			
}


 @media screen and ( max-width: 400px ) {
	 
		
	#calcResults .tablewindow {
		overflow: scroll;
		width: 100%;
	}	
		
	#WM_Calc label {
		clear: both;
	}
	
	#WM_Calc #input6 label {
		display: block !important;
		float: right !important;
		padding: 0 !important;
		padding-left: 35px !important;
		margin-top: -23px !important;
		margin-bottom: 10px !important;
	}
	
	#WM_Calc input {
		clear: both;
	}
	
		#WM_Calc #input3 input.text {
			width: 88% !important;

		}
	
		#WM_Calc #input6 input.text {
			width: 80% !important;
		}
	
	#WM_Calc .pill-container {
		display: none;
	}
	
	#WM_Calc a.nav-link.active + div.pill-container {
			display: block;
	}

			
}



