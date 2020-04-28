<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book-reader"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Student Attendance</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <!-- <div class="sidebar-heading">
    Interface
  </div> -->

  <!-- Nav Item Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#studentarea" aria-expanded="true" aria-controls="studentarea">
      <i class="fas fa-user"></i>
      <span>Student</span>
    </a>
    <div id="studentarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Students area:</h6>
        <a class="collapse-item" href="addstudent.php">Add Student</a>
        <a class="collapse-item" href="studentlist.php">Student List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#departmenrarea" aria-expanded="true" aria-controls="departmenrarea">
      <i class="fas fa-fw fa-cog"></i>
      <span>Department</span>
    </a>
    <div id="departmenrarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Departments area:</h6>
        <a class="collapse-item" href="adddepartment.php">Add Department</a>
        <a class="collapse-item" href="departmentlist.php">Department List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sectionarea" aria-expanded="true" aria-controls="sectionarea">
      <i class="fas fa-fw fa-cog"></i>
      <span>Section</span>
    </a>
    <div id="sectionarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Sections area:</h6>
        <a class="collapse-item" href="addsection.php">Add Section</a>
        <a class="collapse-item" href="sectionlist.php">Section List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subjectarea" aria-expanded="true" aria-controls="subjectarea">
      <i class="fas fa-fw fa-cog"></i>
      <span>Course</span>
    </a>
    <div id="subjectarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Courses area:</h6>
        <a class="collapse-item" href="addsubject.php">Add Course</a>
        <a class="collapse-item" href="subjectlist.php">Course List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#teacherarea" aria-expanded="true" aria-controls="teacherarea">
      <i class="fas fa-user"></i>
      <span>Teacher</span>
    </a>
    <div id="teacherarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Teachers area:</h6>
        <a class="collapse-item" href="addteacher.php">Add Teacher</a>
        <a class="collapse-item" href="teacherlist.php">Teacher List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#assignteacher" aria-expanded="true" aria-controls="assignteacher">
      <i class="fas fa-users"></i>
      <span>Assign Teacher</span>
    </a>
    <div id="assignteacher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Assign Teacher area:</h6>
        <a class="collapse-item" href="assignteacher.php">Assign Teacher</a>
        <a class="collapse-item" href="assignteacherlist.php">Assign Teacher List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#assignstudent" aria-expanded="true" aria-controls="assignstudent">
      <i class="fas fa-users"></i>
      <span>Assign Student</span>
    </a>
    <div id="assignstudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Assign Student area:</h6>
        <a class="collapse-item" href="assignstudent.php">Assign Student</a>
        <a class="collapse-item" href="assignstudentlist.php">Assign Student List</a>
      </div>
    </div>
  </li>

  <!-- Nav Item Collapse Menu End-->
 

 
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Design and develop by programmertowheed-->
      <!-- URL: https://www.programmertowheed.com -->

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>