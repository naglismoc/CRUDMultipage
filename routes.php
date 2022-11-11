<?php include $_INNER_PATH."/controllers/HiveController.php"; 

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



?>