<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["element_id"])) {
    $queryelelment = "SELECT * FROM members WHERE institution_id = '" . $_POST["element_id"] . "' order by member_name";
    $resultselelemnt = $db_handle->runQuery($queryelelment);
    ?>
<option value disabled selected>Select  Actor</option>
<?php
    foreach ($resultselelemnt as $district) {
        ?>
<option value="<?php echo $district["meber_id"]; ?>"><?php echo $district["member_name"]; ?></option>
<?php
    }
}
?>