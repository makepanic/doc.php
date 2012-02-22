<?php
$template='<html lang="de">
	<head>
		<meta charset="utf-8" /> 
		<title>%%PAGETITLE%%</title>
		<link rel="stylesheet" type="text/css" title="" media="all" href="./style.css" />
	</head>
	<body>
		<div class="top full dark">
			<div class="wrapper">
				<h1>doc.php</h1>
				<a class="git" href="https://github.com/makepanic/doc.php">@github</a>
				<ul class="tree">
					%%NAVIGATION%%
				</ul>
			</div>
		</div>
		<div class="full back">
			<div class="wrapper">
				<div class="page">%%TEXT%%</div>
			</div>
		</div>
	</body>
</html>
';
?>
