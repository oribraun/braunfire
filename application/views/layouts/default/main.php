<?php
/* @var $this MY_Controller */
/* @var $page_data stdClass */
/* @var $current_page string */

if (!isset($current_page)){
	$current_page = '';
}


?>
<!DOCTYPE html>
<html lang="he" ng-app="basic">
<head>
	<?= $this->load->view('components/html_head') ?>
	<style>
		html {
			font-family: avenir,"Times New Roman",Georgia,Serif;
		}
	</style>
</head>
<body id="body" class="content">
	<div class="row">
		<div class="container main-content-container av-header">
			<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background:#fff; border-color:#eee;">
				<div class="container" style="padding-left: 0;">
					<div class="navbar-header navbar-right">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="margin: 20px;">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="<?= base_url() ?>">
							<img style="max-width: 220px; margin: 0 20px;" class="img-responsive" src="">
						</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="<?= ($current_page=='home' ? 'active' : '')?>" ><a href="<?= base_url(); ?>">Home</a></li>
							<li class="<?= ($current_page=='projects' ? 'active' : '')?>"><a  href="<?= base_url('projects'); ?>">Apartments</a></li>
							<li class="<?= ($current_page=='property_managment' ? 'active' : '')?>"><a  href="<?= base_url('property_managment'); ?>">Property Managment</a></li>
							<li class="<?= ($current_page=='about' ? 'active' : '')?>"><a  href="<?= base_url('about'); ?>">About Us</a></li>
							<li class="<?= ($current_page=='article' ? 'active' : '')?>"><a  href="<?= base_url('article'); ?>">Articles</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container" style="margin:0 auto; margin-top:100px;">
		<?= $page_data->content ?>
	</div>
	<div class="col-xs-12">
		<div class="my-footer">
			<div class="container">
				<? $this->load->view('components/footer') ?>
			</div>
		</div>
	</div>
</body>
</html>
