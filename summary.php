<?php 
    $page = 'Summary';
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
    <div class="d-flex hidn-objct sticky msg-header">
        <div class="backbtn"> 
            <a href="professional-service?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
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
    <div class="">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3 style="padding:10px 0;">Summary</h3>
        </div>
    </div>
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
                </div>
                <div class="d-flex" style="justify-content: space-between; margin-top: 10px;">
                    <div class="d-flex">
                        <form id='cart'></form>
                    </div>
                </div>
                <div class="d-flex" style="justify-content: space-between; margin-top: 10px;">
                    <div class="d-flex">
                        <form id='cart'></form>
                    </div>
                </div>
                <div class="d-flex" style="justify-content: space-between;margin-top: 10px;">
                    <div class="d-flex">
                        <form id='cart'></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="margin:0;">
    <div class="summary-table-left align-center" style="display: flex;justify-content: space-between; align-items:center;">
        <div>
            <p>5% Service Fee</p>
            <p>6% SST</p>
            <label class="total_cost">
            <b>Total:</b> 
            </label>
        </div>
        <div class="summary-table-right">
            <p>RM29.95</p>
            <p>RM37.74</p>
            <output id='total' form='cart'>0.00</output>
        </div>
    </div>
    <div class="last_title">
        <div class="last_title" style="padding: 15px;">
            <a href="#" class=" btn-check">
            <button type="button" class="btn btn-success btn-sucs btnm-frst w-100">Continue to checkout</button>
            </a>
            <br>
            <p style="text-align:center !important;width: 100%;  font-size: 13px;">Always pay Through Instantjob to protect yourself, you can release the payment anytime.</p>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?> 
<!----------------SUMMARY SCRIPT---------------------->
<script>
    var cart = document.forms.cart;
    var x = cart.elements;
    cart.addEventListener('click', updateBill, false);
    
    
     var basket = [{
       name: "",
      price: 100
    }, {
       name: "",
      price: 100
    }, {
       name: "",
      price: 100
    }];
    
    for (let j = 0; j < basket.length; j++) {
      var details = `
      <div id="item-${j}">
        <legend>${basket[j].name}</legend>
        <button class="btn_plus_minus" id="dec-${j}" type="button">-</button>
        <output id="qty-${j}">1</output>
        <button class="btn_plus_minus" id="inc-${j}" type="button">+</button>
        <output id="bas-${j}">${basket[j].price}</output>
       <p class="output_RM"> RM <output id="prc-${j}" class="prc">${basket[j].price}</output></p>
    </div>
    `;
      cart.insertAdjacentHTML('beforeend', details);
    }
    
    function updateBill(e) {
      if (e.target.type === 'button') {
        var ID = e.target.parentElement.id;
        var idx = ID.split('-').pop();
        var dir = e.target.id.split('-').shift();
        var qty = x.namedItem(`qty-${idx}`);
        var bas = x.namedItem(`bas-${idx}`);
        var prc = x.namedItem(`prc-${idx}`);
        var sum = x.total;
        var quantity = parseInt(qty.value, 10);
        var base = parseFloat(bas.value).toFixed(2);
        var price = parseFloat(prc.value).toFixed(2);
        var total = parseFloat(sum.value).toFixed(2);
        if (dir === "inc") {
          quantity++;
          qty.value = quantity;
          prc.value = quantity * base;
        } else {
          quantity--;
          if (quantity <= 0) {
            quantity = 0;
          }
          qty.value = quantity;
          prc.value = quantity * base;
        }
      }
      var prices = Array.from(document.querySelectorAll('.prc'));
    
      var numbers = prices.map(function(dig, idx) {
        return parseFloat(dig.value);
      });
      var grandTotal = numbers.reduce(function(acc, cur) {
        return acc + cur;
      }, 0);
    
      x.total.value = grandTotal.toFixed(2);
    }
</script>
<!----------------SUMMARY SCRIPT---------------------->