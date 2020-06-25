var searchRequest = null;
var base_url = 'http://localhost/Remedies/';

// Ajax post  
$(document).ready(function(){  

    $("#login").click(function(){  
        var user_name = $("#name").val();  
        var password = $("#pwd").val();  
    // Returns error message when submitted without req fields.  
    if(user_name==''||password=='')  
    {  
        jQuery("div#err_msg").show();  
        jQuery("span#msg").html("All fields are required");  
    }  
    else  
    {  
        jQuery("span#msg").html("");  
    // AJAX Code To Submit Form.  
    $.ajax({  
        type: "POST",  
        url:  base_url + "check_login",  
        data: {name: user_name, pwd: password},  
        cache: false,  
        success: function(result){  
            if(result!=0){  
    // On success redirect.  
    window.location.replace(result);  
    }  
    else  
        jQuery("div#err_msg").show();  
        jQuery("span#msg").html("Invalid Credentials");  
    }  
    });  
    }  
    return false;  
    }); 


    $("#submit").click(function(){  
        var uname = $("#username").val();  
        var password = $("#password").val();  
    // Returns error message when submitted without req fields.  
    if(uname==''||password=='')  
    {  
        jQuery("div#err_msg").show();  
    }  
    });  
});


function rateArticle(article_id,val){
    var userId = $('.userId').val();
    if(userId != ''){
      $.ajax({  
        type: "POST",  
        url:  base_url + "rate-article",  
        data: {article_id: article_id,user_id: userId, success_val: val},  
        cache: false,  
        success: function(result){  
          if(result!=''){  
               $('.vote-article').hide();
               $('.article-success-message').html('<div class="alert alert-success alert-dismissible fade show" role="alert">Thank you for rating this article! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              }  
              else{
                alert('Please contact admin');
              }  

              }  
            }); 
    }else{
      var article_login = confirm("Please Login/Sign up");
      if (article_login == true) {
        window.location.replace(base_url+'login'); 
      } else {
        return false;
      }
    }
  }


$( function() {
    $( "#user_dob" ).datepicker();
} );

// function ValidateEmailFormat() {
//     var regex =  /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
//     var email = $("#email").val(); 
//     if(!regex.test(email)) {
//         jQuery("#error_email").html("Please Enter the vaild email");  
//     }else{
//         jQuery("#error_email").html(""); 
//     }
// }

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
                    // $('#update_user').prop('disabled', true);
                    $(':input[type="submit"]').prop('disabled', true);
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
                   $(':input[type="submit"]').prop('disabled', true);
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

$("#user_mobile").keypress(function (e) {
    var mobilenumber = $("#user_mobile").val();
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        $("#error_mobileno").html("Numbers Only");
        $('#update_user').prop('disabled', true);
        return false;
    }else if(mobilenumber.length > 9){
        $("#error_mobileno").html("Incorrect Number");
        $('#update_user').prop('disabled', true);
        return false;
    }else{
        $("#error_mobileno").html("");
        $(':input[type="submit"]').prop('disabled', false);
        return true;
    }
});

$("#user_mobile").focusout(function (e) {
    var mobilenumber = $("#user_mobile").val();
    if(mobilenumber.length != 10){
        $("#error_mobileno").html("Incorrect Number");
        $('#update_user').prop('disabled', true);
        return false;
    }else{
        $("#error_mobileno").html("");
        $(':input[type="submit"]').prop('disabled', false);
        return true;
    }
});

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