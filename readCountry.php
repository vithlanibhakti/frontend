<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM products WHERE p_name like '" . $_POST["keyword"] . "%' ORDER BY p_name LIMIT 0,7";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<a href='searchproduct.php?p_name=<?php echo $country["p_name"];?>'><li onClick="selectCountry('<?php echo $country["p_name"]; ?>');"><?php echo $country["p_name"]; ?></li></a>
<?php } ?>
</ul>
<?php } } ?>