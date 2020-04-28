<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Section</h1>
          </div>

      <?php 
   
        if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $updatesection = $sec->updateSection($_POST);   
        }
          
      ?>
          <?php if(isset($updatesection['success'])){
            $msg = $updatesection['success'];
            header("Location:sectionlist.php?msg=$msg");
          }
          ?>

        <?php if(isset($updatesection['error'])){
            $error = $updatesection['error'];?>
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
        header("Location:sectionlist.php?err=ID not found!!"); 
    }else{
        $red = $sec->getSectionByID($id);
        while($res = mysqli_fetch_assoc($red)){ ?>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Section name</label>
                        <input type="text" name="name" value="<?php echo $res['name'];?>" class="form-control" id="inputSuccess">
                        <input type="hidden" name="id" value="<?php echo $res['id'];?>" class="form-control" id="inputid">
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
                    <button type="submit" name="submit" class="btn btn-primary">Update Section info</button>
<?php } } ?>
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>