
// ================ CalcSuiteApp CONTROLLER ==========================

		// Module
		const CalcSuiteApp = angular.module('CalculatorSuiteApp',[]);

		// Controller
		CalcSuiteApp.controller('CSController', ['$scope', function($scope) {
				$('#CalcWrapper').hide(); // wait until default data loads to show calc

				$scope.dashName = "Incisic Calculator Suite";
				$scope.calc1_Name = "Average vs. Actual ROR";
				$scope.calc2_Name = "Future Value Calculator";


			$scope.goCalc = function() {
				// go launch a calculator
				// TODO
			};

			$scope.update = function() {
				//TODO
			};


		}]);


		// ============= RORCalculatorApp Controller =======================

		// ROR Calculator Controller
		CalcSuiteApp.controller('RORCalcController', ['$scope', function($scope){

				$scope.calcName = "Average vs. Actual ROR Calculator";
				$scope.BOY = 1000;
				$scope.annPay = 1000;
				$scope.mngFee = 1.00;
				$scope.startYear = startYear;
				$scope.numYears = 5;
				$scope.percentStocks = 100;
				$scope.percentBonds = 0;
				$scope.percentTreas = 0;

			$scope.calculateNow = function() {

				BOY = Number($scope.BOY);
				annPay = Number($scope.annPay);
				mngFee = Number($scope.mngFee / 100);
				startYear = Number($scope.startYear);
				numYears = Number($scope.numYears);
				percentStocks = Number($scope.percentStocks);
				percentBonds = Number($scope.percentBonds);
				percentTreas = Number($scope.percentTreas);


				checkedStocks = document.getElementById('stocksPortfolio').checked;
				checkedBonds = document.getElementById('bondsPortfolio').checked;
				checkedTreas = document.getElementById('treasPortfolio').checked;

					if ( checkedStocks ) { percentStocks = Number($scope.percentStocks) / 100; } else { percentStocks = 0; }
					if ( checkedBonds ) { percentBonds = Number($scope.percentBonds)  / 100; } else { percentBonds = 0; }
					if ( checkedTreas ) { percentTreas = Number($scope.percentTreas)  / 100; } else { percentTreas = 0; }

				console.log('checkedStocks: ' + checkedStocks);
				console.log('checkedBonds: ' + checkedBonds);
				console.log('checkedTreas: ' + checkedTreas);

				valid = true;
				validate($scope, "RORCalcApp");

				popupModal();

				//loader/spinner
				$('#WM_Calc .loader').show();

				// start the calculator
				if ( valid === true ) {
					var runSrc = 'rorcalcresults';
					console.log('call loadCalcResults()...');
					loadCalcResults( runSrc ); //load the calc results HTML
				};

				function loadCalcResults( runSrc ) {
					//$('#RORCalc .calwrapper').fadeOut('fast');
					// LOAD THE CALC RESULTS PANEL
						// Load the new instance of the panel
							$('#calcResults').load( runSrc, function(res, status, xhr) {
								if (status == "error") {
									console.log("Error: " + xhr.statusText);
								}
								//callback
								console.log('loaded the calc results... callback');
								// run the main calculator
								runCalc(BOY, annPay, mngFee, startYear, numYears, percentStocks, percentBonds, percentTreas);
							});

				};

            };

            $scope.resetNow = function () {
                if (RORTableArray) RORTableArray = [];
                $scope.BOY = 1000;
                $scope.annPay = 1000;
                $scope.mngFee = 1.00;
                $scope.startYear = startYear;
                $scope.numYears = 5;
                $scope.percentStocks = 100;
                $scope.percentBonds = 0;
                $scope.percentTreas = 0;
            }

			$scope.update = function() {
				//startYear = $scope.startYear.value;
			};


		}]); // end function($scope) in RORCalcController

		function popupModal() {

		// Display of modal window
				var options = {
					backdrop: 	true,
					keyboard: 	true,
					focus:		true,
					show:		true
				};

		$('#resultsWindow').modal(options);
		}

		//Validate user input
		const validate = function($scope, app) {

			if ( app == "RORCalcApp" ) {
				// tests for #input1
				if ( isNaN( BOY ) ) {
					$scope.BOY = null;
						$('#RORCalc #warning').fadeIn().html('<p>Sorry, Present Value must be a number.</p>');
						$('#RORCalc #input1 input').css({ borderColor: 'red' });
						valid = false;
						return valid;
				};

				if ( BOY < 0  ) {
					$scope.BOY = 0;
					$('#RORCalc #warning').fadeIn().html('<p>Sorry, Present Value cannot be less than zero</p>');
					$('#RORCalc #input1 input').css({ borderColor: 'red' });
					valid = false;
					return valid;
				} else {
					$('#RORCalc #warning').hide();
					$('#RORCalc #input1 input').css({ borderColor: 'silver' });
				};
				// end tests #input1

				// tests for #input2
				if ( isNaN( annPay ) ) {
					$scope.annPay = null;
						$('#RORCalc #warning').fadeIn().html('<p>Sorry, Annual Payment must be a number.</p>');
						$('#RORCalc #input2 input').css({ borderColor: 'red' });
						valid = false;
						return valid;
				};

				if ( annPay <= 0 ) {
					$scope.annPay = 1;
					$('#RORCalc #warning').fadeIn().html('<p>Sorry, Annual Payment must be greater than zero.</p>');
					$('#RORCalc #input2 input').css({ borderColor: 'red' });
					valid = false;
					return valid;
				} else {
					$('#RORCalc #warning').hide();
					$('#RORCalc #input2 input').css({ borderColor: 'silver' });
				};
				// end tests #input2

				// tests for #input3
				if ( isNaN( mngFee ) ) {
					$scope.mngFee = null;
						$('#RORCalc #warning').fadeIn().html('<p>Sorry, Management Fee must be a number.</p>');
						$('#RORCalc #input3 input').css({ borderColor: 'red' });
						valid = false;
						return valid;
				};

				if ( mngFee < 0 ) {
					$scope.mngFee = 0;
					$('#RORCalc #warning').fadeIn().html('<p>Sorry, Managment Fee cannot be less than zero.</p>');
					$('#RORCalc #input3 input').css({ borderColor: 'red' });
					valid = false;
					return valid;
				} else {
					$('#RORCalc #warning').hide();
					$('#RORCalc #input3 input').css({ borderColor: 'silver' });
				};
				// end tests #input3

				// tests for #input4 & 5
				if ( isNaN( startYear ) ) {
					$scope.startYear = null;
						$('#RORCalc #warning').fadeIn().html('<p>Sorry, Starting Year must be a year from 1929 to 2016.</p>');
						$('#RORCalc #input4 input').css({ borderColor: 'red' });
						valid = false;
						return valid;
				};

				if ( startYear + numYears > 2016 || startYear < 1928 || numYears < 1 ) {
					$scope.startYear = 1928;
					$scope.numYears = 1;
					$('#RORCalc #warning').fadeIn().html('<p>Sorry, Years out of range for data set.</p>');
					$('#RORCalc #input4 input').css({ borderColor: 'red' });
					$('#RORCalc #input5 input').css({ borderColor: 'red' });
					valid = false;
					return valid;
				} else {
					$('#RORCalc #warning').hide();
					$('#RORCalc #input4 input').css({ borderColor: 'silver' });
					$('#RORCalc #input5 input').css({ borderColor: 'silver' });

				};
				// end tests #input4 & 5

				// tests for #input5
				if ( isNaN( numYears ) ) {
					$scope.numYears = null;
						$('#RORCalc #warning').fadeIn().html('<p>Sorry, Years must be a number.</p>');
						$('#RORCalc #input5 input').css({ borderColor: 'red' });
						valid = false;
						return valid;
				};
				// end tests #input5
			}; // end if RORCalcApp



			return valid;
		}; // end validate()



		Object.setPrototypeOf( validate, CalcSuiteApp ); //allow validate to have access to variables in $scope


		// ============= SimpleFVApp Controller =======================

		// ROR Calculator Controller
		CalcSuiteApp.controller('FVCalcController', ['$scope', function($scope){

				// form element definitions here...
				$scope.calcName = "Future Value with Periodic Payments Calculator";
				$scope.BOY = 1000;
				$scope.annPay = 1000;
				$scope.intRate = 3.00;
				$scope.mngFee = 0.00;
				$scope.numYears = 5;

			$scope.calculateNow = function() {

				// define variables
				BOY = Number($scope.BOY);
				annPay = Number($scope.annPay);
				mngFee = Number($scope.mngFee / 100);
				numYears = Number($scope.numYears);
				IR = Number($scope.intRate / 100);

				// clear the table Array
				tableArray = new Array();

				// check if valid
				valid = true;
				validate($scope, "SimpleFVApp");


				popupModal();

				//loader/spinner
				$('#WM_Calc .loader').show();

				// start the calculator-
				var runSrc = 'inc/simple-calc-results.php';
				console.log('call loadCalcResults()...');
				loadCalcResults( runSrc ); //load the calc results HTML


				function loadCalcResults( runSrc ) {

					$('#RORCalc .calwrapper').fadeOut('fast');
					$('#RORCalc #Loader').show();

					// LOAD THE CALC RESULTS PANELs

						// Load the new instance of the panel
							$('#calcResults').load( runSrc, function(){
								//callback
								doSimpleFV(IR, annPay, numYears, mngFee, BOY);
							});
				};



			};

			$scope.update = function() {
				//nothing
			};


		}]); // end function($scope) in SimpleFVAppController




		// Initialize AngularJS
		angular.element(function() {
			console.log('Init Angular; CalculatorSuiteApp');
			angular.bootstrap(document, ['CalculatorSuiteApp']);
		});


		angular.element(document).ready(function () {
				console.log('Angular/page loading completed');
				$('#CalcWrapper').fadeIn('fast'); // wait until default data loads to show calc
		});
