<?php include('inc/header.php'); 

$alluser = $obj->GetUsers();

?>
 
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              
 <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!--<li class="dropdown">-->
                      <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>-->
                      <!--  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                      <!--      <a class="dropdown-item" href="#">Settings 1</a>-->
                      <!--      <a class="dropdown-item" href="#">Settings 2</a>-->
                      <!--    </div>-->
                      <!--</li>-->
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30"> </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Profile name</th>
                          <th>E-mail</th>
                          <th>Phone</th>
                          <th>County</th>
                          <th>Qualification/Year</th>
                          <th>Image</th>
                          <th>Created Date</th>
                          	<th>Block / Unblock</th>
                          <!--<th>Action</th>-->
                           
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($alluser as $users) {?>
                        <tr>
                          <td><?=$users['ProfileName'];?></td>
                          <td><?=$users['Email'];?></td>
                          <td><?=$users['Phone'];?></td>
                          <td><?=$users['Country'];?></td>
                          <td><?=$users['Qualifications'];?>/<?=$users['Year'];?></td>
                           <td><img src="assets/img/profile/<?=$users['ProfilePic'];?>" style="width: 42px;height: 42px;border-radius: 30px;"></td>
                          <td><?=$users['Created_at'];?></td>   
                          <!--<td><a href=""></a></td>-->
                          	<td>
				    <?php  $status =  $users['Status']; 
					if($status == 1){	
				?>
				   
				    <a class="btn btn-primary" href="inc/process.php?UserBlock=<?php echo $users['id'];?>">Block</a>
					<?php } elseif($status == 0){	?>
				  <a class="btn btn-primary" href="inc/process.php?UserUnblock=<?php echo $users['id'];?>">Unblock</a>
	                <?php }else{} ?>

				</td>
                           
                        </tr>
                       <?php } ?>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>

<?php include('inc/footer.php'); ?>