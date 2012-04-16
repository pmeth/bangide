$(function() {
	var editor = CodeMirror.fromTextArea(document.getElementById("phpcode"), {
		lineNumbers: true,
		matchBrackets: true,
		mode: "application/x-httpd-php",
		indentUnit: 3,
		indentWithTabs: true,
		enterMode: "keep",
		tabMode: "shift"
	});

	myLayout = $('body').layout({

		//	reference only - these options are NOT required because 'true' is the default
		closable:					true	// pane can open & close
		,
		resizable:					true	// when open, pane can be resized
		,
		slidable:					true	// when closed, pane can 'slide' open over other panes - closes on mouse-out
		,
		livePaneResizing:			true
	});
});
