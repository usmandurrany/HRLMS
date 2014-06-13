<?php include "db_conn.php"; $page="profile" ;?>
<script type="text/javascript" src="<?php echo base_url();?>js/ajax.js"></script>

<script type="text/javascript">
$("#form_pic").on("submit", function(event) {
    event.preventDefault();
    var formData = new FormData();
    jQuery.each($("#picture")[0].files, function(i, file) {
        formData.append('picture', file);
    });
    $.ajax({
        type: $("#form_pic").attr("method"),
        url: $("#form_pic").attr('action'),
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data) {
            $('#ajax-content').html(data);

            // alert(data);  //as a debugging message.
        }
    }); // you have missed this bracket
    return false;
});
</script>
<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">

            <div id="top-panel" class="col-xs-12">
                <h1 class="pull-left">
                    <?php echo $row->ename?>


                </h1>
                <a href="<?php echo base_url();?>index.php/view/view_emp_leaves/<?php echo $this->uri->segment(3);?>" class="ajax-link leaves btn <?php if(($num_leaves>=0)&&($num_leaves<=10)){echo " btn-danger ";}elseif(($num_leaves>10)&&($num_leaves<=20)){echo "btn-warning ";}elseif(($num_leaves>20)&&($num_leaves<=30)){echo "btn-success ";} ?>">
                    <?php echo $num_leaves; ?>Leaves left
                </a>
            </div>

        </div>
    </div>
</header>
<?php $i=0;
 foreach ($result as $row) { 
 // die(print_r($result). " ".print_r($row));
  if ($i !=1 ) { ?>
<div class="col-xs-12 col-sm-12 panel panel-default">

    <div class="panel-body">
        <form class="form-horizontal" id="form" method="post" action="<?php echo base_url();?>index.php/formProcess/edit_emp">
            <div class="col-xs-2">
                <img src="<?php if(($row->pic_url!=" ")||($row->pic_url!="")||($row->pic_url!="null")||($row->pic_url!="undefined")){ echo $row->pic_url;}else{echo base_url()."img/profile_pics/default.png ";} ?>" class="img-thumbnail img-responsive" alt="Profile picture_id" style="display:block;width:200px;" />
            </div>
            <div class="col-xs-10 form-group">
                <div class="col-xs-2">
                    <label for="fname">Full Name:</label>
                </div>
                <div class="col-xs-10">
                    <input type="text" name="ename" value="<?php echo $row->ename;?>" class="form-control" id="fname" placeholder="Full Name">
                </div>
            </div>
            <div class="col-xs-10 form-group">
                <div class="col-xs-2">
                    <label for="depart">Department:</label>
                </div>
                <div class="col-xs-10">
                    <input type="text" name="dept" class="form-control" value="<?php echo $row->dept;?>" placeholder="Department">
                </div>
            </div>
            <div class="col-xs-10 form-group">
                <div class="col-xs-2">
                    <label for="desig">Designation:</label>
                </div>
                <div class="col-xs-10">
                    <input type="text" name="desig" class="form-control" value="<?php echo $row->desig;?>" placeholder="Designation">
                </div>
            </div>
            <div class="clearfix">
                <hr>
            </div>
            <div class="col-xs-6">
                <div class="col-xs-4">
                    <label for="doa">Date of appointment:</label>
                </div>
                <div class="col-xs-8">
                    <div class="bfh-datepicker" data-name="doa" data-date="<?php echo $row->doa;?>"></div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="col-xs-4">
                    <label for="dob">Date of birth:</label>
                </div>
                <div class="col-xs-8">
                    <div class="bfh-datepicker" data-name="dob" data-date="<?php echo $row->dob;?>"></div>
                </div>
            </div>
            <div class="clearfix">
                <hr>
            </div>
            <div class="col-xs-6">
                <div class="col-xs-4">
                    <label for="p1">Ph #1:</label>
                </div>
                <div class="col-xs-8">
                    <input type="text" class="form-control" value="<?php echo $row->ph1;?>" name="ph1" id="p1" placeholder="Ph #1" />
                </div>
            </div>
            <div class="col-xs-6">
                <div class="col-xs-4">
                    <label for="p2">Ph #2:</label>
                </div>
                <div class="col-xs-8">
                    <input type="text" class="form-control" value="<?php echo $row->ph2;?>" name="ph2" id="p2" placeholder="Ph #2" />
                </div>
            </div>
            <div class="clearfix">
            <br>
        </div>
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label for="email">Email Address:</label>
                </div>
                <div class="col-xs-10">
                    <input type="email" class="form-control" value="<?php echo $row->email;?>" name="email" id="email" placeholder="Email Address">
                </div>
            </div>
            <div class="clearfix">
            <br>
        </div>
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label for="address">Address:</label>
                </div>
                <div class="col-xs-10">
                    <input type="address" class="form-control" value="<?php echo $row->address;?>" name="address" id="address" placeholder="Address">
                </div>
            </div>
            <div class="clearfix">
                <hr>
            </div>

            <div class="col-sm-12 ">
                <input value="save" type="submit" id="submit" name="profile" class="btn btn-default pull-right">
                <input value="<?php echo $this->uri->segment(3);?>" type="hidden" name="id">

            </div>
        </form>
        <div class="clearfix">
            <br>
        </div>
        <form method="post" id="form_pic" action="<?php echo base_url();?>index.php/uploads/emp_pic/update?id=<?php echo $this->uri->segment(3);?>&pic_id=<?php echo $row->picture_id;?>" enctype="multipart/form-data">
            <div class="col-xs-12">
                <input type="file" name="picture" id="picture" class="form-control">
            </div>
            <div class="clearfix">
                <hr>
            </div>
            <div class="col-xs-6 col-sm-12">
                <input value="save" type="submit" name="profile_pic" class="btn btn-default pull-right">
            </div>
        </form>
    </div>
</div>
<?php }$i++;}?>
