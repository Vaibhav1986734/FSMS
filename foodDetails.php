<?php
include 'shared/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FoodName = $_POST['FoodName'];
    $Category = $_POST['Category'];
    $UnitPrice = $_POST['UnitPrice'];
    $ExpirationDate = $_POST['ExpirationDate'];

    $sql = "INSERT INTO FoodItems (FoodName, Category, UnitPrice, ExpirationDate)
            VALUES ('$FoodName', '$Category', '$UnitPrice', '$ExpirationDate')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New food item added successfully.');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Food Items</title>
</head>
<body>
    <h2>Add Food Item</h2>
    <form action="insert_food.php" method="POST">
        <label for="FoodName">Food Name:</label><br>
        <input type="text" name="FoodName" required><br><br>
        
        <label for="Category">Category:</label><br>
        <input type="text" name="Category" required><br><br>

        <label for="UnitPrice">Unit Price:</label><br>
        <input type="number" step="0.01" name="UnitPrice" required><br><br>

        <label for="ExpirationDate">Expiration Date:</label><br>
        <input type="date" name="ExpirationDate" required><br><br>

        <input type="submit" value="Add Food Item">
    </form>
</body>
</html>
