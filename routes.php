<?php 
include $_INNER_PATH."/controllers/HiveController.php"; 
include $_INNER_PATH."/controllers/HiveModelController.php"; 


if(strpos($_SERVER['REQUEST_URI'], "/hive/") !== false){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(isset($_POST['save'])){
            HiveController::store();
        header("Location: ".$_OUTER_PATH."/views/hive/index.php");
        die;
        }
            
        if(isset($_POST['update'])){
            HiveController::update();        
            header("Location: ".$_OUTER_PATH."/views/hive/index.php");
            die;
        }
        
        if(isset($_POST['destroy'])){
            HiveController::destroy();
            header("Location: ".$_OUTER_PATH."/views/hive/index.php");
            die;
        }    

    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(count($_GET) == 0){
            $hives = HiveController::index();
        }
        if(isset($_GET['show']) ){
            $hive = HiveController::show($_GET['id']);
        }
        
        if(isset($_GET['edit'])){
            $hive = HiveController::show($_GET['id']);
        }  
    }

    $hiveModels = HiveModelController::index();
}



if(strpos($_SERVER['REQUEST_URI'], "/model/") !== false){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(isset($_POST['save'])){
            HiveModelController::store();
        header("Location: ".$_OUTER_PATH."/views/model/index.php");
        die;
        }
            
        if(isset($_POST['update'])){
            HiveModelController::update();        
            header("Location: ".$_OUTER_PATH."/views/model/index.php");
            die;
        }
        
        if(isset($_POST['destroy'])){
            HiveModelController::destroy();
            header("Location: ".$_OUTER_PATH."/views/model/index.php");
            die;
        }    

    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(count($_GET) == 0){
            $hiveModels = HiveModelController::index();
        }
        if(isset($_GET['show']) ){
            $hiveModel = HiveModelController::show($_GET['id']);
        }
        
        if(isset($_GET['edit'])){
            $hiveModel = HiveModelController::show($_GET['id']);
        }  
    }

    // $hiveModels = HiveModelController::index();
}
?>