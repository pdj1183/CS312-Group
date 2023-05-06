<!DOCTYPE html>
<html>

<head>
    <title>Color Generator</title>

<body>
    <form action="color.php" method="POST">
        <label for="rows">Number of Rows/Columns:</label>
        <input type="number" id="rows" name="rows" min="1" max="26" required>

        <label for="colors">Number of Colors:</label>
        <input type="number" id="colors" name="colors" min="1" max="10" required>

        <br>
        <br>

        <?php
        $numColors = 10;
        $defaultColors = array("Red", "#FFEF01", "True", "Yellow Orange", "Orange", "Teal", "Green", "#120A8F", "Pink", "Blue");
        for ($i = 1; $i <= $numColors; $i++) {
            $defaultColor = isset($defaultColors[$i - 1]) ? $defaultColors[$i - 1] : '';
            echo '<label for="color' . $i . '">Enter Color ' . $i . ':  </label>';
            echo '<input type="text" id="color' . $i . '" name="color[]" value="' . $defaultColor . '" required><br>';
        }
        ?>

        <button type="submit" name="submit_btn">Submit</button>
    </form>
</body>

</html>
