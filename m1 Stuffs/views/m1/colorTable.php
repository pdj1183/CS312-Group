<!DOCTYPE html>
<html>
<?php echo Asset::css("main.css") ?>
<title>Color Table</title>
<table class='upper'>
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

<table class='lower'>
    <?php
        
        if(isset($_POST['submit_btn'])){
            echo "<tr>";
            $rows=$_POST['rows'];
            $alphabet = [' ','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
            if ($rows !=0){
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
        }
        ?>
</table>

<div class="print" id="print-view">
    <button>
        Print View
    </button>
</div>

</html>