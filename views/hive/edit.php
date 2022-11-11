<?php 
include "../components/head.php"; 
include $_INNER_PATH ."/routes.php"; 
$old = false;
if(isset($_SESSION['POST'])){
    if(count($_SESSION['POST']) != 0){
        $old = true;
    }
}
?>
<body>
<div class="container">
    <?php include $_INNER_PATH."./views/components/navigation.php";  ?>


    <form action="" method="post" class="">

        <div class="form-group">
            <label for="f1">Modelis</label>
            <input type="text" name="model" id="f1" value="<?=($old)? $_SESSION['POST']['model'] : $hive->model?>" class="form-control"">
        </div>
        <div class="form-group">
            <label for="f2">bee count</label>
            <input type="number"  name="beeCount" id="f2" value="<?=($old)? $_SESSION['POST']['beeCount'] : $hive->beeCount?>" class="form-control" ">
        </div>
        <div class="form-group">
            <label for="f3">year</label>
            <input type="number" name="year" id="f3" value="<?=($old)? $_SESSION['POST']['year'] : $hive->year?>" class="form-control" ">
        </div>
        <input type="hidden" name="id" value="<?=$hive->id?>" >
        <button type="submit" name="update" class="btn btn-success mt-3 mb-3">Išsaugoti</button>

</form>
</div>
</body>
</html>

<?php
    $_SESSION['POST'] = [];
?>