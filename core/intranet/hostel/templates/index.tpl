<html>
<head>
<link rel="stylesheet" type="text/css" href="academic.css" />
<title>{$global_title}</title>
</head>
<body>
<div id="thetop">
</div>
<div id="container">
  <div id="main">
    <div id="logo">
      <h1>{$root_name}</h1>
      <br>
      <p>{html_image file=$root_logo width=150 height=143}<br>
        <br>
        {$root_title} </p>
    </div>
    <div id="intro">
      <h2>{$main_title1}</h2>
      <p align="justify">{$main_content1}</p>
    </div>
    <div id="intro">
      <h2>{$main_title2}</h2>
      <p>{$cook_name}<br />
        {$ud_acc}<br />
        {$cook_type|capitalize} </p>
    </div>
    <div class="clear">&nbsp;</div>
  </div>
  <div id="sidebar">
    <h2 class="sidelink menuheader">{$side_title}</h2>
    {foreach from=$side_link item=curr_data} <a class="sidelink" href="{$curr_data.url}">{$curr_data.name}</a> {/foreach}       </div>
<div class="clear">&nbsp;</div>
</div>
<div id="footer">&copy; 2005 {$global_iname}</div>
</body>
</html>
