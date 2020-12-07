<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Assign Student</h1>
          </div>
<?php 
    if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $addstudent = $stassign->addStudent($_POST);
    }
?>


          <?php if(isset($addstudent['success'])){
            $msg = $addstudent['success'];?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $msg ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <?php if(isset($addstudent['error'])){
            $error = $addstudent['error'];?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $error ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>

        <?php if(isset($addstudent['suberror'])){
            $error = $addstudent['suberror'];
            foreach ($error as $value) {
                            $red = $sub->getSubjectByID($value);
                            if($red==true){
                                while($value = mysqli_fetch_assoc($red)){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $value['code']."-".$value['name']." Course already assign!!" ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

         <?php } } 
          
        } } ?>

          
          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
                <form role="form" action="" method="post">
                    <div class="form-group has-success">
                        <label class="control-label" for="sinput_id">Student ID</label>

                        <input type="text" class="form-control" onkeyup="availableStudent();" id="sinput_id">
                        <input type="hidden" class="form-control" name="student_id" id="student_id">
                        <div id="msg">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject_id">Course</label>
                        <select name="subject_id[]" id="subject_id" class="form-control select-multi" multiple="multiple">
                            <!-- <option value="" selected>Select Course</option> -->
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
                    <button type="submit" name="submit" id="issuesubmit" disabled="disabled" class="btn btn-primary">Submit</button>
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>