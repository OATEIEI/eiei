<?php
    $con = mysqli_connect("localhost","root","","eiei");

    if(!$con){
     die ("Can't Connect :" . mysqli_connect_error());
    }
?>