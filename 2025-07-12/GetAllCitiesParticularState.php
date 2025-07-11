<?php 
include("../db.php");

// Get state_id from input, default to 17 if not set or invalid
$state_id = isset($_GET['state_id']) && is_numeric($_GET['state_id']) && $_GET['state_id'] >= 1 && $_GET['state_id'] <= 36 ? (int)$_GET['state_id'] : 17;

$sql = "SELECT * FROM bf_city WHERE state_id = $state_id";

$result = mysqli_query($conn , $sql);
?>

<form method="get">
    <label for="state_id">Enter State ID (1-36):</label>
    <input type="number" id="state_id" name="state_id" min="1" max="36" value="<?php echo htmlspecialchars($state_id); ?>">
    <button type="submit">Show Cities</button>
</form>

<h2>City List</h2>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>City Name</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['city_name']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>