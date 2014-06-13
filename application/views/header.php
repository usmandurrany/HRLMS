<?php 
if(!isset($_COOKIE["usr_name"])){
    header("location: index.php");
}
if(($page=="profile" )||($page=="emp_leaves" )||($page=="conf_leave" )||(isset($_POST["report"]))){
    $num_leaves=$row["allowed_leaves"];
    $id=(isset($_GET["id"])) ? $_GET["id"] : $_POST["id"];
    
    //Short Leave
    $query_short = 'SELECT * FROM `leaves` WHERE emp_id="'.$id.'" AND type="Short Leave"';
    $result_short = mysql_query($query_short)or die(mysql_error());
    $rows_short = mysql_num_rows($result_short);
    $short_leave = ($rows_short/3);
    $short_leave = intval($short_leave);
    $num_leaves=($num_leaves-$short_leave);
    
    //Half Day
    $query_half = 'SELECT * FROM `leaves` WHERE emp_id="'.$id.'" AND type="Half Day"';
    $result_half = mysql_query($query_half)or die(mysql_error());
    $rows_half = mysql_num_rows($result_half);
    $half_day = ($rows_half/2);
    $num_leaves=($num_leaves-$half_day);
    
    //Full Leave
    $query_full = 'SELECT * FROM `leaves` WHERE emp_id="'.$id.'" AND type="Full Leave"';
    $result_full = mysql_query($query_full)or die(mysql_error());
    $rows_full = mysql_num_rows($result_full);
    $full_leave = $rows_full;
    $num_leaves=($num_leaves-$full_leave);
    
    if ((isset($row["picture_id"]))||(isset($_GET["pic_id"]))){
        if (isset($row["picture_id"]))
            $picture=$row["picture_id"];
        if(isset($_GET["pic_id"]))
            $picture=$_GET["pic_id"];
        $query = 'SELECT * FROM `pictures` WHERE id="'.$picture.'"';
        $result = mysql_query($query);
        if($result){
            $picture = mysql_fetch_array($result);
        }
    }
}
?>
<html>

