/* ======================================================
   =========== AVERAGE VS ACTUAL ROR CALC JS ============
   ====================================================== */

// ===================== THE CALCULATOR CORE FUNCTIONS =============================== 
		
	var stBOY, stAnnPay, bnAnnPay, bnBOY, trAnnPay, trBOY;
	var RORTableArray = new Array();
	const mathfuncts = new MathFuncts();
	const recalcvalues = new reCalcValues();
	var BOYBalance = new Array();
	var EOYBalance = new Array();
    var newBalance;
    var tyrs = 1;
    var recalcFlag = false;

	
	// +++++++++++++++++++++++++++ //
	// +++ Data/Ajax Functions +++ //
	// +++++++++++++++++++++++++++ //
	// get the calc data, put into sessionStorage
	loadData( pluginDir+ 'data/ROR_Calc.csv');
	
	function  loadData(src, yrs, startYear, numYears, percentStocks, percentBonds, percentTreas) {
				console.log("loadData() called: " + src);
				var data = $.ajax({
							method: 	"POST",
							url:		src,
							dataType:	"text",
							cache:		true,
							success:	function(result) {
											//callback function
											EconData = $.csv.toObjects(result);
										}
							});							
			};


	const runCalc = function(BOY, annPay, mngFee, startYear, numYears, percentStocks, percentBonds, percentTreas) {
			console.log('ROR Calculator JS Loaded...');
						
			// +++++++++++++++++++++++ //
			// ++ Initialization    ++ //
			// +++++++++++++++++++++++ //
			
			newBalance = new Number(BOY);
			var myBalance = new Number(0);
			var yearIndex = new Number(0);
			var endYearIndex = new Number(0);
			var yrFromStart = new Number(0);
			var sumOfYields = new Number(0);
			var GSresult, GSResultTest;
			var theTable;
			var thePane;
             var loopFlag = false;


			// start the calculator,  get the data, put into 2D array
			init( pluginDir+ 'data/ROR_Calc.csv', numYears, startYear, numYears, percentStocks, percentBonds, percentTreas);

			// ++++++++++++++++++++++ //
			// +++ Data Functions +++ //
			// ++++++++++++++++++++++ //
			
			function  init(src, yrs, startYear, numYears, percentStocks, percentBonds, percentTreas) {
				
				yearIndex = startYear-EconData[0].Year; // calc the table row to begin from
				endYearIndex = yearIndex+numYears;
				
				console.log("numYears: " + numYears);
				console.log("yearIndex: " + yearIndex);
				console.log("endYearIndex: " + endYearIndex);
				console.log("Start Year: " + EconData[yearIndex].Year);
				console.log("S&P 500 Return: " + EconData[yearIndex].SandP);
				console.log("Corp Bond Return: " + EconData[yearIndex].Bond);
				console.log("3-Yr Treasuries Return: " + EconData[yearIndex].Treas);
				console.log("Inlfation CPI-U: " + EconData[yearIndex].CPIU);
				console.log("GDP: " + EconData[yearIndex].GDP);
				
				constructTabInterface();
				
				stBOY = BOY; bnBOY = BOY; trBOY = BOY;
				stAnnPay = annPay; bnAnnPay = annPay; trAnnPay = annPay;
				
				for (idx = 0; idx <= 2; idx++) {
					
					switch(idx) {	
						case 0: 
							BOY = stBOY * percentStocks;
							annPay = stAnnPay * percentStocks; 
							newBalance = BOY;
							
							if ( checkedStocks && percentStocks > 0 ) constructTable('SandP', idx, BOY, annPay);
							break;
							
						case 1: 
							BOY = bnBOY * percentBonds;
							annPay = bnAnnPay * percentBonds;
							newBalance = BOY;
							
							if ( checkedBonds && percentBonds > 0 ) constructTable('Bond', idx, BOY, annPay);
							break;
							
						case 2: 
							BOY = trBOY * percentTreas;
							annPay = trAnnPay * percentTreas;
							newBalance = BOY;
							loopFlag = true;

							if ( checkedTreas && percentTreas > 0 ) constructTable('Treas', idx, BOY, annPay);
							break;
							
						default :
							// Black Box Display
					};
					
					if ( loopFlag ) displayCalc(); // display the calc when done
				};
								
			};
			
			

			// +++++++++++++++++++++++ //
			// ++ Build Data Table  ++ //
			// +++++++++++++++++++++++ //
			// Construct Tabbed Interface
			function constructTabInterface() {
				$('.calwrapper ul').html('');
				if (checkedUsePortfolio || (checkedStocks && percentStocks > 0)) { var stocksTab = "<li class='nav-item'><a id='stocksTab' href='#stocks' data-toggle='tab' class='nav-link active'>Stocks</a></li>" } else { var stocksTab = "" };
				if (checkedUsePortfolio || (checkedBonds && percentBonds > 0)) { var bondsTab = "<li class='nav-item'><a id='bondsTab' href='#bonds' data-toggle='tab' class='nav-link'>Bonds</a></div></li>" } else { var bondsTab = "" };
				if (checkedUsePortfolio || (checkedTreas && percentTreas > 0)) { var treasTab = "<li class='nav-item'><a id='treasTab'  href='#treas' data-toggle='tab' class='nav-link'>3-Yr. Treasuries</a></li>" } else { var treasTab = "" };
				var BBTab = "<li class='nav-item'><a id='blackboxTab' href='#blackbox' data-toggle='tab' class='nav-link'>&quot;Black Box&quot; Planning</a></li>";
				
				var tabInterface = "<ul class='nav nav-tabs'>" + stocksTab + bondsTab + treasTab + BBTab +"</ul>";
				
				$('.calwrapper').prepend(tabInterface);

			};
			
			// Construct the Output Table
			function constructTable(econData, idx, BOY, annPay) {
				switch (idx) {
				case 0:	
					var thePane = '.caloutput';
					var theTable = 'outputTable';
					break;
				case 1:	
					var thePane = '.caloutputBonds';
					var theTable = 'outputTableBonds';
					break;
				case 2:	
					var thePane = '.caloutputTreas';
					var theTable = 'outputTableTreas';
					break;				
				case 3:	
					var thePane = '.caloutputIronLaw';
					var theTable = 'outputTableIronLaw';
					break;
					
				default :
					//
				break;
				};
				
				var outputTableHeader = "<div class='tablewindow'><table id='"+theTable+"' class='container' ><tr class='output-table-header'><th class='output-header-data'><div class='tri'></div><span>Years From Start</span></th><th class='output-header-data'><div class='tri'></div><span>Year</span></th><th class='output-header-data'><div class='tri'></div><span>Balance BOY</span></th><th class='output-header-data'><div class='tri'></div><span>Percent Yield</span></th><th class='output-header-data'><div class='tri'></div><span>Annual Payment</span></th><th class='output-header-data'><div class='tri'></div><span>Management Fee</span></th><th class='output-header-data'><div class='tri'></div><span>Balance EOY</span></th></tr>";
				var outputTableFooter = "</table></div>";
				var outputYields = "<div class='container center "+theTable+"-yields'><div class='avgYield'></div><div class='actYield'></div><div style='clear:both;' class='ironLaw'></div></div>";
				
				$(thePane).html(outputTableHeader + outputTableFooter);
				
				var totMngFee = mathfuncts.mngFee(newBalance^0, annPay^0, mngFee);


				// Build the table of results with a loop
				for (i = yearIndex; i < endYearIndex; i++){
					yrFromStart ++ ;
					var dispNewBal = newBalance^0;
					var dispAnnPay = annPay^0;
					var idx = yrFromStart - 1;
					var rowIdx = idx*6;
                    var rcFlag = false;
					
					var rate = EconData[i][econData] / 100; // convert to decimal percentage
				
					if ( rate < 0 ) {
						var rateColor = "red";
					} else {
						var rateColor = 'black';
					};
					
					// store values in an array so I can recalculate them
					console.log("recalcFlag = " + recalcFlag);
					if (!recalcFlag) {
						RORTableArray.push(yrFromStart, EconData[i].Year, dispNewBal.toFixed(0), EconData[i][econData], dispAnnPay.toFixed(0), totMngFee.toFixed(0));
					} else {
						//insert new values into existing array
						RORTableArray[0 + (idx * 6)] = yrFromStart;
						RORTableArray[1 + (idx * 6)] = EconData[i].Year;
						RORTableArray[2 + (idx * 6)] = dispNewBal.toFixed(0);
						RORTableArray[3 + (idx * 6)] = EconData[i][econData];
						RORTableArray[4 + (idx * 6)] = dispAnnPay.toFixed(0);
						RORTableArray[5 + (idx * 6)] = totMngFee.toFixed(0);
					};

					// The changing cell for the Annual Payment column 
					var changingValCell = "<table class='ann-pay-table'><tr><td style='padding-right: 2px !important;'>$</td><td style='padding-left: 0px !important; padding-right: 0px !important;'><span id='annPayAmt-"+idx+"'  class='ann-pay'>" + RORTableArray[4+rowIdx].toLocaleString() + "</span><span><input type='text' name='annual_payment' id='annPayInput-"+idx+"' class='ann-pay-entry-field' onchange='mathfuncts.changeVal(this.value, this.id);' autocomplete='off' value='"+ RORTableArray[4+rowIdx].toLocaleString() +"' style='text-align: center; width: 50px;'></input></span></td><td style='padding-left: 2px !important;'><span id='editBtn-"+idx+"' class='edit-btn roll fa fa-fw fas' aria-hidden='true' onClick='mathfuncts.toggleBtn("+idx+")'>&#xf044;</span><span id='recalcBtn-"+idx+"' class='recalc-btn roll fa' aria-hidden='true' onClick='mathfuncts.recalcBtn()'>&#xf021;</span></td></tr></table>"; 
					
					// the values placed in table rows
					// with the changing cell inserted into AnnPayment cell
					var outputTableRow = "<tr class='output-data-row'><td class='yrs-from-start center'><span>"+yrFromStart+"</span></td><td class='year center'><span>"+ EconData[i].Year +"</span></td><td class='bal-BOY'><span>$"
					+dispNewBal.toLocaleString()+"</span></td><td class='int-rate'><span style='color: " + rateColor + "'>"+EconData[i][econData]+"%</span></td><td id='AnnPayment-"+i+"'class='ann-pymt center'>" + changingValCell + "</td><td class='mgmt-fee right' style='padding-right: 5%;'><span>$"+ (totMngFee.toFixed(2)).toLocaleString() +"</span></td><td class='output-data data-label-"+i+" bold'><span>/<span></td></tr>"
					;
					$('#'+theTable).append(outputTableRow);
					
					
					
					BOYBalance.push(newBalance); // Build BOY array 
					
					// calc the EOY Balance
					mathfuncts.balEOY(newBalance, annPay, mngFee, rate, tyrs);
					newBalance = mathfuncts.myBalance;
					
					EOYBalance.push(newBalance); // Build EOY array 
					
					dispNewBal = newBalance^0;
					$('#'+theTable+' .data-label-'+i+' span').html("$" + dispNewBal.toLocaleString());
					
					totMngFee = mathfuncts.mngFee(dispNewBal, newBalance, mngFee);
					
					sumOfYields = Number(sumOfYields) + Number((EconData[i][econData]));
					
					
					//display array in console
					console.log("RORTableArray values: " + RORTableArray[0+rowIdx] + " || " + RORTableArray[1+rowIdx] + " | " + RORTableArray[2+rowIdx] + " | " + RORTableArray[3+rowIdx] + " | " + RORTableArray[4+rowIdx] + " | " + RORTableArray[5+rowIdx]);
					
				}; // end FOR loop
				
				// output the Yields
				$(thePane).prepend(outputYields);
				
				// get Average Yield
				mathfuncts.averageYield( $, sumOfYields, numYears, theTable, annPay, BOYBalance );

				// calculate the ACTUAL YIELD here...
				mathfuncts.actualYield(theTable, idx);
				
				//clear out the values for the next calculations...
				mathfuncts.clearValues();
				
				
				mobileMods($); // JS modifications for small mobile screens
				
				
			}; // end constructTable()
			
			

			
			
		$('#WM_Calc .loader').fadeOut();

		}// end runCalc();
		

		
