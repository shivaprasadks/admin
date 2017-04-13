
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php include('header.php'); 
         include_once 'php/config.php';
             $db = new config();
             $conn = $db->dbcon();
             $guest_list[] = array();
             $company_list[] = array();
            $sql = "SELECT * FROM wpt_customer WHERE 1";
       
        $result = mysqli_query($conn, $sql); 
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                   $guest_list[] = $row;
            }
        } else {
            
        }

        $company_query = "SELECT * FROM wpt_company WHERE 1";
        $result = mysqli_query($conn, $company_query); 
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                   $company_list[] = $row;
            }
        }
       
        $conn->close();
        ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
               <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Order
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Order
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               
                
                <!-- /.row -->
                 <div class="row">
                  
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-info-circle" aria-hidden="true"></i> Customer Order List
                                 <button style="margin-left: 40%;" class="btn btn-default fa fa-plus-circle" onclick="customerEdit()" value="add">  ADD</button>
                                 </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Number</th>
                                                <th>Company</th>
                                                <th>Saplings</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for ($i = 1 ; $i < sizeof($guest_list); $i ++){ ?>
                                             <tr>
                                                <td><?php echo $guest_list[$i]['CID'] ?></td>
                                                <td><?php echo $guest_list[$i]['NAME'] ?></td>
                                                <td><?php echo $guest_list[$i]['EMAIL'] ?></td>
                                                <td><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $guest_list[$i]['MOB'] ?></td>
                                                <td><?php echo $guest_list[$i]['COMPANY'] ?></td>
                                                <td><?php echo $guest_list[$i]['SNO'] ?></td>
                                                <td><?php echo $guest_list[$i]['PRICE'] ?></td>
                                                <td><?php if ($guest_list[$i]['STATUS'] == 0) {
                                                        echo "Incomplete"; 
                                                    } else if($guest_list[$i]['STATUS'] == 1){
                                                         echo "Processing"; 
                                                    } else if($guest_list[$i]['STATUS'] == 2){
                                                         echo "Completed"; 
                                                    } ?>

                                                    </td>
                                                <td>
                                                    <button type="button" class="btn  btn-success fa fa-edit" onclick="customerEdit(<?php echo $guest_list[$i]['CID'] ?>)"></button>
                                                    <button type="button" class="btn  btn-primary fa fa-eye" onclick="customerView(<?php echo $guest_list[$i]['CID'] ?>)"></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                           
                                            
                                        </tbody>
                                    </table>
                                   
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
               
                <!-- /.row -->
                 <div class="row">
                  
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-info-circle" aria-hidden="true"></i> Company List 
                                    <button style="margin-left: 40%;" class="btn btn-default fa fa-plus-circle" onclick="companyEdit()" value="add">  ADD</button>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Number</th>
                                                <th>Address</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for ($i = 1 ; $i < sizeof($company_list); $i ++){ ?>
                                             <tr>
                                                <td><?php echo $company_list[$i]['COMID'] ?></td>
                                                <td><?php echo $company_list[$i]['NAME'] ?></td>
                                                <td><?php echo $company_list[$i]['EMAIL'] ?></td>
                                                <td><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $company_list[$i]['MOB'] ?></td>
                                                <td><?php echo $company_list[$i]['ADDR'] ?></td>
                                                <td>
                                                    <button type="button" class="btn  btn-success fa fa-edit" onclick="companyEdit(<?php echo $company_list[$i]['COMID'] ?>)"></button>
                                                    <button type="button" class="btn  btn-primary fa fa-eye" onclick="companyView(<?php echo $company_list[$i]['COMID'] ?>)"></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                           
                                            
                                        </tbody>
                                    </table>
                                   
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript">
        function customerEdit($cid){


            window.open("view/customer_edit.php?cid="+$cid,"_self")
          
        }
        function customerView($cid){
          
            window.open("view/customer_view.php?cid="+$cid,"_self")
        }
         function companyEdit($vid){


            window.open("view/company_edit.php?vid="+$vid,"_self")
          
        }
        
        function companyView($vid){
          
            window.open("view/company_view.php?vid="+$vid,"_self")
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
