<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('templates/head.php') ?>
</head>

<body>
	<main class="flex-shrink-0">
		<nav class="navbar-dark bg-dark">
			<?php $this->load->view('important/navbar.php') ?>
		</nav>
		<?php $this->load->view('public/index')?>
		<?php $this->load->view('important/footer.php') ?>
	</main>
	<?php $this->load->view('templates/js.php') ?>
</body>

</html>