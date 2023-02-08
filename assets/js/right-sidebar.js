 
     /* Service Provider */
$(document).on('click','#showData',function(e){
        var filter1 = $(this).val();
        // alert(filter1);
          if(filter1 == 'Local') {
            $('.lbl-1').addClass('active'); 
            $('.lbl-2').removeClass('active'); 
            $('.lbl-3').removeClass('active'); 
            
          }
          
          if(filter1 == 'Overseas') {
            $('.lbl-2').addClass('active'); 
            $('.lbl-1').removeClass('active'); 
            $('.lbl-3').removeClass('active'); 
          }
          
          if(filter1 == 'Near me') {
            $('.lbl-3').addClass('active');
            $('.lbl-2').removeClass('active'); 
            $('.lbl-1').removeClass('active'); 
          }
          
      $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?filter1="+filter1,             
        dataType: "html",                  
        success: function(data){                    
            $("#searchdata").html(data); 
            $("#servicedata").hide(); 
         }
    });
      
});

   
 /* Service Provider */

   $(document).on('click','#filter2',function(e){
        var filter2val = $(this).val();
        var filter1 = $('#showData').val();
        if( $('#showData').is(':checked') ){
    // alert("Checkbox Is checked");
}


 if(filter2val == 'new') {
            $('.lbl-a').addClass('active'); 
            $('.lbl-b').removeClass('active'); 
            $('.lbl-c').removeClass('active'); 
             $('.lbl-d').removeClass('active');
            
          }
          
          if(filter2val == 'high') {
            $('.lbl-b').addClass('active'); 
            $('.lbl-a').removeClass('active'); 
            $('.lbl-c').removeClass('active');
             $('.lbl-d').removeClass('active');
          }
          
          if(filter2val == 'low') {
            $('.lbl-c').addClass('active');
            $('.lbl-b').removeClass('active'); 
            $('.lbl-a').removeClass('active'); 
            $('.lbl-d').removeClass('active'); 
          }
          
           if(filter2val == 'expiring') {
            $('.lbl-d').addClass('active');
            $('.lbl-b').removeClass('active'); 
            $('.lbl-a').removeClass('active'); 
            $('.lbl-c').removeClass('active'); 
          }
           
           
else{
    // alert("Checkbox Is not checked");
}
        // var filter1 = $('#showData').val();
        // alert(filter2val);
        // alert(filter1);
      $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?filter2="+filter2val,             
        dataType: "html",                  
        success: function(data){                    
            $("#searchdata").html(data); 
            $("#servicedata").hide(); 
         }
    });
      
 });

 /* Job Marketplace */
  $(document).on('click','#JObfilter2',function(e){
        var filter2val = $(this).val();
    
    $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?filter3="+filter2val,             
        dataType: "html",                  
        success: function(data){                    
            $("#searchjobdata").html(data); 
            $("#jobdata").hide(); 
         }
    });
    
    
});
 
 



 /* Keyword Search for Service Provider */
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
     return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       document.getElementById("livesearch").innerHTML=this.responseText; 
       document.getElementById("livesearch").style.border="1px solid red;";
     $("#servicedata").hide(); 
    }else {
          $("#servicedata").show();
    }
  }
  xmlhttp.open("GET","admin/inc/process.php?searchservice="+str,true);
  xmlhttp.send();
}


/*  Keyword Search for service provider */

function showJobResult(str) {
  if (str.length==0) {
     document.getElementById("livejobsearch").innerHTML=""; 
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livejobsearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid red";
      $("#jobdata").hide(); 
    } else {
        
         $("#jobdata").show();
    }
  }
  xmlhttp.open("GET","admin/inc/process.php?searchjob="+str,true);
  xmlhttp.send();
}

 
// <!------------active------------>
 
 
    $(document).on('click','li-rt a' , function(){
        $(this).addClass('active').siblings().removeClass('active')
    })
 
//   <!------------active------------>

// Add active class to the current button (highlight it)
var header = document.getElementById("log");
var btns = header.getElementsByClassName("btnn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
 