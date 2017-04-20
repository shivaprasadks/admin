
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
            $vid = $_GET['vid'];
             $db = new config();
             $conn = $db->dbcon();
             $guest_list[] = array();
            $sql = "SELECT * FROM wpt_sales_executive WHERE SEID = $vid";
       
        $result = mysqli_query($conn, $sql); 
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                   $guest_list[] = $row;
            }
        } else {
            
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
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                           
                             <li class="active"> Executive
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
                                <h3 class="panel-title">

                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Executive Details #<?php echo $guest_list[1]['SEID'] ?> 
                                    <button style="float: right;" type="button" class="btn small btn-success fa fa-edit" onclick="executiveEdit(<?php echo $guest_list[1]['SEID'] ?>)"></button>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <h4>Name: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['NAME'] ?> </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <h4>Email: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['EMAIL'] ?> 
                                        <a href="mailto:<?php echo $guest_list[1]['EMAIL'] ?>?Subject=WePlanTree%20Mail&body=Hello%20<?php echo $guest_list[1]['NAME'] ?>", target="_top">Send Mail</a></h4>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <h4>Contact: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['MOB'] ?> </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <h4>Company: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['COMPANY'] ?> </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <h4>Address: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['ADDR'] ?> </h4>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-1">
                                        <h4>City: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['CITY'] ?> </h4>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-1">
                                        <h4>State: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['STATE'] ?> </h4>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-1">
                                        <h4>Country: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['COUNTRY'] ?> </h4>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-1">
                                        <h4>Pincode: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['PINCODE'] ?> </h4>
                                    </div>
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
        function executiveEdit($vid){

           console.log($vid); 
           window.open("executive_edit.php?vid="+$vid,"_self")
          
        }

        function myEmail($emailVar){
           // window.open("mailto:someone@example.com,someone@example.com?Subject=Hello%20again","_top");
             location.href  = "mailto:someone@example.com,someone@example.com?Subject=Hello%20again";
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
