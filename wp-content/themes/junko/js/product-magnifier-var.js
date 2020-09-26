"use strict";
var junko_magnifier_vars;
var yith_magnifier_options = {
		sliderOptions: {
			responsive: junko_magnifier_vars.responsive,
			circular: junko_magnifier_vars.circular,
			infinite: junko_magnifier_vars.infinite,
			direction: 'left',
			debug: false,
			auto: false,
			align: 'left',
			height: 'auto',
			prev    : {
				button  : "#slider-prev",
				key     : "left"
			},
			next    : {
				button  : "#slider-next",
				key     : "right"
			},
			scroll : {
				items     : 1,
				pauseOnHover: true
			},
			items   : {
				visible: Number(junko_magnifier_vars.visible),
			},
			swipe : {
				onTouch:    true,
				onMouse:    true
			},
			mousewheel : {
				items: 1
			}
		},
		showTitle: false,
		zoomWidth: junko_magnifier_vars.zoomWidth,
		zoomHeight: junko_magnifier_vars.zoomHeight,
		position: junko_magnifier_vars.position,
		lensOpacity: junko_magnifier_vars.lensOpacity,
		softFocus: junko_magnifier_vars.softFocus,
		adjustY: 0,
		disableRightClick: false,
		phoneBehavior: junko_magnifier_vars.phoneBehavior,
		loadingLabel: junko_magnifier_vars.loadingLabel,
	};