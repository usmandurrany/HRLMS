<?php
$num_leaves = 30;
if(!isset($page)){
	$page="";
}
//////////////////////////////LEAVES CALCULATION/////////////////////////////
    $id=$this->input->post('id') ?  $this->input->post('id') : $this->uri->segment(3);

    $this->db->where('id', $id);
    $query =$this->db->get('employees');
    foreach ($query->result() as $row) {
        $num_leaves = $row->leaves_left;
    }


/////////////////////////////END LEAVES CALCULATION/////////////////////////
?>
<?php if(($page!="ac") && ($page!="functions")) {?>
<script src="<?php echo base_url();?>js/formhelper.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("td,#top-panel").on('click', '.ajax-link', function(event) {
        event.preventDefault();
        var href = $(this).attr('href');

        $("#ajax-content").load(href);


        // alert(href);
    });
    
});
</script>

<script>
$(function() {
    var value;
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

            $("#submit").removeClass('btn-default').addClass('btn-primary');


            value = ui.item.value;

        }

    }).keyup(function() {

        if (value != $("#tag").val()) {
            $("#submit").attr("disabled", "");  
            $("#submit").removeClass('btn-primary').addClass('btn-default');

        }
    });
    $("#dept").autocomplete({
        source: "<?php echo base_url();?>index.php/autocomplete?type=dept",
        minLength: 2,
        select: function(event, ui) {
            $("#submit").removeAttr('disabled');
            $("#submit").removeClass('btn-default').addClass('btn-primary');

            value = ui.item.value;
        }
    }).keyup(function() {

        if (value != $("#dept").val()) {
            $("#submit").attr("disabled", "");  
            $("#submit").removeClass('btn-primary').addClass('btn-default'); 
        }
    });
    $("#desig").autocomplete({
        source: "<?php echo base_url();?>index.php/autocomplete?type=desig",
        minLength: 2,
        select: function(event, ui) {
            $("#submit").removeAttr('disabled');
            $("#submit").removeClass('btn-default').addClass('btn-primary');

            value = ui.item.value;

        }
    }).keyup(function() {

        if (value != $("#desig").val()) {
            $("#submit").attr("disabled", ""); 
            $("#submit").removeClass('btn-primary').addClass('btn-default');

        }
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {

    $('#table').dataTable({
        "iDisplayLength" : 100
    });
    $('table').delegate(".delete","click", function() {
        var id = $(this).attr("id");
        var name = $(this).attr("name");
        // var type = $(this).attr("type");
        var page = $(this).attr("page");
        var name2 = name.replace('_', ' ');
        // if (type == 'sale') {
        //     var table = "client";
        // } else if (type == 'purchase') {
        //     var table = "supplier";
        // }
        if (page == 'emp_leaves') {
            var request = 'Are you sure you want to delete the leave of' + name2;
        } else if (page == 'all_leaves') {
            var request = 'Are you sure you want to delete this leave';
        } else if (page == 'all_emp') {
            var request = 'WARNING : DELETING THIS WILL ERASE ALL DATA OF `' + name2.toUpperCase() + "`";
        }
        if (confirm(request)) {

            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>index.php/view/view_delete/' + id + '/' + page + '/' + name,
                cache: false,
                success: function(data) {
                    // alert(data);
                    $("#ajax-content").html(data);
                }
            });
            return false;
        }
    });
});
</script>

<?php }?>