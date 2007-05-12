<?php
include "auth.php";
require_once '../protected/conn.php';
if($_COOKIE['access']=='sadmin' OR $_COOKIE['access']=='admin')
{}
else
{	echo"<span class=\"header\">You are not authorised to view this Page. You are being redirected to the login page</span>";
	echo"<br>If your browser doesn't support redirection, Click <a href=\"index.php\">Here</a> to go...";
	echo"<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Modifying Data...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Layout2, 404 creative studios" />
<meta name="description" content="simple css driven layout" />
<link href="intrastyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
_editor_url = "HTMLArea/";
_editor_lang = "en";
</script>
<script type="text/javascript" src="HTMLArea/htmlarea.js"></script>
<script type="text/javascript">
HTMLArea.loadPlugin("ImageManager");
var editor = null;
function initEditor() {
  // create an editor for the "ta" textbox
  editor = new HTMLArea("thedata");
  editor.registerPlugin(ImageManager);
  editor.generate();
  return false;
}
</script>
</head>
<body onload="initEditor()">
<div id="container">
	<!-- begin top rounded corner styles -->
	<b class="rtop"><b class="r1"></b><b class="r2"></b> <b class="r3"></b> <b class="r4"></b></b>
	<!-- end top rounded corner styles -->
	<div id="pageHeader"><img src="header.gif"></div>
	<div id="divPageContent">
		<table border="0" cellpadding="5" cellspacing="0">
			<tr>
					<td valign="top" class="leftColumn">
						<div id="sideBarNews">
							<br>
							<div id="newsHeader">News</div>
							<div id="sideBarNewsContent">
								<div class="newsItem">MNIT Intranet launched on 30th August!</div>
								<div class="readNewsLink"><a href="index.php">Read More</a></div>
								<div class="newsItem">Documentation released for the Intranet! In-Depth Tutorials, How-To's and inside developer's views Included!</div>
								<div class="readNewsLink"><a href="index.php">Go to the IntraDocs</a></div>
								<div class="newsItem">Need Help on some particular feature or service of the Intranet? Contact the Webmaster or any SysAdmin NOW!</div>
								<div class="readNewsLink"><a href="index.php">Contact Support</a></div>
							</div>
						</div>
					</td>
					<td valign="top" class="rightColumn" width="100%">
						<br>
						<p class="subHeader">You are editing Node: <?php echo $_REQUEST['node']?> ParaNo.: <?php echo $_REQUEST['pid']?> in table: <?php echo $_REQUEST['tab'] ?></p>
						<?php
									$squery = mysql_query("SELECT data FROM info_".$_REQUEST['tab']." WHERE sectionid=".$_REQUEST['node']." AND paraid='".$_REQUEST['pid']."'");
									$storeit = mysql_fetch_assoc($squery);
									$stored = $storeit['data'];
						?>
						<form action="domodify.php?tab=<?php echo $_REQUEST['tab']?>&node=<?php echo $_REQUEST['node']?>" method="post">
						<textarea id="thedata" name="thedata" cols=100 rows=20><?php echo $stored?>
						</textarea>
						<input type="submit" value="Publish Changes!"></input>
						<input type="reset" value="Reset text!"></input>
						<input type="hidden" value="<?php echo $_REQUEST['pid']?>" name="pid"></input>
						<a href="cms.php">Forget it and go back to CMS! </a>&nbsp;&nbsp;
						<a href="intrahome.php">Go back to Intranet Home! </a>
						</form>
				</td>
			</tr>
		</table>
	</div>
	<div id="divBaseLinks"><a href="../index.php">MNIT Home</a> | <a href="../sitemap.php">Sitemap</a></div>
	<!-- begin bottom rounded corner styles -->
	<b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b>
	<!-- end bottom rounded corner styles -->
</div> 
<div class="spacer">&nbsp;</div>
</body>
</html>