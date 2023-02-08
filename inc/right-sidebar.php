<link rel="stylesheet" href="assets/css/right-sidebar.css">

<div class="instant-rightbar">
    <?php if($page == 'Service Provider') { ?>
                            <div  class="li-rt h4_title">
                                <h4>Filter</h4>
                                 <div id="log">
                                      <label class="btn-round active">
                                    <input type="radio" class="  btn btn-default btnn" name="area" value="Worldwide" id="showData">
                                    Worldwide
                                </label>
                                
                                    <label class="btn-round lbl-1">
                                    <input type="radio" class="lbl-1 btn btn-default btnn" name="area" value="Local" id="showData">
                                    LOCAL
                                </label>
                                
                                 <label class="btn-round lbl-2">
                                    <input type="radio" class="btn btn-default btnn" name="area" value="Overseas" id="showData">
                                    OVERSEAS
                                </label>
                                
                                <label class="btn-round lbl-3">
                                    <input type="radio" class="btn btn-default btnn" name="area" value="Near me" id="showData">
                                    NEAR ME
                                </label>
        
                            
                                <h4>Sort by </h4>
                                <label class="btn-round lbl-a active">
                                    <input type="radio" class="btn btn-default btnn" name="sort" value="new" id="filter2" style="cursor: pointer;">
                                    NEW
                                </label>
                            
                          
                                
                                <label class="btn-round lbl-b">
                                    <input type="radio" class="btn btn-default btnn" name="sort" value="high" id="filter2" style="cursor: pointer;">
                                    $ HIGH
                                </label>
                                
                                <label class="btn-round lbl-c">
                                    <input type="radio" class="btn btn-default btnn" name="sort" value="low" id="filter2" style="cursor: pointer;">
                                    $ LOW
                                </label>
                                </div>
                            </div>
                            
                            <?php } if($page =='Job Marketplace') { ?>
                            <div class="li-rt h4_title">
                                <h4>Filter</h4>
                                

                                <div id="log">
                                    <label class="btn-round lbl-1">
                                    <input type="radio" class="btn btn-default" name="area" value="Local" id="showJobData">
                                    LOCAL
                                </label>
                            
                                <label class="btn-round lbl-2">
                                    <input type="radio" class="btn btn-default" name="area" value="Overseas" id="showJobData">
                                    OVERSEAS 
                                </label>
                                
                                <label class="btn-round lbl-3">
                                    <input type="radio" class="btn btn-default" name="area" value="Near me" id="showJobData">
                                    NEAR ME
                                </label>
        
                            
                                <h4>Sort by </h4>
                                <label class="btn-round lbl-a">
                                    <input type="radio" class="btn btn-default" name="sort" value="new" id="filter2" style="cursor: pointer;">
                                    NEW
                                </label>
                            
                             <label class="btn-round lbl-d">
                                    <input type="radio" class="btn btn-default" name="sort" value="expiring" id="filter2" style="cursor: pointer;">
                                    EXPIRING
                                </label>
                                
                                <label class="btn-round lbl-b">
                                    <input type="radio" class="btn btn-default" name="sort" value="high" id="filter2" style="cursor: pointer;">
                                    $ HIGH
                                </label>
                                
                                <label class="btn-round lbl-c">
                                    <input type="radio" class="btn btn-default" name="sort" value="low" id="filter2" style="cursor: pointer;">
                                    $ LOW
                                </label>
                                </div>
                                
                                 
                                 
                            </div>
							<?php } if($page == 'Profile' || $page == 'Profile Edit' || $page == 'Portfolio' || $page == 'Bank Details') { ?>
						 
							<?php } if($page == 'Wallet') { ?>
							<div class="top-rt-h head-mid">
                                <h2>Wallet</h2>
                            </div>
                            <div class="li-rt new-li-profl" id="panel">
                               <div class="button-hist">
                                 <a href="https://mitdevelop.com/instajobs/transaction"><button type="button" class="btn-round">View Transaction History</button>   </a>
                                </div>
                               
                            </div>
							<?php } if($page == 'Manage Post') { ?>
							
							 <div class="top-rt-h head-mid">
                                <h2>Filter</h2>
								<div class="rt-side" >
 									<div class="ALL-RI new-li-profl" id="log">
										<a href=""><button class=" btn-round lbl-a manage_post_wrap">ALL</button></a>
										<a href=""><button class=" btn-round lbl-2 manage_post_wrap">SERVICES</button></a>
										<a href=""><button class=" btn-round lbl-b manage_post_wrap">JOBS</button></a>
									</div>
								</div>
                            </div>
 							
							<?php } if($page == 'Transaction') {  ?>
							
							<div class="top-rt-h head-mid">
                                <h2></h2>
                            </div>
                            <div class="new-li-profl" id="panel">
                                <div id="log"> 
                                    
                                <a href="#"><button class=" btn-round downld_contact ">Download receipts</button></a>
                                <a href="#"><button class=" btn-round  downld_contact">Contact support</button></a>
                                </div>
                              
                            </div>
                            
							<?php } if($page == 'Message' || $page == 'Job Status') { ?>
							
							<div class="top-rt-h head-mid">
								<h2>Category</h2>
							</div>
						   <div class="side nav  msg-job " id="log">
							   <a data-toggle="tab" href="#message"><button class=" btn-round active lbl-2 manage_post_wrap">MESSAGE</button></a>
							   <a data-toggle="tab" href="#job"><button class=" btn-round active status manage_post_wrap">JOB STATUS</button></a>
						   </div>
				   
							<?php  }   ?>

                            
                         </div>
                         
<script src="assets/js/right-sidebar.js"></script>
<script>
    
    $('label').on('click', function(){
    $('label').removeClass('active');
    $(this).addClass('active');
});
 /* JOb Provider */
$(document).on('click','#showJobData',function(e){
        var filter1 = $(this).val();
        //   if(filter1 == 'Local') {
        //     $('.lbl-1').addClass('active'); 
        //     $('.lbl-2').removeClass('active'); 
        //     $('.lbl-3').removeClass('active'); 
            
        //   }
          
        //   if(filter1 == 'Overseas') {
        //     $('.lbl-2').addClass('active'); 
        //     $('.lbl-1').removeClass('active'); 
        //     $('.lbl-3').removeClass('active'); 
        //   }
          
        //   if(filter1 == 'Near me') {
        //     $('.lbl-3').addClass('active');
        //     $('.lbl-2').removeClass('active'); 
        //     $('.lbl-1').removeClass('active'); 
        //   }
          
      $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?jobfilter="+filter1,             
        dataType: "html",                  
        success: function(data){                    
            $("#searchjobdata").html(data); 
            $("#jobdata").hide(); 
         }
    });
      
});

</script>