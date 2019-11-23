<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - Register</title>
    
    <link rel="stylesheet" href="<?=base_url('assets/css/register.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/notifications.css');?>" />
    <script src="<?=base_url('assets/js/jquery-3.3.1.js');?>"></script>
</head>
<body>
	<div class="container">
		<div class="overlay overlay-register">
			<div class="bg-blue-1"></div>
		</div>

		<div class="help">
			<a href="#" class="btn btn-link">Need help?</a>
		</div>

		<div class="content content-register">
			<div class="content-right bg-white-1">
				<div class="header">
					<h3>Create your account</h3>
					<p>It is easy and free to do so.</p>
				</div>
				<form action="<?=site_url('accounts/register'); ?>" class="form-register" method="POST">
					<div class="form-slide">
						<h5>Basic Information</h5>
						<div class="form-grid-2">
							<div class="form-group">
								<label for="firstname">Firstname</label>
								<input type="text" id="firstname" name="firstname" placeholder="Eg. John" />
							</div>
							<div class="form-group">
								<label for="lastname">Lastname</label>
								<input type="text" id="lastname" name="lastname" placeholder="E.g Doe" />
							</div>
						</div>
						<div class="form-group-radio">
							<label class="title">Sex</label>
							<div class="form-grid-2">
								<input type="radio" name="sex" id="male" value="1" checked />
								<label for="male">
									<div class="material-radio-button">
										<div class="radio-button"></div>
										<span class="radio-text">Male</span>
									</div>
								</label>
								<input type="radio" name="sex" id="female" value="0" />
								<label for="female">
									<div class="material-radio-button">
										<div class="radio-button"></div>
										<span class="radio-text">Female</span>
									</div>
								</label>
							</div>
						</div>

						<div class="align-right">
							<input type="button" class="btn btn-seagreen" onclick="show(1)" name="" value="Next" />
						</div>
					</div>
					<div class="form-slide">
						<h5>Account Information</h5>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" id="username" name="username" placeholder="@johndoe12" />
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" name="password" placeholder="Enter your password" />
						</div>

						<div class="align-right">
							<input type="button" class="btn btn-teal" onclick="show(0)" name="" value="Back" />
							<input type="submit" class="btn btn-blue-dark btn-submit" name="btn-submit" value="Sign up" />
						</div>
					</div>
				</form>
			</div>
			<div class="content-left bg-blue-1">
				<div class="header">
					<h1>B</h1>
					<h2>Bourgeoisie</h2>
					<p>Create your account and get started.</p>
				</div>
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
<script type="text/javascript">
	const forms = document.querySelectorAll('.form-slide');

	function show(i) {
		forms.forEach((form) => {
			form.style.display = "none";
		});

		var index = i;
		forms[i].style.display = "block";
	}

	show(0);
	$(document).ready(() => {
		$(document).on('click', '.btn-submit', (e) => {
			e.preventDefault();
			$.ajax({
				url: '<?=site_url("accounts/register"); ?>',
				method: 'POST',
				data: $('.form-register').serialize(),
				dataType: 'json',
				success: function(data) {
					if (!data.success)
						open_notification("Oops! Something went wrong.", data.response, false, 1);
					else
						window.location.href = "<?=site_url(); ?>";
				}
			});
		});
	});
</script>
<script type="text/javascript" src="<?=base_url('assets/js/notifications.js'); ?>"></script>
</html>