<head>
  
    <title>Test title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/offcanvas.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link href="css/smoothness/jquery-ui-1.10.4.custom.css" rel="stylesheet" media="screen">
    <link href="css/formhelper.css" rel="stylesheet" media="screen">
    <link href="css/jquery.dataTables.css" rel="stylesheet" media="screen">

    <script src="js/bootstrap.min.js"></script>
    <script src="js/formhelper.js"></script>
    <script src="js/jquery-ui-1.10.4.custom.js"></script>
    <script src="js/jquery.dataTables.js"></script>


    <script>
        $(document).ready(function() {
            $('[data-toggle=offcanvas]').click(function() {
                $('.row-offcanvas').toggleClass('active')
            });

$('#type').on('change', function() {
  //alert( this.value ); // or $(this).val()
    var datepicker=$('.datepicker');
    var from=$('#from');
    var to=$('#to');
    
    if(this.value == "Full Leave"){
        //alert(this.value)
        from.addClass('hidden');
        to.addClass('hidden');
        datepicker.removeClass('hidden');
        
    }else if((this.value == "Half Day")||(this.value == "Short Leave")) {
        //alert(this.value)
        from.removeClass('hidden');
        to.removeClass('hidden');
        datepicker.addClass('hidden');
        
    }
    
});
            $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();

    $("#table tbody tr").each(function(index) {
        
            $row = $(this);

            var id = $row.find("td:nth-child(2)").text();
            if (id.toLowerCase().indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        
    });
});
        });
        
    </script>
    <script type="text/javascript">
        function printPartOfPage(elementId) {
            var printContent = document.getElementById(elementId);
            var windowUrl = 'about:blank';
            var uniqueName = new Date();
            var windowName = 'Print' + uniqueName.getTime();

            var printWindow = window.open(windowUrl, windowName, 'left=0,top=0,width=1425,height=800', $("#table_filter,#table_info,#table_length,#table_paginate,.panel-heading").css({display:"none"}), $("#branding").css({display:"block",margin:"0 auto",width:"75%"}), $("table thead th").css({border:"1px solid","text-align":"center"}),$("#table tbody td").css({border:"1px solid #ccc","text-align":"center"}));

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
    <script>
        $(function() {

            $("#tag").autocomplete({
                source: "autocomplete.php?autocomplete=<?php echo $page;?>",
                minLength: 2,
                select: function(event, ui) {
                    var input = $(".appended")
                    if (input.length == 0) {
                        $(".append").append("<input type='hidden' name='id' class='appended' value='" + ui.item.id + "'/>");
                    } else {
                        input.remove();
                        $(".append").append("<input type='hidden' name='id' class='appended' value='" + ui.item.id + "'/>");
                    }

                }

            });
            $("#dept").autocomplete({
                source: "autocomplete.php?autocomplete=<?php echo $page;?>&type=dept",
                minLength: 2,
            });
            $("#desig").autocomplete({
                source: "autocomplete.php?autocomplete=<?php echo $page;?>&type=desig",
                minLength: 2,
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

    <script type="text/javascript">
    function enable(button) {
        var fieldset = document.getElementsByClassName("disable");
        var i;
        for (i = 0; i < fieldset.length; i++) {
            fieldset[i].removeAttribute("disabled"); //removes the attribute
        }
        //fieldset[1].removeAttribute("disabled"); //removes the attribute
        //fieldset.setAttribute("disabled"); //sets the attribute
        button.remove();

    }
    $(document).ready(function() {
        $('#table').dataTable();
    });
</script>
</head>

<body>
    <div class="navbar navbar-default navbar-static-top" role="navigation">
            <?php if(($page=="profile" )||($page=="emp_leaves" )||($page=="add_emp" )||($page=="conf_leave" )){ ?>
            <p class="pull-left visible-xs">
                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas">
                    <span class="sr-only">Toggle sidebar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </p>
            <?PHP }?>
            <div class="navbar-brand visible-sm visible-md visible-lg">
               <a href="add_leave.php">HR - Leave Managment System</a>
            </div>
            <div style="position: absolute;top: 0;left: 90px;border-radius:15px;overflow:hidden;">
  <img src="images/logo-nav.png">
  
  </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <div class="navbar-header">
                
                <div class="navbar-collapse collapse" style="height: 1px;">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Leaves
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="add_leave.php">Add Leave</a>
                                <a href="all_leaves.php">View All Leaves</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Employees
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="add_emp.php">Add Employee</a>
                                <a href="all_emp.php">View All Employees</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="reports.php?type=leave_rpt">Leave Report</a>
                                <a href="reports.php?type=emp_rpt">Employee Report</a>
                                <a href="reports.php?type=sys_rpt">System Report</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_POST["report"])){ ?>
                <li>
                        <a href="#" onclick="printPartOfPage('container')">Print
                        </a>
                </li>
                <?php }?>
                    
                </ul>
            </div>
            </div>
            
            <!--/.nav-collapse -->
        </div>
    
    <div class="container" id="container">
    <div id="branding" style="display:none;">
<table>
    <tr>
        <td>
            <img src="images/logo.png" class="pull-left img-responsive" />
        </td>
        <td>
            <h1>HR - Leave Managment System</h1>
            <?php if($_GET["type"]=="leave_rpt"){echo "Employee name: <b>".$_POST["ename"]."</b> <div style='float:right'>Date: <b>".$_POST["from"]." - ".$_POST["to"]."</b></div>";}elseif ($_GET["type"]=="emp_rpt"){echo "Employee Report for ".$_POST["ename"];}?>
        </td>
    </tr>
</table>
    </div>
        <div class="row row-offcanvas row-offcanvas-left">
            <?php if(($page=="profile" )||($page=="emp_leaves" )||($page=="add_emp" )||($page=="conf_leave" )){ ?>
            <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3 sidebar-offcanvas" id="sidebar" role="navigation">
                <img src="<?php if(isset($picture[1])){ echo $picture[1];}else{echo "images/default.png";} ?>" class="img-thumbnail img-responsive" alt="Profile picture_id" style="display:block;width:200px;" />
                <?php if(($page=="profile" )||($page=="emp_leaves" )){ ?>
                <div class="list-group img-responsive">
                    <a href="profile_page.php?id=<?php echo $_GET["id"]?>" class="list-group-item ">Profile</a>
                    <a href="emp_leaves.php?id=<?php echo $_GET["id"]?>" class="list-group-item ">Show all leaves</a>
                </div>
                <?php }?>
                <?php if(($page=="conf_leave" )||($page=="profile" )){ ?>
                <ul class="list-group img-responsive">
                    <li class="list-group-item ">Name:
                        <?php echo $row[ "ename"] ?>
                        
                </li>
                        <li class="list-group-item ">Department:
                            <?php echo $row[ "dept"] ?>
                            
        </li>
                            <li class="list-group-item ">Designation:
                                <?php echo $row[ "desig"] ?>
                                </li>
                                <li class="list-group-item ">Leaves Left:
                                    <span class="badge pull-right <?php if(($num_leaves>=0)&&($num_leaves<=10)){echo "badge-critical";}elseif(($num_leaves>10)&&($num_leaves<=20)){echo "badge-warning";}elseif(($num_leaves>20)&&($num_leaves<=30)){echo "badge-success";} ?>">
                                        <?php echo $num_leaves; ?>
                                    </span>
                                    </li>
                </ul>
                <?php }?>
            </div>
            <?php }?>