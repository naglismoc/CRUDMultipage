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
            <label for="f1">title</label>
            <input type="text" name="title" id="f1" value="<?=($old)? $_SESSION['POST']['title'] : $hive->title?>" class="form-control"">
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

        <select class="form-select" name="hiveModel">
        <option value="">visi</option>

            <?php foreach ($hiveModels as $key => $hm) {?>
                <option <?= ($hive->modelId == $hm->id)  ? "selected" : "" ?> value="<?=$hm->id?>"><?=$hm->model?></option>
            <?php } ?>
            
        </select>
        <button type="submit" name="update" class="btn btn-success mt-3 mb-3">Išsaugoti</button>

</form>
</div>
</body>
</html>

<?php
    $_SESSION['POST'] = [];
?>