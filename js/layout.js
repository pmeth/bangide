var myLayout; // a var is required because this page utilizes: myLayout.allowOverflow() method

$(document).ready(function () {
	myLayout = $('body').layout({
		south: {
			initHidden: true
		},
		west: {
			size: 200
		},
		east: {
			size: 600
		}
	});
});