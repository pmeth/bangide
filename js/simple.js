var myLayout;
var editor;

$(document).ready(function () {
	myLayout = $('body').layout({
		west: {
			size: '15%'
		},
		east: {
			size: '38%',
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

	$('.filetree').treeview({
		collapsed: true
	});

});
