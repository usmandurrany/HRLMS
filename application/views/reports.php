<?php
include "db_conn.php";
$page="reports";

?>

 <script type="text/javascript" src="<?php echo base_url();?>js/ajax.js"></script>
<div id="branding" style="display:none;">
    <table>
        <tr>
            <td>
                <img src="<?php echo base_url();?>img/logo.png" class="pull-left img-responsive" />
            </td>
            <td>
                <h1>HR - Leave Managment System</h1>
                <?php if ($this->uri->segment(3)=="emp_rpt") {
                    if (($this->input->post('desig')!="")&&($this->input->post('dept')!="")&&(isset($_POST["report"]))){
                        $string = "Designation <b>".$this->input->post('desig')."</b> and Departmant <b>".$this->input->post('dept')."</b>";
                    }elseif (($this->input->post('dept')!="")&&(isset($_POST["report"]))){
                        $string = "Departmant <b>".$this->input->post('dept')."</b>";
                    }elseif (($this->input->post('desig')!="")&&(isset($_POST["report"]))){
                        $string = "Designation <b>".$this->input->post('desig')."</b>";
                    }
                }
                ?>
                <?php if(isset($_POST["report"])){ if($this->uri->segment(3)=="leave_rpt" ){echo "Employee name: <b>".$this->input->get_post('ename'). "</b> <div style='float:right'>&nbsp; Date: <b>".$this->input->get_post('from'). " - ".$this->input->get_post('to'). "</b></div>";}elseif ($this->uri->segment(3)=="emp_rpt" ){echo "Employee Report for ".$string;}}?>
            </td>
        </tr>
    </table>
</div>
<?php
if($this->uri->segment(3)=='leave_rpt')
{
if (!isset($_POST["report"])){

?>

<script src="js/formhelper.js"></script>
<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">

            <div id="top-panel" class="col-xs-12">

                <h1>Leave report</h1>
            </div>
        </div>
    </div>
</header>
<div class="col-xs-12 col-sm-12 center panel panel-default">

    <div class="panel-body">
        <form class="form-horizontal append" method="post" id="form" action="<?php echo base_url();?>index.php/view/view_reports/leave_rpt">
            <div class="col-xs-12 col-sm-12">
                <label for="tag">Employee Name</label>
                <input type="text" name="ename" class="form-control" id="tag" placeholder="Employee name" required>
            </div>

            <div class="col-xs-6 has-feedback">
                <label for="doa">From:</label>
                <div class="bfh-datepicker" data-name="from"></div>
            </div>
            <div class="col-xs-6">
                <label for="dob">To:</label>
                <div class="bfh-datepicker" data-name="to"></div>
            </div>
            <div class="clearfix">
                <br>
            </div>
            <div class="col-sm-12">
                <input type="submit" id="submit" class="btn btn-default pull-right" value="submit" disabled="">
                <input name="report" class="hidden" value="leave">
            </div>
        </form>
    </div>
</div>

<?php
}
elseif (isset($_POST["report"])){
?>

<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">

            <div id="top-panel" class="col-xs-12">

                <h1>Leaves from
                    <?php echo date( "d-m-Y",strtotime($this->input->post('from'))); ?> to
                    <?php echo date( "d-m-Y",strtotime($this->input->post('to'))); ?>
                </h1>
            </div>
        </div>
    </div>
</header>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel panel-default">

    <div class="panel-body">
        <table class="table table-hover" id="table">
            <thead>
                <tr>
                    <th class="extra">#</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th class="extra">Reason</th>
                    <th>Days</th>
                    <th>Type</th>
                </tr>
            </thead>
            <?php if($result != FALSE){?>
            <tbody>
                <?php foreach ($result as $row) {?>
                <tr>
                    <td class="extra">
                        <?php echo $row->id ?>
                    </td>
                    <td class="name">
                            <?php echo $row->name; ?>
                    </td>
                    <td>
                        <?php echo date( 'd-m-Y', strtotime($row->date)); ?>
                    </td>
                    <td>
                        <?php echo $row->from; ?>
                    </td>
                    <td>
                        <?php echo $row->to; ?>
                    </td>
                    <td class="extra">
                        <?php echo $row->reason; ?>
                    </td>
                    <td>
                        <?php echo $row->days; ?>
                    </td>
                    <td>
                        <?php echo $row->type; ?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
            <?php 
                }else {echo $result;}?>
            <tfoot>
                <tr>
                    <td class="extra"></td>
                    <td class="extra"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right;font-weight:bold">Total Leaves left:</td>
                    <td>
                        <?php echo $num_leaves; ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php }}
if($this->uri->segment(3)=='emp_rpt')
{
if (!isset($_POST["report"])){
?>
<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">

            <div id="top-panel" class="col-xs-12">

                <h1>Employees Report</h1>
            </div>
        </div>
    </div>
</header>
<div class="col-xs-12 col-sm-12 center panel panel-default">

    <div class="panel-body">
        <form class="form-horizontal append" method="post" id="form" action="<?php echo base_url();?>index.php/view/view_reports/emp_rpt">
            <div class="col-xs-6 col-sm-12">
                <label for="tag">Departmant:</label>
                <input type="text" name="dept" class="form-control" id="dept" placeholder="Deprtment" >
            </div>
            <div class="col-xs-6 col-sm-12">
                <label for="from">Designation:</label>
                <input type="text" name="desig" class="form-control" id="desig" placeholder="Designation" >
            </div>

            <div class="clearfix">
                <br>
            </div>
            <div class="col-sm-12">
                <input type="submit" id="submit" class="btn btn-default pull-right" value="submit" disabled="">
                <input name="report" class="hidden" value="emp">
            </div>
        </form>
    </div>
</div>

<?php
}
if (isset($_POST["report"])){
?>

<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">

            <div id="top-panel" class="col-xs-12">

                <h1>Employees</h1>
            </div>
        </div>
    </div>
</header>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel panel-default">

    <div class="panel-body">
        <table class="table table-hover" id="table">
            <thead>
                <tr>
                    <th class="extra">#</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th class="extra">Ph #1</th>
                    <th>Address</th>
                    <th class="extra">Email</th>
                </tr>
            </thead>
            <?php if($result != FALSE){?>
            <tbody>
                <?php foreach ($result as $row) {?>
                <tr>
                    <td class="extra">
                        <?php echo $row->id ?>
                    </td>
                    <td class="name">
                            <?php echo $row->ename; ?>
                    </td>
                    <td>
                        <?php echo $row->dept; ?>
                    </td>
                    <td>
                        <?php echo $row->desig; ?>
                    </td>
                    
                    <td class="extra">
                        <?php echo $row->ph1; ?>
                    </td>
                    <td class="extra">
                        <?php echo $row->address; ?>
                    </td>
                    <td>
                        <?php echo $row->email; ?>
                    </td>
                </tr>
                <?php }?>

            </tbody>
<?php 
                }else {echo $result;}?>
        </table>

    </div>
</div>
<?php 
    }
}?>