<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["enemygroups"])) {
    $queryaa = "SELECT * FROM actors_in_groups WHERE actors_group_id = '" . $_POST["enemygroups"] . "'";
    $resultsaa = $db_handle->runQuery($queryaa);
    ?>
<option value disabled selected>Select District</option>
<?php
    foreach ($resultsaa as $districtaaaa) {
        ?>
<option value="<?php echo $districtaaaa["actors_ingrou_id"]; ?>"><?php echo $districtaaaa["actors_in_group_name"]; ?></option>
<?php
    }
}
?>