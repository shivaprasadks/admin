<?php
class config
{
    public function dbcon()
    {
       /* $servername = "localhost";
        $username   = "dev";
        $password   = "password";
        $dbname     = "proj_home"; */

         $servername = "166.62.10.50";
        $username   = "shivpi_dev";
        $password   = "password";
        $dbname     = "weplantree"; 
        
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
        
    }
}