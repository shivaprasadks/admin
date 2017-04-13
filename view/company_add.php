
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

      <!-- Custom CSS -->
    <link href="../css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 <meta http-equiv="refresh" content="1; url=../information.php" /> 

</head>

<body>

    <div id="wrapper">

        <?php include('header_view.php'); 
         include_once '../php/config.php';
         
         $db = new config();
         $conn = $db->dbcon();
         
         if($_POST['COMID'] != 0 ){

            $VID = $_POST['COMID'];
            $NAME = $_POST['NAME'];
            $EMAIL = $_POST['EMAIL'];
            $MOB = $_POST['MOB'];
            $ADDR = $_POST['ADDR'];
            
                 $guest_list[] = array();
                 $sql = "UPDATE `wpt_company` SET `NAME`= '$NAME',`EMAIL`='$EMAIL',`MOB`= '$MOB' ,`ADDR`= '$ADDR' WHERE `COMID` = $VID";
           
            $result = mysqli_query($conn, $sql); 
             

         } else {

            $NAME = $_POST['NAME'];
            $EMAIL = $_POST['EMAIL'];
            $MOB = $_POST['MOB'];
            $ADDR = $_POST['ADDR'];

            $sql = "INSERT INTO `wpt_company`(`COMID`, `NAME`, `EMAIL`, `MOB`, `IMAGE`, `ADDR`, `STATUS`) VALUES (NULL, '$NAME', '$EMAIL', '$MOB', 'path/image', '$ADDR', '1')";
           
            $result = mysqli_query($conn, $sql); 
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
                                <i class="fa fa-info"></i>  <a href="../information.php">Information</a>
                            </li>
                             <li class="active"> Company
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               
                
                <!-- /.row -->
                <div class="col-md-8">
                     <?php if($_POST['COMID'] != 0 ){ ?>
                    <!-- Contextual button for informational alert messages -->
                    <button type="button" class="btn btn-default ribbon">Successfully Updated Company Details</button>
                    <?php } else { ?>
                           <button type="button" class="btn btn-default ribbon">Successfully Added Company Details</button>
                    <?php  } ?>
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
