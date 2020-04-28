<?php include('inc/header.php');?>
<?php
  error_reporting(0);
  if(isset($_GET['dt']) && isset($_GET['sub']) && isset($_GET['sec']) && isset($_GET['tid'])){
    $date = $fm->validation($_GET['dt']);
    $sub  = $fm->validation($_GET['sub']);
    $sec  = $fm->validation($_GET['sec']);
    $tid  = $fm->validation($_GET['tid']);
    if(empty($date)){
      $msg = "Date not found!!";
      header("Location:viewall.php?error=$msg");
    }
    if(empty($sub) || empty($sec) || empty($tid)){
      $msg = "Data missing!!";
      header("Location:viewall.php?error=$msg");
    }
  }else{
    $msg = "Data missing!!";
    header("Location:viewall.php?error=$msg");
  }  
?>
<?php 
  if(isset($_REQUEST['updatesubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $attend_id  = $_POST['attend'];
    $student_id = $_POST['id'];
    $updateAttend = $att->updateAttend($attend_id,$student_id,$_POST); 
  }
  // if(isset($updateAttend['sub'])){
  //   $course_id = $updateAttend['sub'];
  // }
  // if(isset($updateAttend['sec'])){
  //   $section_id = $updateAttend['sec'];
  // }
  // if(isset($updateAttend['date'])){
  //   $date = $updateAttend['date'];
  //   //$date = $fm->formatDBDate($date);
  // }
  // if(isset($updateAttend['tid'])){
  //   $tid = $updateAttend['tid'];
  // }
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php include('inc/content-nav.php');?>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                  <div class="well text-center m-0">
                    <strong>Date: </strong><?php echo $date;?>
                  </div>
                  <form action="" method="post">
                    <!-- <div class='alert alert-danger mtrl' style="display: none"><strong>Error ! </strong>Student ID missing!! </div> -->
                    <?php if(isset($updateAttend['success'])){
                          $msg = $updateAttend['success'];?>
                        <div class="alert alert-success alert-dismissible fade show mtrl" role="alert">
                          <strong><?php echo $msg ?></strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php } ?>

                      <?php if(isset($updateAttend['error'])){
                          $error = $updateAttend['error'];?>
                        <div class="alert alert-danger alert-dismissible fade show mtrl" role="alert">
                          <strong><?php echo $error ?></strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php }?>
                    <table class="table table-striped table-responsive">
                      <tr>
                        <th width="5%">SL</th>
                        <th width="20%">
                          <input type="checkbox" id="checkAll" class="form-controll">
                          <span class="attendName">Attendance</span>
                        </th>
                        <th width="25%">Student ID</th>
                        <th width="50%">Student Name</th>
                      </tr>
<?php 

    $get_student   = $att->getStudentListByDtae($tid,$sub,$sec,$date);
  if($get_student){
    $i =0;
    while($value = $get_student->fetch_assoc()){
      $i++;
?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                          <input type="checkbox" class="form-controll" name="attend[<?php echo $value['id']; ?>]" <?php if($value['attend']==1){echo "checked";}?> value="1">
                        </td>
                        <td><?php echo $value['sid']; ?></td>
                        <td>
                          <?php echo $value['name']; ?>

                          <input type="hidden" name="id[]" value="<?php echo $value['id']; ?>">
                          <input type="hidden" name="date" value="<?php echo $value['att_time']; ?>">
                          <input type="hidden" name="tid" value="<?php echo $value['teacher_id']; ?>">
                          <input type="hidden" name="sub" value="<?php echo $value['subject_id']; ?>">
                          <input type="hidden" name="sec" value="<?php echo $value['section_id']; ?>">
                        </td>
                      </tr>
<?php } }else{?>
                      <tr>
                        <td colspan="4" class="text-center"><h4>No Data found</h4></td>
                      </tr>
<?php } ?>
                      <tr>
                        <td colspan="4" onclick="return confirm('Are you sure to update?');" class="text-center"><input type="submit" class="btn btn-primary" name="updatesubmit" value="Update"></td>
                      </tr>
                    </table>
                  </form>

                </div>

            </div>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>