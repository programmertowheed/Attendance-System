<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php if(isset($_GET['msg'])){
            $msg = $_GET['msg'];?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $msg ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <?php if(isset($_GET['err'])){
            $error = $_GET['err'];?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $error ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary d-inline-block">Teacher List</h6>
              <a href="addteacher.php" class="btn btn-sm btn-primary shadow-sm float-right">Add Teacher</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">SL</th>
                      <th width="25%">Name</th>
                      <th width="10%">Teacher ID</th>
                      <th width="5%">Department</th>
                      <th width="20%">Email</th>
                      <th width="10%">Phone</th>
                      <th width="5%">Status</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%">SL</th>
                      <th width="25%">Name</th>
                      <th width="10%">Teacher ID</th>
                      <th width="5%">Department</th>
                      <th width="20%">Email</th>
                      <th width="10%">Phone</th>
                      <th width="5%">Status</th>
                      <th width="20%">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php
  $i = 0;
  $red = $tea->getTeacherList();
  if($red==false){?>
  <td colspan="8"><h4 class="text-center">No Data Found</h4></td>
  <?php }else{
  while($res = mysqli_fetch_assoc($red)){ $i++ ?>

                    <tr>
                      <td <?php if($res['publication_status']!=1){echo "style='color:red'";}?>><?php echo $i ;?></td>
                      <td><?php echo $res['name'];?></td>
                      <td><?php echo $res['employeid'];?></td>
                      <td><?php echo $res['departname'];?></td>
                      <td><?php echo $res['email'];?></td>
                      <td><?php echo $res['phone'];?></td>
                      <?php if($res['publication_status']==1){?>
                      <td>Enable</td>
                      <?php }else{?>
                      <td>Disable</td>
                      <?php }?>
                      <td>
                        <?php if($res['publication_status']==1){?>
                        <a href="crud/teacherpublish.php?p=1&id=<?php echo $res['id'];?>" type="button" data-toggle="tooltip" title="Disable" class="btn btn-link btn-warning pd0" data-original-title="Unpublished">
                            <i class="fa fa-arrow-down"></i>
                        </a>
                      <?php }else{?>
                        <a href="crud/teacherpublish.php?p=2&id=<?php echo $res['id'];?>" type="button" data-toggle="tooltip" title="Enable" class="btn btn-link btn-info pd0" data-original-title="Published">
                            <i class="fa fa-arrow-up"></i>
                        </a> 
                      <?php }?>
                        <a href="editteacher.php?id=<?php echo $res['id'];?>" type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link btn-primary pd0" data-original-title="Edit Task">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="crud/deleteteacher.php?id=<?php echo $res['id'];?>" type="button" onclick="return confirm('Are you sure to delete this teacher?');" data-toggle="tooltip" title="Remove" class="btn btn-link btn-danger pd0" data-original-title="Remove">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
  <?php  } } ?>                  
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

<?php include('inc/footer.php');?>