<?php 
$page = 'Checkout';
include('inc/header.php'); 
$serviceid = $_GET['id'];
$signle_service = $obj->GetServiceById($serviceid);
$userid = $signle_service['user_id'];
$postuser = $obj->GetUserById($userid);

?>
<style>
.col-lg-9 {background: #fff;}
section{background:#fff;}
.cnfrm-amount,.checkout_prize,.checkout_para{text-align:center;}
.checkout_prize{font-weight:700;}
.checkout_para {padding: 40px;text-align: center;}
button.checkout_no,.checkout_now {border-radius: 30px; font-size: 12px;     background: #047e04;}
.checkout_btn {text-align: center;     margin-top: 75px;}
button.checkout_no{padding: 10px 30px !important;     margin-right: 45px;}
.checkout_prize { font-weight: 700; margin-top: 18px;font-size: 31px;}
.checkout_para,.checkout_para{font-weight:500;}
.pay_check:hover{background-color:#e5e5e5; color:#000;}
@media (min-width: 0) and (max-width: 567px){
    .hidn-objct.sticky.msg-header {padding: 28px;align-items: center;}
    i.fa-solid.fa-arrow-left {padding: 5px;color: #000;}
    .prof-heigh-wid {float: left;width: unset;}
    .checkout-top-title {text-align: center !important;margin-left: 85px !important; font-size:18px;}
}
</style>
       
               <?php include('inc/sidebar.php'); ?>     
                     <!--first tab row start-->
                   <div class="col-sm-12 instant-main">
                <div class="row">
                    <div class="col-lg-9 col-md-9" id="myTabContent">
                           <div class=" hidn-objct sticky msg-header">
					            <div class="backbtn"> 
									<a href="discussion-budget-summary?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
									<span class="checkout-top-title">Checkout</span>
								</div>
								
								<div class="prof-heigh-wid">
								     <div class="manage-as-lo"><?=$signle_service['topic'];?></div>
							    </div> 								
 							</div>
                  <Section class="">
                      <div class="checkout_titles">
                          <p class="cnfrm-amount">Confirm Amount</p>
                          <p class="checkout_prize">RM445.20</p>
                          <p class="checkout_para">Always pay thgrough instant job to protect yourself, you can release the payment anytime</p>
                      </div>
                      <div class="checkout_btn">
                          <a href="summary-payment?id=<?=$signle_service['id'];?>"><button class="checkout_no pay_check">No</button></a>
                          <a href="payment-success?id=<?=$signle_service['id'];?>"><button class="checkout_now pay_check">Pay Now</button></a>
                      </div>
                  </Section>
            
			 </div>
           </div>
            </div>    
                