<?php
use Config\Services;

helper( 'deployment' );

/**
 * @var \CodeIgniter\View\View $this
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= Services::language()->getLocale() ?>">
<head>
	<meta charset="utf-8"></meta>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"></meta>
	<meta name="description" content=""></meta>
	<meta name="author" content="Jan Zelenka"></meta>
	<link rel="manifest" href="/manifest.json"></link>
	<meta name="theme-color" content="#ffffff"></meta>

	<title><?= $pageTitle ?? lang( 'Site.title' ) ?></title>
	<?= $this->include( 'Include/standard_css' ) ?>
	<?= $this->renderSection( 'styles') ?>
</head>
<body>
	<main role="main" class="container-fluid">
		<?= $this->renderSection( 'dialogs' ) ?>
		<?= $this->include( 'Include/part_navigation_top' ) ?>
		<?= $this->renderSection( 'main' ) ?>
	</main><!-- /.container -->

	<?= $this->include( 'Include/standard_js' ) ?>
    <?= $this->include( 'Include/FactionGuard_js' ) ?>
	<?= $this->renderSection( 'scripts' ) ?>
	<?= $this->include( 'Include/part_navigation_top_js' ) ?>
</body>
</html>