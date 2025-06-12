<?php 
// Database  Details  
$hostname = "localhost";
$username = "u908417695_bhumikaanmo";
$password = "Bhumikaanmo123#";
$database ="u908417695_bhumikaanmo";

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

?>