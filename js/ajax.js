$("#form").on("submit", function(event) {
    event.preventDefault();
    $.ajax({
        type: $("#form").attr("method"),
        url: $("#form").attr('action'),
        data: $("#form").serialize(),
        dataType: "text",
        cache: false,
        success: function(data) {
            $('#ajax-content').html(data);

            // alert(data);  //as a debugging message.
        }
    }); // you have missed this bracket
    return false;
});