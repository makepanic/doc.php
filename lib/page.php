<?php
$template='<html lang="de">
	<head>
		<meta charset="utf-8" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>%%PAGETITLE%%</title>
		<link rel="stylesheet" type="text/css" title="" media="all" href="%%STYLE%%" />
		%%HEAD%%
	</head>
	<body class="%%THEME%%bg">
		<div class="top full %%THEME%%">
			<div class="wrapper">
				<h1>%%DOCTITLE%%</h1>
				<ul class="tree">
					%%NAVIGATION%%
				</ul>
			</div>
		</div>
		<div class="full back">
			<div class="wrapper">
				<div class="page">%%TEXT%%</div>
				<a class="git" href="https://github.com/makepanic/doc.php">doc.php on github</a>
			</div>
		</div>
		<script src="%%SCRIPT%%"></script>
	</body>
</html>
';
?>
