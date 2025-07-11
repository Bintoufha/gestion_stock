<!-- header -->
<?php $this->view("partials/header") ?>
<!-- header -->

<body class="account-page">
	<div id="global-loader">
		<div class="whirly-loader"> </div>
	</div>
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<div class="login-wrapper bg-img">
				<div class="login-content">
					<form action="<?= ROOT ?>/Logins/auth" method="POST">
						<div class="login-userset">
							<div class="login-logo logo-normal">
								<img src="<?= ROOT ?>/assets/img/logo.png" alt="img">
							</div>
							<a href="index.html" class="login-logo logo-white">
								<img src="<?= ROOT ?>/assets/img/logo-white.png" alt="">
							</a>
							<div class="login-userheading">
								<h3>Authentication de Utilisateurs</h3>
							</div>
							<?php $this->view("set_flash"); ?>
							<div class="form-login mb-3">
								<label class="form-label">Email de utilisateur</label>
								<div class="form-addons">
									<input type="email" name="email" class="form- control">
									<img src="<?= ROOT ?>/assets/img/icons/mail.svg" alt="img">
								</div>
							</div>
							<div class="form-login mb-3">
								<label class="form-label">Mot de passe utilisateur</label>
								<div class="pass-group">
									<input type="password" name="pwd" class="pass-input form-control">
									<span class="fas toggle-password fa-eye-slash"></span>
								</div>
							</div>
							<div class="form-login authentication-check">
								<div class="row">
									<div class="col-12 d-flex align-items-center justify-content-between">
										<div class="custom-control custom-checkbox">
											<label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
												<input type="checkbox" class="form-control">
												<span class="checkmarks"></span>Remember me
											</label>
										</div>
										<div class="text-end">
											<a class="forgot-link" href="forgot-password.html">Forgot Password?</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-login">
								<button type="submit" name="connexion" class="btn btn-login">Connexion</button>
							</div>

							<div class="form-sociallink">
								<ul class="d-flex">
									<li>
										<a href="javascript:void(0);" class="facebook-logo">
											<img src="<?= ROOT ?>/assets/img/icons/facebook-logo.svg" alt="Facebook">
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<img src="<?= ROOT ?>/assets/img/icons/google.png" alt="Google">
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="apple-logo">
											<img src="<?= ROOT ?>/assets/img/icons/apple-logo.svg" alt="Apple">
										</a>
									</li>

								</ul>
								<div class="my-4 d-flex justify-content-center align-items-center copyright-text">
									<p>Copyright &copy; 2023 DreamsPOS. All rights reserved</p>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="login-img">
					<img src="<?= ROOT ?>/Images/img1.png" alt="img">
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- footer -->
	<?php $this->view("partials/footer") ?>
	<!-- /footer -->
</body>

</html>