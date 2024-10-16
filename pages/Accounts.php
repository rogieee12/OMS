<?php
session_start();
 include('../Actions/connection.php');
if($_SESSION['u']==''){
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IPMS | Accounts</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
</head>
<style>
  .sidebar-dark-primary{
    background-color: #002147 !important;
  }
  .navbar-white{
    background-color: #507d2a!important;
  }
</style>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

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
                Setup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="EvaluationQuestion.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Evaluation Question</p>
                </a>
              </li>
            </ul>
          </li>
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
                <a href="Accounts.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accounts</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="SchoolYear.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>School Year</p>
                </a>
              </li>             

               <li class="nav-item">
                <a href="../Actions/logout.php" class="nav-link">
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
            <h1>Account List</h1>
          </div>
     
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                   <button type="button" class="btn btn-success btn-sm" id="add" data-toggle="modal" data-target="#modal-default">NEW RECORD</button>
                    <button type="button" class="btn btn-primary btn-sm" id="add" data-toggle="modal" data-target="#modal-defaults">IMPORT EXCEL</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Email</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Password</th>
                    <th width="100  ">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $q=mysqli_query($connection,"SELECT security.username,Accounts.lastname,Accounts.firstname,Accounts.middlename, security.password FROM Accounts INNER JOIN security ON accounts.username=security.username WHERE acctype!='Administrator' order by lastname asc");
                        while($rows=mysqli_fetch_array($q)){
                      ?>
                  <tr>
                    <td><?php echo $rows[0]; ?></td>
                    <td><?php echo $rows[1]; ?></td>
                    <td><?php echo $rows[2]; ?></td>
                    <td><?php echo $rows[3]; ?></td>
                    <td><?php echo $rows[4]; ?></td>
                    <td><button class="btn btn-primary btn-sm edit " value="<?php echo $rows[0]; ?>" >EDIT</button>
                      <button class="btn btn-danger btn-sm delete" value="<?php echo $rows[0]; ?>" >DELETE</button></td>
                  </tr>
                   <?php  
                   }
                   ?>
                  </tbody>
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- modal -->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Account Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id='frm'>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="Email" name="Email" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" id="Password" name="Password" placeholder="Enter Password" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Lastname</label>
                    <input type="text" class="form-control" id="Lastname" name="Lastname" placeholder="Enter Lastname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Fistname</label>
                    <input type="text" class="form-control" id="Firstname" name="Firstname" placeholder="Enter Fistname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Middlename</label>
                    <input type="text" class="form-control" id="Middlename" name="Middlename" placeholder="Enter Middlename">
                  </div>
                 <div class="form-group">
                  <label for="exampleSelectRounded0">Account Type</label>
                  <select class="custom-select rounded-0" id="AccountType" name="AccountType">
                    <option value="Student">Student</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Coordinator">Coordinator</option>
                  </select>
                </div>


                </div>

                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" id="p_id" name="p_id">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="save" name="save">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- modal -->


<!-- modal -->
  <div class="modal fade" id="modal-defaults">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Account Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id='frm2' enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Import Excel</label>
                    <input type="file" class="form-control" id="Excel" name="Excel" accept=".csv" required>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" id="p_id" name="p_id">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="uploadExcel" name="uploadExcel">Upload Excel</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- modal -->
  <!-- /.content-wrapper -->
 <?php 
 include('../includes/footer.html');
 ?>
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
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
 
  <!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


    
$(document).ready(function(){

  function generateRandomPassword(length = 8) {
        const characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        let password = '';
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            password += characters[randomIndex];
        }
        return password;
    }

    const password = generateRandomPassword();
   
 $('#uploadExcel').on('click', function(e) {
                e.preventDefault();
                // alert('aaa');
                var formData = new FormData($("#frm2")[0]);
                $.ajax({
                    url: '../Actions/Accounts/ImportExcel.php',  // PHP file to process the Excel data
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(response);
                    }
                });
 });

  $("#save").click(function(e){
        e.preventDefault();
        var formData = $("#frm").serialize();
        $.ajax({
            type:'POST',
            url: '../Actions/Accounts/Add.php',
            data: formData,
            success: function(data){
               location.reload(); 
              // alert(data);
            }
        });
  });

  $(".delete").click(function(e){
      e.preventDefault();
      var id = $(this).val();
       $.ajax({
            type:'POST',
            url: '../Actions/Accounts/Delete.php',
            data: {id:id},
            success: function(data){
                location.reload();
                // alert(data);
            }
        });
  });

  $("#add").click(function(e){
     e.preventDefault();
     $("#frm")[0].reset();
      $('#Password').val(password);
  }); 

  $(".edit").click(function(e){
      e.preventDefault();
      var id = $(this).val();
      $.ajax({
            type:'POST',
            url: '../Actions/Accounts/Get.php',
            data: {id:id},
            dataType: 'json',
            success: function(data){
                $("#Email").val(data.fullname);
                $("#Lastname").val(data.Contact);
                $("#Firstname").val(data.Address);
                $("#Middlename").val(data.Address);
                $("#AccountType").val(data.Address);
                $("#p_id").val(data.studentid);
                $("#modal-default").modal("show");
            }
        });
  });
});


  



</script>
</body>
</html>
