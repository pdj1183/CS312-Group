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
                echo '<button data-row="' . ($i+1) . '" type="radio" name="color" class="radio" value="'.$default_colors[$i].'"></button>';   
                echo '<select class="color-dropdown">';
                echo '<option value="color" selected diabled hidden>Select a Color</option>';
                

                if (!empty($_POST['color'])) {
                    $entered_colors = $_POST['color'];

                    foreach ($entered_colors as $color) {
                        if ($color == $entered_colors[$i]) {
                            echo "<option value='$color' selected>$color</option>";
                            $selected_color = $color;
                        } else {
                            echo "<option value='$color'>$color</option>";
                        }
                    }
                } else {
                    echo '<option value="color" selected disabled hidden>Select a Color</option>';

                    foreach ($default_colors as $color) {
                        echo "<option value='$color'>$color</option>";
                    }
                }
                
                echo '</select>';
                echo '<td class="display-coord" style="width: 80%;height: 25px"></td>';
                echo '</tr>';
            }
            
        }
    ?>
</table>
<script>
    const colorRadioButtons = document.querySelectorAll('.color-sel button[type="radio"]');
    const colorDropdowns = document.querySelectorAll('.color-dropdown');
    let selectedColor = "black";
    colorRadioButtons.forEach(radioButton => {
        radioButton.addEventListener('click', () => {
            selectedColor = radioButton.value;
        });
    });
    colorDropdowns.forEach(dropdown => {
        dropdown.addEventListener('change', () => {
            selectedColor = dropdown.value;
            const radioBtn = dropdown.previousElementSibling;
            radioBtn.value = dropdown.value;
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
                    $cell_id = $alphabet[$j] . ($i+1);
                    echo "<td class='table-cell' id='$cell_id'></td>";
                    }
                }
            }
            }
        }
        
        ?>
</table>
<script>
    const tableCells = document.querySelectorAll('.table-cell');
    const radioButtons = document.querySelectorAll('button[type="radio"]');
    let selectedRow = 1;
    let coord = {};

    radioButtons.forEach(radioButton => {
        radioButton.addEventListener('click', () => {
            selectedRow = parseInt(radioButton.getAttribute('data-row'));
            if (!coord[selectedRow]) {
                coord[selectedRow] = [];
            }
        });
    });
 
    colorDropdowns.forEach(dropdown => {
        dropdown.addEventListener('change', () => {
            selectedColor = dropdown.value;
            for (const row in coord) {
                coord[row].forEach(cellId => {
                    const tableCell = document.getElementById(cellId);
                    if (tableCell && tableCell.classList.contains(selectedColor)) {
                        return;
                    }
                    tableCell.classList.remove(...tableCell.classList);
                    tableCell.classList.add(selectedColor);
                });
            }
        });
    });

    tableCells.forEach(tableCell => {
        const cellId = tableCell.getAttribute('id');
        if (cellId) {
            const colIndex = tableCell.parentNode.rowIndex;
            const rowIndex = tableCell.cellIndex;
            tableCell.addEventListener('click', () => {
                if (tableCell.classList.contains(selectedColor)) {
                    tableCell.className='';
                    const rowId = 'color-row-' + selectedRow;
                    const dispCoord = document.querySelector('#' + rowId + ' .display-coord');
                    const index = coord[selectedRow].indexOf(cellId);
                    if (index !== -1) {
                        coord[selectedRow].splice(index, 1);
                    }
                    if (coord[selectedRow].length > 0) {
                        coord[selectedRow].sort();
                        dispCoord.textContent = coord[selectedRow].join(", ");
                    } else {
                        dispCoord.textContent = '';
                    }
                } else {
                    for (const row in coord) {
                        if (coord[row].indexOf(cellId) !== -1) {
                            const index = coord[row].indexOf(cellId);
                            coord[row].splice(index, 1);
                            const rowId = 'color-row-' + row;
                            const dispCoord = document.querySelector('#' + rowId + ' .display-coord');
                            if (coord[row].length > 0) {
                                coord[row].sort();
                                dispCoord.textContent = coord[row].join(", ");
                            } else {
                                dispCoord.textContent = '';
                            }
                        }
                    }
                    tableCell.className='';
                    tableCell.classList.add(selectedColor);
                    const rowId = 'color-row-' + selectedRow;
                    const dispCoord = document.querySelector('#' + rowId + ' .display-coord');
                    if (!coord[selectedRow]) {
                        coord[selectedRow] = [];
                    }
                    coord[selectedRow].push(cellId);
                    coord[selectedRow].sort();
                    dispCoord.textContent = coord[selectedRow].join(", ");
                }
            });
        }
    });
</script>

<div>
    <button class="print" id="print">
        <h1> Print </h1>
    </button>
</div>

</html>
