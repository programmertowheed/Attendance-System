<?php include('inc/header.php');?>
<?php

  // $cur_date = date('Y-m-d');
  // if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
  //   $attend = $_POST['attend'];
  //   $addAttend = $st->addAttend($cur_date,$attend);
  // }
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php include('inc/content-nav.php');?>
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="panel panel-default">
                
                <div class="panel-body">
                  <div class="well text-center" style="margin: 0">
                    <strong>Today: </strong><?php 
                      $cur_date = date("Y-m-d");
                      echo $cur_date;
                    ?>
                  </div>
                  <div class="formouter">
                      <form action="viewalldate.php" method="post">

                         <?php if(isset($_GET['success'])){
                          $msg = $_GET['success'];?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong><?php echo $msg ?></strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php } ?>

                      <?php if(isset($_GET['error'])){
                          $error = $_GET['error'];?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong><?php echo $error ?></strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php }?>

                        <div class="form-group">
                          <label for="courseSection">Course and section</label>
                          <select name="courseSection" id="courseSection" class="form-control">
                              <option value="" selected>Select Course and section</option>
                         <?php
                               $eid = Session::get("attuseremployeid");
                               $tid = $tea->getEmployeByID($eid)->fetch_assoc();
                               $tid = $tid['id'];
                               $red = $teaassign->getTeacherCourseList($tid);
                               if($red==true){
                                   while($value = mysqli_fetch_assoc($red)){ ?>

                                  <option value="<?php echo $value['subid']."*%".$value['secid'];?>" ><?php echo $value['subcode']."-".$value['subname']." & Section-".$value['sname'];?>
                                  </option>

                          <?php } } ?>
                          </select>
                          <input class="form-control" type="hidden" value="<?php echo $tid;?>" name="tid">
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary" name="datesubmit">Submit</button>
                        </div>
                      </form>
                  </div>

                </div>

            </div>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>