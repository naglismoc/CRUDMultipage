<?php
include $_INNER_PATH."/models/HiveModel.php";



class HiveModelController{

    public static function index()
    {
        $hiveModels = HiveModel::all();
        return $hiveModels;
    }

    public static function store()
    {   
        // if(Validator::validate()){
        //     header("Location: "."http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipage"."/views/model/add.php");
        //     die;
        // }
        HiveModel::create();
    }

    public static function show($id)
    {
        $hiveModel = HiveModel::find($id);
        return $hiveModel;
    }

    public static function update()
    {
        // if(Validator::validate()){
        //     header("Location: "."http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipage"."/views/model/edit.php?edit=&id=".$_GET['id']);
        //     die;
        // }

       $hiveModel = new HiveModel();
       $hiveModel->id = $_POST['id'];
       $hiveModel->model = $_POST['model'];
       $hiveModel->update();
    }

    public static function destroy()
    {
        HiveModel::destroy($_POST['id']);
    }










}
?>