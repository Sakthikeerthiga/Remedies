var searchRequest = null;
var base_url = 'http://localhost/Remedies/';

// Ajax post  
$(document).ready(function(){  
    $("#submit").click(function(){  
        var email = $("#email").val();  
        var password = $("#password").val();  
// Returns error message when submitted without req fields.  
if(email==''||password=='')  
{  
    jQuery("div#err_msg").show();  
    jQuery("div#msg").html("Please Enter All the fields"); 
}  
});  
});

$( function() {
    $( "#user_dob" ).datepicker();
} );

function ValidateEmail() {
    var regex =  /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    var email = $("#email").val(); 
    if(!regex.test(email)) {
        jQuery("#error_email").html("Please Enter the vaild email");  
        $(':input[type="submit"]').prop('disabled', true);
    }else{
        $.ajax({
            url : base_url + 'check_email',
            data: {useremail:email},
            cache : false,
            type: 'POST',
            success : function(response){
                if(response == 0){
                    $('#submit').prop('disabled', true);
                    jQuery("#error_email").html("E-mail already exist"); 
                }else{
                    $(':input[type="submit"]').prop('disabled', false);
                }

            }
        })
        jQuery("#error_email").html("");  
    }
};

function ValidateUsername() {
    var username = $("#username").val(); 
    if(username.length > 0){
        $.ajax({
            url : base_url + 'check_username',
            data: {username:username},
            cache : false,
            type: 'POST',
            success : function(response){
                if(response == 0){
                    $('#update_user').prop('disabled', true);
                    jQuery("#error_username").html("Username already exist"); 
                }else{
                    jQuery("#error_username").html(""); 
                    $(':input[type="submit"]').prop('disabled', false);
                }

            }
        })
        jQuery("#error_email").html("");  
    }
};

$(function () {
    var minlength = 1;
    $("#sample_search").keyup(function () {
        var that = this,
        value = $(this).val();

        if (value.length >= minlength ) {
            if (searchRequest != null) 
                searchRequest.abort();
            searchRequest = $.ajax({
                type: "GET",
                url: base_url+'sicksearch',
                data: {
                    'search_keyword' : value
                },
                dataType: "text",
                success: function(msg){
                    var html = '';
                    var dataObj = jQuery.parseJSON(msg);
                    if(dataObj.length > 0){
                        $(dataObj).each(function(i,val){
                            html += '<li class="sicknesslist" data-id="'+val.id+'">'+val.text+'</li>';
                        });
                    }else{
                        html += '<li>No Related Data Found</li>';
                    }
                    $("#listsearch").html(html);
                }
            });
        }else{
            $("#listsearch").html('');
        }
    });

    /*Remedies search*/
    $("#remedy_search").keyup(function () {
        var that = this,
        value = $(this).val();

        if (value.length >= minlength ) {
            if (searchRequest != null) 
                searchRequest.abort();
            searchRequest = $.ajax({
                type: "GET",
                url: base_url+'remedysearch',
                data: {
                    'search_keyword' : value
                },
                dataType: "text",
                success: function(msg){
                    var html = '';
                    var dataObj = jQuery.parseJSON(msg);
                    if(dataObj.length > 0){
                        $(dataObj).each(function(i,val){
                            html += '<a href="'+base_url+'remedy-testimony/'+val.id+'"><li data-id="'+val.id+'">'+val.text+'</li></a>';
                        });
                    }else{
                        html += '<li>No Related Data Found</li>';
                    }
                    $("#listremedies").html(html);
                }
            });
        }else{
            $("#listsearch").html('');
        }
    });


    $(document).on("click",".sicknesslist",function() {
        var sicknessid = $(this).data('id');
        $.ajax({
            url: base_url+'updatetrendingsearch',
            type: "POST",
            data:{sicknessid:sicknessid},
            dataType: "json",
            success:function(data) {
                window.location = data.status;
            }
        });
    });
});