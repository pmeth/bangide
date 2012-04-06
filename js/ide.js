      var editor = CodeMirror.fromTextArea(document.getElementById("phpcode"), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 3,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift"
      });
