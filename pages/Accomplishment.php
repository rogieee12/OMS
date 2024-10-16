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
  <title>IPMS | Students</title>


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
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <!-- SimpleMDE -->
  <link rel="stylesheet" href="../plugins/simplemde/simplemde.min.css">
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
         <?php 
            $acc=mysqli_query($connection,"SELECT * FROM accounts WHERE username='".$_SESSION['u']."'");
            $rows=mysqli_fetch_array($acc);
          ?>

          <img  src="<?php echo 'data:image/jpeg;base64,'.base64_encode($rows[5]); ?>"  class="img-circle elevation-2" data-toggle="modal" data-target="#profileModal">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $rows[2]." ".substr($rows[3],0,2)." . ".$rows[1];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

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
                <a href="AnnouncementStudent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Announcement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Accomplishment.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accomplishment</p>
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
            <h1>Accomplishment</h1>
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
                   <button type="button" class="btn  btn-success btn-sm" id="add" data-toggle="modal" data-target="#modal-default">NEW RECORD</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="50">AM-TIME</th>
                    <th width="50">PM-TIME</th>
                    <th width="400">ACCOMPLISHMENT</th>
                    <th>DATE</th>
                    <th>TOTAL HOURS</th>
                    <th>REMARK</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $q=mysqli_query($connection,"SELECT * FROM Accomplishment WHERE username='".$_SESSION['u']."' ORDER BY date_time ASC");
                        while($rows=mysqli_fetch_array($q)){
                      ?>
                  <tr>
                    <td><?php echo $rows[2]."-".$rows[3]; ?></td>     
                    <td><?php echo $rows[4]."-".$rows[5]; ?></td>
                    <td><?php echo $rows[6]; ?></td>
                    <td><?php echo $rows[7]; ?></td>
                    <td><?php echo $rows[8]; ?></td>

                    <td><?php if($rows[5]=='0'){   echo "Unreviewed"; }?></td>
                   
                    <td>
                      <!-- <button class="btn btn-primary edit" value="<?php echo $rows[0]; ?>" >EDIT</button> -->
                      <button class="btn btn-danger delete btn-sm" value="<?php echo $rows[0]; ?>" >DELETE</button>
                      <!-- <a class="btn btn-warning download btn-sm" href="<?php echo $rows[3]; ?>" >DOWNLOAD</a> -->
                    </td>
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


 <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Update Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="profileForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">Profile Picture</label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control">
                        </div>
                        <img id="preview" src="" alt="Image Preview" style="width:160px; height: 160px;">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="save" id="saveimage" form="profileForm" class="btn btn-primary">Update Profile</button>
               </form>
                </div>
            </div>
        </div>
    </div>

<!-- modal -->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Accompliment Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id='frm' > 
            <div class="row">  
                 <div class="col-sm-12">
                      <div class="form-group">
                        <label>Date</label>
                      <input type="date" class="form-control" name="date" id="date" required=""> 
                      </div>
                    </div>
                <div class="col-sm-3">
                    <div class="form-group">
                      <label for="timeInAMHour">Hours:</label>
                      <select id="timeInAMHour" class="form-control hourDropdown" data-section="timeInAM"></select>
                     </div>
                </div>
                  
                <div class="col-sm-3">
                    <div class="form-group">
                      <label for="timeInAMMinute">Minutes:</label>
                      <select id="timeInAMMinute" class="form-control minuteDropdown" data-section="timeInAM"></select>
                      <label id="timeInAMLabel" name="timeInAMLabel">Selected Time: </label>
                      <input type="hidden" id="timeInAMHidden" name="timeInAM">
                  </div>
                </div>
               
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="timeOutAMHour">Hours:</label>
                    <select id="timeOutAMHour" class="form-control hourDropdown" data-section="timeOutAM"></select>
                  </div>
                </div>
              
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="timeOutAMMinute">Minutes:</label>
                    <select id="timeOutAMMinute" class="form-control minuteDropdown" data-section="timeOutAM"></select>
                   <label id="timeOutAMLabel" name="timeOutAMLabel">Selected Time: </label>
                    <input type="hidden" id="timeOutAMHidden" name="timeOutAM">
                </div>
              </div>

               <div class="col-sm-3">
                 <div class="form-group">
                  <label for="timeInPMHour">Hours:</label>
                  <select id="timeInPMHour" class="form-control hourDropdown" data-section="timeInPM"></select>
                 </div>
               </div>
       
               <div class="col-sm-3">
                  <div class="form-group">
                     <label for="timeInPMMinute">Minutes:</label>
                     <select id="timeInPMMinute" class="form-control minuteDropdown" data-section="timeInPM"></select> 
                     <label id="timeInPMLabel" name="timeInPMLabel">Selected Time: </label>
                     <input type="hidden" id="timeInPMHidden" name="timeInPM">
                </div>
              </div>
     
              <div class="col-sm-3">
                  <div class="form-group">
                      <label for="timeOutPMHour">Hours:</label>
                      <select id="timeOutPMHour" class="form-control hourDropdown" data-section="timeOutPM"></select>
                  </div>
              </div>

              <div class="col-sm-3">
                  <div class="form-group">
                      <label for="timeOutPMMinute">Minutes:</label>
                      <select id="timeOutPMMinute" class="form-control minuteDropdown" data-section="timeOutPM"></select>
                      <label id="timeOutPMLabel" name="timeOutPMLabel">Selected Time: </label>
                      <input type="hidden" id="timeOutPMHidden" name="timeOutPM">
                  </div>
              </div>

                     <div class="col-sm-12">
                      <div class="form-group">
                        <label>Accomplishment</label>
                        <textarea id="summernote" name="summernote">
            
                    </textarea>
                      </div>
                    </div>
                  
                  </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" id="p_id" name="p_id">       
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="save" name="save">Save changes</button>
            </div>
               </div>
                 </div>
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
 <!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
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

 $(function () {
    $('#summernote').summernote();
  });
    
$(document).ready(function(){

 document.getElementById('image').addEventListener('change', function() {
        const img = document.getElementById('preview');
        img.src = URL.createObjectURL(this.files[0]);
        img.style.display = 'block';
    });




$("#saveimage").click(function(e){
        e.preventDefault();
  
    var formData = new FormData($("#profileForm")[0]);
        $.ajax({
            type:'POST',
            url: '../Actions/imageupload.php',
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(data){
                alert(data);
               //location.reload(); 
            }
        });
  });




  $("#save").click(function(e){
        e.preventDefault();
        var formData = $("#frm").serialize();
        $.ajax({
            type:'POST',
            url: '../Actions/Accomplishment/Add.php',
            data: formData,
            success: function(data){
              alert(data);
              // location.reload(); 
            }
        });
  });

  $(".delete").click(function(e){
      e.preventDefault();
      var id = $(this).val();
       $.ajax({
            type:'POST',
            url: '../Actions/Accomplishment/Delete.php',
            data: {id:id},
            success: function(data){
                 location.reload();
            }
        });
  });


  $("#add").click(function(e){
     e.preventDefault();
     $("#frm")[0].reset();
  }); 

  $(".edit").click(function(e){
      e.preventDefault();
      var id = $(this).val();
      $.ajax({
            type:'POST',
            url: '../Actions/Accomplishment/Get.php',
            data: {id:id},
            dataType: 'json',
            success: function(data){
                // alert(data);
                $("#title").val(data.title);
                $("#summernote").val(data.accomplishment);
                $("#p_id").val(data.ac_id);
                $("#modal-default").modal("show");
            }
        });
  });
});


   function populateDropdowns() {
            const hourOptions = [];
            const minuteOptions = [];
            
           
            for (let h = 1; h <= 12; h++) {
                const hour = h.toString().padStart(2, '0');
                hourOptions.push(`<option value="${hour}">${hour}</option>`);
            }

            
            for (let m = 0; m < 60; m ++) {
                const minute = m.toString().padStart(2, '0');
                minuteOptions.push(`<option value="${minute}">${minute}</option>`);
            }

            // Insert hour and minute options into all dropdowns
            const hourDropdowns = document.querySelectorAll('.hourDropdown');
            const minuteDropdowns = document.querySelectorAll('.minuteDropdown');

            hourDropdowns.forEach(select => select.innerHTML = hourOptions.join(''));
            minuteDropdowns.forEach(select => select.innerHTML = minuteOptions.join(''));
        }

        function updateLabel(event) {
            const section = event.target.dataset.section;
            const hour = document.getElementById(`${section}Hour`).value;
            const minute = document.getElementById(`${section}Minute`).value;
            const period = section.includes('AM') ? 'AM' : 'PM';

            // Display the selected time in the label
            const selectedTime = `${hour}:${minute} ${period}`;
            document.getElementById(`${section}Label`).textContent = `Selected Time: ${selectedTime}`;

            // Update hidden input field with selected time
            document.getElementById(`${section}Hidden`).value = selectedTime;
        }

        window.onload = function() {
            populateDropdowns();

            // Add event listeners to dropdowns to update the labels
            const selects = document.querySelectorAll('select');
            selects.forEach(select => select.addEventListener('change', updateLabel));
        };
</script>
</body>
</html>
