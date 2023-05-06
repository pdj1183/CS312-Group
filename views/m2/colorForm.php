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

        <td>
            <h3>Preset Colors</h3>
            <div class="presetDB">
                <div class="color-entry">
                    <input type="color" id="color1" name="color1" value="000000">
                    <input type="text" id="name1" name="1" value="Black">
                </div>
                <div class="color-entry">
                    <input type="color" id="color2" name="color2" value="#0000ff">
                    <input type="text" id="name2" name="2" value="Blue">
                </div>
                <div class="color-entry">
                    <input type="color" id="color3" name="color3" value="#a5292a">
                    <input type="text" id="name3" name="3" value="Brown">
                </div>
                <div class="color-entry">
                    <input type="color" id="color4" name="color4" value="#008001">
                    <input type="text" id="name4" name="4" value="Green">
                </div>
                <div class="color-entry">
                    <input type="color" id="color5" name="color5" value="#808080">
                    <input type="text" id="name5" name="5" value="Grey">
                </div>
                <div class="color-entry">
                    <input type="color" id="color6" name="color6" value="#ffa500">
                    <input type="text" id="name6" name="6" value="Orange">
                </div>
                <div class="color-entry">
                    <input type="color" id="color7" name="color7" value="#800080">
                    <input type="text" id="name7" name="7" value="Purple">
                </div>
                <div class="color-entry">
                    <input type="color" id="color8" name="color8" value="#ff0000">
                    <input type="text" id="name8" name="8" value="Red">
                </div>
                <div class="color-entry">
                    <input type="color" id="color9" name="color9" value="#008080">
                    <input type="text" id="name9" name="9" value="Teal">
                </div>
                <div class="color-entry">
                    <input type="color" id="color10" name="color10" value="#ffff00">
                    <input type="text" id="name10" name="10" value="Yellow">
                </div>
            </div>
        </td>
        <td>
            <h3>Custom Colors</h3>
            <div class="customDB">

            </div>
            <button class="add_color" id="add_color"> + </button>
            <button class="remove_color" id="remove_color">-</button>
    </form>
    </td>
</body>

<script>
let addColorButton = document.querySelector("#add_color");
let customDB = document.querySelector(".customDB");
let colorCount = 10;

addColorButton.addEventListener("click", function(event) {
    event.preventDefault();
    colorCount++;
    let newColorEntry = document.createElement("div");
    newColorEntry.classList.add("color-entry");
    newColorEntry.innerHTML =
        `<input type="color" id="color${colorCount}"  name="color${colorCount}"><input type="text" id="color${colorCount}" value="${colorCount}" name="${colorCount}">`;
    let newColorInput = newColorEntry.querySelector(`#color${colorCount}`);
    let randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
    newColorInput.value = randomColor;
    customDB.appendChild(newColorEntry);
});
</script>

<script>
let removeColorButton = document.querySelector("#remove_color");

removeColorButton.addEventListener("click", function(event) {
    event.preventDefault();
    if (colorCount > 1) {
        let colorEntries = document.querySelectorAll(".color-entry");
        let lastColorEntry = colorEntries[colorEntries.length - 1];
        lastColorEntry.remove();
        colorCount--;
    }
});
</script>

</html>