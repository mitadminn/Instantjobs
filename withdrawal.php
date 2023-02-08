<?php 
$page = 'Checkout';
include('inc/header.php'); 
$serviceid = $_GET['id'];
$signle_service = $obj->GetServiceById($serviceid);
$userid = $signle_service['user_id'];
$postuser = $obj->GetUserById($userid);

?>
<link rel="stylesheet" href="assets/css/withdrawal.css">

       
               <?php include('inc/sidebar.php'); ?>     
                     <!--first tab row start-->
                   <div class="col-sm-12 instant-main">
                <div class="row">
                    <div class="col-lg-9 col-md-9" id="myTabContent">
                           <div class=" hidn-objct sticky msg-header">
					            <div class="backbtn"> 
									<a href="discussion-budget-summary?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
									<span class="checkout-top-title">Withdrawal</span>
								</div>
								
								<div class="prof-heigh-wid">
								     <div class="manage-as-lo"><?=$signle_service['topic'];?></div>
							    </div> 								
 							</div>
                  <Section class="">
                      <div class="checkout_titles">
                          <p class="checkout_para">How much do you want to withdraw?</p>
                          <input type="text" class="form-control topup_input" placeholder="Coupon code" id="namee" name="name" required="">
                      </div>
                        <div class="payment_methods">
                          <div class="payment_methods_title">
                              <h6>Bank Details</h6>
                              <input class="form-control bank_datail_input" type="text" placeholder="Name">
                              <input class="form-control bank_datail_input" type="text" placeholder="Bank Name">
                              <input class="form-control bank_datails_input" type="text" placeholder="Bank Account No'">
                          </div>
                      </div>
                          <div class="confirm_title">
                              <a href="?id=<?=$signle_service['id'];?>">
                                    <button type="button" class="btn btn-success btn-sucs btnm-frst w-100"> Confirm</button>
                              </a>
                            <p>Wallet Balance</p>
                          </div>
                  </Section>
            
			 </div>
           </div>
            </div>    
                <?php include('inc/footer.php'); ?> 