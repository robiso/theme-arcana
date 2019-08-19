<?php
global $Wcms;
?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?= strip_tags($Wcms->get('config', 'siteTitle')) ?> - <?= $Wcms->page('title') ?></title>
        <meta name="description" content="<?= $Wcms->page('description') ?>">
        <meta name="keywords" content="<?= $Wcms->page('keywords') ?>">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?= $Wcms->asset('assets/css/main.css') ?>" />

		<?php if($Wcms->loggedIn) { ?>
			<link rel="stylesheet" href="<?= $Wcms->asset('assets/css/adminPanel.bootstrap.min.css') ?>" />
			<link rel="stylesheet" href="<?= $Wcms->asset('assets/css/node-editor.bootstrap.min.css') ?>" />
			<link rel="stylesheet" href="<?= $Wcms->asset('assets/css/note-popover.bootstrap.min.css') ?>" />
		<?php } ?>
		<?php
		if(isset($Wcms->get("config")->background) && !empty($Wcms->get("config")->background)) {
			$bg = $Wcms->get("config")->background;
			echo "<style>#banner { background-image: url('data/files/$bg'); }</style>";
		}
		?>
		<?= $Wcms->css() ?>
	</head>
	<body class="is-preload">
        <?= $Wcms->alerts() ?>
        <?= $Wcms->settings() ?>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Logo -->
						<h1><a href="<?=$Wcms->url()?>" id="logo"><?= $Wcms->get('config', 'siteTitle') ?></a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<?= $Wcms->menu() ?>
							</ul>
						</nav>

				</div>

			<?php if($Wcms->currentPage == $Wcms->get("config")->defaultPage): ?>

			<!-- Banner -->
				<section id="banner">
					<header>
						<h2><?=getEditableArea("header_title", 'Arcana: <em>A responsive site template freebie by <a href="http://html5up.net">HTML5 UP</a></em>')?></h2>
							<?=getEditableArea("header_subtitle", '<a href="#" class="button">Learn More</a>')?>
					</header>
				</section>

			<!-- Highlights -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<?=getEditableArea("highlights1_fa", '<i class="icon solid major fa-paper-plane"></i>')?>
									<h3><?=getEditableArea("highlights1_ti", 'This Is Important')?></h3>
									<p><?=getEditableArea("highlights1_st", 'Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu.')?></p>
								</div>
							</section>
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<?=getEditableArea("highlights2_fa", '<i class="icon solid major fa-pencil-alt"></i>')?>
									<h3><?=getEditableArea("highlights2_ti", 'Also Important')?></h3>
									<p><?=getEditableArea("highlights2_st", 'Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu.')?></p>
								</div>
							</section>
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<?=getEditableArea("highlights3_fa", '<i class="icon solid major fa-wrench"></i>')?>
									<h3><?=getEditableArea("highlights3_ti", 'Probably Important')?></h3>
									<p><?=getEditableArea("highlights3_st", 'Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu.')?></p>
								</div>
							</section>
						</div>
					</div>
				</section>

				<hr>

			<?php endif; ?>

			<!-- Main -->
				<section class="wrapper style1">
					<div class="container">
						<div id="content">

							<!-- Content -->

								<article>
									<?= $Wcms->page('content') ?>
								</article><br><br>

						</div>
					</div>
				</section>

			<!-- CTA -->
				<section id="cta" class="wrapper style3">
					<div class="container">
						<header>
							<h2><?=getEditableArea("cta_title", "Are you ready to continue your quest?")?></h2>
							<?=getEditableArea("cta_subtitle", '<a href="#" class="button">Insert Coin</a>')?>
						</header>
					</div>
				</section>

			<!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row">
							<section class="col-3 col-6-narrower col-12-mobilep">
								<?=getEditableArea("footer1", '<h3>Links to Stuff</h3>
								<ul class="links">
									<li><a href="#">Mattis et quis rutrum</a></li>
									<li><a href="#">Suspendisse amet varius</a></li>
									<li><a href="#">Sed et dapibus quis</a></li>
									<li><a href="#">Rutrum accumsan dolor</a></li>
									<li><a href="#">Mattis rutrum accumsan</a></li>
									<li><a href="#">Suspendisse varius nibh</a></li>
									<li><a href="#">Sed et dapibus mattis</a></li>
								</ul>')?>
							</section>
							<section class="col-3 col-6-narrower col-12-mobilep">
								<?=getEditableArea("footer2", '<h3>More Links to Stuff</h3>
								<ul class="links">
									<li><a href="#">Duis neque nisi dapibus</a></li>
									<li><a href="#">Sed et dapibus quis</a></li>
									<li><a href="#">Rutrum accumsan sed</a></li>
									<li><a href="#">Mattis et sed accumsan</a></li>
									<li><a href="#">Duis neque nisi sed</a></li>
									<li><a href="#">Sed et dapibus quis</a></li>
									<li><a href="#">Rutrum amet varius</a></li>
								</ul>')?>
							</section>
							<section class="col-6 col-12-narrower">
								<?=getEditableArea("footer3", '<h3>Get In Touch (this is a good place for a contact form)</h3>
								<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique alias perspiciatis voluptate corporis expedita accusantium eligendi nam, aspernatur, amet autem sapiente vero id quia repellendus deserunt enim iusto. Incidunt, vel.</div><div>Cupiditate enim quod, reprehenderit laborum voluptate tenetur velit assumenda nihil maiores veritatis blanditiis minus non recusandae libero nam expedita nostrum est distinctio doloribus dignissimos praesentium in molestias. Dolore vitae, modi?</div><div>Quod aperiam, quam aspernatur sint obcaecati veniam cumque ipsam aut et nobis non similique ducimus, nostrum iusto natus pariatur. Consequatur unde qui excepturi quasi provident itaque nisi ex perferendis, ducimus.</div>')?>

							</section>
						</div>
					</div>

					<!-- Icons -->
						<ul class="icons">
							<?=getEditableArea("social", '<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
							<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
							<li><a href="#" class="icon brands fa-google-plus-g"><span class="label">Google+</span></a></li>')?>
						</ul>

					<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li><?= $Wcms->footer() ?></li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>

				</div>

		</div>

		<!-- Scripts -->
			<script src="<?= $Wcms->asset('assets/js/jquery.min.js') ?>"></script>
			<script src="<?= $Wcms->asset('assets/js/jquery.dropotron.min.js') ?>"></script>
			<script src="<?= $Wcms->asset('assets/js/browser.min.js') ?>"></script>
			<script src="<?= $Wcms->asset('assets/js/breakpoints.min.js') ?>"></script>
			<script src="<?= $Wcms->asset('assets/js/util.js') ?>"></script>
			<script src="<?= $Wcms->asset('assets/js/main.js') ?>"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" type="text/javascript"></script>
			<?= $Wcms->js() ?>
	</body>
</html>
