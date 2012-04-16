var myLayout;
var editor;

$(document).ready(function () {
	myLayout = $('body').layout({
		west: {
			size: 600
		},
		center: {
			maskContents: true
		}
	});

	editor = CodeMirror.fromTextArea(document.getElementById("phpcode"), {
		lineNumbers: true,
		matchBrackets: true,
		mode: "application/x-httpd-php",
		indentUnit: 3,
		indentWithTabs: true,
		enterMode: "keep",
		tabMode: "shift"
	});

//	$('.ui-layout-resizer').mousedown(function(){ $("#rendered_wrapper").hide(); });
//	$('.ui-layout-resizer').mouseup(function(){ $("#rendered_wrapper").show(); });
});
