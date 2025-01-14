			<!-- Main Header-->
			<div class="main-header side-header sticky">
				<div class="container-fluid">
					<div class="main-header-left">
						<a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
					</div>
					<div class="main-header-center">
						<div class="responsive-logo">
							<a href="{{url('/')}}"><img src="{{URL::asset('assets/img/brand/logo-light.png')}}" class="mobile-logo" alt="logo"></a>
							<a href="{{url('/')}}"><img src="{{URL::asset('assets/img/brand/logo-light.png')}}" class="mobile-logo-dark" alt="logo"></a>
						</div>
					</div>
					<div class="main-header-right">
						<div class="dropdown header-search">
							<a class="nav-link icon header-search">
								<i class="fe fe-search header-icons"></i>
							</a>
							<div class="dropdown-menu">
								<div class="main-form-search p-2">
									<div class="input-group">
										<div class="input-group-btn search-panel">
											<select class="form-control select2-no-search">
												<option label="All categories">
												</option>
												<option value="IT Projects">
													IT Projects
												</option>
												<option value="Business Case">
													Business Case
												</option>
												<option value="Microsoft Project">
													Microsoft Project
												</option>
												<option value="Risk Management">
													Risk Management
												</option>
												<option value="Team Building">
													Team Building
												</option>
											</select>
										</div>
										<input type="search" class="form-control" placeholder="Search for anything...">
										<button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
									</div>
								</div>
							</div>
						</div>
						<div class="dropdown d-md-flex">
							<a class="nav-link icon full-screen-link" href="">
								<i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
								<i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
							</a>
						</div>
						
							
						
						<div class="dropdown main-profile-menu">
							<a class="d-flex" href="">
								<span class="main-img-user" ><img alt="avatar" src="{{URL::asset('assets/img/users/1.jpg')}}"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									{{-- <h6 class="main-notification-title">{{Auth::user()->name}}</h6>
									<p class="main-notification-text">{{Auth::user()->email}}</p> --}}
								</div>
								<a class="dropdown-item" href="{{url('logout')}}">
									<i class="fe fe-power"></i> Salir
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Main Header-->