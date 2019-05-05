// REQUIRE LOADER
 console.log('Load Dependencies...');

	require.config({
    waitSeconds: 0,
		paths: {
			jquery: 'src/js/lib/jquery',
			modal: 'src/js/lib/modal.min',
			angular: 'src/js/lib/angular',
			less: 'src/js/lib/less_min',
			initGlobals: 'src/js/app/init_globals',
			initNg: 'src/js/app/init_ng',
			calcDash: 'src/js/app/calc_dash_js',
			mathFuncts: 'src/js/app/math_functs',
			rorRecalcVals: 'src/js/app/ror_recalc_values',
			rorJs: 'src/js/app/ror_js',
			simpleFVJs: 'src/js/app/simpleFV_js',
			display: 'src/js/app/display',
			mobileMods: 'src/js/app/mobile_mods',
		},
		shim: {
			'initGlobals': {
				deps: ['jquery',  'modal', 'angular']
			},
			'initNg': {
				deps: ['jquery',  'modal', 'angular']
			},
			'calcDash': {
				deps: ['jquery', 'modal', 'angular', 'less', 'initGlobals', 'initNg']
			},
			'rorJs': {
				deps: ['jquery',  'modal', 'angular', 'less', 'initGlobals', 'initNg', 'mathFuncts']
			},
			'mobile_mods': {
				deps: ['jquery', 'less']
			},
			'less': {
				deps: ['jquery', 'angular', 'initGlobals', 'initNg']
			},
		}
	});

	require(["jquery", "angular", "initGlobals", "initNg", "calcDash", "mathFuncts", "rorRecalcVals", "rorJs", "simpleFVJs", "display", "mobileMods", "modal", "less"]);
