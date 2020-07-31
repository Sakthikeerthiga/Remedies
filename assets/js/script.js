var searchRequest = null;
// var base_url = 'https://best-remedies.com/beta/';
var base_url = 'http://localhost/Remedies/';


// Ajax post  
$(document).ready(function(){  

    $("#login").click(function(){  
        var email = $("#email").val();  
        var password = $("#pwd").val();  
    // Returns error message when submitted without req fields.  
    if(email==''||password=='')  
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
        data: {email: email, pwd: password},  
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
                            html += '<a href="'+base_url+'remedy-testimony/'+val.link+'"><li data-id="'+val.id+'">'+val.text+'</li></a>';
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
    
    /*article_search search*/
    $("#article_search").keyup(function () {
        var that = this,
        value = $(this).val();

        if (value.length >= minlength ) {
            if (searchRequest != null) 
                searchRequest.abort();
            searchRequest = $.ajax({
                type: "GET",
                url: base_url+'article_search',
                data: {
                    'search_keyword' : value
                },
                dataType: "text",
                success: function(msg){
                    var html = '';
                    var dataObj = jQuery.parseJSON(msg);
                    if(dataObj.length > 0){
                        $(dataObj).each(function(i,val){
                            html += '<a href="'+base_url+'article-detail/'+val.link+'"><li data-id="'+val.id+'">'+val.text+'</li></a>';
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

/*ckeditor*/
$( 'textarea.texteditor' ).ckeditor();



function add_comment(testimony_id){
    var user_id = $('#current_user_id').val();
    var comment = $("#addComment_"+testimony_id).text();
    if(user_id != ''){
      $('#display_comment_section_'+testimony_id).show( "slow" );
    }else{
      var testimonial_login = confirm("Please Login/Sign up");
      if (testimonial_login == true) {
        window.location.replace(base_url+'login'); 
      } else {
        return false;
      } 
    }

  }
  function close_comment(testimony_id){
    $('#display_comment_section_'+testimony_id).hide( "slow" );
  }

  function close_reply(comment_id){
    $('#reply_to_comment_section_'+comment_id).hide( "slow" );
  }


  function submitComment(testimony_id){
    var user_id = $('#current_user_id').val();
    var comment = $.trim($("#addComment_"+testimony_id).val());
    var location_url = $(location).attr('href');

    $.ajax({
      url: base_url+'add_new_comment',
      type: 'post',
      data: {user_iduser:user_id,testimony_idtestimony:testimony_id,comment:comment,location_url:location_url},
      success: function(response){
        var main_comment = '';
        var dataObj = jQuery.parseJSON(response);
        $(dataObj).each(function(i,val){
          main_comment +='<div class="testimonial-discussion-reply"><div class="testimonial-discussion"><div class="row no-gutters"><div class="col-6 small"><strong>Username:</strong>'+val.screenName+'<br><strong>Status:</strong>User<small>(3 post)</small></div><div class="col-6 small"><span class="text-primary">Date Posted:</span>'+val.datePosted+'</div></div><div class="testimonial-discussion__body">'+val.comment+'</div><a class="btn btn-success btn-circle text-uppercase" href="javascript:void(0);" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a></div></div>';
        });
        $('.testimonial_main_comment_'+testimony_id).html(main_comment);
        $('#display_comment_section_'+testimony_id).hide( "slow" );
        $("#addComment_"+testimony_id).val('');
       var url = window.location.href;
        $('.nestedcommentwrapper_'+testimony_id).load(url + ' .nestedcomment_'+testimony_id); 
      },
      complete:function(data){
        $("#loader").hide();
      }
    });
  }

  function reply_to_comment(testimony_id,comment_id){
   // alert(comment_id);return false;
    var user_id = $('#current_user_id').val();
    var comment = $("#replyComment_"+comment_id).text();
    if(user_id != ''){
      var html = ' <div class="reply_comment_div_'+comment_id+'"><div class="form-group"> <span id="close_comment" onclick="close_comment_reply('+comment_id+')">x</span></div><div class="form-group"><label for="email" class="col-sm-2 control-label">Comment</label><div class="row"><div class="new-reply col-sm-9"><textarea class="form-control" rows="3"  id="new_comment_'+comment_id+'"></textarea></div><div class="col-sm-3" style="margin:auto"><a class="btn btn-success btn-circle text-uppercase" href="javascript:void(0);" onclick="submitReplyComment('+testimony_id+','+comment_id+')">Submit</a></div></div></div></div>';
      $(".comment_div_"+comment_id).after(html);
      $("#new_comment_"+comment_id).focus();
    }else{
      var testimonial_login = confirm("Please Login/Sign up");
      if (testimonial_login == true) {
        window.location.replace(base_url+'login'); 
      } else {
        return false;
      } 
    }


  }

    function close_comment_reply(comment_id){
    $('.reply_comment_div_'+comment_id).hide( "slow" );
  }


  function submitReplyComment(testimony_id,comment_id){
    var user_id = $('#current_user_id').val();
    var comment = $('#new_comment_'+comment_id).val();
    var location_url = $(location).attr('href');
    
    $.ajax({
      url: base_url+'add_reply_comment',
      type: 'post',
      data: {user_iduser:user_id,testimony_idtestimony:testimony_id,comment:comment,idcomment:comment_id,location_url:location_url},
      
      success: function(response){
        var url = window.location.href;
        $('.nestedcommentwrapper_'+testimony_id).load(url + ' .nestedcomment_'+testimony_id); 
      }
    });
  }

  function deleteUser(){
    var article_login = confirm("Are you sure to delete this record?");
    if (article_login == true) {
        $.ajax({
            url: base_url+'deleteUser',
            type: 'post',
            success: function(response){
                if(response!=0){  
                // On success redirect.  
                window.location.replace(response);  
                }  
            },
            complete:function(data){
                $("#loader").hide();
            }
        });
    } else {
        return false;
    }
  }
  
  function editComment(id,testimony_id){
    var comment = $(".comment_section_"+id).text();
    $("#comment").val(comment);
    $("#comment_id").val(id);
    $("#testimony_id").val(testimony_id);
    $("#myModal").modal('show');
  }

  function update_edit() {
      var form = $( "#update_comment" ).serializeArray();

      $.ajax({
            url: base_url+'update_comment',
            type: "POST",
            data:form,
            success:function(data) {
                    $("#myModal").modal('hide');
                    var url = window.location.href;
                    $('.nestedcommentwrapper_'+data).load(url + ' .nestedcomment_'+data); 
                
            }
        
      });
  }