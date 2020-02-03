$(function() {
    
    $('#send-message').click( function(){

        var email = $("#email").val();
        var message = $("#message").val();

        alert(email+" "+ message);

        $("#send-message").hide();
        $("#send-message-loader").css('display','inline-block');

        $.ajax({
            url: 'php/send_contact_mail.php',
            type: 'POST',
            data: {
                email     : email,
                message   : message
            },
            success: function(data){
                $("#send-message-loader").hide();
                $("#send-message").show();
            }
        });
    });
});