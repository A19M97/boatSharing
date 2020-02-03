$(function() {
    
    $('#send-message').click( function(){

        var email = $("#email").val();
        var message = $("#message").val();
        var name = $("#name").val();

        $("#send-message").hide();
        $("#send-message-loader").css('display','inline-block');

        $.ajax({
            url: 'send_contact_mail.php',
            type: 'POST',
            data: {
                email       : email,
                message     : message,
                name        : name
            },
            success: function(data){
                $("#send-message-loader").hide();
                $("#send-message").show();
                if(data){
                    $(".failure-message").hide();
                    $(".success-message").show();
                }
                else{
                    $(".success-message").hide();
                    $(".failure-message").show();
                }
            }
        });
    });
});