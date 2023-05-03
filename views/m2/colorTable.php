<!DOCTYPE html>
<html>
<?php

use Fuel\Core\Asset;

 echo Asset::css("main.css") ?>

<script>
function checkDropdowns(select) {
    var selects = document.querySelectorAll('.color-list select');
    console.log(selects);
    console.log(select)

    for (var i = 0; i < selects.length; i++) {
        if (selects[i] != select && selects[i].value == select.value) {
            $('.fail_color').removeClass('hidden');
            select.value = 'color';
            break;
        } else {
            $('.fail_color').addClass('hidden');
        }
    }
}
</script>

<title> Color Table </title>
<table class='upper'>
    <?php
        if(isset($_POST['submit_btn'])){
            $colors = $_POST['colors'];
            $default_colors = array("black", "blue", "brown", "green", "grey", "orange", "purple", "red", "teal", "yellow");
            
            for ($i = 0; $i < $colors; $i++) {
                $row_id = 'color-row-' . ($i+1);
                echo '<tr id="' . $row_id . '">';
                echo  '<td class="color-sel" style="width: 20%;height: 25px">';
                echo '<div class="color-list">';
                echo '<input type="radio" name="color" class="radio" value="'.$default_colors[$i].'"></input>';   
                echo '<select onchange="checkDropdowns(this)">';
                echo '<option value="color" selected diabled hidden>Select a Color</option>';
                

                foreach($default_colors as $color) {
                    if ($color == $default_colors[$i]) {
                        echo "<option value='$color' selected>$color</option>";
                    } else {
                        echo "<option value='$color'>$color</option>";
                    }
                }
                
                echo '</select>';
                echo '<td style="width: 80%;height: 25px"></td>';
                echo '</tr>';
            }
            
        }
    ?>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const colorRadioButtons = document.querySelectorAll('.color-sel input[type="radio"]');
    let selectedColor = null;
    colorRadioButtons.forEach(radioButton => {
        radioButton.addEventListener('click', () => {
            selectedColor = radioButton.value;
        });
    });
    </script>

<div class="fail_color hidden">
    <h1> Oh No! </h1>
    <p> You can only select a color once! </p>
</div>

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
                    echo "<td class='table-cell'></td>";
                    }
                }
            }
            }
        }
        
        ?>
</table>
<script>
        const tableCells = document.querySelectorAll('.table-cell');
        tableCells.forEach(tableCell => {
            tableCell.addEventListener('click', () => {
                if (!tableCell.parentNode.getAttribute('id') || tableCell.parentNode.getAttribute('id') !== 'colors') {
                    if (tableCell.classList.contains(selectedColor)) {
                        tableCell.className='';
                    }
                    else {
                        tableCell.className='';
                        tableCell.classList.add(selectedColor);
                    }
                    const rowIndex = tableCell.parentNode.rowIndex;
                    const colIndex = tableCell.cellIndex;
                }
            });
        });
</script>

<div>
    <button class="print" id="print">
        <h1> Print </h1>
    </button>
</div>

</html>
