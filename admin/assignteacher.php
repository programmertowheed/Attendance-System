<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Assign Teacher</h1>
          </div>
<?php 
    if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $addteacher = $teaassign->addTeacher($_POST);
    }
?>


          <?php if(isset($addteacher['success'])){
            $msg = $addteacher['success'];?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $msg ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <?php if(isset($addteacher['error'])){
            $error = $addteacher['error'];?>
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
                    <div class="form-group has-success">
                        <label class="control-label" for="sinput_id">Employe ID</label>

                        <input type="text" class="form-control" onkeyup="availableTeacher();" id="tinput_id">
                        <input type="hidden" class="form-control" name="teacher_id" id="teacher_id">
                        <div id="tmsg">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject_id">Course</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="" selected>Select Course</option>
                        <?php
                            $red = $sub->getSubject();
                            if($red==true){
                                while($value = mysqli_fetch_assoc($red)){ ?>

                                <option value="<?php echo $value['id'];?>"><?php echo $value['code']."-".$value['name'];?></option>

                        <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="section_id">Section</label>
                        <select name="section_id" id="section_id" class="form-control">
                            <option value="" selected>Select Section</option>
                        <?php
                            $red = $sec->getSection();
                            if($red==true){
                                while($value = mysqli_fetch_assoc($red)){ ?>

                                <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>

                        <?php } } ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" id="tissuesubmit" disabled="disabled" class="btn btn-primary">Submit</button>
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>