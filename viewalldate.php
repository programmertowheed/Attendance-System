<?php include('inc/header.php');?>
<?php

  if(isset($_REQUEST['datesubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $tid           = $fm->validation($_POST['tid']);
        $courseSection = $fm->validation($_POST['courseSection']);
        $courseSection = explode("*%", $courseSection);
        $course_id     = $fm->validation($courseSection['0']);
        $section_id    = $fm->validation($courseSection['1']);

        if(empty($tid) || empty($courseSection) || empty($course_id) || empty($section_id)){
            header("Location:viewall.php?error=Feild must not be empty!!");
        } 
  }
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php include('inc/content-nav.php');?>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                  <div class="well text-center m-0" >
                    <strong>All Date List</strong>
                  </div>
                  <form action="" method="post">
                    <table class="table table-striped">
                      <tr>
                        <th width="25%">SL</th>
                        <th width="25%">Attendance Date</th>
                        <th width="25%">Action</th>
                      </tr>
<?php 
  $get_date = $att->getDateList($tid, $course_id, $section_id);
  if($get_date){
    $i =0;
    while($value = $get_date->fetch_assoc()){
      $i++;
?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['att_time']; ?></td>
                        <td>
                          <a class="btn btn-primary" href="student_view.php?dt=<?php echo $value['att_time']; ?>&sub=<?php echo $course_id; ?>&sec=<?php echo $section_id; ?>&tid=<?php echo $tid; ?>">View</a>
                        </td>
                      </tr>
<?php } }else{?>
                      <tr>
                        <td colspan="3" class="text-center"><h4>No Data found</h4></td>
                      </tr>
<?php } ?>
                    </table>
                  </form>

                </div>

            </div>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>