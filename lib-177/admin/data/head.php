<!DOCTYPE html>
<html xml:lang="fr" lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" media="screen" type="text/css" title="skinMinified" href="library/css/Minify.css">
	<link rel="shortcut icon" href="library/img/favicon2.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=0.5">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--><?php
	if(isset($metaSup))echo $metaSup;
	if(isset($url))echo '
	<link rel="canonical" href="'.Config::domaine().'/'.$url.'">';
	if(isset($meta_desc))echo '
	<meta name="description" content="'.$meta_desc.'">';
	if(isset($meta_title))echo '
	<title>'.$meta_title.'</title>';
	if($_SERVER["SERVER_PORT"] == 443)
	header("X-Robots-Tag: noindex, nofollow", true); ?>
</head>
<body id="bodyPrimaire">
<!-- google_ad_section_start(weight=ignore) -->
<header>
	<div id="logo177">
		<div id="grd_c1">
			<div class="grd_r1" id="grain177_1"></div>
			<div class="v_8">
				<div class="grd_r2" id="grain177_2"></div>
				<div class="v_7">
					<div class="pti_r2" id="grain177_3"></div>
				</div>
				<div class="pti_c">
				</div>
				<div class="v_6">
					<div class="pti_r1" id="grain177_4"></div>
					<div class="v_8">
						<div class="pti_r2" id="grain177_5"></div>
					</div>
				</div>
				<div class="v_8">
					<div class="v_6">
						<div class="min_c"></div>
					</div>
					<div class="v_5">
						<div class="v_6">
							<div class="pti_r2" id="grain177_6"></div>
						</div>
						<div class="pti_r1" id="grain177_7"></div>
					</div>
				</div>
				<div class="v_8">
					<div class="pti_r1" id="grain177_8"></div>
				</div>
			</div>
		</div>
		<div id="grd_c2">
			<div class="grd_c"></div>
			<div class="v_5">
				<div class="v_6">
					<div class="grd_r1" id="grain177_9">
					</div>
				</div>
				<div class="v_8">
					<div class="grd_r2" id="grain177_10"></div>
				</div>
				<div class="v_7">
					<div class="v_5">
						<div class="pti_r1" id="grain177_11"></div>
					</div>
					<div class="mid_c">
						<div class="pti_r2" id="grain177_12"></div>
						<div class="v_8">
							<div class="pti_r2" id="grain177_13"></div>
						</div>
						<div class="v_6">
							<div class="pti_r2" id="grain177_14"></div>
						</div>
					</div>
					<div class="v_8">
						<div class="pti_r1" id="grain177_15"></div>
					</div>
				</div>
			</div>
			<div class="v_6">
				<div class="v_8">
					<div class="pti_r2" id="grain177_16"></div>
				</div>
				<div class="pti_r2" id="grain177_17"></div>
				<div class="v_7" id="grain177_18">
					<div class="pti_r2" id="grain177_19"></div>
				</div>
				<div class="v_5">
					<div class="pti_r2" id="grain177_20"></div>
					<div class="v_6">
						<div class="v_8">
							<div class="pti_r2" id="grain177_21"></div>
						</div>
						<div class="pti_r2" id="grain177_22"></div>
						<div class="v_7">
							<div class="pti_r2" id="grain177_23"></div>
						</div>
						<div class="v_5">
							<div class="pti_r2" id="grain177_24"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="index" id="titreLogo177">177</a>
	</div><br>
	<nav id="speedAcces">
		<a href="explore" id="topLeft">Explore</a>
		<a href="fragment" id="topRight">Fragments</a>
		<a href="../lib177/entropyx" id="left">Entropyx</a>
		<a href="../lib177/Rss" id="right">Rss reader</a>
		<a href="../lib177/manuel" id="midRight">manuel</a>
		<a href="../lib177/chronos" id="midLeft">chronos</a>
		<a href="index" id="bot">Admin</a>
	</nav>
</header>
<a href="#" id="colorSelector" class="configStyle"></a>
<!-- google_ad_section_end(weight=ignore) -->
<!-- google_ad_section_start -->
<?php
if(!empty($other['titre']))
	echo '<h2 class="ongletTitre">'.$other['titre'].'</h2><section class="corp">'; ?>