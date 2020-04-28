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
              <h6 class="m-0 font-weight-bold text-primary d-inline-block">Assign Teacher List</h6>
              <a href="assignstudent.php" class="btn btn-sm btn-primary shadow-sm float-right">Assign Teacher</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                    <tr>
                      <th>SL</th>
                      <th>Teacher Name</th>
                      <th>Employe ID</th>
                      <th>Department</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Teacher Name</th>
                      <th>Employe ID</th>
                      <th>Department</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php
  $i = 0;
  $red = $teaassign->getTeacherList();
  if($red==false){?>
  <td colspan="8"><h4 class="text-center">No Data Found</h4></td>
  <?php }else{
  while($res = mysqli_fetch_assoc($red)){ $i++ ?>
                    <tr>
                      <td><?php echo $i ;?></td>
                      <td><?php echo $res['tname'];?></td>
                      <td><?php echo $res['eid'];?></td>
                      <td><?php echo $res['dname'];?></td>
                      <td>
                        <a href="assignteachersublist.php?id=<?php echo $res['teacher_id'];?>" type="button" data-toggle="tooltip" title="Edit issue book" class="btn btn-link btn-primary pd0" data-original-title="Edit Task">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="crud/deleteassignteacher.php?id=<?php echo $res['teacher_id'];?>" type="button" data-toggle="tooltip" onclick="return confirm('Are you sure?');" title="Return book" class="btn btn-link btn-danger pd0" data-original-title="Return book">
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