<!DOCTYPE html>
<html>

<head>
    <title>Color Generator</title>

<body>
    <form method="post" action="color.php">
        <label for="rows"> Number of Rows/Columns: </label>
        <input type="number" id="rows" name="rows" min="1" max="26">
        <label for="colors"> Number of Colors: </label>
        <input type="number" id="colors" name="colors" min="1" max="10">
        <button type="submit" name="submit_btn">Submit</button>
    </form>
</body>

</html>