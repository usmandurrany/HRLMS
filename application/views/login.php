<?php if ((isset($_COOKIE[ 'usr_name']) && ($_COOKIE[ 'is_admin']=="yes" ))) header( "location: index2.php"); ?>
<html>

<head>
    <title>ACS - HRLMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?php echo base_url();?>js/jquery.js"></script>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/offcanvas.css" rel="stylesheet">
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <style>
    .panel {
        padding: 0;
    }
    body {
        background-color: #ccc;
    }
    </style>
    <script>
    $(document).ready(function() {
        $('[data-toggle=offcanvas]').click(function() {
            $('.row-offcanvas').toggleClass('active')
        });
    });
    </script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="padding-50">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-12 col-sm-6 col-md-5 center panel panel-default">
                <!-- <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div> -->
                <div class="panel-body">
                    <center>
                        <img src="<?php echo base_url();?>img/logo.png">
                    </center>
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/formProcess/login">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="inputEmail3" placeholder="Username" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10 col-sm-offset-2 col-sm-7 col-md-offset-2 col-md-7">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="rem_me">Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-1 col-md-3 text-right">
                                <input type="submit" value="submit" class="btn btn-info" name="login">
                            </div>
                        </div>
                        <?php if ($this->uri->segment(3)==1) {?>
                            <div class="form-group" style="margin-bottom: -35px;">
                                <div class="col-xs-10 col-sm-7 col-md-12">
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Error: </strong> Incorrect Username and/or Password.
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
