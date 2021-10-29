setInterval(function(){
        checkUserStatus();
  },5000);

function checkUserStatus(){
    jQuery.ajax({
       url:'check_status.php',
        success:function(b){
            var result=b.trim();
              if(result!=0){

                 window.location.href='logout.php';
              }

        }
    });
} 