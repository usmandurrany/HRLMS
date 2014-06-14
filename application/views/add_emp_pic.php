<script type="text/javascript">
    $("#form").on("submit", function(event) {
        event.preventDefault();
        var formData = new FormData();
        jQuery.each($("#picture")[0].files, function(i, file) {
            formData.append('picture',file);
        });
        $.ajax({
            type: $("#form").attr("method"),
            url: $("#form").attr('action'),
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
                        
    <h1>Add Employee's picture</h1>

                </div>
            </div>
        </div>
</header>
<div class="col-xs-12 col-sm-12  panel panel-default">
    
    <div class="panel-body">
 <h3>Display Picture</h3>

        <form method="post" id="form" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/uploads/emp_pic/create_new?id=<?php echo $id;?>">
            <div class="col-xs-12">
                <input type="file" name="picture" id="picture">
            </div>
            <div class="clearfix">
                <hr>
            </div>
            <div class="col-xs-6 col-sm-12">
                <input value="Save" type="submit" name="add_emp_pic" id="submit" class="btn btn-primary pull-right">
            </div>
        </form>
        </div>
        
        </div>
    