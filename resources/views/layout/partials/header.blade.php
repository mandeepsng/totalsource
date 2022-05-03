<?php error_reporting(0);?>
<!-- Loader -->
@if(Route::is(['map-grid','map-list']))
<div id="loader">
		<div class="loader">
			<span></span>
			<span></span>
		</div>
	</div>
	@endif
	<!-- /Loader  -->
<div class="main-wrapper">
<!-- Header -->
<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
						<li class="has-submenu <?php if($page=="index" || $page=="index-1" || $page=="index-2" || $page=="index-3" || $page=="index-5"|| $page=="index-4" || $page=="index-6" || $page=="index-7" || $page=="index-8") { echo 'active'; } ?>">
								<a href="">Home <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
								<li class="<?php if($page=="index") { echo 'active'; } ?>">
								<a href="index">Home</a>
							    </li>
								<li class="<?php if($page=="index-1") { echo 'active'; } ?>"><a href="index-1">Home 1</a></li>
								<li class="<?php if($page=="index-2") { echo 'active'; } ?>"><a href="index-2">Home 2</a></li>
								<li class="<?php if($page=="index-3") { echo 'active'; } ?>"><a href="index-3">Home 3</a></li>
								<li class="<?php if($page=="index-4") { echo 'active'; } ?>"><a href="index-4">Home 4</a></li>
								<li class="<?php if($page=="index-5") { echo 'active'; } ?>"><a href="index-5">Home 5</a></li>
								<li class="<?php if($page=="index-6") { echo 'active'; } ?>"><a href="index-6">Home 6</a></li>
								<li class="<?php if($page=="index-7") { echo 'active'; } ?>"><a href="index-7">Home 7</a></li>
								<li class="<?php if($page=="index-8") { echo 'active'; } ?>"><a href="index-8">Home 8</a></li>
								</ul>
							</li>
							<li class="has-submenu <?php if($page=="review" || $page=="register" || $page=="doctor-dashboard" || $page=="appointments" || $page=="schedule-timings" || $page=="my-patients" || $page=="patient-profile" || $page=="chat-doctor" || $page=="invoices" || $page=="doctor-profile-settings" || $page=="doctor-add-blog" || $page=="doctor-blog" || $page=="doctor-pending-blog" || $page=="edit-blog") { echo 'active'; } ?>">
								<a href="">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="doctor-dashboard") { echo 'active'; } ?>"><a href="doctor-dashboard">Doctor Dashboard</a></li>
									<li class="<?php if($page=="appointments") { echo 'active'; } ?>"><a href="appointments">Appointments</a></li>
									<li class="<?php if($page=="schedule-timings") { echo 'active'; } ?>"><a href="schedule-timings">Schedule Timing</a></li>
									<li class="<?php if($page=="my-patients") { echo 'active'; } ?>"><a href="my-patients">Patients List</a></li>
									<li class="<?php if($page=="patient-profile") { echo 'active'; } ?>"><a href="patient-profile">Patients Profile</a></li>
									<li class="<?php if($page=="chat-doctor") { echo 'active'; } ?>"><a href="chat-doctor">Chat</a></li>
									<li class="<?php if($page=="invoices") { echo 'active'; } ?>"><a href="invoices">Invoices</a></li>
									<li class="<?php if($page=="doctor-profile-settings") { echo 'active'; } ?>"><a href="doctor-profile-settings">Profile Settings</a></li>
									<li class="<?php if($page=="review") { echo 'active'; } ?>"><a href="reviews">Reviews</a></li>
									<li class="<?php if($page=="register") { echo 'active'; } ?>"><a href="doctor-register">Doctor Register</a></li>
									<li class="has-submenu <?php if($page=="doctor-add-blog" || $page=="doctor-blog" || $page=="doctor-pending-blog" || $page=="edit-blog") { echo 'active'; } ?>">
										<a href="doctor-blog">Blog</a>
										<ul class="submenu">
											<li class="<?php if($page=="doctor-blog" || $page=="doctor-pending-blog" || $page=="edit-blog") { echo 'active'; } ?>"><a href="doctor-blog">Blog</a></li>
											<li><a href="blog-details">Blog view</a></li>
											<li class="<?php if($page=="doctor-add-blog") { echo 'active'; } ?>"><a href="doctor-add-blog">Add Blog</a></li>
										</ul>
									</li>
								</ul>
							</li>		
							<li class="has-submenu <?php if($page=="map-grid" || $page=="map-list" || $page=="search1" || $page=="doctor-profile" || $page=="booking" || $page=="checkout" || $page=="booking-success" || $page=="patient-dashboard" || $page=="favourites" || $page=="chat" || $page=="profile-settings" || $page=="change-password") { echo 'active'; } ?>">
								<a href="">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu <?php if($page=="map-grid" || $page=="map-list") { echo 'active'; } ?>">
										<a href="#">Doctors</a>
										<ul class="submenu">
											<li class="<?php if($page=="map-grid") { echo 'active'; } ?>"><a href="map-grid">Map Grid</a></li>
											<li class="<?php if($page=="map-list") { echo 'active'; } ?>"><a href="map-list">Map List</a></li>
										</ul>
									</li>
									<li class="<?php if($page=="search1") { echo 'active'; } ?>"><a href="search">Search Doctor</a></li>
									<li class="<?php if($page=="doctor-profile") { echo 'active'; } ?>"><a href="doctor-profile">Doctor Profile</a></li>
									<li class="<?php if($page=="booking") { echo 'active'; } ?>"><a href="booking">Booking</a></li>
									<li class="<?php if($page=="checkout") { echo 'active'; } ?>"><a href="checkout">Checkout</a></li>
									<li class="<?php if($page=="booking-success") { echo 'active'; } ?>"><a href="booking-success">Booking Success</a></li>
									<li class="<?php if($page=="patient-dashboard") { echo 'active'; } ?>"><a href="patient-dashboard">Patient Dashboard</a></li>
									<li class="<?php if($page=="favourites") { echo 'active'; } ?>"><a href="favourites">Favourites</a></li>
									<li class="<?php if($page=="chat") { echo 'active'; } ?>"><a href="chat">Chat</a></li>
									<li class="<?php if($page=="profile-settings") { echo 'active'; } ?>"><a href="profile-settings">Profile Settings</a></li>
									<li class="<?php if($page=="change-password") { echo 'active'; } ?>"><a href="change-password">Change Password</a></li>
								</ul>
							</li>
							<li class="has-submenu <?php if($page=="cart" || $page=="payment-success" || $page=="pharmacy-details" || $page=="pharmacy-index" || $page=="pharmacy-search" || $page=="product-all" || $page=="product-checkout" || $page=="product-description" || $page=="pharmacy-register") { echo 'active'; } ?>">
								<a href="">Pharmacy <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="pharmacy-index") { echo 'active'; } ?>"><a href="pharmacy-index">Pharmacy</a></li>
									<li class="<?php if($page=="pharmacy-details") { echo 'active'; } ?>"><a href="pharmacy-details">Pharmacy Details</a></li>
									<li class="<?php if($page=="pharmacy-search") { echo 'active'; } ?>"><a href="pharmacy-search">Pharmacy Search</a></li>
									<li class="<?php if($page=="product-all") { echo 'active'; } ?>"><a href="product-all">Product</a></li>
									<li class="<?php if($page=="product-description") { echo 'active'; } ?>"><a href="product-description">Product Description</a></li>
									<li class="<?php if($page=="cart") { echo 'active'; } ?>"><a href="cart">Cart</a></li>
									<li  class="<?php if($page=="product-checkout") { echo 'active'; } ?>"><a href="product-checkout">Product Checkout</a></li>
									<li class="<?php if($page=="payment-success") { echo 'active'; } ?>"><a href="payment-success">Payment Success</a></li>
									<li class="<?php if($page=="pharmacy-register") { echo 'active'; } ?>"><a href="pharmacy-register">Pharmacy Register</a></li>
									
								</ul>
							</li>


							<li class="has-submenu <?php if($page=="voice-call" || $page=="video-call" || $page=="search" || $page=="calendar" || $page=="components" || $page=="invoices1" || $page=="invoice-view" || $page=="blank-page" || $page=="login" || $page=="register1" || $page=="forgot-pswd") { echo 'active'; } ?>">
								<a href="">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="voice-call") { echo 'active'; } ?>"><a href="voice-call">Voice Call</a></li>
									<li class="<?php if($page=="video-call") { echo 'active'; } ?>"><a href="video-call">Video Call</a></li>
									<li class="<?php if($page=="search") { echo 'active'; } ?>"><a href="search">Search Doctors</a></li>
									<li class="<?php if($page=="calendar") { echo 'active'; } ?>"><a href="calendar">Calendar</a></li>
									<li class="<?php if($page=="components") { echo 'active'; } ?>"><a href="components">Components</a></li>
									<li class="has-submenu <?php if($page=="invoices1" || $page=="invoice-view") { echo 'active'; } ?>">
										<a href="invoices">Invoices</a>
										<ul class="submenu">
											<li class="<?php if($page=="invoices1") { echo 'active'; } ?>"><a href="invoices">Invoices</a></li>
											<li class="<?php if($page=="invoice-view") { echo 'active'; } ?>"><a href="invoice-view">Invoice View</a></li>
										</ul>
									</li>
									<li class="<?php if($page=="blank-page") { echo 'active'; } ?>"><a href="blank-page">Starter Page</a></li>
									<li class="<?php if($page=="login") { echo 'active'; } ?>"><a href="login">Login</a></li>
									<li class="<?php if($page=="register1") { echo 'active'; } ?>"><a href="register">Register</a></li>
									<li class="<?php if($page=="forgot-pswd") { echo 'active'; } ?>"><a href="forgot-password">Forgot Password</a></li>
								</ul>
							</li>
							<li class="has-submenu <?php if($page=="blog-list" || $page=="blog-grid" || $page=="blog-details") { echo 'active'; } ?>">
                            <a href="">Blog <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class="<?php if($page=="blog-list") { echo 'active'; } ?>"><a href="blog-list">Blog List</a></li>
                                <li class="<?php if($page=="blog-grid") { echo 'active'; } ?>"><a href="blog-grid">Blog Grid</a></li>
                                <li class="<?php if($page=="blog-details") { echo 'active'; } ?>"><a href="blog-details">Blog Details</a></li>
                            </ul>
                        </li>
						<li class="has-submenu">
								<a href="#" target="_blank">Admin <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="{{route('pagee')}}" target="_blank">Admin</a></li>
									<li><a href="{{route('pagees')}}" target="_blank">Pharmacy Admin</a></li>
								</ul>
							</li>
						<!-- <li>
								<a href="{{route('pagee')}}" target="_blank">Admin</a>
							</li> -->
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
							@if(Route::is(['index-slide','page','cart','blank-page','term-condition','privacy-policy','blog-details','blog-grid','blog-list','forgot-password','register','login','invoice-view','doctor-register','components','calendar','map-grid','map-list','search','doctor-profile','booking','checkout','booking-success','payment-success','pharmacy-details','pharmacy-index','pharmacy-search','product-all','product-checkout','product-description','product-healthcare','pharmacy-register','index-5']))
							<li class="nav-item">
							<a class="nav-link header-login" href="login">login / Signup </a>
							</li>
							@endif
						</li>
						@if(Route::is(['chat','patient-dashboard','favourites','video-call','profile-settings','change-password','voice-call','dependent','medical-details','medical-records','membership-details','orders-list','patient-accounts']))
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="assets/img/patients/patient.jpg" width="31" alt="Ryan Taylor">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>Richard Wilson</h6>
										<p class="text-muted mb-0">Patient</p>
									</div>
								</div>
								<a class="dropdown-item" href="patient-dashboard">Dashboard</a>
								<a class="dropdown-item" href="profile-settings">Profile Settings</a>
								<a class="dropdown-item" href="login">Logout</a>
							</div>
						</li>
						@endif
						@if(!Route::is(['index-slide','chat','page','cart','blank-page','term-condition','privacy-policy','blog-details','blog-grid','blog-list','forgot-password','register','login','calendar','invoice-view','components','change-password','video-call','doctor-register','voice-call','favourites','map-grid','profile-settings','map-list','search','patient-dashboard','doctor-profile','booking','checkout','booking-success','payment-success','pharmacy-details','pharmacy-index','pharmacy-search','product-all','product-checkout','product-description','product-healthcare','dependent','medical-details','medical-records','membership-details','orders-list','patient-accounts','pharmacy-register','index-5']))
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" width="31" alt="Darren Elder">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>Darren Elder</h6>
										<p class="text-muted mb-0">Doctor</p>
									</div>
								</div>
								<a class="dropdown-item" href="doctor-dashboard">Dashboard</a>
								<a class="dropdown-item" href="doctor-profile-settings">Profile Settings</a>
								<a class="dropdown-item" href="login">Logout</a>
							</div>
						</li>
						<!-- /User Menu -->
						@endif
						@if(Route::is(['cart']))
						<li class="nav-item view-cart-header mr-3">
						<a href="#" class="" id="cart"><i class="fas fa-shopping-cart"></i> <small class="unread-msg1">7</small></a>		<!-- Shopping Cart -->
							<div class="shopping-cart">
								<ul class="shopping-cart-items list-unstyled">
									<li class="clearfix">
										<div class="close-icon"><i class="far fa-times-circle"></i></div>
									    <img class="avatar-img rounded" src="assets/img/products/product.jpg" alt="User Image">
									    <span class="item-name">Benzaxapine Croplex</span>
									    <span class="item-price">$849.99</span>
									    <span class="item-quantity">Quantity: 01</span>
									</li>

									<li class="clearfix">
										<div class="close-icon"><i class="far fa-times-circle"></i></div>
									    <img class="avatar-img rounded" src="assets/img/products/product1.jpg" alt="User Image">
									    <span class="item-name">Ombinazol Bonibamol</span>
									    <span class="item-price">$1,249.99</span>
									    <span class="item-quantity">Quantity: 01</span>
									</li>

									<li class="clearfix">
										<div class="close-icon"><i class="far fa-times-circle"></i></div>
									    <img class="avatar-img rounded" src="assets/img/products/product2.jpg" alt="User Image">
									    <span class="item-name">Dantotate Dantodazole</span>
									    <span class="item-price">$129.99</span>
									    <span class="item-quantity">Quantity: 01</span>
									</li>
								</ul>
								<div class="booking-summary pt-3">
									<div class="booking-item-wrap">
										<ul class="booking-date">
											<li>Subtotal <span>$5,877.00</span></li>
											<li>Shipping <span>$25.00</span></li>
											<li>Tax <span>$0.00</span></li>
											<li>Total <span>$5.2555</span></li>
										</ul>
										<div class="booking-total">
											<ul class="booking-total-list text-align">
												<li>
													<div class="clinic-booking pt-4">
														<a class="apt-btn" href="cart">View Card</a>
													</div>
												</li>
												<li>
													<div class="clinic-booking pt-4">
														<a class="apt-btn" href="product-checkout">Checkout</a>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- /Shopping Cart -->	
						</li>
						@endif
					</ul>
				</nav>
			</header>
			<!-- /Header -->