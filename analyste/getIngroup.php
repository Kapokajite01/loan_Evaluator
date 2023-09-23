<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["group_id"])) {
    $queryingroup = "SELECT * FROM actors_in_groups WHERE actors_group_id = '" . $_POST["group_id"] . "' order by actors_in_group_name ";
    $resultsingroup = $db_handle->runQuery($queryingroup);
    ?>
<option value disabled selected>Select  Actor</option>
<?php
    foreach ($resultsingroup as $ingroups) {
        ?>
<option value="<?php echo $ingroups["actors_ingrou_id"]; ?>"><?php echo $ingroups["actors_in_group_name"]; ?></option>
<?php
    }
}
?>