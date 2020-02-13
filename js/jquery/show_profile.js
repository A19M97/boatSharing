$(function() {
    $("#profile-img-figcaption").click(function(){
        $("#profile-image-selector").toggle();
    });

    $(document.body).on('click',"#update-user-data", function() {
        convert_text_to_input_form_element($("#profile-name"));
        convert_text_to_input_form_element($("#profile-surname"));
        convert_text_to_input_form_element($("#profile-email"));
        $("#update-user-data").replaceWith("<input type=\"button\" class=\"show-profile-button\" id=\"save-user-data\" value=\"Salva\">");
       
    });
    
    $(document.body).on('click','#save-user-data', function() {  

        var first_name = $("#profile-name").val();
        var last_name = $("#profile-surname").val();
        var new_email = $("#profile-email").val();

        $("#save-user-data").hide();
        $("#save-user-data-loader").css('display','inline-block');
        $("#error-update-data").hide();

        $.ajax({
            url: 'update_profile.php',
            type: 'POST',
            data: {
                first_name  : first_name,
                last_name   : last_name,
                new_email   : new_email
            },
            success: function(data){
                alert(data);
                data = JSON.parse(data);
                if(data['code'] == 0){
                    convert_input_form_element_to_text($("#profile-name"));
                    convert_input_form_element_to_text($("#profile-surname"));
                    convert_input_form_element_to_text($("#profile-email"));
                    $("#save-user-data").replaceWith("<input type=\"button\" class=\"show-profile-button\" id=\"update-user-data\" value=\"Modifica\">");
                    $("#save-user-data-loader").hide();
                    $("#save-user-data").show();
                }else{
                    $("#save-user-data-loader").hide();
                    $("#save-user-data").show();
                    $("#error-update-data").show();
                    $("#error-update-data div span").text(data['message']);
                }
            },
            error: function(){
                $("#error-update-data").show();
            }
        });
    });
});


function convert_text_to_input_form_element(element) {
    fieldName = element.attr("id");
    fieldValue = element.text();
    element.replaceWith("<input type='text' id='" + fieldName + "' name='" + fieldName + "' value='" + fieldValue + "' class='info-input'/>")
}
function convert_input_form_element_to_text(element) {
    fieldName = element.attr("id");
    fieldValue = element.val();
    element.replaceWith("<span id="+ fieldName +" class=\"text-info text-info-uppercase\">"+ fieldValue +"</span>");
}