<?php 
$page = 'Checkout';
include('inc/header.php'); 
$serviceid = $_GET['id'];
$signle_service = $obj->GetServiceById($serviceid);
$userid = $signle_service['user_id'];
$postuser = $obj->GetUserById($userid);
?>
<link rel="stylesheet" href="assets/css/right-sidebar.css">
<link href="assets/css/add-coupon.css">
               <?php include('inc/sidebar.php'); ?>     
                     <!--first tab row start-->
                   <div class="col-sm-12 instant-main">
                <div class="row">
                    <div class="col-lg-9 col-md-9" id="myTabContent">
                           <div class=" hidn-objct sticky msg-header">
					            <div class="backbtn"> 
									<a href="discussion-budget-summary?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
									<span class="checkout-top-title">Add Coupon</span>
								</div>
								
								<div class="prof-heigh-wid">
								     <div class="manage-as-lo"><?=$signle_service['topic'];?></div>
							    </div> 								
 							</div>
                  <Section class="add_coupen_section">
                      <div class="checkout_titles">
                          <p class="checkout_para">Enter coupon code you want to redeem the credit  </p>
                          <input type="text" class="form-control topup_input" placeholder="Coupon code" id="namee" name="name" required="">
                      </div>
                      
                          <div class="confirm_title">
                              <a href="?id=<?=$signle_service['id'];?>">
                                    <button type="button" class="btn btn-success btn-sucs btnm-frst w-100"> Confirm</button>
                                </a>
                                    <p>You can use it as payment but not withdrawal</p>
                          </div>
                  </Section>
            
			 </div>
           </div>
            </div>    
                <?php include('inc/footer.php'); ?> 