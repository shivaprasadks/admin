
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
            $sql = "SELECT * FROM wpt_company WHERE COMID = $vid";
       
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
                            <li >
                                <i class="fa fa-info"></i>  <a href="../information.php">Information</a>
                            </li>
                             <li class="active"> Company
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

                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Vendors Details #<?php echo $guest_list[1]['COMID'] ?> 
                                    <button style="float: right;" type="button" class="btn small btn-success fa fa-edit" onclick="vendorEdit(<?php echo $guest_list[1]['COMID'] ?>)"></button>
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
                                     <div class="col-md-3">
                                        <h4> <?php echo $guest_list[1]['EMAIL'] ?> 
                                         <button type="button" class="btn small btn-primary fa fa-paper-plane" onclick="sendMyMail('<?php echo $guest_list[1]['EMAIL'] ?>','<?php echo $guest_list[1]['NAME'] ?>')"></button></h4>
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
                                        <h4>Address: </h4>
                                    </div>
                                     <div class="col-md-4">
                                        <h4> <?php echo $guest_list[1]['ADDR'] ?> </h4>
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
        function vendorEdit($vid){

           console.log($vid); 
           window.open("company_edit.php?vid="+$vid,"_self")
          
        }
        function vendorView($vid){
           console.log($vid); 
            window.open("company_view.php?vid="+$vid,"_self")
        }
         function sendMyMail($mymailId,$name){
            //console.log("click");
             window.open("mailto:"+$mymailId+"?Subject=Hello%20"+$name,"_top")
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
