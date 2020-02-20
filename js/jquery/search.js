$(function() {
    $(".search").keyup(function() {
        //     $("#send-newsletter").hide();
        //     $("#send-newsletter-loader").show();
        //     $(".success-message").hide();
        //     $(".failure-message").hide();
        //     newsletter_type = $("#newsletter-type").val();
        //     email = $("#email").val();
        var chars = $(".search").val();
        $("#results").html("");
        $("#results").show();
        $.ajax({
            url: 'search.php',
            type: 'GET',
            data: {
                chars : chars
            },
            success: function(data){
                if(data == "no_results")
                    $("#results").append("Nessun risultato da mostrare...");
                else{
                    data = JSON.parse(data);
                    data.forEach(element => {
                        $("#results").append("<div class=\"email-container no-gutters pointer\" data-email=\""+element+"\" onclick=\"email_click(this);\">"+ element +"</div>");
                    });
                    $("#result-search-container").show();
                }
            },
            error: function(){
                $("#error-update-data").show();
            }
        });
    });        
});