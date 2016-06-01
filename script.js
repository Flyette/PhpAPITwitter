"use strict";
$(document).ready(function(){

$.ajax({
	type: "get",
    dataType: "text",
    url: 'index.php',
    success:function(returnHTML){
    	console.log(returnHTML);
        $('#tweet').html(returnHTML);
    }
});
});
