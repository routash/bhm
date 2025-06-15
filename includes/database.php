<?php 
// Database  Details  
$hostname = "localhost";
$username = "root";
$password = "root";
$database ="dth";

$ahk_conn = mysqli_connect($hostname,$username,$password,$database);

if(!$ahk_conn){
    include('links.php');
   ?>
   <script>
    $(function(){
        Swal.fire(
            'Opps',
            'Dadatabase Connection Failed',
            'error'
        )
    })
   </script>
   <?php
}