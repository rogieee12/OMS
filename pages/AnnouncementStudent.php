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
  <title>IPMS | Announcement</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
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
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
   
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
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
             
            </ul>
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
            <h1>Announcement     
              <?php 
              if($_SESSION['acctype']=='Administrator'){
              ?>

              <button type="button" class="btn  btn-success btn-sm" id="add" data-toggle="modal" data-target="#modal-default">NEW ANNOUNCEMENT</button>
              
              <?php }

              ?>
            </h1>
          </div>
   
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- modal -->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ANNOUNCEMENT FORM</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id='frm'>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Message Content</label>
                    <textarea class="form-control" id="Message" name="Message" placeholder="Enter Fullname"> </textarea>   
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" id="p_id" name="p_id">
              <input type="hidden" name="sup" id="sup" value="<?php echo $_GET['a']; ?>">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="save" name="save">Post</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- modal -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
         <?php 
            $p=mysqli_query($connection,"SELECT * FROM studentlist WHERE student='".$_SESSION['u']."'");
            $rowp=mysqli_fetch_array($p);
            if(mysqli_num_rows($p)!=0){
            $r=mysqli_query($connection,"SELECT * from announcement WHERE supervisor  IN (SELECT supervisor FROM studentlist WHERE supervisor='".$rowp[2]."')");
              if (mysqli_num_rows($r) != 0) {
                 while($rows=mysqli_fetch_array($r)){
         
          
          ?>
        <div class="row">
          <div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="../dist/img/avatar.png" alt="User Image">
                  <?php 
                    $a=mysqli_query($connection,"SELECT CONCAT(firstname,' ',lastname) from accounts WHERE username='".$rows[4]."'");
                    $rowa=mysqli_fetch_array($a);
                  ?>
                  <span class="username"><a href="#"><?php  echo $rowa[0]; ?></a></span>
                  <span class="description"><?php echo $rows[2]; ?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool edit" title="Update Announcement" value="<?php echo $rows[0]; ?>">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool delete" value="<?php echo $rows[0]; ?>" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
              
                <p><?php echo $rows[1];?></p>
                <!-- Attachment -->
                <!-- <div class="attachment-block clearfix"> -->
                  <!-- <img class="attachment-img" src="../dist/img/photo1.png" alt="Attachment Image"> -->

                  <!-- <div class="attachment-pushed"> -->
                    <!-- <h4 class="attachment-heading"><a href="https://www.lipsum.com/">Lorem ipsum text generator</a></h4> -->

                    <!-- <div class="attachment-text"> -->
                      <!-- Description about the attachment can be placed here. -->
                      <!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a> -->
                    <!-- </div> -->
                    
                  <!-- </div> -->
                  <!-- /.attachment-pushed -->
                <!-- </div> -->
                <!-- /.attachment-block -->

                <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">45 likes - 2 comments</span>
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                <!-- /.card-comment -->
                <div class="card-comment">
                  <!-- User image -->
                 <?php 
                  $c=mysqli_query($connection,"SELECT * from comments where a_id='".$rows[0]."'");
                  while($rowsc=mysqli_fetch_array($c)){
                 ?>
                  <img class="img-circle img-sm" src="../dist/img/avatar2.png" alt="User Image">

                  <div class="comment-text content">
                    <span class="username">
                      Nora Havisham
                      <span class="text-muted float-right"><?php echo $rowsc[4]; ?></span>
                    </span>
                    <?php 
                      echo $rowsc[3];
                    ?>

                  </div>
                  <?php 
                  }
           
                  ?>
                
                </div>
                <!-- /.card-comment -->
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                <form id="comment" method="post">
                  <img class="img-fluid img-circle img-sm" src="../dist/img/avatar5.png" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input type="hidden" name="p_id" id="p_id" value="<?php echo $rows[0]; ?>">
                    <input type="text" class="form-control form-control-sm" id="myInput" name="myInput" placeholder="Press enter to post comment">
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
  <?php }             }
            }

          ?>
    
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
<script>
  $(document).ready(function(){

  $("#save").click(function(e){
        e.preventDefault();
        var formData = $("#frm").serialize();
        $.ajax({
            type:'POST',
            url: '../Actions/Announcement/Add.php',
            data: formData,
            success: function(data){
              //alert(data);
               location.reload(); 
            }
        });
  });

      $('#myInput').on('keypress', function(event) {
                if (event.which == 13) { // Enter key is pressed
                    event.preventDefault();
                    var formData = $("#comment").serialize();
                    $.ajax({
                      type:'POST',
                      url: '../Actions/Announcement/AddComment.php',
                      data: formData,
                      success: function(data){
                          location.reload(); 
                        }
                     });
                }
            });

  $(".delete").click(function(e){
      e.preventDefault();
      var id = $(this).val();
       $.ajax({
            type:'POST',
            url: '../Actions/Announcement/Delete.php',
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
  }); 


  $(".edit").click(function(e){
      e.preventDefault();
      var id = $(this).val();

      $.ajax({
            type:'POST',
            url: '../Actions/Announcement/Get.php',
            data: {id:id},
            dataType: 'json',
            success: function(data){
              alert(data);
                $("#Message").val(data.message);
                $("#p_id").val(data.a_id);
                $("#modal-default").modal("show");
            }
        });
  });
});

</script>