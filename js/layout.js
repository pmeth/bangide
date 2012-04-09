var myLayout; // a var is required because this page utilizes: myLayout.allowOverflow() method

$(document).ready(function () {
	myLayout = $('body').layout({
		west: {
			size: 600
		},
		east: {
			size: 600
		}
	});
});