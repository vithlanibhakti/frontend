<html lang="en">
<head>
<meta charset="utf-8">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>GIT Lanka Online</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/homepage.css">
</head>
    <script src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        // Total number of rows visible at a time
        var rowperpage = 5;
        $(document).ready(function(){

            getData();  // getting data

            $("#but_prev").click(function(){
                var rowid = Number($("#txt_rowid").val());
                var allcount = Number($("#txt_allcount").val());
                rowid -= rowperpage;
                if(rowid < 0){
                    rowid = 0;
                }
                $("#txt_rowid").val(rowid);
                getData();
            });

            $("#but_next").click(function(){
                var rowid = Number($("#txt_rowid").val());
                var allcount = Number($("#txt_allcount").val());
                rowid += rowperpage;
                if(rowid <= allcount){
               
                    $("#txt_rowid").val(rowid);
                    getData();
                }

            });
        });

        /* requesting data */
        function getData(){
            var rowid = $("#txt_rowid").val();
            var allcount = $("#txt_allcount").val();

            $.ajax({
                url:'getEmployeeInfo.php',
                type:'post',
                data:{rowid:rowid,rowperpage:rowperpage},
                dataType:'json',
                success:function(response){
                    
                   createTablerow(response);
                }
            });

        }
        /* Create Table */
        function createTablerow(data){
        //    alert(data);
            var dataLen = data.length;
          //  alert(dataLen);
            $("#emp_table tr:not(:first)").remove();

            for(var i=0; i<dataLen; i++){
               // alert(dataLen);
                if(i == 0){
                    var allcount = data[i]['allcount'];
                    $("#txt_allcount").val(allcount);
                }else{
                    var p_id = data[i]['p_id'];
                    var p_name = data[i]['p_name'];
                    var p_image = data[i]['p_image'];
                    var sell_price = data[i]['sell_price'];
                   console.log(p_name);
                  // document.getElementById("demo").innerHTML = p_name;   

                    $("#emp_table").append("<div id='tr_"+i+"'></div>");
                    $("#tr_"+i).append("<div align='center'>"+p_id+"</div>");
                    $("#tr_"+i).append("<div align='left'>"+p_name+"</div>");
                    $("#tr_"+i).append("<div align='center'>"+p_image+"</div>");
                    $("#tr_"+i).append("<div align='center'>"+sell_price+"</div>");
                }
            }
        }
    </script>

</head>
<body>
    <div id="emp_table">
        <!-- Table -->

        <!-- <table width="100%" id="emp_table" border="0">
                <th>Employee id</th>
                <th>Employee Name</th>
                <th>Salary</th>
                <th>Salary</th>
            
        </table>         -->
</div>

        <div id="div_pagination">
            <input type="hidden" id="txt_rowid" value="0">
            <input type="hidden" id="txt_allcount" value="0">
            <input type="button" class="button" value="Previous" id="but_prev" />

            <input type="button" class="button" value="Next" id="but_next" />
        </div>
        <p id="demo"></p>

    </div>
</body>
</html>