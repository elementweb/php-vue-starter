<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sample Page</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.min.css" rel="stylesheet">
	<link href="assets/css/public.css" rel="stylesheet">
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Welcome</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="/">Home</a></li>
						<li><a href="/quote">Get quote</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/admin">Administrator</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<div id="page-content-wrapper">
		    <div class="container-fluid">
		    	<?= $__viewport__ ?>
		    </div>
		</div>
    </div>

	<!-- jQuery -->
	<script src="assets/js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Bootstrap Select plugin -->
	<script src="assets/js/bootstrap-select.min.js"></script>

	<!-- Bootstrap Datepicker plugin -->
	<script src="assets/js/bootstrap-datepicker.min.js"></script>

	<!-- Moment.js -->
	<script src="assets/js/moment.js"></script>

	<!-- Vue.js -->
	<script src="assets/js/vue.js"></script>

	<!-- Vue-resource -->
	<script src="assets/js/vue-resource.js"></script>

	<!-- jQuery custom scripts -->
	<script src="assets/js/public.js"></script>

	<!-- Vue.js Application -->
	<script src="assets/js/quote.js"></script>
</body>
</html>