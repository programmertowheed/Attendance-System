<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Teacher</h1>
          </div>
<?php 
     
    if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $editteacher = $tea->editTeacher($_POST);
        }
    
?>

        <?php if(isset($editteacher['success'])){
            $msg = $editteacher['success'];
            header("Location:teacherlist.php?msg=$msg");
        }
        ?>

        <?php if(isset($editteacher['error'])){
            $error = $editteacher['error'];?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $error ?></strong> 
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
        header("Location:teacherlist.php?err=ID not found!!"); 
    }else{
        $red = $tea->getTeacherByID($id);
        if($red != true){
            header("Location:teacherlist.php?err=ID not found!!");
        }else{
            while($res = mysqli_fetch_assoc($red)){ ?>
                    <div class="form-group">
                        <label class="control-label" for="inputSuccess">Teacher name</label>
                        <input type="text" class="form-control" value="<?php echo $res['name'];?>" name="name" id="inputSuccess">
                        <input type="hidden" class="form-control" value="<?php echo $res['id'];?>" name="id" id="id">
                    </div>
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select name="department_id" id="department_id" class="form-control">
                            <option value="">Select Department</option>
                        <?php
                            $depart = $dpart->getDepartment();
                            if($depart==true){
                                while($value = mysqli_fetch_assoc($depart)){ ?>

                                <option value="<?php echo $value['id'];?>" 
                                <?php if($res['department_id']==$value['id']){ echo "selected";}?> 
                                 ><?php echo $value['name'];?></option>

                        <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputWarning">Employe ID</label>
                        <input type="text" class="form-control" value="<?php echo $res['employeid'];?>" name="employeid" id="inputWarning">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputError">Phone</label>
                        <input type="text" class="form-control" value="<?php echo $res['phone'];?>" name="phone" id="inputError">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <input type="text" class="form-control" value="<?php echo $res['email'];?>" name="email" id="inputEmail">
                        <input type="hidden" class="form-control" value="<?php echo $res['userid'];?>" name="userid" >
                    </div>
                    <div class="form-group">
                        <label for="publication_status" class="control-label">Publication Status</label>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">
                                <input class="form-check-input" id="inlineRadio1" type="radio" name="publication_status" value="1" <?php if($res['publication_status']==1){ echo "checked";}?>>Enable</label>
                            <label class="form-check-label" for="inlineRadio2">
                                <input class="form-check-input" id="inlineRadio2" type="radio" name="publication_status" value="2" <?php if($res['publication_status']==2){ echo "checked";}?>>Disable</label>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update Teacher info</button>
<?php } } }?>
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>