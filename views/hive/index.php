<?php 
include "../components/head.php"; 
include $_INNER_PATH ."/routes.php"; 

?>
<body>
    <?php include $_INNER_PATH."./views/components/navigation.php";  ?>

    <table class="table border-top">
            <thead>
                <tr>
                    <th>id</th>
                    <th>model</th>
                    <th>beeCount</th>
                    <th>year</th>
                    <th>show</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hives as $hive) { ?>
                <tr>
                        <td> <?=$hive->id?> </td>
                        <td> <?=$hive->model?> </td>
                        <td> <?=$hive->beeCount?> </td>
                        <td> <?=$hive->year?> </td>

                        <td>
                            <form action="<?=$_OUTER_PATH.'/views/hive/show.php'?>" method="get">
                                <input type="hidden" name="id" value=" <?=$hive->id?>">
                                <button type="submit" name="show" class="btn btn-primary">show</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?=$_OUTER_PATH.'/views/hive/edit.php'?>" method="post">
                                <input type="hidden" name="id" value=" <?=$hive->id?>">
                                <button type="submit" name="edit" class="btn btn-success">edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value=" <?=$hive->id?>">
                                <button type="submit" name="destroy" class="btn btn-danger">delete</button>
                            </form>
                        </td>

                </tr>
                <?php  } ?>
            </tbody>
        </table>
</body>
</html>