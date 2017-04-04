$.ajax({
       url : 'sqlCommand.php?q=SELECT * FROM mytable', // my php file
       type : 'GET', // type of the HTTP request
       success : function(result){ 
          var obj = jQuery.parseJSON(result);
          console.log(obj);
       }
    });
