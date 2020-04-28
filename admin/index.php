<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">
<?php 
    $query_department = "SELECT count(id) from tbl_department where `publication_status`='1' ";
    $query_teacher    = "SELECT count(id) from tbl_teacher where `publication_status`='1' ";
    $query_student    = "SELECT count(id) from tbl_student where `publication_status`='1' ";
    $query_subject = "SELECT count(id) from tbl_subject where `publication_status`='1' ";
    $query_section = "SELECT count(id) from tbl_section where `publication_status`='1' ";

    $red_department      = $db->select($query_department);
    $red_teacher    = $db->select($query_teacher);
    $red_student   = $db->select($query_student);
    $red_subject = $db->select($query_subject);
    $red_section = $db->select($query_section);

    $result_department      = mysqli_fetch_assoc($red_department);
    $result_teacher    = mysqli_fetch_assoc($red_teacher);
    $result_student   = mysqli_fetch_assoc($red_student);
    $result_subject = mysqli_fetch_assoc($red_subject);
    $result_section = mysqli_fetch_assoc($red_section);


    $result_department = $result_department['count(id)'];
    if(!$result_department>0){
        $result_department=0;
    }
    $result_teacher = $result_teacher['count(id)'];
    if(!$result_teacher>0){
        $result_teacher=0;
    }
    $result_student = $result_student['count(id)'];
    if(!$result_student>0){
        $result_student=0;
    }
    $result_subject = $result_subject['count(id)'];
    if(!$result_subject>0){
        $result_subject=0;
    }
    $result_section = $result_section['count(id)'];
    if(!$result_section>0){
        $result_section=0;
    }

?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Department</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_department;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-cog fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Teacher</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_teacher;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Student</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $result_student;?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Course</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_subject;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Section</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $result_section;?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-cog fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            





          </div>

          

        </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>