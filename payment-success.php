<?php 
    $page = 'Payment Success';
    include('inc/header.php'); 
    $serviceid = $_GET['id'];
    $signle_service = $obj->GetServiceById($serviceid);
    $userid = $signle_service['user_id'];
    $postuser = $obj->GetUserById($userid);
    
    ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
    <div class="row">
        <div class="col-lg-9 col-md-9" id="myTabContent">
            <div class=" hidn-objct sticky msg-header">
                <div class="backbtn"> 
                    <a href="checkout?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
                    <span class="checkout-top-title">Payment</span>
                </div>
                <div class="prof-heigh-wid">
                    <div class="manage-as-lo"><?=$signle_service['topic'];?></div>
                </div>
            </div>
            <Section class="">
                <div class="checkout_titles">
                    <img src="" alt=""> 
                    <i class="fa-regular fa-circle-check"></i>
                    <p class="cnfrm-amount">Payment Success</p>
                    <p class="checkout_prize">RM445.20</p>
                </div>
                <div class="checkout_btn">
                    <a href="payment-release?id=<?=$signle_service['id'];?>"><button class="checkout_no pay_check">Ok</button></a> 
                </div>
            </Section>
        </div>
    </div>
</div>