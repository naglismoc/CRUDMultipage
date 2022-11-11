<?php
include $_INNER_PATH."/models/DB.php";
class Hive {


    public $id;
    public $model;
    public $beeCount;
    public $year;

    public function __construct($id = null, $model = null, $beeCount = null, $year = null)
    {
      $this->id = $id;
      $this->model = $model;
      $this->beeCount = $beeCount;
      $this->year = $year;
    }


    public static function all(){
        $hives = [];
        $db = new DB();
        $query = "SELECT * FROM `hives`";
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $hives[] = new hive( $row['id'], $row['model'], $row['bee_count'], $row['year']);
        }
        $db->conn->close();
        return $hives;
    }

    public static function create()
    {
       $db = new DB();
       $stmt = $db->conn->prepare("INSERT INTO `hives`( `model`, `bee_count`, `year`) VALUES (?,?,?)");
       $stmt->bind_param("sii", $_POST['model'], $_POST['beeCount'], $_POST['year']);
       $stmt->execute();

       $stmt->close();
       $db->conn->close();
    }

    public static function find($id)
    {
        $hive = new Hive();
        $db = new DB();
        $query = "SELECT * FROM `hives` where `id`=". $id;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $hive = new hive( $row['id'], $row['model'], $row['bee_count'], $row['year']);

        }
        $db->conn->close();
        return $hive;
    }

    public function update()
    {       
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `hives` SET `model`= ? ,`bee_count`= ? ,`year`= ? WHERE `id` = ?");
        $stmt->bind_param("siii", $this->model, $this->beeCount, $this->year, $this->id);
        $stmt->execute();
 
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