<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BPC-ME | CUSTOMERS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css" >
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css" >
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php  include_once 'header.php' ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
         <?php  include_once 'menu.php'  ?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Customers 
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">users</a></li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Customers</h3>
                  <button type="button" id="adduser" class="btn btn-primary">Add Customer</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="users" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      

                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Add Customer Details</h4>
                      </div>
                      <div class="modal-body">
                          <div class="box box-primary">
                            
                            <!-- form start -->
                           
                              <div class="box-body">
                                   <form>
                                      <div class="row">
                                         <div class="col-xs-6">
                                              <input type="text" class="form-control" placeholder="Customer Name">
                                          </div>
                                          <div class="col-xs-6">
                                              <input type="text" class="form-control" placeholder="P O Box">
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                          <div class="col-xs-6">
                                              <input type="text" class="form-control" placeholder="Place">
                                          </div>
                                          <div class="col-xs-6">
                                              <input type="text" class="form-control" placeholder="Zip Code">
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                          <div class="col-xs-6">
                                              <select class="form-control">
                                                 <option>Country</option>
                                              </select>
                                          </div>
                                          <div class="col-xs-6">
                                              <input type="text" class="form-control" placeholder="Contact Person">
                                          </div>
                                      </div>

                                      <br>
                                      <div class="row">
                                          <div class="col-xs-6">
                                               <input type="text" class="form-control" placeholder="Phone No 1">
                                          </div>
                                          <div class="col-xs-6">
                                               <input type="text" class="form-control" placeholder="Phone No 2">
                                          </div>
                                      </div>

                                      <br>
                                      <div class="row">
                                          <div class="col-xs-6">
                                               <input type="text" class="form-control" placeholder="Email">
                                          </div>
                                          <div class="col-xs-6">
                                               <input type="text" class="form-control" placeholder="Website">
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                          <div class="col-xs-6">
                                               <input type="text" class="form-control" placeholder="Native">
                                          </div>
                                          <div class="col-xs-6">
                                               <input type="text" class="form-control" placeholder="Industry">
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                          <div class="col-xs-12">
                                               <textarea class="form-group" rows="3"  style="resize:none">
                                                
                                              </textarea>
                                          </div>
                                          
                                      </div>
                                  </form>
                                
                              </div><!-- /.box-body -->

                              
                           
                          </div><!-- /.box -->
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" id="submituser" class="btn btn-primary">Save changes</button>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                  <p>User has successfully been added</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
              </div>
              
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" ></script>
    <!-- page script -->
    <script>
      $(function () {
        var userTable=$("#users").DataTable();
        

        $('#adduser').on('click',function(){
          $("#myModal").modal('show');
        });

        $('#submituser').on('click',function(){
           var full_name = $('#fullname').val();
           var username  = $('#username').val();
           var password  = $('#password').val();

           if(full_name=='' || username=='' || password=='')
           {
            alert('Please fill all the required details');
           }
           else
           {
              //var url = '<?php echo base_url(); ?>' + 'index.php/users_controller/add_user';
              $.post(url,
                {
                  full_name:full_name,
                  username :username,
                  password : password
                },function(data){
                     if(data.status)
                     {
                      $("#myModal").modal('hide');
                      $("#myModal1").modal('show');
                     }
                });
           }
        })
        


      });
    </script>
  </body>
</html>