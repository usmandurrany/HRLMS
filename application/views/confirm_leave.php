<?php $page="conf_leave";?>
<?php
include 'db_conn.php';
?>


<?php

if (isset($_GET["do"])){

    $edit1 = 'SELECT * FROM `leaves` WHERE id="'.$_GET['leave_id'].'"';
    $edit = mysql_query($edit1);
    $edit_result = mysql_fetch_array($edit);

    $name=$edit_result["name"];
    $date=$edit_result["date"];
    $type=$edit_result["type"];
    $from=$edit_result["from"];
    $to=$edit_result["to"];
    $reason=$edit_result["reason"];

}

?>
<script>
$(document).ready(function() {
    var datepicker = $('.datepicker');
    var late = $('.late');
    var from = $('.from');
    var to = $('.to');
    if ($('#type').val() == "3 Late 1 Leave") {
        late.addClass("hidden");
}
    else if ($('#type').val() == "Full Leave") {
        //alert(this.value)
        from.addClass('hidden');
        to.addClass('hidden');
        datepicker.removeClass('hidden');

    } else if (($('#type').val() == "Half Day") || ($('#type').val() == "Short Leave")) {
        //alert(this.value)
        from.removeClass('hidden');
        to.removeClass('hidden');
        datepicker.addClass('hidden');

    }

    $('#type').on('change', function() {
        //alert( this.value ); // or $(this).val()

    if ($('#type').val() == "3 Late 1 Leave") {
        late.addClass("hidden");
}
    else if ($('#type').val() == "Full Leave") {
            //alert(this.value)
            late.removeClass("hidden");
            from.addClass('hidden');
            to.addClass('hidden');
            datepicker.removeClass('hidden');

        } else if ((this.value == "Half Day") || (this.value == "Short Leave")) {
            //alert(this.value)
            late.removeClass("hidden");

            from.removeClass('hidden');
            to.removeClass('hidden');
            datepicker.addClass('hidden');

        }

    });

});
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/ajax.js"></script>


<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            
            <div id="top-panel" class="col-xs-12">
                
                <h1>Leave Details</h1>
            </div>
        </div>
    </div>
</header>
<div class="col-xs-12 col-sm-12 panel panel-default">
    
    <div class="panel-body">
        <?php foreach ($result as $row) {?>
        <?php if ($num_leaves!=0) {
        ?>
        <form class="form-horizontal" method="post" id="form" action="<?php echo base_url();?>index.php/formProcess/add_leave">
            <div class="col-xs-12 col-sm-12">
                <h4 class="text-left col-md-6"><b>Name: </b><?php echo $row->ename;?></h4><h4 class="text-right col-md-6"><b>Date: </b><?php if($this->uri->segment(5)=="edit"){echo $row->date;}else{ echo $_GET["date"];}?></h4>
                
            </div>
            <div class="col-xs-12 col-sm-12">
                <label for="fname">Type:</label>
                <select class="form-control" id="type" name="type" value="">
                    <option><?php if($this->uri->segment(5) == "edit"){ echo $row->type;}?></option>
                    <option>Short Leave</option>
                    <option>3 Late 1 Leave</option>
                    <option>Full Leave</option>
                    <option>Half Day</option>
                </select>
            </div>
            <div class="late">
            <div class="col-xs-6 col-sm-6">
                <label>From:</label>
                
                <div class="bfh-datepicker hidden datepicker" data-name="date-from" data-date="<?php if($this->uri->segment(5) == "edit"){  echo $row->from;}else{echo date('d/m/Y');}?>" data-required></div>
                                            <div class="bfh-timepicker from" data-name="time-from" data-date="<?php if($this->uri->segment(5) == "edit"){ echo $row->from;}?>" data-required></div>
            </div>
            <div class="col-xs-6 col-md-6">
                <label>To:</label>
                
                                            <div class="bfh-datepicker hidden datepicker" data-name="date-to" data-date="<?php if($this->uri->segment(5) == "edit"){  echo $row->to;}else{echo date('d/m/Y');}?>" data-required></div>
                                            <div class="bfh-timepicker to" data-name="time-to" data-date="<?php if($this->uri->segment(5) == "edit"){  echo $row->to;}?>" data-required></div>

            </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <label for="fname">Reason:</label>
                <textarea class="form-control" name="reason" rows="3" required><?php  if($this->uri->segment(5) == "edit"){ echo $row->reason;}?></textarea>
            </div>
            <div class="clearfix"><br></div>
            <div class="col-xs-12 col-sm-12">
                <label>&ensp;</label>
                <button type="submit" id="submit" name="add_leave" class="pull-right btn btn-default">Submit</button>
                <input type="hidden" name="id" value="<?php if($this->uri->segment(5) == "edit"){ echo $this->uri->segment(3); }else{echo $_GET["id"];}?>" />
                <input type="hidden" name="l_id" value="<?php if($this->uri->segment(5) == "edit"){ echo $this->uri->segment(4);}?>" />
                <input type="hidden" name="ename" value="<?php echo $row->ename; ?>" />
                <input type="hidden" name="leave_date" value="<?php if($this->uri->segment(5) == "edit"){ echo $row->date;}else{echo $_GET['date'];}?>" />
                <input type="hidden" name="edit" value="<?php if($this->uri->segment(5) == "edit"){ echo "do";}?>" />
                <input type="hidden" name="num_leaves" value="<?php echo $num_leaves;?>" />
            </div>
        </form>
    </div>
    <?php } else {
    echo "The Employee ".$row->ename." does not have any leaves left!";
    }?>
    <?php }?>
</div>