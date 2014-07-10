<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">

            <div id="top-panel" class="col-xs-12">

                <h1>Add leave -
                    <?php echo date( "m/d/y"); ?>
                </h1>

            </div>
        </div>
    </div>
</header>
<?php $page="add_leave" ; include "db_conn.php"; ?>
<script type="text/javascript" src="<?php echo base_url();?>js/ajax.js"></script>
<!--<script>
$(function() {

    $("#tag").autocomplete({
        source: "<?php echo base_url();?>index.php/autocomplete",
        minLength: 2,
        select: function(event, ui) {
            var input = $(".appended")
            if (input.length == 0) {
                $(".append").append("<input type='hidden' name='id' class='appended' value='" + ui.item.id + "'/>");
            } else {
                input.remove();
                $(".append").append("<input type='hidden' name='id' class='appended' value='" + ui.item.id + "'/>");
            }

            $("#submit").removeAttr('disabled');

        }

    }).keyup(function() {

        $("#submit").attr("disabled", "");
    });

</script>-->




<div class="col-xs-12 col-sm-12  center panel panel-default">
    <!-- <div class="panel-heading">
        <h3 class="panel-title">
            Add Leave
        </h3>
    </div> -->
    <div class="panel-body">
        <form class="form-horizontal append" id="form" action="<?php echo base_url();?>index.php/view/view_conf_leave/FALSE/FALSE/FALSE">
            <div class="form-group">
                <label for="tag" class="col-sm-2">Employee Name</label>
                <div class="col-sm-10">
                    <input type="text" name="ename" class="form-control tag" id="tag" placeholder="Employee name" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="date" class="col-sm-2">Today's Date:</label>
                <div class="col-sm-10 has-feedback">

                    <input name="date" value="<?php echo date('d-m-Y'); ?>" disabled="disabled" class="form-control">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id="submit" class="btn btn-default" disabled="">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
