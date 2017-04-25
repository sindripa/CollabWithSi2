$.ajax({
       url : '46.101.24.156/Nonegag/fetchPosts.php/1', // my php file
       type : 'GET', // type of the HTTP request
       success : function(result){ 
          var obj = jQuery.parseJSON(result);
          console.log(obj);
       }
    });
