var myLayout;
var editor;

$(document).ready(function () {
	myLayout = $('body').layout({
		spacing_open: 3,
		west: {
			size: '15%'
		},
		east: {
			size: '38%',
			maskContents: true
		}
	});

	if(document.getElementById("tabs1-code")) {
		editor = CodeMirror.fromTextArea(document.getElementById("tabs1-code"), {
			lineNumbers: true,
			matchBrackets: true,
			mode: "application/x-httpd-php",
			indentWithTabs: true,
			enterMode: "keep",
			tabMode: "shift",
			autofocus: true
		});
	}
	$('#filetree').treeview({
		collapsed: true
	});

	$("#tabs").tabs();

});
