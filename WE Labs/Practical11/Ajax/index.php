<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
        <h2>Code Written by Abbas Raza - F16-16SW174</h2> <i>Note: Please With a while after click in Find Store. Also try 12466, 35019, 36509 & 99692 for testing purpose, to make sure data availablity in database. Thank you!</i><br><br>
        <form>
        <label for="zipCode">Enter you zip code: </label>
        <input type="text" id="zipCode">
        <input type="button" name="submit" id="btn" onClick="findStore(document.getElementById('zipCode').value);" value="Find Store">
        </form>

        <div id="show"></div>









        <script>
            function findStore(str) {
            if (str.length === 0) {
            document.getElementById("show").innerHTML = "Find a store";
            return;
            } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("show").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", "fetch.php?zipCode=" + str+"&submit=ok", true);
            xmlhttp.send();
            }
            }
</script>

</body>
</html>