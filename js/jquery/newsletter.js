$(function() {
    $("#newsletter-type").change(function(){
        $("#select-emails-row").toggle("slow");
    });
    $("#send-newsletter").click(function(){
        $("#send-newsletter").hide();
        $("#send-newsletter-loader").show();
        $(".success-message").hide();
        $(".failure-message").hide();
        newsletter_type = $("#newsletter-type").val();
        email = $("#search").val();
        message = $("#message").val();
        
        $.ajax({
            url: 'send_newsletter_mail.php',
            type: 'POST',
            data: {
                newsletter_type  : newsletter_type,
                email   : email,
                message   : message
            },
            success: function(data){
                $("#send-newsletter-loader").hide();
                $("#send-newsletter").show();
                if(data){
                    $(".success-message").show();
                }else{
                    $(".failure-message").show();
                }
            },
            error: function(){
                $("#error-update-data").show();
            }
        });
    });
});