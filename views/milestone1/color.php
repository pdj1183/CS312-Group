<!DOCTYPE html>
<html>
<head>
    <title>Color Generator</title>
</head>
<body>
    <form method="post" action="color.php" >
        <label for = "rows" > Number of Rows/Columns: </label>
        <input type = "number" id = "rows" name = "rows" min = "1" max = "26">
        <label for = "colors" > Number of Colors: </label>
        <input type = "number" id = "colors" name = "colors" min = "1" max = "10">
        <button type = "submit" name = "submit_btn" >Submit</button>
    </form>
</body>
</html>

<br>

<table class = 'upper'>
    <?php
        if(isset($_POST['submit_btn'])){
            $colors = $_POST['colors'];
            for ($i = 0; $i < $colors; $i++) {
                echo '<tr>';
                echo '<td style="width: 20%;height: 25px"></td>';
                echo '<td style="width: 80%;height: 25px"></td>';
                echo '</tr>';
            }
        }
    ?>
</table>

<br>

<table class = 'lower'>
    <?php
        echo "<tr>";
        if(isset($_POST['submit_btn'])){
            $rows=$_POST['rows'];
            $alphabet = [' ','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
            for($i = 0;$i<$rows+1;$i++){
                echo "<th>", $alphabet[$i],"</th>";
            }
            echo "</tr>";
            for($i = 0;$i<$rows;$i++){
                echo "<tr>";
                for($j = 0;$j<$rows+1;$j++){
                    if($j == 0){
                        echo "<td>",$i+1,"</td>";
                    }
                    else{
                    echo "<td></td>";
                    }
                }
            }
        }
        ?>
</table>
