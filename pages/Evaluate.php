<?php 
session_start();
include('../Actions/connection.php');
$_SESSION['sup']=$_GET['a'];
if($_SESSION['u']==''){
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IPMS | Assign Students</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>
<style>
  .sidebar-dark-primary{
    background-color: #002147 !important;
  }
  .navbar-white{
    background-color: #507d2a!important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
  
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">IPMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <?php 
            $acc=mysqli_query($connection,"SELECT * FROM accounts WHERE username='".$_SESSION['u']."'");
            $rows=mysqli_fetch_array($acc);
          ?>
          <a href="#" class="d-block"><?php echo $rows[2]." ".substr($rows[3],0,2)." . ".$rows[1];?></a>
        </div>
      </div>

    
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
     
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Transactions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/ApproveAccomplishment.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accomplishment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/StudentsUnderSupervisor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/Evaluate.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Evaluate Student</p>
                </a>
              </li>
            </ul>
          </li>
       <!--    <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accomplisment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Narrative Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance</p>
                </a>
              </li>
            </ul>
          </li> -->
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="Actions/logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li> 
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php 
              $q=mysqli_query($connection,"SELECT  * FROM accounts WHERE username='".$_GET['a']."'");
              $rows=mysqli_fetch_array($q);
            ?>

            <h1>Weekly Evalution for ***<?php echo $rows[2].''.$rows[1];?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.card -->

        <div class="card card-default">
         
          <!-- /.card-header -->
          <div class="card-body">
     
        <!-- ./row -->
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#A" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Evaluation</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <h3>Dear Sir/ Madam:</h3>
    <p>
        This questionnaire aims to elicit your evaluation on the performance of a 
        <strong>BSIT student intern</strong> of SJCB, who has been deployed in your office 
        for internship/ practicum in the 2<sup>nd</sup> semester of AY 2023-2024, specifically from 
        <strong>___________, 2024</strong> to <strong>___________, 2024</strong>.
    </p>
    <p>
        You are kindly requested to evaluate the above-named student by ticking (✔) the column 
        which corresponds to your judgment for each of the items listed below. Please understand 
        that your evaluation constitutes 70% of the final grade of the student for the course 
        <strong>IT428</strong>. Your cooperation is highly appreciated. Rest assured that all data 
        to be gathered shall be treated with utmost level of confidentiality and professionalism.
    </p>
    <p>
        Please refer to the scale table below for your evaluation. Thank you very much.
    </p>
    <h4>Evaluation Scale:</h4>
    <ul>
        <li>5 = Strongly Agree</li>
        <li>4 = Agree</li>
        <li>3 = Moderately Agree</li>
        <li>2 = Disagree</li>
        <li>1 = Strongly Disagree</li>
    </ul>
                  </div>

  <div class="tab-pane fade" id="A" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab"> 

           <div class="card">
           
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                <thead>
                    <tr>
                       <th>Description</th>
                       <th>5</th>
                       <th>4</th>
                       <th>3</th>
                       <th>2</th>
                       <th>1</th>
                    </tr>
                </thead>
                <form id="frm">
      <tbody>
        <?php 
          $w = mysqli_query($connection, "SELECT * FROM evalquestions");
          while ($rowsW = mysqli_fetch_array($w)) {
            $rowId = $rowsW[0]; 
        ?>
            <tr>
                <td><?php echo $rowsW[2]; ?></td>
                <td>   
                    <div class="icheck-success d-inline">
                        <input type="radio" name="r[<?php echo $rowId; ?>]" id="radioSuccess<?php echo $rowId; ?>_1" value="5">
                        <label for="radioSuccess<?php echo $rowId; ?>_1"></label>
                    </div>
                </td>
                <td>   
                    <div class="icheck-success d-inline">
                        <input type="radio" name="r[<?php echo $rowId; ?>]" id="radioSuccess<?php echo $rowId; ?>_2" value="4">
                        <label for="radioSuccess<?php echo $rowId; ?>_2"></label>
                    </div>
                </td>
                <td>   
                    <div class="icheck-success d-inline">
                        <input type="radio" name="r[<?php echo $rowId; ?>]" id="radioSuccess<?php echo $rowId; ?>_3" value="3">
                        <label for="radioSuccess<?php echo $rowId; ?>_3"></label>
                    </div>
                </td>
                <td>   
                    <div class="icheck-success d-inline">
                        <input type="radio" name="r[<?php echo $rowId; ?>]" id="radioSuccess<?php echo $rowId; ?>_4" value="2">
                        <label for="radioSuccess<?php echo $rowId; ?>_4"></label>
                    </div>
                </td>
                <td>   
                    <div class="icheck-success d-inline">
                        <input type="radio" name="r[<?php echo $rowId; ?>]" id="radioSuccess<?php echo $rowId; ?>_5" value="1">
                        <label for="radioSuccess<?php echo $rowId; ?>_5"></label>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
     </table>
    </div>
</div>
<input type="hidden" name="username" id="username" value="<?php echo isset($_GET['a']) ? htmlspecialchars($_GET['a']) : ''; ?>">
<button class="btn btn-sm btn-success col-sm-12 save" type="button">Save Ratings</button>

</form>
 

</div>

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
       
        </div>
























            
     
     
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          
          </div>
        </div>
        <!-- /.card -->


        <!-- /.row -->
      </div>

    

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $('.duallistbox').bootstrapDualListbox()
  });

  $(document).ready(function(){
    $('.save').click(function(){
        var formData = $('#frm').serialize();
        $.ajax({
                    type: 'POST',
                    url: '../Actions/evaluate.php', // PHP script to handle the data
                    data: formData,
                    success: function(response) {
                        alert(response);
                         //window.location.href="AssignStudent.php";
                    },
                    error: function() {
                        alert('An error occurred.');
                    }
                });
    });

  });



 
</script>
</body>
</html>
