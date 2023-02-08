<?php 
$page = 'Release Payment';
include('inc/header.php'); 
$serviceid = $_GET['id'];
$signle_service = $obj->GetServiceById($serviceid);
$userid = $signle_service['user_id'];
$postuser = $obj->GetUserById($userid);

?>
<style>
body{background: #fff !important;}
.img-cir-profile {display: flex;justify-content: space-between;}
.col-lg-12 { padding: 0;}
nav.d-flex.fr-btn {padding-top: 7px;}
.btn_plus_minus  {padding: 0px 8px; border-radius: 50%;background: #fff;color: #000;border: 1px solid #c1baba;   }
.addonss i {position: absolute;right: 10px;top: 105px;
}
@media (min-width: 0) and (max-width: 567px){
.manage-as-lo {     font-size: 11px;font-family: sans-serif;font-weight: 600; width: 390px;overflow: hidden;padding: 10px;}
.backbtn {float: left; width: 92%;}
.field_wrapper{padding: 0 10px;}
.payment_methd h2{font-size: 24px;}
.prof-heigh-wid { float: left;width: 80%;overflow: hidden;}
.d-flex.hidn-objct {padding: 22px 10px;}
i.fa-solid.fa-plus {top: unset !important;left: 92%;margin-top: 13px;position: absolute !important;}
i.fa-solid.fa-minus {left: 92% !important;color: #808080;top: unset !important;margin-top: 15px !important;}
.addonss i{    position: absolute !important;}
}
i.fa-solid.fa-plus {position: absolute;top: 61px;right: 10px;
}
.summary-table-left   {  padding: 10px;}
.summary-table-right   {  padding: 10px;}
.summary-table-left span {float: left;width: 100%;text-align: left !important;}
.summary-table-right span {float: left;width: 100%;text-align: right !important;}

.payment_percnt button {padding: 2px 5px; font-size: 10px;background: #fff;border: 1px solid #00c900;color: #00c900;font-weight: 500;}
.payment_percnt {padding: 12px;border: 1px solid #cdcdcd;border-radius: 5px;border-bottom: none;}
.pay_release{border-bottom: 1px solid #cdcdcd;}
.cancel-btn {text-align: center; margin-top: 235px;}
.cancel-btn button {background: none;color: #838080;padding: 0;}
i.fa-solid.fa-circle-exclamation {color: #838080; font-size: 12px;}
.paid button {background: #11b311;color: #fff;padding: 2px 15px;}
</style>
       
               <?php include('inc/sidebar.php'); ?>     
                     <!--first tab row start-->
                   <div class="col-sm-12 instant-main">
                <div class="row">
                    <div class="col-lg-9 col-md-9" id="myTabContent">
                           <div class="d-flex hidn-objct sticky msg-header">
							<div class="backbtn"> 
									<a href="payment-success?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
									<div class="prof-heigh-wid">
								    <div class="manage-as-lo">Full stack developer with knowledge of PHP   and  from the back-end </div>
							    </div>
								</div>
								
								<div class="prof-heigh-wid">
								    <div class="manage-as-lo"><?=$signle_service['topic'];?></div>
							    </div> 								
								<div class="rightsidemenu">
  								    <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
 								</div>
								
 								 
 							</div>

                             <div class=""><div class="col-lg-12 col-md-12 col-sm-12"><h3 style="padding:10px;">Summary</h3></div></div>
                             <div class="">
                                 <div class="">
                                      <div class="summary-table-left">
                                              <div class="d-flex" style="justify-content: space-between;">
                                              <div class="d-flex">
                                             <p style="font-size: 13px;">I need help saving my bosai tree</p>
                                            <div  style="padding-left:10px;">
                                              </div>
                                            </div>
                                              <p>RM499</p>
                                          </div>
                                      </div>
                                 </div>
                            </div>
                            <hr>
                             <div class="">
                                 <div class="" >
                                      <div class="summary-table-left d-flex justify-content-between" >
                                          <div>
                                         <p>5% Service Fee</p>
                                         <p>6% SST</p>
                                         <p><strong>Total</strong></p>
                                          </div>
                                      <div class="summary-table-right">
                                         <p>RMXXX</p>
                                         <p>RMXXX</p>
                                         <p><strong>RMXXXX</strong></p>
                                     </div>
                                      </div>
                                 </div>
                            </div>
                            <!------------------------->
                            <div class="field_wrapper">
                                    <div class="d-flex justify-content-between payment_methd">
                                        <h2>Release Payment</h2>
                                    </div>
                                    <div class="release-pay-container">
                                        <!---------paid button START------>
                                        
                                        <!--<div class="d-flex justify-content-between align-items-center payment_percnt paid">-->
                                        <!--    <p>payment 25%</p>-->
                                        <!--    <a><button>Paid</button></a>-->
                                        <!--</div>-->
                                        
                                        <!-------paid button END-------->
                                        <div class="d-flex justify-content-between align-items-center payment_percnt">
                                            <p>payment 25%</p>
                                            <a href="payment-release-success?id=<?=$signle_service['id'];?>"><button>RELEASE</button></a>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center payment_percnt">
                                            <p>payment 50%</p>
                                            <button>RELEASE</button>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center payment_percnt pay_release">
                                            <p>payment 25%</p>
                                            <button>RELEASE</button>
                                        </div>
                                    </div>
                            </div> 
                            
                            <div class="cancel-btn">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <button style="font-size: 11px;">Cancel job</button>
                            </div>
			      </div>
			   </div>
			 </div>
			 
                 <?php include('inc/footer.php'); ?> 

