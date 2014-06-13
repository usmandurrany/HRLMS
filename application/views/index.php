<?php  if ((isset($_COOKIE['usr_name']) && ($_COOKIE['is_admin']=="yes" ))){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>ACS - HRLMS</title>

    <meta name="description" content="description">
    <meta name="author" content="DevOOPS">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

    <link href="<?php echo base_url();?>plugins/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/formhelper.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/jquery.dataTables.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>plugins/select2/select2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/print.css" rel="stylesheet" media="print">

    <script src="<?php echo base_url();?>plugins/jquery/jquery-2.1.0.min.js"></script>
    <script src="<?php echo base_url();?>plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- All functions for this theme + document.ready processing -->

    <script type="text/javascript">
    function printPartOfPage(elementId) {
        var printContent = document.getElementById(elementId);
        var windowUrl = 'about:blank';
        var uniqueName = new Date();
        var windowName = 'Print' + uniqueName.getTime();
        var printWindow = window.open(windowUrl, windowName, 'left=0,top=0,width=1425,height=800', $("#table_filter,#table_info,#table_length,#table_paginate,.panel-heading").css({
            display: "none"
        }), $("#branding").css({
            display: "block",
            margin: "0 auto",
            width: "75%"
        }), $("table thead th").css({
            border: "1px solid",
            "text-align": "center"
        }), $("#table tbody td").css({
            border: "1px solid #ccc",
            "text-align": "center"
        }));
        printWindow.document.write(printContent.innerHTML);
        // printWindow.document.write("<"+"script"+"> \
        //     alert('You have now entered Print friendly mode use your browser PRINT function to print [CTRL+P]'); \
        // </"+"script"+">"+printContent.innerHTML);
        // window.parent.location.reload();
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close(location.reload());
    }
    </script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
    <script type="text/javascript">
     $(document).ready(function() {

        var ajax_url = location.hash.replace(/^#/, '');
        if (ajax_url.length < 1) {
            ajax_url = '<?php echo base_url();?>index.php/view/view_add_leave';

            $("#ajax-content").load(ajax_url);
        }
        $("li").on('click', '.ajax-link', function(event) {
            event.preventDefault();
            var href = $(this).attr('href');

            $("#ajax-content").load(href);


             // alert(href);
        });
            
        // $(".ajax-link").on('click', function(event) {
        //     event.preventDeglyphiconult();
        //     var href = $(this).attr('href');

        //     ajax_url = href;

        //     $("#ajax-content").load(ajax_url);

        //      // alert(href);
        // });
    });
    </script>
</head>

<body>
    <!--Start Header-->


    <!--End Header-->
    <!--Start Container-->
    <div id="main" class="container-fluid" style="">
        <div class="row">
            <div id="sidebar-left" class="col-xs-2 col-sm-2 hidden-print">
                <ul class="nav navbar-nav panel-menu">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                            <div class="avatar">
                                <img src="<?php echo base_url();?>img/profile_pics/default.png" class="img-rounded" alt="avatar">
                            </div>
                            <span class="caret"></span>
                            <div class="user-mini pull-left hidden-xs hidden-sm hidden-md">
                                <span class="welcome">Welcome,</span>
                                <span>
                                    <?php echo $_COOKIE[ "usr_name"];?>
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span class="hidden-sm text">Profile</span>
                                </a>
                            </li> -->

                            <li>
                                <a href="<?php echo base_url();?>index.php/formProcess/logout">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <span class="hidden-sm text">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
                <div id="logo" class="hidden-xs">
                    <a href="#" class="">
                        <img src="<?php echo base_url();?>img/logo.png" style="position: relative;border-radius: 11px;margin: 0 auto;" class="img-responsive">
                    </a>
                </div>
                <!-- <div id="search">
							<div class="form-group col-md-3">
								<label for="search">Search:</label></div>
								<div class="form-group col-md-9">
									<input placeholder="Employee Name" type="text" style="
									width: 100%;
									" class="form-control">
									<i class="glyphicon glyphicon-search"></i>
								</div>
							</div> -->
                <ul class="nav main-menu">
                    <li>
                        <a href="<?php echo base_url();?>index.php/view/view_add_leave" class="ajax-link">
                            <i class="glyphicon glyphicon-list" style="position: absolute;top:10px"></i>
                            <i class="glyphicon glyphicon-plus" style="position: relative;left: 5px;color: black;"></i>	
                            <span class="hidden-xs">Add Leave</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/view/view_add_emp" class="ajax-link">
                            <i class="glyphicon glyphicon-user" style="position: absolute;top:10px"></i>
                            <i class="glyphicon glyphicon-plus" style="position: relative;left: 5px;color: black;"></i>
                            <span class="hidden-xs">Add Employee</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/view/view_all_leaves" class="ajax-link">
                            <i class="glyphicon glyphicon-list" style="position: relative;"></i>
                            <span class="hidden-xs">View Leaves</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url();?>index.php/view/view_all_emp" class="ajax-link">
                            <i class="glyphicon glyphicon-user" style="position: relative;"></i>
                            <span class="hidden-xs">View Employees</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/view/view_reports/leave_rpt/" class="ajax-link">
                            <i class="glyphicon glyphicon-list-alt" style="position: relative;"></i>
                            <span class="hidden-xs">View Leave Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/view/view_reports/emp_rpt/" class="ajax-link">
                            <i class="glyphicon glyphicon-list-alt" style="position: relative;"></i>
                            <span class="hidden-xs">View Emp. Report</span>
                        </a>
                    </li>
                    <!-- <li class="dropdown">
										<a href="#" class="dropdown-toggle">
											<i class="glyphicon glyphicon-bar-chart-o"></i>
											<span class="hidden-xs">Add Leave</span>
										</a>
										<ul class="dropdown-menu">
												<li><a class="ajax-link" href="<?php echo base_url();?>index.php/view/view_charts_xcharts.html">xCharts</a></li>
												<li><a class="ajax-link" href="<?php echo base_url();?>index.php/view/view_charts_flot.html">Flot Charts</a></li>
												<li><a class="ajax-link" href="<?php echo base_url();?>index.php/view/view_charts_google.html">Google Charts</a></li>
												<li><a class="ajax-link" href="<?php echo base_url();?>index.php/view/view_charts_morris.html">Morris Charts</a></li>
												<li><a class="ajax-link" href="<?php echo base_url();?>index.php/view/view_charts_coindesk.html">CoinDesk realtime</a></li>
										</ul>
								</li>
								-->


                </ul>
            </div>
            <!--Start Content-->
            <div id="content" class="col-xs-12 col-sm-10 col-print-12">
                <!-- <div class="preloader">
								<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
							</div> -->
                <div id="ajax-content"></div>
            </div>
            <!--End Content-->
        </div>
    </div>
    <!--End Container-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="http://code.jquery.com/jquery.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
</body>

</html>
<?php  }else{  redirect("view/login");  } ?>
