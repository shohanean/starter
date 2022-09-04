<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>{{ env('APP_NAME') }} - {{ env('APP_DESCRIPTION') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{ env('PROJECT_FAVICON') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{ asset('dashboard_assets') }}/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('dashboard_assets') }}/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('dashboard_assets') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('dashboard_assets') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
        @livewireStyles
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="{{ route('home') }}">
							<img alt="Logo" src="{{ env('PROJECT_LOGO') }}" class="h-25px logo" />
						</a>
						<!--end::Logo-->
						<!--begin::Aside toggler-->
						<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
							<span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
									<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Aside toggler-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside menu-->
					<div class="aside-menu flex-column-fluid">
						<!--begin::Aside Menu-->
						<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
							<!--begin::Menu-->
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                <div class="menu-item">
									<a class="menu-link @yield('home')" href="{{ route('home') }}">
										<span class="menu-icon">
                                            <i class="fa fa-home"></i>
										</span>
										<span class="menu-title">Home</span>
									</a>
								</div>
                                @canany(['can add user','can see user list','can role user','can see role list'])
                                    <div data-kt-menu-trigger="click" class="menu-item @yield('user_management') menu-accordion mb-1">
                                        <span class="menu-link">
                                            <span class="menu-icon">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                                                        <path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-title">User Management</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion">
                                            @canany(['can add user','can see user list'])
                                            <div class="menu-item">
                                                <a class="menu-link  @yield('user.index')" href="{{ route('user.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Users</span>
                                                </a>
                                            </div>
                                            @endcanany
                                            @canany(['can add role','can see role list'])
                                            <div class="menu-item">
                                                <a class="menu-link @yield('role.index')" href="{{ route('role.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Roles</span>
                                                </a>
                                            </div>
                                            @endcanany
                                        </div>
                                    </div>
                                @endcanany
								<div class="menu-item">
									<div class="menu-content pt-8 pb-2">
										<span class="menu-section text-muted text-uppercase fs-8 ls-1">User Settings</span>
									</div>
								</div>
								<div class="menu-item">
									<a class="menu-link @yield('profile.index')" href="{{ route('profile.index') }}">
										<span class="menu-icon">
                                            <i class="fa fa-user-circle"></i>
										</span>
										<span class="menu-title">Profile</span>
									</a>
								</div>
								<div class="menu-item">
									<div class="menu-content pt-8 pb-2">
										<span class="menu-section text-muted text-uppercase fs-8 ls-1">System</span>
									</div>
								</div>
                                @can ('can take backup')
    								<div class="menu-item">
    									<a class="menu-link @yield('backup.index')" href="{{ route('backup.index') }}">
    										<span class="menu-icon">
                                                <i class="fa fa-database"></i>
    										</span>
    										<span class="menu-title">Backup</span>
    									</a>
    								</div>
                                @endcan
								<div class="menu-item">
									<div class="menu-content">
										<div class="separator mx-1 my-4"></div>
									</div>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="#">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/coding/cod003.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="currentColor" />
													<path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">RS Changelog</span>
									</a>
								</div>
							</div>
							<!--end::Menu-->
						</div>
						<!--end::Aside Menu-->
					</div>
					<!--end::Aside menu-->
					<!--begin::Footer-->
					<div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
						<a href="../../demo1/dist/documentation/getting-started.html" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
							<span class="btn-label">Docs &amp; Components</span>
							<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
							<span class="svg-icon btn-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor" />
									<rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
									<rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
									<rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
									<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</a>
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" style="" class="header align-items-stretch">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Aside mobile toggle-->
							<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
								<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
							</div>
							<!--end::Aside mobile toggle-->
							<!--begin::Mobile logo-->
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<a href="../../demo1/dist/index.html" class="d-lg-none">
									<img alt="Logo" src="{{ asset('dashboard_assets') }}/media/logos/logo-2.svg" class="h-30px" />
								</a>
							</div>
							<!--end::Mobile logo-->
							<!--begin::Wrapper-->
							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
								<!--begin::Navbar-->
								<div class="d-flex align-items-stretch" id="kt_header_nav">
									<!--begin::Menu wrapper-->
									<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
										<!--begin::Menu-->
										<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
											<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item here show menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">Dashboards</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
												<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
													<div class="menu-item">
														<a class="menu-link active py-3" href="../../demo1/dist/index.html">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Multipurpose</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="../../demo1/dist/dashboards/ecommerce.html">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">eCommerce</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="../../demo1/dist/dashboards/projects.html">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Projects</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="../../demo1/dist/dashboards/online-courses.html">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Online Courses</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="../../demo1/dist/dashboards/marketing.html">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Marketing</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="../../demo1/dist/dashboards/bidding.html">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Bidding</span>
														</a>
													</div>
													<div class="menu-inner flex-column collapse" id="kt_aside_menu_collapse_2">
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/dashboards/logistics.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">Logistics</span>
															</a>
														</div>
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/dashboards/delivery.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">Delivery</span>
															</a>
														</div>
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/dashboards/website-analytics.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">Website Analytics</span>
															</a>
														</div>
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/dashboards/finance-performance.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">Finance Performance</span>
															</a>
														</div>
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/dashboards/store-analytics.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">Store Analytics</span>
															</a>
														</div>
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/dashboards/social.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">Social</span>
															</a>
														</div>
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/dashboards/crypto.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">Crypto</span>
															</a>
														</div>
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/dashboards/school.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">School</span>
															</a>
														</div>
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/dashboards/podcast.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">Podcast</span>
															</a>
														</div>
														<div class="menu-item">
															<a class="menu-link py-3" href="../../demo1/dist/landing.html">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">Landing</span>
															</a>
														</div>
													</div>
													<div class="menu-item">
														<div class="menu-content">
															<a class="btn btn-flex btn-color-success fs-base p-0 ms-2 mb-2 collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_aside_menu_collapse_2" data-kt-toggle-text="Show Less">
																<span data-kt-toggle-text-target="true">Show 10 More</span>
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr082.svg-->
																<span class="svg-icon ms-2 svg-icon-3 rotate-180">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.5" d="M12.5657 9.63427L16.75 5.44995C17.1642 5.03574 17.8358 5.03574 18.25 5.44995C18.6642 5.86416 18.6642 6.53574 18.25 6.94995L12.7071 12.4928C12.3166 12.8834 11.6834 12.8834 11.2929 12.4928L5.75 6.94995C5.33579 6.53574 5.33579 5.86416 5.75 5.44995C6.16421 5.03574 6.83579 5.03574 7.25 5.44995L11.4343 9.63427C11.7467 9.94669 12.2533 9.94668 12.5657 9.63427Z" fill="currentColor" />
																		<path d="M12.5657 15.6343L16.75 11.45C17.1642 11.0357 17.8358 11.0357 18.25 11.45C18.6642 11.8642 18.6642 12.5357 18.25 12.95L12.7071 18.4928C12.3166 18.8834 11.6834 18.8834 11.2929 18.4928L5.75 12.95C5.33579 12.5357 5.33579 11.8642 5.75 11.45C6.16421 11.0357 6.83579 11.0357 7.25 11.45L11.4343 15.6343C11.7467 15.9467 12.2533 15.9467 12.5657 15.6343Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</a>
														</div>
													</div>
												</div>
											</div>
											<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">Apps</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
												<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
													<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
														<span class="menu-link py-3">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
																		<path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">User Management</span>
															<span class="menu-arrow"></span>
														</span>
														<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
															<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Users</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
																	<div class="menu-item">
																		<a class="menu-link py-3" href="../../demo1/dist/apps/user-management/users/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Users List</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link py-3" href="../../demo1/dist/apps/user-management/users/view.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">View User</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Roles</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
																	<div class="menu-item">
																		<a class="menu-link py-3" href="../../demo1/dist/apps/user-management/roles/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Roles List</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link py-3" href="../../demo1/dist/apps/user-management/roles/view.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">View Roles</span>
																		</a>
																	</div>
																</div>
															</div>
															<div class="menu-item">
																<a class="menu-link py-3" href="../../demo1/dist/apps/user-management/permissions.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Permissions</span>
																</a>
															</div>
														</div>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="../../demo1/dist/apps/calendar.html">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																		<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																		<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Calendar</span>
														</a>
													</div>
												</div>
											</div>
											<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">Mega Menu</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
												<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown w-100 w-lg-600px p-5 p-lg-5">
													<!--begin:Row-->
													<div class="row" data-kt-menu-dismiss="true">
														<!--begin:Col-->
														<div class="col-lg-4 border-left-lg-1">
															<div class="menu-inline menu-column menu-active-bg">
																<div class="menu-item">
																	<a href="#" class="menu-link">
																		<span class="menu-bullet">
																			<span class="bullet bullet-dot"></span>
																		</span>
																		<span class="menu-title">Example link</span>
																	</a>
																</div>
															</div>
														</div>
														<!--end:Col-->
														<!--begin:Col-->
														<div class="col-lg-4 border-left-lg-1">
															<div class="menu-inline menu-column menu-active-bg">
																<div class="menu-item">
																	<a href="#" class="menu-link">
																		<span class="menu-bullet">
																			<span class="bullet bullet-dot"></span>
																		</span>
																		<span class="menu-title">Example link</span>
																	</a>
																</div>
															</div>
														</div>
														<!--end:Col-->
														<!--begin:Col-->
														<div class="col-lg-4 border-left-lg-1">
															<div class="menu-inline menu-column menu-active-bg">
																<div class="menu-item">
																	<a href="#" class="menu-link">
																		<span class="menu-bullet">
																			<span class="bullet bullet-dot"></span>
																		</span>
																		<span class="menu-title">Example link</span>
																	</a>
																</div>
															</div>
														</div>
														<!--end:Col-->
													</div>
													<!--end:Row-->
												</div>
											</div>
										</div>
										<!--end::Menu-->
									</div>
									<!--end::Menu wrapper-->
								</div>
								<!--end::Navbar-->
								<!--begin::Toolbar wrapper-->
								<div class="d-flex align-items-stretch flex-shrink-0">
									<!--begin::Quick links-->
									<div class="d-flex align-items-center ms-1 ms-lg-3">
										<!--begin::Menu wrapper-->
										<div class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
											<!--begin::Heading-->
											<div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background-image:url('{{ asset('dashboard_assets') }}/media/misc/pattern-1.jpg')">
												<!--begin::Title-->
												<h3 class="text-white fw-bold mb-3">Quick Links</h3>
												<!--end::Title-->
												<!--begin::Status-->
												<span class="badge bg-primary py-2 px-3">25 pending tasks</span>
												<!--end::Status-->
											</div>
											<!--end::Heading-->
											<!--begin:Nav-->
											<div class="row g-0">
												<!--begin:Item-->
												<div class="col-6">
													<a href="../../demo1/dist/apps/projects/budget.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
														<!--begin::Svg Icon | path: icons/duotune/finance/fin009.svg-->
														<span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M15.8 11.4H6C5.4 11.4 5 11 5 10.4C5 9.80002 5.4 9.40002 6 9.40002H15.8C16.4 9.40002 16.8 9.80002 16.8 10.4C16.8 11 16.3 11.4 15.8 11.4ZM15.7 13.7999C15.7 13.1999 15.3 12.7999 14.7 12.7999H6C5.4 12.7999 5 13.1999 5 13.7999C5 14.3999 5.4 14.7999 6 14.7999H14.8C15.3 14.7999 15.7 14.2999 15.7 13.7999Z" fill="currentColor" />
																<path d="M18.8 15.5C18.9 15.7 19 15.9 19.1 16.1C19.2 16.7 18.7 17.2 18.4 17.6C17.9 18.1 17.3 18.4999 16.6 18.7999C15.9 19.0999 15 19.2999 14.1 19.2999C13.4 19.2999 12.7 19.2 12.1 19.1C11.5 19 11 18.7 10.5 18.5C10 18.2 9.60001 17.7999 9.20001 17.2999C8.80001 16.8999 8.49999 16.3999 8.29999 15.7999C8.09999 15.1999 7.80001 14.7 7.70001 14.1C7.60001 13.5 7.5 12.8 7.5 12.2C7.5 11.1 7.7 10.1 8 9.19995C8.3 8.29995 8.79999 7.60002 9.39999 6.90002C9.99999 6.30002 10.7 5.8 11.5 5.5C12.3 5.2 13.2 5 14.1 5C15.2 5 16.2 5.19995 17.1 5.69995C17.8 6.09995 18.7 6.6 18.8 7.5C18.8 7.9 18.6 8.29998 18.3 8.59998C18.2 8.69998 18.1 8.69993 18 8.79993C17.7 8.89993 17.4 8.79995 17.2 8.69995C16.7 8.49995 16.5 7.99995 16 7.69995C15.5 7.39995 14.9 7.19995 14.2 7.19995C13.1 7.19995 12.1 7.6 11.5 8.5C10.9 9.4 10.5 10.6 10.5 12.2C10.5 13.3 10.7 14.2 11 14.9C11.3 15.6 11.7 16.1 12.3 16.5C12.9 16.9 13.5 17 14.2 17C15 17 15.7 16.8 16.2 16.4C16.8 16 17.2 15.2 17.9 15.1C18 15 18.5 15.2 18.8 15.5Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<span class="fs-5 fw-bold text-gray-800 mb-0">Accounting</span>
														<span class="fs-7 text-gray-400">eCommerce</span>
													</a>
												</div>
												<!--end:Item-->
												<!--begin:Item-->
												<div class="col-6">
													<a href="../../demo1/dist/apps/projects/settings.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
														<!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
														<span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="currentColor" />
																<path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<span class="fs-5 fw-bold text-gray-800 mb-0">Administration</span>
														<span class="fs-7 text-gray-400">Console</span>
													</a>
												</div>
												<!--end:Item-->
												<!--begin:Item-->
												<div class="col-6">
													<a href="../../demo1/dist/apps/projects/list.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
														<!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
														<span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z" fill="currentColor" />
																<path opacity="0.3" d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<span class="fs-5 fw-bold text-gray-800 mb-0">Projects</span>
														<span class="fs-7 text-gray-400">Pending Tasks</span>
													</a>
												</div>
												<!--end:Item-->
												<!--begin:Item-->
												<div class="col-6">
													<a href="../../demo1/dist/apps/projects/users.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
														<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
														<span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
																<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<span class="fs-5 fw-bold text-gray-800 mb-0">Customers</span>
														<span class="fs-7 text-gray-400">Latest cases</span>
													</a>
												</div>
												<!--end:Item-->
											</div>
											<!--end:Nav-->
											<!--begin::View more-->
											<div class="py-2 text-center border-top">
												<a href="../../demo1/dist/pages/user-profile/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">View All
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
												<span class="svg-icon svg-icon-5">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
														<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon--></a>
											</div>
											<!--end::View more-->
										</div>
										<!--end::Menu-->
										<!--end::Menu wrapper-->
									</div>
									<!--end::Quick links-->
									<!--begin::User menu-->
									<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
										<!--begin::Menu wrapper-->
										<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											<img src="{{ (auth()->user()->avatar) ? asset(auth()->user()->avatar) : Avatar::create(auth()->user()->name)->toBase64() }}" alt="not found" />
										</div>
										<!--begin::User account menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content d-flex align-items-center px-3">
													<!--begin::Avatar-->
													<div class="symbol symbol-50px me-5">
                                                        <img src="{{ (auth()->user()->avatar) ? asset(auth()->user()->avatar) : Avatar::create(auth()->user()->name)->toBase64() }}" alt="not found" />
													</div>
													<!--end::Avatar-->
													<!--begin::Username-->
													<div class="d-flex flex-column">
														<div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name }}
                                                        @isset(auth()->user()->email_verified_at)
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                                    <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"></path>
                                                                    <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        @endisset
                                                        </div>
                                                        <p class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</p>
													</div>
													<!--end::Username-->
												</div>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="{{ route('profile.index') }}" class="menu-link px-5">
													<span class="menu-text">
                                                        <i class="fa fa-user"></i>
                                                        My Profile
                                                    </span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="../../demo1/dist/apps/projects/list.html" class="menu-link px-5">
													<span class="menu-text">My Projects</span>
													<span class="menu-badge">
														<span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
													</span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
												<a href="#" class="menu-link px-5">
													<span class="menu-title">My Subscription</span>
													<span class="menu-arrow"></span>
												</a>
												<!--begin::Menu sub-->
												<div class="menu-sub menu-sub-dropdown w-175px py-4">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="../../demo1/dist/account/referrals.html" class="menu-link px-5">Referrals</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="../../demo1/dist/account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="View your statements"></i></a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator my-2"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<div class="menu-content px-3">
															<label class="form-check form-switch form-check-custom form-check-solid">
																<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																<span class="form-check-label text-muted fs-7">Notifications</span>
															</label>
														</div>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu sub-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
												<a href="#" class="menu-link px-5">
													<span class="menu-title position-relative">Language
													<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
													<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('dashboard_assets') }}/media/flags/united-states.svg" alt="" /></span></span>
												</a>
												<!--begin::Menu sub-->
												<div class="menu-sub menu-sub-dropdown w-175px py-4">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5 active">
														<span class="symbol symbol-20px me-4">
															<img class="rounded-1" src="{{ asset('dashboard_assets') }}/media/flags/united-states.svg" alt="" />
														</span>English</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5">
														<span class="symbol symbol-20px me-4">
															<img class="rounded-1" src="{{ asset('dashboard_assets') }}/media/flags/spain.svg" alt="" />
														</span>Spanish</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu sub-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="menu-link px-5">Logout</a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::User account menu-->
										<!--end::Menu wrapper-->
									</div>
									<!--end::User menu-->
									<!--begin::Header menu toggle-->
									<div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
										<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
											<!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
											<span class="svg-icon svg-icon-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="currentColor" />
													<path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
									</div>
									<!--end::Header menu toggle-->
								</div>
								<!--end::Toolbar wrapper-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						@yield('toolbar')
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
                                    @yield('content')
								<!--end::Row-->
                                <!--begin::Modals-->
                                    @yield('modal')
                                <!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">{{ \Carbon\Carbon::today()->format('Y') }} ©</span>
								<a href="#" target="_blank" class="text-gray-800 text-hover-primary">{{ env('APP_NAME') }}</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Engage toolbar-->
		<div class="engage-toolbar d-flex position-fixed px-5 fw-bolder zindex-2 top-50 end-0 transform-90 mt-20 gap-2">
			<!--begin::Purchase link-->
			<a href="#" target="_blank" class="engage-purchase-link btn btn-color-gray-700 bg-body btn-active-color-gray-900' btn-flex h-35px px-5 shadow-sm rounded-top-0">Res</a>
			<!--end::Purchase link-->
		</div>
		<!--end::Engage toolbar-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--begin::Javascript-->
		<script>var hostUrl = "{{ asset('dashboard_assets') }}/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('dashboard_assets') }}/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('dashboard_assets') }}/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('dashboard_assets') }}/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="{{ asset('dashboard_assets') }}/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('dashboard_assets') }}/js/widgets.bundle.js"></script>
		<script src="{{ asset('dashboard_assets') }}/js/custom/widgets.js"></script>
		<script src="{{ asset('dashboard_assets') }}/js/custom/apps/chat/chat.js"></script>
		<script src="{{ asset('dashboard_assets') }}/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="{{ asset('dashboard_assets') }}/js/custom/utilities/modals/create-app.js"></script>
		<script src="{{ asset('dashboard_assets') }}/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
        @livewireScripts
	</body>
	<!--end::Body-->
</html>
