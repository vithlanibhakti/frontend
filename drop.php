<?php
include 'config.php';
$result = mysqli_query($con,"SELECT * FROM categorys");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<form>
		<div class="form-group">
		  <label for="sel1">categorys</label>
		  <select class="form-control" id="category">
		  <option value="">Select Category</option>
		    <?php
			while($row = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $row["category_id"];?>"><?php echo $row["category_name"];?></option>
			<?php
			}
			?>
			
		  </select>
		</div>
		<div id="dvPassport" style="display: none">
    
		<div class="form-group show">
		  <label for="sel1">Sub Category</label>
		  <select class="form-control "  id="sub_category">
		  </select>
		</div>
		</div>

	</form>
</div>
<script>
$(document).ready(function() {
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
				$("#dvPassport").show();
            } else{
				$("#dvPassport").hide();
            }
        });
    }).change();

	$('#category').on('change', function() {
        
			var category_id = this.value;

debugger;
         //   alert(category_id);
			$.ajax({
				url: "get_subcat.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#sub_category").html(dataResult);
                   
				}
			});
		
		
	});
});
</script>
</body>
</html>