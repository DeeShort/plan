<?php
include_once '../classes/dabclass.php';

$dab=new dabclass();

if(isset($_POST)){
    if ($_POST["but"]=="Edit"){
        header("Location:editplan.php?ID=".$_POST["planid"]);
//        print_r($_POST);
//        die();
    }else{
        $dab->deleteplan($_POST["planid"]);
        header("Location:listplan.php");
    }
}