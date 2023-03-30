<!DOCTYPE html>
<html>
<head>
    <title>Color Generator</title>
</head>
<body>
    <form action = "m1\Index" method = "get">
        <label for = "rows" > Number of Rows/Columns: </label>
        <input type = "number" id = "rows" name = "rows" min = "1" max = "26" required>
        <br>
        <label for = "colors" > Number of Colors: </label>
        <input type = "number" id = "colors" name = "colors" min = "1" max = "10" required>
        <br>
        <input type = "submit" value = "Submit" >
    </form>
</body>
</html>

<!--rows and colors are passed to ValidateInputParams in m1.php-->
