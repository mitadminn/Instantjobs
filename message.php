<?php $page = 'Message';
include('inc/header.php'); ?>

<link rel="stylesheet" href="assets/css/message.css">
               <?php include('inc/sidebar.php'); ?>     
               
                     <!--first tab row start-->
                      <div class="col-sm-12 instant-main">
                <div class="row">
                    <div class="middle_container" id="myTabContent" >
                    <div class="head-mid">
                       <h2 class="message_title">Messages</h2>
                   </div>
                   <!---->
                   
                   <div class="tab-content">
                       <!--------------------message content start----------------------------->
                    <div id="message" class="tab-pane active">
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center    ">
                               <div class="items-title">
                                  <p class="pp mr-in title-name ">Aleafay</p>
                                   <i class="fa-solid fa-star"></i>
                                  <small class="sml"> 5.0 (32)</small> 
                               </div>
                                <div class="just-now-ok">
                                    <p class="jst-now">Just Now</p>
                                </div> 
                           </div>
                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                     </div>  
                    </div>
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center    ">
                              <div class="items-title">
                                  <p class="pp mr-in title-name ">Hammondbailee</p>
                                  <i class="fa-solid fa-star"></i>
                                  <small class="sml">2.2 (5))</small>
                              </div>
                                <div class="just-now">
                                    <p class="jst-now">28 mins ago</p>
                                </div> 
                           </div>
                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit  amet</p>
                     </div>  
                    </div>
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center    ">
                              <div class="items-title">
                                  <p class="pp mr-in title-name ">Daisyfinnegan</p>
                                   
                                 <i class="fa-solid fa-star"></i>
                                  <small class="sml">3.2 (12)</small>
                              </div>
                                       
                                <div class="just-now">
                                    <p class="jst-now">8 hours ago</p>
                                </div> 
                           </div>

                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit amet </p>
                     </div>  
                    </div>
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center    ">
                              <div class="items-title">
                                  <p class="pp mr-in title-name ">Chinspicy1</p>
                                 
                                   <i class="fa-solid fa-star"></i>
                                  <small class="sml">4.1 (22))</small>
                              </div>
                                       
                                 <div class="just-now">
                                    <p class="jst-now">4 days ago</p>
                                </div> 
                           </div>

                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit amet  </p>
                     </div>  
                    </div>
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center    ">
                              <div class="items-title">
                                 <p class="pp mr-in title-name ">Todlila</p>
                                
                                  <i class="fa-solid fa-star"></i>
                                  <small class="sml">4.4 (19)</small> 
                              </div>
                                       
                                 <div class="just-now">
                                    <p class="jst-now">5 mnth ago</p>
                                </div> 
                           </div>

                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit amet </p>
                     </div>  
                    </div>
                    </div>
                    <!-----------------------------------message content end-------------------->
                    
                    <!-----------------------------------job status content start-------------------->
                    <div id="job" class="tab-pane" style="">
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center">
                               <div class="items-title">
                                  <p class="pp mr-in title-name ">Aleafay</p>
                                   <i class="fa-solid fa-star"></i>
                                  <small class="sml"> 5.0 (32)</small> 
                               </div>
                                <div class="just-now-ok">
                                    <p class="jst-now">Just Now</p>
                                </div> 
                           </div>
                           <div class="d-flex content_w_btn">
                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                               <a class="job_status_btn" href="discussion?id=<?=$signle_service['id'];?>">
                           <button class="message-dicuss" >DISCUSS</button>
                           </a>
                           </div>
                     </div>  
                    </div>
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center    ">
                              <div class="items-title">
                                  <p class="pp mr-in title-name ">Hammondbaile</p>
                                  <i class="fa-solid fa-star"></i>
                                  <small class="sml">2.2 (5))</small>
                              </div>
                                <div class="just-now">
                                    <p class="jst-now">28 mins ago</p>
                                </div> 
                           </div>
                          <div class="d-flex content_w_btn">
                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                           <a class="job_status_btn">
                           <button class="message-dicuss">ONGOING</button>
                           </a>
                           </div>
                     </div>  
                    </div>
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center    ">
                              <div class="items-title">
                                  <p class="pp mr-in title-name ">Daisyfinnegan</p>
                                   
                                 <i class="fa-solid fa-star"></i>
                                  <small class="sml">3.2 (12)</small>
                              </div>
                                       
                                <div class="just-now">
                                    <p class="jst-now">8 hours ago</p>
                                </div> 
                           </div>
                         <div class="d-flex content_w_btn">
                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                           <a class="job_status_btn">
                           <button class="message-dicuss" >DONE</button>
                           </a>
                           </div>
                     </div>  
                    </div>
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center    ">
                              <div class="items-title">
                                  <p class="pp mr-in title-name ">Chinspicy1</p>
                                 
                                   <i class="fa-solid fa-star"></i>
                                  <small class="sml">4.1 (22))</small>
                              </div>
                                       
                                 <div class="just-now">
                                    <p class="jst-now">4 days ago</p>
                                </div> 
                           </div>
                             <div class="d-flex content_w_btn">
                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                           <a class="job_status_btn">
                               
                           <button class="message-dicuss">CLOSED</button>
                           </a>
                           </div>
                     </div>  
                    </div>
                    <div class="img-p third-pge-contnt">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="d-flex two-lb align-items-center    ">
                              <div class="items-title">
                                 <p class="pp mr-in title-name ">Todlila</p>
                                
                                  <i class="fa-solid fa-star"></i>
                                  <small class="sml">4.4 (19)</small> 
                              </div>
                                       
                                 <div class="just-now">
                                    <p class="jst-now">5 mnth ago</p>
                                </div> 
                           </div>
                            <div class="d-flex content_w_btn">
                           <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                           <a class="job_status_btn">
                               
                           <button class="message-dicuss">DISPUTE</button>
                           </a>
                           </div>
                     </div>  
                    </div>
                    </div>
                    </div>
                    <!-----------------------------------job status content End-------------------->
           </div>

           
            
                 <?php include('inc/footer.php'); ?> 