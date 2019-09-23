<?php

require_once '../classes/dabclass.php';

if (isset($_POST)){
    if($_POST["but"]=="Save"){
    $dab=new dabclass();
        if($_POST["pid"]>0){
    $dab->editplan($_POST);
    }else{
     $dab->newplan($_POST);    
    }    
        header("Location:listplan.php"); 
}

}
header("Location:listplan.php");