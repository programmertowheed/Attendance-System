<?php include('inc/header.php');?>
<?php
  error_reporting(0);
  if(isset($_REQUEST['getstudent']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $date          = $fm->validation($_POST['date']);
        $date          = $fm->formatDBDate($date);
        $tid           = $fm->validation($_POST['tid']);
        $courseSection = $fm->validation($_POST['courseSection']);
        $courseSection = explode("*%", $courseSection);
        $course_id     = $fm->validation($courseSection['0']);
        $section_id    = $fm->validation($courseSection['1']);

        if(empty($date) || empty($tid) || empty($courseSection) || empty($course_id) || empty($section_id)){
            header("Location:index.php?error=Feild must not be empty!!");
        }   
  }

?>
<?php 
  if(isset($_REQUEST['attendsubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $attend_id  = $_POST['attend'];
    $student_id = $_POST['id'];
    $addAttend = $att->addAttend($attend_id,$student_id,$_POST); 
  }
  if(isset($addAttend['sub'])){
    $course_id = $addAttend['sub'];
  }
  if(isset($addAttend['sec'])){
    $section_id = $addAttend['sec'];
  }
  if(isset($addAttend['date'])){
    $date = $addAttend['date'];
    //$date = $fm->formatDBDate($date);
  }
  if(isset($addAttend['tid'])){
    $tid = $addAttend['tid'];
  }
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php include('inc/content-nav.php');?>
        <div class="row">
          <div class="col-md-10 m-auto">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">
                    <h2>
                        <a href="index.php" class="btn btn-success">Back</a>
                        <a href="viewall.php" class="btn btn-info float-right">View All Date</a>
                    </h2>
                </div> -->
                <div class="panel-body">
                  <div class="well text-center" style="margin: 0">
                    <strong>Date: </strong><?php echo $date;?>
                  </div>
                  <form action="" method="post">
                    <!-- <div class='alert alert-danger mtrl' style="display: none"><strong>Error ! </strong>Student ID missing!! </div> -->
                    <?php if(isset($addAttend['success'])){
                          $msg = $addAttend['success'];?>
                        <div class="alert alert-success alert-dismissible fade show mtrl" role="alert">
                          <strong><?php echo $msg ?></strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php } ?>

                      <?php if(isset($addAttend['error'])){
                          $error = $addAttend['error'];?>
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

    $get_student   = $att->getStudentList($course_id, $section_id);
  if($get_student){
    $i =0;
    while($value = $get_student->fetch_assoc()){
      $i++;
?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                          <input type="checkbox" class="form-controll" name="attend[<?php echo $value['id']; ?>]" value="1">
                        </td>
                        <td><?php echo $value['studentid']; ?></td>
                        <td>
                          <?php echo $value['name']; ?>

                          <input type="hidden" name="id[]" value="<?php echo $value['id']; ?>">
                          <input type="hidden" name="date" value="<?php echo $date; ?>">
                          <input type="hidden" name="tid" value="<?php echo $tid; ?>">
                          <input type="hidden" name="sub" value="<?php echo $course_id; ?>">
                          <input type="hidden" name="sec" value="<?php echo $section_id; ?>">
                        </td>
                      </tr>
<?php } }else{?>
                      <tr>
                        <td colspan="4" class="text-center"><h4>No Data found</h4></td>
                      </tr>
<?php } ?>
                      <tr>
                        <td colspan="4" onclick="return confirm('Are you sure to submit?');" class="text-center"><input type="submit" class="btn btn-primary" name="attendsubmit" value="Submit"></td>
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