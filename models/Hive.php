<?php
include $_INNER_PATH."/models/DB.php";
class Hive {


    public $id;
    public $title;
    public $beeCount;
    public $year;
    public $model;
    public $modelId;

    public function __construct($id = null, $title = null, $beeCount = null, $year = null,$model = null,$modelId = null)
    {
      $this->id = $id;
      $this->title = $title;
      $this->beeCount = $beeCount;
      $this->year = $year;
      $this->model = $model;
      $this->modelId = $modelId;
    }


    public static function all(){
        $hives = [];
        $db = new DB();
        $query = "SELECT `h`.`id`, `h`.`title`, `h`.`bee_count`, `h`.`year`, `h`.`hive_model_id`, `hm`.`model` FROM `hives` `h` join `hive_models` `hm` on `hm`.`id` = `h`.`hive_model_id`";
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $hives[] = new hive( $row['id'], $row['title'], $row['bee_count'], $row['year'], $row['model'], $row['hive_model_id']);
        }
        $db->conn->close();
        return $hives;
    }

    public static function create()
    {
       $db = new DB();
       $stmt = $db->conn->prepare("INSERT INTO `hives`( `title`, `bee_count`, `year`, `hive_model_id`) VALUES (?,?,?,?)");
       $stmt->bind_param("siii", $_POST['title'], $_POST['beeCount'], $_POST['year'], $_POST['hiveModel']);
       if(!$stmt->execute()) {
        print_r( $stmt->error_list);
       }

       $stmt->close();
       $db->conn->close();
    }

    public static function find($id)
    {
        $hive = new Hive();
        $db = new DB();
        $query = "SELECT `h`.`id`, `h`.`title`, `h`.`bee_count`, `h`.`year`, `h`.`hive_model_id`, `hm`.`model` 
            FROM `hives` `h` 
            join `hive_models` `hm` 
            on `hm`.`id` = `h`.`hive_model_id` 
            where `h`.`id`=". $id;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $hive = new hive( $row['id'], $row['title'], $row['bee_count'], $row['year'],$row['model'],$row['hive_model_id']);

        }
        $db->conn->close();
        return $hive;
    }

    public function update()
    {       
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `hives` SET `title`= ? ,`bee_count`= ? ,`year`= ?,`hive_model_id`= ? WHERE `id` = ?");
        $stmt->bind_param("siiii", $this->title, $this->beeCount, $this->year, $this->modelId, $this->id);
        if(!$stmt->execute()) {
            print_r( $stmt->error_list);
           }
 
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `hives` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close(); 
    }
}
?>