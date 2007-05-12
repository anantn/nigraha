<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>MNIT Registration Form</title>

	<script type="text/javascript">
		var djConfig = {
					isDebug: true
		};
	</script>
	<script type="text/javascript" src="dojo.js"></script>
	<script type="text/javascript">
		dojo.require("dojo.widget.validate");
		dojo.require("dojo.widget.ComboBox");
		dojo.require("dojo.widget.Checkbox");
		dojo.require("dojo.widget.Editor");
		dojo.require("dojo.widget.DatePicker");
		dojo.require("dojo.widget.Button");
		dojo.require("dojo.widget.Wizard");
  	dojo.hostenv.writeIncludes();

    function cancel() {
        alert("Wizard Cancelled!");
    }

    function done() {
        alert("Wizard Done!");
    }

  	function displayData() {
  		var f = document.getElementById("form1");
  		var s = "";
  		for (var i = 0; i < f.elements.length; i++) {
  			var elem = f.elements[i];
  			if (elem.name == "button")  { continue; }
  			s += elem.name + ": " + elem.value + "\n";
  		}
  		alert(s);
  	}
</script>
	<script type="text/javascript">
		dojo.widget.validate.ValidationTextbox.prototype.validColor="white";
	</script>
	<style type="text/css">
	body {
		padding: 5em;
	}
	.formQuestion {
		background-color:#d0e3f5;
		padding:0.3em;
		font-weight:900;
		font-family:Verdana, Arial, sans-serif;
		font-size:1.5em;
		color:#5a5a5a;
	}
	.formAnswer {
		background-color:#f5eede;
		padding:0.3em;
		margin-bottom:1em;
		width: 100%;
		font-size:1.5em;
	}
	.pageSubContentTitle {
			color:#8e8e8e;
			font-size:1.1em;
			font-family:Verdana, Arial, sans-serif;
			margin-bottom:0.75em;
	}
	.small {
		width: 2.5em;
	}
	.medium {
		width: 10em;
	}
	.long {
		width: 20em;
	}

	span.invalid, span.missing {
		display: inline;
		margin-left: 1em;
		font-weight: bold;
		font-style: italic;
		font-family: Arial, Verdana, sans-serif;
		color: #f66;
		font-size: 0.9em;
	}

	.noticeMessage {
		display: block;
		float: right;
		font-weight: normal;
		font-family:Arial, Verdana, sans-serif;
		color:#663;
		font-size:0.9em;
	}
	/* group multiple buttons in a row */
	div .dojoButton {
		float: left;
		margin-left: 10px;
	}
	</style>
</head>

	<body >
  		<h2 class="pageSubContentTitle">MNIT Online Registration 2007</h2>

    <div id="wizard2" dojoType="WizardContainer" hideDisabledButtons="true">
        <div dojoType="WizardPane">
            <h1>Step 1 of 3</h1>
            <p>Simply enter your UserID (the college ID for students) and the 
            Temporary password given to you!</p>
            <?php require_once("firstauthform.php") ?>
            
        </div>
        <div dojoType="WizardPane">
            <h1>Step 2 of 3</h1>
            <p>All fields are compulsary. Please fill data in the required 
            format. When you have made a wrong entry, the field will turn red. 
            </p>
            <?php require_once("addprofile.php") ?>
        </div>
        <div dojoType="WizardPane">
            <h1>Step 3 of 3</h1>
            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            <?php require_once("addcourses.php") ?>
        </div>
    </div>
	</body>
</html>

