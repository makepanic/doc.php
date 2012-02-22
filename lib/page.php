<?php
$template='<html>
<head>
<title>%%PAGETITLE%%</title>
	<link rel="stylesheet" type="text/css" title="" media="all" href="./style.css" />
</head>
<body>
<div id="wrapper">
	<div id="topNav">
		<h2>doc.php</h2>
		<div class="rightSide">
			<ul class="tree">
				%%NAVIGATION%%
			</ul>
		</div>
	</div>
	<div id="subtleBox">
		<a href="#">@github</a>
		<div class="rightSide">
			<a href="#" title="vorheriger Eintrag" class="left">&laquo; prev</a>
			<a href="#" title="nächster Eintrag" class="right">next &raquo;</a>
		</div>
	</div>
	<div id="content">
		<div class="rightSide">
			%%TEXT%%
		</div>
	</div>
</div>
</body>
</html>
';
?>