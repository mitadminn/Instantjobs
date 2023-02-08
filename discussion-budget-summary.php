<?php 
$page = 'Discussion Budget Summary';
include('inc/header.php'); 
$serviceid = $_GET['id'];
$signle_service = $obj->GetServiceById($serviceid);
$userid = $signle_service['user_id'];
$postuser = $obj->GetUserById($userid);

?>
       <link ="stylesheet" href="assets/css/discussion-budget-summary.css">
       
               <?php include('inc/sidebar.php'); ?>     
                     <!--first tab row start-->
                   <div class="col-sm-12 instant-main">
                <div class="row">
                    <div class="col-lg-9 col-md-9" id="myTabContent">
                           <div class="d-flex hidn-objct sticky msg-header">
							<div class="backbtn"> 
									<a href="discussion?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
								
								<div class="prof-heigh-wid">
								    <div class="manage-as-lo"><?=$signle_service['topic'];?></div>
							    </div> 								
								<div class="rightsidemenu">
  								    <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
 								</div>
 							</div>

 						
                            <div class="mid-pro">
                                    <div class="profsnl-servc">
                                       <div class="big-img-pro">
                                           <b style="color: #ff0000;">(WIP M2)</b>
                                           <img class="pro-big-img" src="admin/assets/img/services/<?=$signle_service['photos'];?>" alt=""> 
                                       </div>
                                     </div>
                                 </div>
                             <div class=""><div class="col-lg-12 col-md-12 col-sm-12"><h3 style="padding:10px;">Summary</h3></div></div>
                               <img class="pro-big-img" src="admin/assets/img/services/Chrysanthemum.jpg" alt="">
                             <div class="">
                                 <div class="">
                                      <div class="summary-table-left">
                                              <div class="d-flex" style="justify-content: space-between;">
                                              <div class="d-flex">
                                             <p style="font-size: 13px;">
                                                 One day make-up labour + cosmetics
                                             </p>
                                            <div  style="padding-left:10px;">
                                              </div>
                                            </div>
                                              <p>RMXXX</p>
                                          </div>
                                 
                                      </div>
                                 </div>
                            </div>
                            <hr style="margin:0;">
                             <div class="">
                                 <div class="" >
                                      <div class="summary-table-left align-center" style="display: flex;justify-content: space-between; align-items:center;">
                                          <div>
                                         <p>5% Service Fee</p>
                                         <p>6% SST</p>
                                         <label class="total_cost">
                                           <b>Total:</b> 
                                          </label>
                                          </div>
                                      <div class="summary-table-right">
                                         <p>RMXXX</p>
                                         <p>RMXXX</p>
                                         <output id='total' form='cart'>RM4XX.XX</output>
                                     </div>
                                    </div>
                                 </div>
                            </div>
                            <div class="last_title">
                                 <div class="last_title" style="padding: 15px;">
                            <a href="checkout?id=<?=$signle_service['id'];?>" >
                                    <button type="button" class="btn btn-success btn-sucs btnm-frst w-100">Create Payment Plan</button>
                                </a>
                                <br>
                                <p style="text-align:center !important;width: 100%;  font-size: 13px;">Always pay Through Instantjob to protect yourself, you can release the payment anytime.</p>
                              </div>
                            </div>   
			 </div>
			 </div>
			 </div>
                 <?php include('inc/footer.php'); ?> 


       