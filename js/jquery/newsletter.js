$(function() {
    $("#newsletter-type").change(function(){
        $("#select-emails-row").toggle("slow");
    });
    $("#send-newsletter").click(function(){
        newsletter_type = $("#newsletter-type").val();
        email = $("#email").val();
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
                
                // data = JSON.parse(data);
                // if(data['code'] == 0){
                //     convert_input_form_element_to_text($("#profile-name"));
                //     convert_input_form_element_to_text($("#profile-surname"));
                //     convert_input_form_element_to_text($("#profile-email"));
                //     $("#save-user-data").replaceWith("<input type=\"button\" class=\"show-profile-button\" id=\"update-user-data\" value=\"Modifica\">");
                //     $("#save-user-data-loader").hide();
                //     $("#save-user-data").show();
                // }else{
                //     $("#save-user-data-loader").hide();
                //     $("#save-user-data").show();
                //     $("#error-update-data").show();
                //     $("#error-update-data div span").text(data['message']);
                // }
            },
            error: function(){
                $("#error-update-data").show();
            }
        });
    });
});