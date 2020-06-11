var searchRequest = null;

$(function () {
    var minlength = 1;
    var base_url = window.location;
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
							html += '<li>'+val.text+'</li>';
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
});