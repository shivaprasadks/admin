<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Weplantree Admin</title>
      <!-- Bootstrap Core CSS -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="../css/sb-admin.css" rel="stylesheet">
      <!-- Morris Charts CSS -->
      <link href="../css/plugins/morris.css" rel="stylesheet">
      <!-- Custom Fonts -->
      <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div id="wrapper">
         <?php include('header_view.php'); 
            include_once '../php/config.php';
             $add; 
             $db = new config();
                $conn = $db->dbcon();
            if($_GET['cid'] != 0){
               $add = 0;
               $cid = $_GET['cid'];
               
                $guest_list[] = array();
               $sql = "SELECT * FROM wpt_customer WHERE CID = $cid";
            
               $result = mysqli_query($conn, $sql); 
                   if($result->num_rows > 0){
                   while($row = $result->fetch_assoc()) {
                          $guest_list[] = $row;
                   }
               } 
            } else {
                $add = 1;
            }
            
            $conn->close();
            ?>
         <div id="page-wrapper">
            <div class="container-fluid">
               <!-- Page Heading -->
               <div class="row">
                  <div class="col-lg-12">
                     <h1 class="page-header">
                        Information
                     </h1>
                     <ol class="breadcrumb">
                        <li>
                           <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li >
                           <i class="fa fa-bar-chart-o"></i>  <a href="../order.php">Order</a>
                        </li>
                        <li class="active"> Customer
                        </li>
                     </ol>
                  </div>
               </div>
               <!-- /.row -->
               <!-- /.row -->
               <?php if($add == 0){ ?>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        <form action="customer_add.php" method="POST">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                                 <i class="fa fa-info-circle" aria-hidden="true"></i> Customer Order Details #<?php echo $guest_list[1]['CID'] ?> 
                              </h3>
                           </div>
                           <div class="panel-body">
                              <div class="row">
                                 <div class="col-md-1">
                                    <h5>Name: </h5>
                                 </div>
                                 <div class="col-md-4">
                                    <input type="text" name="NAME" value="<?php echo $guest_list[1]['NAME'] ?>" required>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-1">
                                    <h4>Email: </h4>
                                 </div>
                                 <div class="col-md-3">
                                    <input type="text" name="EMAIL" value="<?php echo $guest_list[1]['EMAIL'] ?>" required>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-1">
                                    <h4>Contact: </h4>
                                 </div>
                                 <div class="col-md-4">
                                    <input type="text" name="MOB" value="<?php echo $guest_list[1]['MOB'] ?>" required>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-1">
                                    <h4>Company: </h4>
                                 </div>
                                 <div class="col-md-4">
                                    <input rows="4" cols="50" type="text" name="COMPANY" value="<?php echo $guest_list[1]['COMPANY'] ?>" required >
                                 </div>
                                 <input type="hidden" name="CID" value="<?php echo $guest_list[1]['CID'] ?>" required >
                              </div>
                              <div class="row">
                                 <div class="col-md-1">
                                    <h4>Saplings: </h4>
                                 </div>
                                 <div class="col-md-4">
                                    <input type="text" name="SNO" value="<?php echo $guest_list[1]['SNO'] ?>" required>                                       
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-1">
                                    <h4>Price: </h4>
                                 </div>
                                 <div class="col-md-4">
                                    <input type="text" name="PRICE" value="<?php echo $guest_list[1]['PRICE'] ?>" required>                                       
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-1">
                                    <h4>Status: </h4>
                                 </div>
                                 <div class="col-md-4">
                                   
                                    <select name="STATUS">
                                    <?php if ($guest_list[1]['STATUS'] == 0) {
                                         ?>  <option selected="selected" value="0">Incomplete</option>
                                             <option value="1">Processesing</option>
                                             <option value="2">Complete</option> <?php
                                     } else if($guest_list[1]['STATUS'] == 1){
                                           ?>  <option value="0">Incomplete</option>
                                             <option selected="selected" value="1">Processesing</option>
                                             <option value="2">Complete</option> <?php
                                     } else if($guest_list[1]['STATUS'] == 2){
                                          ?> <option  value="0">Incomplete</option>
                                             <option value="1">Processesing</option>
                                             <option selected="selected" value="2">Complete</option> <?php
                                     } ?>
                                       
                                    </select>
                                 </div>
                                 <div class="col-md-1 col-md-offset-8">
                                    <button type="submit" class="btn  btn-primary fa fa-floppy-o"> Save</button>
                                 </div>
                              </div>
                           </div>
                     </div>
                     </form>
                  </div>
               </div>
            </div>
            <?php } else { ?>
            <div class="row">
               <div class="col-lg-12">
                  <div class="panel panel-default">
                     <form action="customer_add.php" method="POST">
                        <div class="panel-heading">
                           <h3 class="panel-title">
                              <i class="fa fa-info-circle" aria-hidden="true"></i> Add Customer Order Details 
                           </h3>
                        </div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-1">
                                 <h4>Name: </h4>
                              </div>
                              <div class="col-md-4">
                                 <input type="text" name="NAME" value="" placeholder="Name" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-1">
                                 <h4>Email: </h4>
                              </div>
                              <div class="col-md-3">
                                 <input type="email" name="EMAIL" value="" placeholder="Email" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-1">
                                 <h4>Contact: </h4>
                              </div>
                              <div class="col-md-4">
                                 <input type="text" name="MOB" value="" placeholder="Contact" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-1">
                                 <h4>Company: </h4>
                              </div>
                              <div class="col-md-4">
                                 <input type="text" name="COMPANY" value="" placeholder="Company" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-1">
                                 <h4>Sapling: </h4>
                              </div>
                              <div class="col-md-4">
                                 <input type="text" name="SNO" value="" placeholder="Number of Saplings" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-1">
                                 <h4>Price: </h4>
                              </div>
                              <div class="col-md-4">
                                 <input type="text" name="PRICE" value="" placeholder="Price" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-1">
                                 <h4>Status: </h4>
                              </div>
                              <div class="col-md-4">
                                  <select name="STATUS">
                                             <option  selected="selected" value="0">Incomplete</option>
                                             <option value="1">Processesing</option>
                                             <option  value="2">Complete</option>
                                  </select>
                              </div>
                           </div>
                           <div class="row">
                              
                              <input type="hidden" name="CID" value="0" required >
                           </div>
                           <div class="col-md-1 col-md-offset-8">
                              <button type="submit" class="btn  btn-primary fa fa-plus-o"> Add</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
         <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <script type="text/javascript">
         function vendorEdit($vid){
             
            console.log($vid); 
         }
         function vendorView($vid){
            console.log($vid); 
         }
         
      </script>
      <!-- jQuery -->
      <script src="js/jquery.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Morris Charts JavaScript -->
      <script src="js/plugins/morris/raphael.min.js"></script>
      <script src="js/plugins/morris/morris.min.js"></script>
      <script src="js/plugins/morris/morris-data.js"></script>
   </body>
</html>