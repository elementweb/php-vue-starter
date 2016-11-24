<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sample Page Admin</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">
	<link href="assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/admin.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="../">Web front<i class="fa fa-external-link"></i>
                    </a>
                </li>
                <li>
                    <a href="admin">Dashboard</a>
                </li>
                <li>
                    <a href="admin-quotes">Quotes</a>
                </li>
                <li>
                    <a href="admin-products">Products</a>
                </li>
                <li>
                    <a href="admin-users">Users</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    	<div class="row">
                    		<div class="col-lg-12">
                    			<a href="#menu-toggle" class="btn btn-default menu-toggle" id="menu-toggle"><i class="fa fa-align-justify"></i></a>
                    		</div>
                    	</div>

                    	<div class="row">
                    		<div class="col-md-12">
                    			<?= $__viewport__ ?>
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
	    $("#menu-toggle").click(function(e) {
	        e.preventDefault();
	        $("#wrapper").toggleClass("toggled");
	    });
    </script>
</body>
</html>