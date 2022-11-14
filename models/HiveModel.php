<?php

class HiveModel {


    public $id;
    public $model;
    public $hives;

    public function __construct($id = null, $model = null, $hives = null)
    {
      $this->id = $id;
      $this->model = $model;
      $this->hives = $hives;
    }


    public static function all(){
        $hiveModels = [];
        $db = new DB();
        $query = 'SELECT `hm`.`id`, `hm`.`model`, count(*) as "hives"
        FROM
            `hives` `h`
        JOIN `hive_models` `hm` ON
            `hm`.`id` = `h`.`hive_model_id`
            GROUP BY `hm`.`id`
        ';
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $hiveModels[] = new HiveModel( $row['id'], $row['model'], $row['hives']);
        }
        $db->conn->close();
        return $hiveModels;
    }

    public static function create()
    {
       $db = new DB();
       $stmt = $db->conn->prepare("INSERT INTO `hive_models`( `model`) VALUES (?)");
       $stmt->bind_param("s", $_POST['model']);
       if(!$stmt->execute()) {
        echo $stmt->error;
       }

       $stmt->close();
       $db->conn->close();
    }

    public static function find($id)
    {
        $hiveModel = new HiveModel();
        $db = new DB();
        $query = 'SELECT `hm`.`id`, `hm`.`model`, count(*) as "hives"
        FROM
            `hives` `h`
        JOIN `hive_models` `hm` ON
            `hm`.`id` = `h`.`hive_model_id`
            where `hm`.`id` = '.$id.'
            GROUP BY `hm`.`id`';
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $hiveModel = new hiveModel( $row['id'], $row['model'], $row['hives']);
        }
        $db->conn->close();
        return $hiveModel;
    }

    public function update()
    {       
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `hive_models` SET `model`= ?  WHERE `id` = ?");
        $stmt->bind_param("si", $this->model, $this->id);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `hive_models` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close(); 
    }
}
?>