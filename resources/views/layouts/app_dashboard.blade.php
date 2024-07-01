<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords"
		content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Dashboard - Ryan BarberKing</title>

	<link href="{{asset('static/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		function confirmLogout() {
			console.log('logout attempt');
			Swal.fire({
				title: 'Confirm',
				text: 'Are you sure you want to logout?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Yes'
			}).then((result) => {
				if (result.isConfirmed) {
					document.querySelector('.logout-form').submit();
				}
			});
		}
	</script>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand"
					href="{{ Auth::user()->role === 'admin' ? route('dashboard-admin') : route('dashboard-barberman') }}">
					<span class="align-middle">Ryan Barberking</span>
				</a>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					@if(Auth::check() && Auth::user()->role === 'admin')
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{ route('barberman') }}">
								<div class="d-flex align-items-center">
									<i class="align-middle" data-feather="user"></i>
									<span class="align-middle ms-2">Barberman</span>
								</div>
							</a>
						</li>

						<li class="sidebar-item">
							<a class="sidebar-link" href="{{ route('layanan') }}">
								<div class="d-flex align-items-center">
									<i class="align-middle" data-feather="tool"></i>
									<span class="align-middle ms-2">Layanan</span>
								</div>
							</a>
						</li>

						<li class="sidebar-item">
							<a class="sidebar-link" href="{{ route('outlet') }}">
								<div class="d-flex align-items-center">
									<i class="align-middle" data-feather="home"></i>
									<span class="align-middle ms-2">Outlet</span>
								</div>
							</a>
						</li>
					@elseif(Auth::check() && Auth::user()->role === 'barberman')
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{ route('reservation.show') }}">
								<div class="d-flex align-items-center">
									<i class="align-middle" data-feather="bookmark"></i>
									<span class="align-middle ms-2">Reservation</span>
								</div>
							</a>
						</li>
					@endif
					<ul class="sidebar-nav">
						<li class="sidebar-header">
							Activity
						</li>
						<li class="sidebar-item">
							<form method="POST" action="{{ route('logout') }}" class="logout-form">
								@csrf
								<button class="sidebar-link" type="button" onclick="confirmLogout()">
									<div class="d-flex align-items-center">
										<i class="align-middle" data-feather="log-out"></i>
										<span class="align-middle ms-2">Logout</span>
									</div>
								</button>
							</form>
						</li>
					</ul>	

		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span></span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
								aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									Notifications
								</div>
								<div class="list-group">
									@yield('notifications')
									<div class="dropdown-menu-footer">
										<a href="#" class="text-muted">Show all notifications</a>
									</div>
								</div>
						</li>
						<li class="dropdown">
							<a class="nav-link d-none d-sm-inline-block d-flex align-items-center" href="#"
								data-bs-toggle="dropdown">
								<div class="d-flex align-items-center">
									<img src="{{ asset(Auth::user()->photo_path) }}"
										class="avatar img-responsive me-2 rounded-full"
										alt="{{ Auth::user()->name }}" />
									<span class="text-dark indicator">{{ Auth::user()->name }}</span>
									<img src="{{ asset('assets/img/svg/arrow-down-339-svgrepo-com.svg') }}"
										class="h-3 w-3 ml-2" alt="Arrow Down">
								</div>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								<div class="d-flex align-items-center">
									<a class="dropdown-item d-flex align-items-center mr-1"
										href="{{ route('users.edit', Auth::user()->id) }}"><i class="align-middle me-1"
											data-feather="user"></i> Profile</a>
								</div>
								<div class="dropdown-divider"></div>
								<form method="POST" action="{{ route('logout') }}" class="dropdown-item logout-form">
									@csrf
									<button type="button" onclick="confirmLogout()" class="dropdown-item"
										style="text-decoration: none; border: none; background-color:transparent;">Logout</button>
								</form>
							</div>

					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0 test">
					@yield('content')
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Ryan
										Barberking</strong></a> &copy;
							</p>
						</div>
					</div>
				</div>
		</div>
		</footer>
	</div>
	</div>

	<script src="{{asset('static/js/app.js')}}"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var markers = [{
				coords: [-6.208763, 106.845599],
				name: "Jakarta"
			},
			{
				coords: [-7.257472, 112.752090],
				name: "Surabaya"
			},
			{
				coords: [-6.917464, 107.619125],
				name: "Bandung"
			},
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				center: [-2.548926, 118.0148634],
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var date = new Date(Date.now() + 1 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
	</script>
	});
	</script>

</body>

</html>