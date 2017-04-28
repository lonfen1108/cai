@extends('layouts.app')

@section('htmlheader_title')
	Service
@endsection

@section('main-content')
<!-- modal -->
	<div class="modal about-modal w3-agileits fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body login-page "><!-- login-page -->
									<div class="login-top sign-top">
										<div class="agileits-login">
										<h5>Login</h5>
										<form action="#" method="post">
											<input type="email" class="email" name="Email" placeholder="Email" required=""/>
											<input type="password" class="password" name="Password" placeholder="Password" required=""/>
											<div class="wthree-text">
												<ul>
													<li>
														<label class="anim">
															<input type="checkbox" class="checkbox">
															<span> Remember me ?</span>
														</label>
													</li>
													<li> <a href="#">Forgot password?</a> </li>
												</ul>
												<div class="clearfix"> </div>
											</div>
											<div class="w3ls-submit">
												<input type="submit" value="LOGIN">
											</div>
										</form>

										</div>
									</div>
						</div>
				</div> <!-- //login-page -->
			</div>
		</div>
	<!-- //modal -->
	<!-- modal -->
	<div class="modal about-modal w3-agileits fade" id="myModal3" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body login-page "><!-- login-page -->
									<div class="login-top sign-top">
										<div class="agileits-login">
										<h5>Register</h5>
										<form action="#" method="post">
											<input type="text" name="Username" placeholder="Username" required=""/>
											<input type="email"  name="Email" placeholder="Email" required=""/>
											<input type="password" name="Password" placeholder="Password" required=""/>
											<div class="wthree-text">
												<ul>
													<li>
														<label class="anim">
															<input type="checkbox" class="checkbox">
															<span> I accept the terms of use</span>
														</label>
													</li>
												</ul>
												<div class="clearfix"> </div>
											</div>
											<div class="w3ls-submit">
												<input type="submit" value="Register">
											</div>
										</form>

										</div>
									</div>
						</div>
				</div> <!-- //login-page -->
			</div>
		</div>
	<!-- //modal -->
<!-- banner -->
<div class="inner-banner-agileits-w3layouts">
</div>
<!-- //banner -->
<!-- breadcrumbs -->
<div class="w3l_agileits_breadcrumbs">
   <div class="container">
		<div class="w3l_agileits_breadcrumbs_inner">
			<ul>
				<li><a href="main.html">Home</a><span>«</span></li>

				<li>Services</li>
				</ul>
		</div>
	</div>
</div>
<!-- //breadcrumbs -->
<!-- services -->
<div class="services-w3-agileits">
	<div class="container">
	<h4 class="tittle-w3layouts">Providing total healthcare solutions<h4>
		<div class="services-grids">
			<i class="fa fa-heart" aria-hidden="true"></i>
			<h4>Cardiology</h4>
			<p>Vivamus fermentum ex quis imperdiet sodales.</p>
		</div>
		<div class="services-grids">
			<i class="fa fa-medkit" aria-hidden="true"></i>
			<h4>Dental care</h4>
			<p>Vivamus fermentum ex quis imperdiet sodales.</p>
		</div>
		<div class="services-grids">
			<i class="fa fa-wheelchair" aria-hidden="true"></i>
			<h4>Neurology</h4>
			<p>Vivamus fermentum ex quis imperdiet sodales.</p>
		</div>
		<div class="services-grids">
			<i class="fa fa-user-md" aria-hidden="true"></i>
			<h4>Cosmetic Solutions</h4>
			<p>Vivamus fermentum ex quis imperdiet sodales.</p>
		</div>
		<div class="services-grids">
			<i class="fa fa-user" aria-hidden="true"></i>
			<h4>ENT treatment</h4>
			<p>Vivamus fermentum ex quis imperdiet sodales.</p>
		</div>
		<div class="services-grids">
			<i class="fa fa-ambulance" aria-hidden="true"></i>
			<h4>Additional treatments</h4>
			<p>Vivamus fermentum ex quis imperdiet sodales.</p>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //services -->
@endsection