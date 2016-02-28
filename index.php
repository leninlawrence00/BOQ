<?php
 include_once "classes/class.boqCode.php";
 include_once "classes/class.boq.php";
 include_once "classes/class.items.php";

 $bc = new BOQCode();
 
 $boq = new BOQItems();

 $it = new Item();

 $itemsForSelect = $it->getItems();
 



 $boq_code=$bc->generateBoqCode() +1;

 $items=$boq->getItemsForBoq($boq_code);
 $itemcost=$boq->getItemCost($boq_code);

 
 

 




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BOQ </title>
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
            BOQ
            
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
                  
                  
                  <div class="row">
                    <div class="col-xs-3">
                      <label for="item_code"> BOQ Code :</label>
                      <input type="text" class="form-control" id="boq_code" disabled="true" value="<?php echo $boq_code; ?>">
                    </div>
                    

                    </div>
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <label for="item_code"> </label>
                      <button type="button" id="addmaterial" class="btn btn-primary">Add Item</button>
                  <table id="users" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Total Cost</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        for($i=0;$i<count($items);$i++)
                      {
                          echo "<tr>";
                          echo "<td>".$items[$i]['Item_name']."</td>";
                          echo "<td>".$items[$i]['quantity']."</td>";
                          echo "<td>".$items[$i]['total_amount']."</td>";
                          echo "<td>".$items[$i]['total_amount']*$items[$i]['quantity']."</td>";
                          echo "<td><a  >Delete</td>";
                          echo "</tr>";
                        }

                      ?>

                      
                    </tbody>
                    
                  </table>
                   <div class="row">
                    <div class="col-xs-4">
                      <label for="item_code"> Total Material Cost :</label>
                      <input type="text" class="form-control" id="material_cost" value="<?php echo $itemcost; ?>" disabled="true"  >
                    </div>
                    
                  </div>
                  <!-- /.row end -->

                  
                  <!-- /.row end -->
                  <div class="row">
                    <div class="col-xs-4">
                      
                    </div>
                    <div class="col-xs-4">
                      <button type="button" id="sub_boq" class="btn btn-success">Submit BoQ</button>
                    </div>
                    <div class="col-xs-4">
                      
                    </div>
                    
                  </div>
                  <!-- /.row end -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Define Item</h4>
                      </div>
                      <div class="modal-body">
                          <div class="box box-primary">
                            
                            
                            <!-- form start -->
                           
                              <div class="box-body">
                                   <form>
                                      <div class="row">
                                         <div class="col-xs-12">
                                             <select id="item_code" class="form-control">
                                              <option value="0" selected="selected">Please Select the item</option>

                                              <?php
                                              for($i=0;$i<count($itemsForSelect);$i++)
                                              {
                                                $opt = $itemsForSelect[$i]['item_code'].'-'.$itemsForSelect[$i]['Item_name'];
                                            
                                                echo '<option value="'.$itemsForSelect[$i]['item_code'].'">'.$opt.'</option>';
                                              }

                                              ?>

                                             </select>
                                          </div>
                                          
                                      </div>
                                      <br>
                                      <div class="row">
                                          <div class="col-xs-12">
                                             <input type="text" class="form-control" id="quantity" placeholder="Quantity">
                                          </div>
                                          
                                      </div>
                                      <br>
                                      

                                      
                                     
                                  </form>
                                
                              </div><!-- /.box-body -->

                              
                           
                          </div><!-- /.box -->
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" id="add_mat" class="btn btn-primary">Add Material</button>
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
                  <p>Boq has successfully been added</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" id="ok_item" data-dismiss="modal">OK</button>
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
        var materialTable=$("#users").DataTable({"bSort": false,"paging":false,"searching":false,"info":false});//

        $('#addmaterial').on('click',function(){
          $("#myModal").modal('show');
        });



        $('#add_mat').on('click',function(){
        
          var item_code = $('#item_code').val();

          var quantity      = $('#quantity').val();

          var boq_code      = $('#boq_code').val();

         

          

          if(item_code=="" || quantity=="" )
          {

            alert("Please fill all the required fields");
          }
          else
          {
            var postdata = {
            
            item_code:item_code,
            quantity     : quantity,
            boq_code   : boq_code
            

           };

            $.post('controllers/add_item_boq.php',postdata,function(data){

              console.log(data);
               
              materialTable.row.add( [
                  
                 
                 data.result.Item_name,
                 data.result.quantity,
                 data.result.total_amount,
                 data.result.total_amount*data.result.quantity,
                 '<a href="" id="'+data.result.id+'">Delete</a>'
                 
              ] ).draw(false);
              

              $("#myModal").modal('hide');



             $('#material_cost').val(data.mat_cost) ;




            

            
           })
         
          
          }

          

        })

  
        $('#sub_boq').on('click',function(){

          var boq_code = $('#boq_code').val();
          

          

          
            
            var boqPostData = {
              boq_code:boq_code
             
            };

            console.log(boqPostData);

            $.post("controllers/submit_boq.php",boqPostData,function(data){

              console.log(data);
                
                 if(data.code==0)
                 {
                  alert(data.msg);
                 }
                 else
                 {
                  $("#myModal1").modal('show');
                 }

            })
          
        })

        $('#ok_item').on('click',function(){
          location.reload();
        })


      });
    </script>
  </body>
</html>
