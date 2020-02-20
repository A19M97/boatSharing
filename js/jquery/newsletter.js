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
        if(newsletter_type == 'custom'){
            var email = $("#selected-emails").find(".selected-email").text();
        }else{
            var email = null;
        }
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

    $(".email-container").click(function(){
        alert("ciao");
        email = this.data("email");
        alert(email);

    });
});

function email_click(element){
    email = $(element).data("email");
    $("#selected-emails").append('<span class="selected-email">'+email+',</span>');
    $(".search").val('');
    $("#results").hide();
}