<div class='row'>
  <div class="col-md-6 m-auto">
    <nav id="navTop" class="navbar navbar-expand-md navbar-light bg-light">
          <ul class="navbar-nav m-auto">
              <li class="nav-item mr-lg-2 mb-lg-0 mb-2 <?php if($apage=="index"){echo "active";}?>">
                  <a class="nav-link" href="index.php">Take Attendance
                      <span class="sr-only">(current)</span>
                  </a>
              </li>
              <li class="nav-item <?php if($apage==viewall || $apage==viewalldate || $apage==student_view){echo "active";}?>">
                  <a class="nav-link" href="viewall.php">View All Date</a>
              </li>
          </ul>
    </nav>
  </div>
</div>