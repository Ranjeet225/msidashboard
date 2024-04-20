@include('vendor.common.header')
@include('vendor.common.sidebar')
  <!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
			<div class="me-auto d-lg-block d-block">
				<h2 class="text-black font-w600">Dashboard</h2>
				<p class="mb-0">Welcome to PMS Property Admin</p>
			</div>
			<a href="{{url('/vendor/dashboard')}}" class="btn btn-primary rounded light">Refresh</a>
		</div>
		<div class="row">
			<div class="col-xl-6 col-xxl-6">
				<div class="row">
					<div class="col-xl-12">
						<div class="card bg-danger property-bx text-white">
							<div class="card-body">
								<div class="media d-sm-flex d-block align-items-center">
									<span class="me-4 d-block mb-sm-0 mb-3">
										<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.8333 79.1667H4.16659C2.33325 79.1667 0.833252 77.6667 0.833252 75.8333V29.8333C0.833252 29 1.16659 28 1.83325 27.5L29.4999 1.66667C30.4999 0.833332 31.8333 0.499999 32.9999 0.999999C34.3333 1.66667 34.9999 2.83333 34.9999 4.16667V76C34.9999 77.6667 33.4999 79.1667 31.8333 79.1667ZM7.33325 72.6667H28.4999V11.6667L7.33325 31.3333V72.6667Z" fill="white"/>
											<path d="M75.8333 79.1667H31.6666C29.8333 79.1667 28.3333 77.6667 28.3333 75.8334V36.6667C28.3333 34.8334 29.8333 33.3334 31.6666 33.3334H75.8333C77.6666 33.3334 79.1666 34.8334 79.1666 36.6667V76C79.1666 77.6667 77.6666 79.1667 75.8333 79.1667ZM34.9999 72.6667H72.6666V39.8334H34.9999V72.6667Z" fill="white"/>
											<path d="M60.1665 79.1667H47.3332C45.4999 79.1667 43.9999 77.6667 43.9999 75.8334V55.5C43.9999 53.6667 45.4999 52.1667 47.3332 52.1667H60.1665C61.9999 52.1667 63.4999 53.6667 63.4999 55.5V75.8334C63.4999 77.6667 61.9999 79.1667 60.1665 79.1667ZM50.6665 72.6667H56.9999V58.8334H50.6665V72.6667Z" fill="white"/>
										</svg>
									</span>
									<div class="media-body mb-sm-0 mb-3 me-5">
										<h4 class="fs-22 text-white">Total Properties</h4>
										<div class="progress mt-3 mb-2" style="height:8px;">
											<div class="progress-bar bg-white progress-animated" style="width: 86%; height:8px;" role="progressbar">
												<span class="sr-only">86% Complete</span>
											</div>
										</div>
										<span class="fs-14">431 more to break last month record</span>
									</div>
									<span class="fs-35 font-w500">4,562</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="card property-card">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body me-3">
										<h2 class="fs-28 text-black font-w600">2,356</h2>
										<p class="property-p mb-0 text-black font-w500">Properties for Sale</p>
										<span class="fs-13">Target 3k/month</span>
									</div>
									<div class="d-inline-block position-relative donut-chart-sale">
										<span class="donut1" data-peity='{ "fill": ["rgb(60, 76, 184)", "rgba(236, 236, 236, 1)"],   "innerRadius": 38, "radius": 10}'>5/8</span>
										<small class="text-primary">71%</small>
										<span class="circle bgl-primary"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="card property-card">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body me-3">
										<h2 class="fs-28 text-black font-w600">2,206</h2>
										<p class="property-p mb-0 text-black font-w500">Properties for Rent</p>
										<span class="fs-13">Target 3k/month</span>
									</div>
									<div class="d-inline-block position-relative donut-chart-sale">
										<span class="donut1" data-peity='{ "fill": ["rgb(55, 209, 90)", "rgba(236, 236, 236, 1)"],   "innerRadius": 38, "radius": 10}'>7/8</span>
										<small class="text-success">90%</small>
										<span class="circle bgl-success"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-xxl-6">
				<div class="card">
					<div class="card-header border-0 pb-0">
						<h3 class="fs-18 text-black">Total Revenue</h3>
						<div class="dropdown ms-auto">
							<div class="btn-link" data-bs-toggle="dropdown" >
								<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
							</div>
							<div class="dropdown-menu dropdown-menu-end" >
								<a class="dropdown-item" href="javascript:void(0);">Edit</a>
								<a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 pb-0">
						<div class="d-flex flex-wrap align-items-center">
							<span class="fs-28 text-black font-w600 me-3">$678,345</span>
							<p class="me-sm-auto me-3 mb-sm-0 mb-3">last month $563,443</p>
							<div class="d-flex align-items-center">
								<svg class="me-3" width="87" height="47" viewBox="0 0 87 47" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M29.8043 20.9254C15.2735 14.3873 5.88029 27.282 3 34.5466V46.2406H85V4.58005C70.8925 -0.868404 70.5398 8.66639 60.8409 19.5633C51.1419 30.4602 47.9677 29.0981 29.8043 20.9254Z" fill="url(#paint0_linear)"/>
									<path d="M3 35.2468C5.88029 27.9822 15.2735 15.0875 29.8043 21.6257C47.9677 29.7984 51.1419 31.1605 60.8409 20.2636C70.5398 9.36665 70.8925 -0.168147 85 5.28031" stroke="#37D159" stroke-width="6"/>
									<defs>
									<linearGradient id="paint0_linear" x1="44" y1="-36.4332" x2="44" y2="45.9686" gradientUnits="userSpaceOnUse">
									<stop stop-color="#37D159" offset="0"/>
									<stop offset="1" stop-color="#37D159" stop-opacity="0"/>
									</linearGradient>
									</defs>
								</svg>
								<span class="fs-22 text-success me-2">7%</span>
								<svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 6L6 2.62268e-07L12 6" fill="#37D159"/>
								</svg>
							</div>
						</div>
						<div id="chartTimeline"></div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>
@include('vendor.common.footer')
