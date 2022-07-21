<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<title>{{ env('APP_NAME') }} - {{ env('APP_DESCRIPTION') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ env('PROJECT_FAVICON') }}"/>
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('dashboard_assets') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('dashboard_assets') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('{{ asset('dashboard_assets') }}/media/auth/bg8.jpg'); } [data-theme="dark"] body { background-image: url('{{ asset('dashboard_assets') }}/media/auth/bg8-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Signup Welcome Message -->
			<div class="d-flex flex-column flex-center flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center text-center p-10">
					<!--begin::Wrapper-->
					<div class="card card-flush w-md-650px py-5">
						<div class="card-body py-15 py-lg-20">
							<!--begin::Logo-->
							<div class="mb-7">
								<a href="../../demo1/dist/index.html" class="">
									<img alt="Logo" src="{{ env('PROJECT_LOGO') }}" class="h-40px" />
								</a>
							</div>
							<!--end::Logo-->
							<!--begin::Title-->
							<h1 class="fw-bolder text-gray-900 mb-5">Welcome to Metronic</h1>
							<!--end::Title-->
							<!--begin::Text-->
							<div class="fw-semibold fs-6 text-gray-500 mb-7">This is your opportunity to get creative and make a name
							<br />that gives readers an idea</div>
							<!--end::Text-->
							<!--begin::Illustration-->
							<div class="mb-0">
								<img src="{{ asset('dashboard_assets') }}/media/auth/welcome.png" class="mw-100 mh-300px theme-light-show" alt="" />
							</div>
							<!--end::Illustration-->
							<!--begin::Link-->
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <a href="{{ url('/home') }}" class="btn btn-sm btn-primary">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
							<!--end::Link-->
						</div>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Signup Welcome Message-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "{{ asset('dashboard_assets') }}/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('dashboard_assets') }}/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('dashboard_assets') }}/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
