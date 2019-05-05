<!-- =========================== SIMPLE FUTURE VALUE CALCULATOR ============================== -->
			<div id="FVCalc" ng-controller="FVCalcController">
				<div class="mobile-nav center"><span>&#8635; Recalculate</span></div>
				<div class="calbody collapse shadow">
					<form name="fvcalculator" ng-submit="func()">
					<h5 class="calc-head">{{calcName}}</h5>
					<div id="warning"></div>
						
						<div class="grp1">
							<div id="input1">
								<label>Present Value </label><input id="presentValue" type="text" name="present_value" ng-model="BOY" autocomplete="off">
							</div>
							
							<div id="input2">
								<label>Annual Payment </label><input type="text" name="annual_payment" ng-model="annPay" autocomplete="off">
							</div>

							<div id="input3">
							<label>Interest Rate</label>
								<table style="display: block; float: right; width: 70%"><tr>
								<td>
									<input class="text" type="text" name="interest_rate" ng-model="intRate" style="width: 20%; float: left;" autocomplete="off"><span style="display: inline-block; font-size: 1.2em; padding: 5px 0px; ">&nbsp;&#37;</span>
								</td></tr>
								</table>
							</div>
							
							<div id="input4">
							<label>Management Fee</label>
								<table style="display: block; float: right; width: 70%"><tr>
								<td>
									<input class="text" type="text" name="management_fee" ng-model="mngFee" style="width: 20%; float: left;" autocomplete="off"><span style="display: inline-block; font-size: 1.2em; padding: 5px 0px; ">&nbsp;&#37;</span>
								</td></tr>
								</table>
							</div>
							
							<div id="input5">
								<label>Number of Years </label><input type="text" name="num_of_years" ng-model="numYears" autocomplete="off">
							</div>
							
					</div><!-- // .grp1 -->
					
						<div class="button-wrap">
							<button class="button" type="submit" name="calculate" value="Calculate" ng-click="calculateNow()">Calculate!</button>
						</div>
					</form>
				</div>
			</div><!-- // #FVCalc -->