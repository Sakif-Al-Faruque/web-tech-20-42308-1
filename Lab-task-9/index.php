<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>

    <style>
        table{
            
            margin: 0 auto;
            width: 70%;
        }
        table tr td{
            height: 150px;
            text-align: center;
        }
        p{
            text-align: center;
        }
        #my-content, #search-bar{
            height: 25px;
            text-align: right;
        }
    </style>
</head>
<body>
    <?php 
        $data = json_decode(file_get_contents("my-data.json"), true);
        //echo count($data);
        
        $rows_limit = 3;
        $total_rows = count($data);
        $num_of_pages = $total_rows/$rows_limit;

        if(!isset($_GET["page-num"])){
            $page_no = 1;
        }else{
            $page_no = $_GET["page-num"];
        }

        $max_row = $page_no*$rows_limit;
        $min_row = $max_row - 2;
    ?>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>FirstName</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody id="fetched-data">
            <tr>
                <td id="my-content">N/A</td>
                <td colspan="2" id="search-bar"><input type="text" placeholder="Search by ID" id="stdId"></td>
            </tr>
            <?php 
                foreach($data as $d){
                    $id = (int)$d["ID"];
                    if($id<=$max_row && $id>=$min_row){?>
                    <tr>
                        <td><?php echo $d["ID"] ?></td>
                        <td><?php echo $d["FirstName"] ?></td>
                        <td><?php echo $d["Age"] ?></td>
                    </tr>
                    <?php
                    }
                }
            ?>
        </tbody>
    </table>
    <p>
    <?php 
    //echo $num_of_pages;
       
    for($page_count = 1; $page_count<=$num_of_pages; $page_count++){
        ?><a href="index.php?page-num=<?php echo $page_count; ?>"><?php echo $page_count; ?></a> <?php
    }
    ?>
    </p>

    <script>
        const myInp = document.getElementById("stdId");
        const myContent = document.getElementById("my-content");


        myInp.addEventListener("keyup", function(){
            console.log(myInp.value);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    myContent.innerHTML = this.responseText;
                }else if(this.readyState == 4 && this.status == 404){
                    myContent.innerHTML = "N/A";
                }
            }

            xhttp.open("POST", "data-fetch.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id="+myInp.value);
        });

    </script>
    
</body>
</html>