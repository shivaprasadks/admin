
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
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php include('header.php'); ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
               <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Email
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-rss"> </i>  <a href="#">SMS &amp; Email</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-envelope"></i> Email
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               
                
                <!-- /.row -->
                 <div class="row">
                  
                  
<div class="col-md-8 ">
                        <form role="form">

                           <div class="form-group">
                                
                                <label class="checkbox-inline">
                                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="All" checked>All
                                </label>
                                <label class="checkbox-inline">
                                     <input type="radio" name="optionsRadios" id="optionsRadios1" value="Executives" >Executives
                                </label>
                                <label class="checkbox-inline">
                                     <input type="radio" name="optionsRadios" id="optionsRadios1" value="Customers" >Customers
                                </label>
                                <label class="checkbox-inline">
                                     <input type="radio" name="optionsRadios" id="optionsRadios1" value="Volenteers" >Volenteers
                                </label>
                            </div>
                            <div class="col-md-8 col-md-offset-7">
                               <button type="submit" class="btn btn-default"  id="allMail"><i class="fa fa-paper-plane" aria-hidden="true"></i> <a href="mailto:name@email.com" > Send All</a></button> 
                                 <button type="submit" class="btn btn-default" id="executiveMail"><i class="fa fa-paper-plane" aria-hidden="true"></i> <a href="" > Send To Executives</a></button>
                                 <button type="submit" class="btn btn-default" id="customerMail"><i class="fa fa-paper-plane" aria-hidden="true"></i> <a href="" > Send To Customers</a></button>
                                <button type="submit" class="btn btn-default" id="volenteerMail"><i class="fa fa-paper-plane" aria-hidden="true"></i> <a href="" > Send To Volenteers</a></button>
                            </div>
                            
                           
                            
                        
                           

                        </form>
                </div></div>
               

          

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript">
            $("#allMail").show();
             $("#executiveMail").hide();
             $("#customerMail").hide();
             $("#volenteerMail").hide();
         $('input:radio[name="optionsRadios"]').change(
            function() {
         if ($(this).is(':checked') && $(this).val() == 'All') {
             // append goes here 
             
             $("#allMail").show();
             $("#executiveMail").hide();
             $("#customerMail").hide();
             $("#volenteerMail").hide();

         } else if ($(this).is(':checked') && $(this).val() == 'Executives') {
           
             $("#allMail").hide();
             $("#executiveMail").show();
             $("#customerMail").hide();
             $("#volenteerMail").hide();

         } else if ($(this).is(':checked') && $(this).val() == 'Customers') {
            
             $("#allMail").hide();
             $("#executiveMail").hide();
             $("#customerMail").show();
             $("#volenteerMail").hide();

         } else if ($(this).is(':checked') && $(this).val() == 'Volenteers') {
           
              
            $("#allMail").hide();
             $("#executiveMail").hide();
             $("#customerMail").hide();
             $("#volenteerMail").show();

         }
     });
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
