<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - Login</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/index.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/notifications.css');?>" />
    <script src="<?=base_url('assets/js/jquery-3.3.1.js');?>"></script>
</head>
<body>
	<div class="container">
		<div class="overlay">
			<div class="bg-blue-1"></div>
		</div>

		<div class="help">
			<a href="#" class="btn btn-link">Need help?</a>
		</div>

		<div class="content">
			<div class="content-left bg-blue-1">
				<div class="header">
					<h1>B</h1>
					<h2>Bourgeoisie</h2>
					<p>The world's best POS system that you can imagine.</p>
				</div>
			</div>
			<div class="content-right bg-white-1">
				<div class="header">
					<h3>Login your account</h3>
					<p>We are glad to see you again.</p>
				</div>
				<form action="<?=site_url('accounts/login'); ?>" class="form-login" method="POST">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" placeholder="@johndoe12" />
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" placeholder="Enter your password" />
					</div>

					<div class="align-right">
						<a href="<?=site_url('/register'); ?>" class="btn btn-link">Don&apos;t have an account?</a>
					</div>
					<input type="submit" class="btn btn-block btn-submit btn-blue-dark" name="btn-submit" value="Sign in" />
				</form>
			</div>
		</div>
	</div>

	<!-- START OF NOTIFICATION -->

    <div class="notification">
		<div class="notification-wrapper">
			<div class="notification-container notification-fade-in">
				<div class="notification-header">
					<span class="notification-close notification-close-button">&times;</span>
					<div class="notification-header-content">
						<h2 class="notification-title">Awesome.</h2>
						<p class="notification-message">You have successfully created an account!</p>
					</div>
				</div>
				<div class="notification-body">
					<input type="button" class="notification-button notification-close-button" value="okay" />
				</div>
			</div>
		</div>
    </div>
    
    <!-- END OF NOTIFICATION -->
</body>
<script type="text/javascript" src="<?=base_url('assets/js/notifications.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(() => {
		$(document).on('click', '.btn-submit', (e) => {
			e.preventDefault();
			$.ajax({
				url: '<?=site_url("accounts/login"); ?>',
				method: 'POST',
				data: $('.form-login').serialize(),
				dataType: 'json',
				success: function(data) {
					if (!data.success)
						open_notification("Oops! Something went wrong.", data.response, false, 1);
					else
						window.location.href = "<?=site_url('/dashboard'); ?>";
				}
			});
		});
	});
</script>
<?php 

if (isset($_SESSION['error']))
	echo '<script>open_notification("Oops! Something went wrong.", "'.$_SESSION['error'].'", false, 1);</script>';

?>
</html>