<?php 
    require_once 'db/conn.php';
    if(!$_GET['id']){
        //echo 'error';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }else{
        $id = $_GET['id'];
        $result = $crud ->deleteattendance($id);

        if($result)
        {
            header("Location: viewrecords.php");
        }
        else{
            echo '';
            //include 'includes/errormessage.php';
        }
    }

?>