<div id="RORCalc" ng-controller="RORCalcController"> 

	<div class="mobile-nav center"><span>&#8635; Recalculate</span></div>
	<div class="calbody collapse shadow">
		<form name="calculator" ng-submit="func()">
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
				<label style="position: relative; top: 9px;">Management Fee </label>
					<table style="display: block; float: left; width: 70%; "><tr>
					<td>
						<input class="text" type="text" name="management_fee" ng-model="mngFee" style="width: 20%; float: left; margin-left: 3px;" autocomplete="off"><span style="display: inline-block; font-size: 1.2em; padding: 5px 0px; ">&nbsp;&#37;</span>
					</td></tr>
					</table>
				</div>
				
				<div id="input4">
					<label>Starting Year </label><input type="text" name="start_year" ng-model="startYear" autocomplete="off">
				</div>
				
				<div id="input5">
					<label>Years </label><input type="text" name="num_of_years" ng-model="numYears" autocomplete="off">
				</div>
				
		</div><!-- // .grp1 -->
		
		<div class="grp2">
				
				<div id="input6">
					<h5 style="clear: both; font-size: 1.2em; font-weight: bold; display: block; border-top: 1px solid silver; padding-top: 10px; margin-top: 5px;">PORTFOLIO ALLOCATION:</h5>
					<table>
					<!--<tr><td style="width: 50%; padding-bottom: 10px;" colspan="3">
						<div id="input6z">
							<input class="checkbox" type="checkbox" id="usePortfolio" name="usePort" value="usePort" checked>
							<label for="usePortfolio">Use 100&#37; In Each Category</label>
						</div>
					</td>
					</tr>-->
					<tr><td style="width: 50%">
						<div id="input6a">
							<input class="checkbox" type="checkbox" id="stocksPortfolio" name="stocks" value="stocks" checked>
							<label for="stocksPortfolio">Stock Market (S&amp;P 500)</label>
						</div>
					</td>
					<td style="width: 5%"></td>
					<td style="width: 45%">
						<div id="input6acol2">
							<input class="text" type="text" name="percentStocks" ng-model="percentStocks" style="width: 50%; padding: 5px;" autocomplete="off"><label style="font-size: 1.2em; display: inline-block; padding: 5px 0px; position: relative; ">&nbsp;&#37;</label>
						</div>
					</td></tr>
					
					<tr><td style="width: 50%">
						<div id="input6b">
							<input class="checkbox" type="checkbox" id="bondsPortfolio" name="bonds" value="bonds">
							<label for="bondsPortfolio">Corporate Bonds</label>
						</div>
					</td>
					<td style="width: 5%"></td>
					<td style="width: 45%">
						<div id="input6bcol2">
							<input class="text" type="text" name="percentBonds" ng-model="percentBonds" style="width: 50%; padding: 5px;" autocomplete="off"><label style="font-size: 1.2em; display: inline-block; padding: 5px 0px; position: relative; ">&nbsp;&#37;</label>
						</div>
					</td></tr>
					
					<tr><td style="width: 50%">
						<div id="input6c">
							<input class="checkbox" type="checkbox" id="treasPortfolio" name="treasuries" value="treasuries">
							<label for="treasPortfolio">Government Treasuries</label>
						</div>
					</td>
					<td style="width: 5%"></td>
					<td style="width: 45%">
						<div id="input6ccol2">
							<input class="text" type="text" name="percentTreas" ng-model="percentTreas" style="width: 50%; padding: 5px;" autocomplete="off"><label style="font-size: 1.2em; display: inline-block; padding: 5px 0px; position: relative; ">&nbsp;&#37;</label>
						</div>
					</td></tr>
					</table>
						
				</div>
		</div><!-- // .grp2 -->
				
		<div class="button-wrap" style="display: flex; flex-direction: row; justify-content: center;">
			<button class="button" type="submit" name="calculate" value="Calculate" ng-click="calculateNow()">Calculate!</button>
			<!--<button class="button" type="submit" name="reset" value="Reset" ng-click="resetNow()">Reset Values</button>-->
		</div>
					
		</form>
	</div><!-- /.calbody -->
				
</div><!-- // RORCalc -->


		

