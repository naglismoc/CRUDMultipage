<?php
include $_INNER_PATH."/models/Hive.php";
include $_INNER_PATH."/helperClasses/Validator.php";


class HiveController{

    public static function index()
    {
        $hives = Hive::all();
        return $hives;
    }

    public static function store()
    {   
        if(Validator::validate()){
            header("Location: "."http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipage"."/views/hive/add.php");
            die;
        }
        Hive::create();
    }

    public static function show($id)
    {
        $hive = Hive::find($id);
        return $hive;
    }

    public static function update()
    {
        if(Validator::validate()){
            header("Location: "."http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipage"."/views/hive/edit.php?edit=&id=".$_GET['id']);
            die;
        }

       $hive = new Hive();
       $hive->id = $_POST['id'];
       $hive->model = $_POST['model'];
       $hive->beeCount = $_POST['beeCount'];
       $hive->year = $_POST['year'];
       $hive->update();
    }

    public static function destroy()
    {
        Hive::destroy($_POST['id']);
    }










}
?>