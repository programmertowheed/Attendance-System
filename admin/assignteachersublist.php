<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php 
              if(isset($_REQUEST['id'])){
                  $id  = $fm->validation($_REQUEST['id']);
                  if(empty($id)){
                      header("Location:assignteacherlist.php?err=ID not found!!");
                  }
              } 
          ?>
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
              <h6 class="m-0 font-weight-bold text-primary d-inline-block">Teacher Course List</h6>
              <a href="assignteacher.php" class="btn btn-sm btn-primary shadow-sm float-right">Assign Teacher</a>
            </div>
            <div class="card-header text-center py-3">
              <h6 class="m-0 font-weight-bold text-tomato d-inline-block">
                <?php 
                  $teacherID = $tea->getTeacherByID($id);
                  $teacherID = mysqli_fetch_assoc($teacherID);
                  if($teacherID){echo $teacherID['employeid'];}
                ?>
              </h6><br>
              <h6 class="m-0 font-weight-bold text-tomato d-inline-block">
                <?php 
                  if($teacherID){echo $teacherID['name'];}
                ?>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                    <tr>
                      <th>SL</th>
                      <th>Course Code</th>
                      <th>Course Name</th>
                      <th>Section</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Course Code</th>
                      <th>Course Name</th>
                      <th>Section</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php
  $i = 0;
  $red = $teaassign->getTeacherCourseList($id);
  if($red==false){?>
  <td colspan="8"><h4 class="text-center">No Data Found</h4></td>
  <?php }else{
  while($res = mysqli_fetch_assoc($red)){ $i++ ?>
                    <tr>
                      <td><?php echo $i ;?></td>
                      <td><?php echo $res['subcode'];?></td>
                      <td><?php echo $res['subname'];?></td>
                      <td><?php echo $res['sname'];?></td>
                      <td>
                        <a href="editassignteacher.php?id=<?php echo $res['id'];?>" type="button" data-toggle="tooltip" title="Edit issue book" class="btn btn-link btn-primary pd0" data-original-title="Edit Task">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="crud/deletesingletea.php?id=<?php echo $res['id'];?>&tid=<?php echo $res['teacher_id'];?>" type="button" data-toggle="tooltip" onclick="return confirm('Are you sure?');" title="Return book" class="btn btn-link btn-danger pd0" data-original-title="Return book">
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