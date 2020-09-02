<?php 
$country = intval($_GET['country']);

include("config.php");
$query  = "SELECT id,statename FROM state WHERE countryid='$country'";
$result = mysqli_query($con, $query);
?>
<select name="state" class="form-control" required onchange="getCity(<?php echo $country?>,this.value)" >
	<option>Select State</option>
	<?php while ($row = mysqli_fetch_array($result)) { ?>
	<option value=<?php echo $row['id']?>><?php echo $row['statename']?></option>
	<?php } ?>
</select>

<script language="javascript" type="text/javascript">
$(document).ready(function(){
if ($("state").val() == 'Select') {
            alert( " Please select your sex");
            
		}
	}
</script>
