<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php
	include 'config.php';
    $category_id=$_POST["category_id"];
   // echo "<script>alert('$category_id')</script>"; 
	$result = mysqli_query($con,"SELECT * FROM products where category_id=$category_id");
?>

<option value="">Select SubCategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["p_id"];?>"><?php echo $row["p_name"];?></option>
<?php
}

?>
<script>
    
$(document).ready(function() {
    //  var thisvalue = $("select#category option:selected").text();
    // alert(thisvalue);
    $('#sub_category').on('change',function(){
//    var optionsText = this.options[this.selectedIndex].text;
//    alert(optionsText);
   var getValue=$(this).val();
  //  alert(getValue);

debugger;
  $.ajax({
				url: "getdata.php",
				type: "POST",
				data: {
					getValue: getValue
				},
				cache: false,
				success: function(dataResult){
				alert("sucee");
				}
			});
		
});
});
</script>
