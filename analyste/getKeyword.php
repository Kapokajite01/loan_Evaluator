<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["keyword_id"])) {
    $querysector = "SELECT * FROM kewords WHERE incident_id = '" . $_POST["keyword_id"] . "' order by keyword_name asc";
    $resultskw = $db_handle->runQuery($querysector);
    ?>
<option value="0"  disabled selected>Select Keyword</option>
<?php
    foreach ($resultskw as $keyword) {
        ?>
<option value="<?php echo $keyword["keyword_id"]; ?>"><?php echo $keyword["keyword_name"]; ?></option>
<?php
    }
}
?>