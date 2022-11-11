<?php
include $_INNER_PATH."/models/Hive.php";


class HiveController{

    public static function index()
    {
        $hives = Hive::all();
        return $hives;
    }

    public static function store()
    {        
        Hive::create();
    }

    public static function show($id)
    {
        $hive = Hive::find($id);
        return $hive;
    }

    public static function update()
    {
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