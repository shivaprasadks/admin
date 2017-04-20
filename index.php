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
             $exe_list[] = array();
            $sql = "SELECT * FROM guest_table WHERE 1";
       
        $result = mysqli_query($conn, $sql); 
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                   $guest_list[] = $row;
            }
        }

        $query_exe =  "SELECT * FROM wpt_sales_executive WHERE 1";
         $result = mysqli_query($conn, $query_exe); 
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                   $exe_list[] = $row;
            }
        }
       // print_r($guest_list[1]['GID']);
        $conn->close();
         ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-center">
                                        <div class="huge"><?php echo sizeof($guest_list); ?></div>
                                        <div>New Customers!</div>
                                    </div>
                                </div>
                            </div>
                          <!--  <a href="order.php#custID">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a> -->
                        </div>
                    </div>
                  <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-center">
                                        <div class="huge"><?php echo sizeof($exe_list); ?></div>
                                        <div>No of Executives!</div>
                                    </div>
                                </div>
                            </div>
                          <!--  <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a> -->
                        </div>
                    </div>
                    <!--
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="order.php#orderID">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    
                </div>
                <!-- /.row -->

                

                <div class="row">
                    
                
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel                                    
                                 <button style="margin-left: 40%;" class="btn btn-default fa fa-plus-circle" onclick="guestEdit()" value="add">  ADD</button>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Guest ID#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Number</th>                                                
                                                <th>Message</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for ($i = 1 ; $i < sizeof($guest_list); $i ++){ ?>
                                             <tr>
                                                <td><?php echo $guest_list[$i]['GID'] ?></td>
                                                <td><?php echo $guest_list[$i]['NAME'] ?></td>
                                                <td><?php echo $guest_list[$i]['EMAIL'] ?></td>
                                                <td><?php echo $guest_list[$i]['MOB'] ?></td>
                                                <td><?php echo $guest_list[$i]['MESSAGE'] ?></td>
                                                <td>
                                                    <button type="button" class="btn  btn-success fa fa-edit"
                                                             onclick="guestEdit(<?php echo $guest_list[$i]['GID'] ?>)">
                                                    </button>
                                                    <button type="button" class="btn  btn-primary fa fa-eye" 
                                                            onclick="guestView(<?php echo $guest_list[$i]['GID'] ?>)">
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="order.php#orderID">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
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
                                <h3 class="panel-title"><i class="fa fa-info-circle" aria-hidden="true"></i> Executive List
                                 <button style="margin-left: 40%;" class="btn btn-default fa fa-plus-circle" onclick="executiveEdit()" value="add">  ADD</button>
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
                                                <th>Address</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for ($i = 1 ; $i < sizeof($exe_list); $i ++){ ?>
                                             <tr>
                                                <td><?php echo $exe_list[$i]['SEID'] ?></td>
                                                <td><?php echo $exe_list[$i]['NAME'] ?></td>
                                                <td><?php echo $exe_list[$i]['EMAIL'] ?></td>
                                                <td><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $exe_list[$i]['MOB'] ?></td>
                                                <td><?php echo $exe_list[$i]['COMPANY'] ?></td>
                                                <td><?php echo $exe_list[$i]['ADDR']."<br>".$exe_list[$i]['CITY']."<br>".$exe_list[$i]['STATE'] ?></td>
                                                <td>
                                                    <button type="button" class="btn  btn-success fa fa-edit"
                                                             onclick="executiveEdit(<?php echo $exe_list[$i]['SEID'] ?>)">
                                                    </button>
                                                    <button type="button" class="btn  btn-primary fa fa-eye" 
                                                            onclick="executiveView(<?php echo $exe_list[$i]['SEID'] ?>)">
                                                    </button>
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
        function guestEdit($vid){

           console.log($vid); 
           window.open("view/guest_edit.php?vid="+$vid,"_self")
          
        }
        function guestView($vid){
           console.log($vid); 
            window.open("view/guest_view.php?vid="+$vid,"_self")
        }

        function executiveEdit($vid){

           console.log($vid); 
           window.open("view/executive_edit.php?vid="+$vid,"_self")
          
        }
        function executiveView($vid){
           console.log($vid); 
            window.open("view/executive_view.php?vid="+$vid,"_self")
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
