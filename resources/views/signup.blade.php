<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minat Bakery - OC</title>
    <meta name="description" content="A modern CRM Dashboard Template with reusable and flexible components for your SaaS web applications by hencework. Based on Bootstrap."/>
    
	<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <base href="/public">
  @include('css')
</head>
<body>
   	<!-- Wrapper -->
	<div class="hk-wrapper hk-pg-auth" data-footer="simple">
		<!-- Main Content -->
		<div class="hk-pg-wrapper pt-0 pb-xl-0 pb-5">
			<div class="hk-pg-body pt-0 pb-xl-0">
				<!-- Container -->
				<div class="container-xxl">
					<!-- Row -->
					<div class="row">
						<div class="col-sm-10 position-relative mx-auto">
							<div class="auth-content py-8">
								<form class="w-100" method="POST" action="{{ route('register') }}">
                                @csrf
									<div class="row">
										<div class="col-xxl-5 col-xl-7 col-lg-8 col-sm-10 mx-auto">
											
											<div class="card card-border">
												<div class="card-body">
													<h4 class="text-center mb-0">Sign Up to Minat Bakery E-Learning</h4>
													<p class="p-xs mt-2 mb-4 text-center">Already a member ? <a href="{{url('signin')}}"><u>Sign In</u></a></p>
													<button class="btn btn-outline-dark btn-rounded btn-block mb-3"><span><span class="icon"><i class="fab fa-google"></i></span><span>Sign Up with Gmail</span></span></button>
													<button class="btn btn-social btn-social-facebook btn-rounded btn-block"><span><span class="icon"><i class="fab fa-facebook"></i></span><span>Sign Up with Facebook</span></span></button>
													<div class="title-sm title-wth-divider divider-center my-4"><span>Or</span></div>
													<div class="row gx-3">
														<div class="form-group col-lg-6">
															<label class="form-label">Name</label>
															<input class="form-control" placeholder="Enter your name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
														</div>
														
														<div class="form-group col-lg-6">
															<label class="form-label">Email</label>
															<input class="form-control" placeholder="Enter your email id" type="email" name="email" :value="old('email')" required>
														</div>
														<div class="form-group col-lg-6">
															<label class="form-label">Password</label>
															<div class="input-group password-check">
																<span class="input-affix-wrapper affix-wth-text">
																	<input class="form-control" placeholder="6+ characters" type="password" name="password" required autocomplete="new-password">
																	<a href="#" class="input-suffix text-primary text-uppercase fs-8 fw-medium">
																		<span>Show</span>
																		<span class="d-none">Hide</span>
																	</a>
																</span>
															</div>
														</div>
                                                        <div class="form-group col-lg-6">
															<label class="form-label">Confirm Password</label>
															<div class="input-group password-check">
																<span class="input-affix-wrapper affix-wth-text">
																	<input class="form-control" placeholder="6+ characters" type="password" name="password_confirmation" required autocomplete="new-password">
																	<a href="#" class="input-suffix text-primary text-uppercase fs-8 fw-medium">
																		<span>Show</span>
																		<span class="d-none">Hide</span>
																	</a>
																</span>
															</div>
														</div>
													</div>
													<div class="form-check form-check-sm mb-3">
														<input type="checkbox" class="form-check-input" id="logged_in" checked>
														<label class="form-check-label text-muted fs-8" for="logged_in">By creating an account you specify that you have read and agree with our <a href="#">Tearms of use</a> and <a href="#">Privacy policy</a>. We may keep you inform about latest updates through our default <a href="#">notification settings</a></label>
													</div>
													<button class="btn btn-primary btn-uppercase btn-block"> {{ __('Register') }}</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /Row -->
				</div>
				<!-- /Container -->
			</div>
			<!-- /Page Body -->

			<!-- Page Footer -->
			<div class="hk-footer border-0">
				<footer class="container-xxl footer">
					<div class="row">
						<div class="col-xl-8 text-center">
							<p class="footer-text pb-0"><span class="copy-text">Minat Bakery E-Learning © 2022 All rights reserved.</span></p>
						</div>
					</div>
				</footer>
			</div>
			<!-- / Page Footer -->
		
		</div>
		<!-- /Main Content -->
	</div>
    <!-- /Wrapper -->

	<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
   	<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FeatherIcons JS -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Simplebar JS -->
	<script src="vendors/simplebar/dist/simplebar.min.js"></script>
	
	<!-- Init JS -->
	<script src="dist/js/init.js"></script>
</body>
</html>