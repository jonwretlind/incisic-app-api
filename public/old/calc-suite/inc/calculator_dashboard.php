<?php /* =========================================================================================== */
	  /* ===================== CALCULATOR SUITE DASHBOARD/LOADER =================================== */
	  /* =========================================================================================== */ ?>


<script>
	var pluginDir = "<?php echo plugin_dir_url( __DIR__ ); ?>"; // for use in js scripts
	var ref = "http://" + document.URL.split('/')[2] + "/";

		function version()  {
			console.log('Referrer: ' + ref );
			return "1.9.1a";
		};

		var debug = true;
</script>


<?php
	$current_user = wp_get_current_user();
		$userLogName = 	$current_user -> user_login;
		$userName = 	$current_user -> display_name;
		$userEmail = 	$current_user -> user_email;

		//set a global variable so javascript can access
		echo "<script>var userLogName = '" . $userLogName . "', userName = '" . $userName . "';</script>";


?>


<div id="CalcWrapper" style="margin: 20px 0px;">
	<!-- For DEBUGGING -- COMMENT OUT WHEN IN PRODUCTION -->
		<div id="debugger"><script> if ( debug ) document.write('<span style="color: red">DEBUG MODE:</span>'); </script> <span id="version"></span></div>
	<!-- /DEBUGGING -->

	<div id="WM_Calc" ng-controller="CSController">
		<!-- ================ DASHBOARD =================== -->
		<div id="calcDash" class="app-bg">
			<div class="dash container collapse shadow">
				<h5 id="mainHead" class="calc-head main-head">{{dashName}}
					<div id="userProfile"></div>
				</h5>
					<button id="btn1" class="button shadow"><div class="btn-label">{{calc1_Name}}</div></button>
					<button id="btn2" class="button shadow"><div class="btn-label">{{calc2_Name}}</div></button>

			<!-- load calculators into .calc-loader based on selection -->
			<div id="dashAppWindow">
				<!-- Average vs. Actual ROR Calculator -->
				<div id="RORCalcWindow" ><?php include( plugin_dir_url( __DIR__ ) . 'inc/ror-form.php'); ?></div>
				<!-- Simple FV Calculator -->
				<div id="FVcalcWindow" ><?php include( plugin_dir_url( __DIR__ ) . 'inc/simpleFV-form.php'); ?></div>
			</div>
			</div>
		</div><!-- // #calcDash -->

		<div id="resultsWindow" class="modal fade bd-example-modal-lg">

			<div class="modal-dialog modal-lg">
				<div id="calcResults" class="modal-content" style="padding: 40px !important;">
					<div class="modal-header">
						<div class="loader"></div>
						<h5 class="modal-title" id="exampleModalLabel">Calculation Results</h5>
					</div>
				</div>
			</div>
		</div>

		<div id="Loader" class="loader"></div>
	</div><!-- // #WM_Calc -->
</div><!-- // #CalcWrapper -->


	<?php
		if ( $userLogName != null ) {
			$profileInfo = "<span>Welcome, " . $userName . "! </span>";
			echo '<script> jQuery("#userProfile").html("' . $profileInfo . get_avatar( $userEmail, 30 ) . '"); </script>';
		} else {
			echo '<script> jQuery("#userProfile").html(\'<a href="" style="color: #aaa;">Login</a> to view your dashboard.\'); </script>';
		};
	?>



<!-- MY JAVASCRIPT FOR THE APPLICATION -->
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/lib/less_min.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/lib/jquery_csv.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/lib/angular.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/app/init_globals.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/app/init_ng.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/app/calc_dash_js.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/app/math_functs.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/app/ror_recalc_values.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/app/ror_js.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/app/simpleFV_js.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/app/display.js' ?>"></script>
<script src="<?php echo plugin_dir_url( __DIR__ ) . 'js/app/mobile_mods.js' ?>"></script>
