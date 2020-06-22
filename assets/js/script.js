var searchRequest = null;

$(function () {
    var minlength = 1;
    var base_url = 'http://localhost/Remedies/';
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