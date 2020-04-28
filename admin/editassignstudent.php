<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Assign Student</h1>
          </div>
<?php 
     
    if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
       
        $updatestudent = $stassign->updateStudent($_POST);
    }
    
?>
        <?php if(isset($updatestudent['success'])){
                $msg = $updatestudent['success'];
                $id  = $updatestudent['sid'];
                header("Location:assignstudentsublist.php?id=$id&msg=$msg");
            } 
        ?>

        <?php if(isset($updatestudent['error'])){
            $error = $updatestudent['error'];?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $error ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>

        <?php if(isset($updatestudent['info'])){
            $info = $updatestudent['info'];?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $info ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
                <form role="form" action="" method="post">
<?php
    if(isset($_REQUEST['id'])){
        $id = $fm->validation($_REQUEST['id']);
    }
    if(empty($id)){
        header("Location:assignstudentlist.php?err=ID not found!!"); 
    }else{
        $red = $stassign->getAssignStudent($id);
        while($res = mysqli_fetch_assoc($red)){ $sid = $res['student_id'];  ?>
                    <div class="form-group has-success">
                   <?php $sred = $st->getStudent($sid);
                        if($sred==true){
                          $sresult = mysqli_fetch_assoc($sred);}?>
                        <label class="control-label" for="inputSuccess">Student Name</label>
                        <input type="text" value="<?php echo $sresult['name'];?>" disabled class="form-control" id="inputSuccess">
                        <input type="hidden" value="<?php echo $res['id'];?>" name="id" class="form-control" id="inputid">
                        <input type="hidden" value="<?php echo $sid;?>" name="sid" class="form-control" id="inputid">
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Student ID</label>
                        <input type="text" value="<?php echo $sresult['studentid'];?>" disabled class="form-control" id="inputSuccess">
                    </div>
                    <div class="form-group">
                        <label for="subject_id">Course</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="">Select Course</option>
                        <?php
                            $red = $sub->getSubject();
                            if($red==true){
                                while($value = mysqli_fetch_assoc($red)){ ?>

                                <option value="<?php echo $value['id'];?>" 
                                <?php if($res['subject_id']==$value['id']){ echo "selected";}?> 
                                 ><?php echo $value['code']."-".$value['name'];?></option>

                        <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="section_id">Section Name</label>
                        <select name="section_id" id="section_id" class="form-control">
                            <option value="">Select Section</option>
                        <?php
                            $bred = $sec->getSection();
                            if($bred==true){
                                while($bvalue = mysqli_fetch_assoc($bred)){ ?>

                                <option value="<?php echo $bvalue['id'];?>" 
                                <?php if($res['section_id']==$bvalue['id']){ echo "selected";}?> 
                                 ><?php echo $bvalue['name'];?></option>

                        <?php } } ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update info</button>
<?php } } ?>                    
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>