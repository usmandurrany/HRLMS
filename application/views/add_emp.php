<?php include 'db_conn.php'; ?>
<script type="text/javascript" src="<?php echo base_url();?>js/ajax.js"></script>

<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">

            <div id="top-panel" class="col-xs-12">

                <h1>Add Employeee</h1>

            </div>
        </div>
    </div>
</header>
<div class="col-xs-12 col-sm-12  panel panel-default">

    <div class="panel-body">
        <form class="form-horizontal" id="form" method="post" action="<?php echo base_url();?>index.php/view/view_emp_pic">
            <h3>Personal Information</h3>
            <div class="col-xs-2">
                <label for="fname">Full Name:</label>

            </div>
            <div class="col-xs-10">

                <input type="text" required name="ename" class="form-control" id="fname" placeholder="Full Name">
            </div>
            <div class="clearfix">
                <br>
            </div> 
            <div class="col-xs-2">
                <label for="depart">Department:</label>
            </div>
            <div class="col-xs-4">
                <input type="text" required name="dept" class="form-control" placeholder="Department">
            </div>
            <div class="col-xs-2">
                <label for="desig">Designation:</label>
            </div>
            <div class="col-xs-4">
                <input type="text" required name="desig" class="form-control" placeholder="Designation">
            </div>
            <div class="clearfix">
                <hr>
            </div>
            <div class="col-xs-2">
                <label for="doa">Date of appointment:</label>
            </div>
            <div class="col-xs-4">
                <div class="bfh-datepicker" data-name="doa"></div>


            </div>
            <div class="col-xs-2">
                <label for="dob">Date of birth:</label>
            </div>
            <div class="col-xs-4">
                <div class="bfh-datepicker" data-name="dob"></div>


            </div>
            <div class="clearfix">
                <hr>
            </div>
            <h3>Contact Information</h3>
            <div class="col-xs-2">

                <label for="p1">Ph #1:</label>
                </div>
            <div class="col-xs-4">
                <input type="text" required class="form-control" name="ph1" id="p1" placeholder="Ph #1" />
            </div>
            <div class="col-xs-2">

                <label for="p2">Ph #2:</label>
                </div>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="ph2" id="p2" placeholder="Ph #2" />
            </div>
            <div class="clearfix">
                <br>
            </div>
                        <div class="col-xs-2">

                <label for="email">Email Address:</label>
                </div>
            <div class="col-xs-10">

                <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
            </div>
            <div class="clearfix">
                <br>
            </div>
                        <div class="col-xs-2">

                <label for="address">Address:</label>
                </div>
            <div class="col-xs-10">
                <input type="address" class="form-control" name="address" id="address" placeholder="Address">
            </div>
            <div class="clearfix">
                <hr>
            </div>

            <div class="col-xs-6 col-sm-12">
                <input value="save" type="submit" id="submit" name="add_emp" class="btn btn-default pull-right">
            </div>
        </form>

    </div>
</div>
