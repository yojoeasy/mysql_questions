<?php
// Recent Feedbacks with Ratings
// Fetch the 10 most recent feedback entries with non-null ratings.

include("../../../db.php");

// Write a SELECT query
$sql = "SELECT bill_id, rating, comment, date_added
FROM bf_bills_feedback
WHERE rating IS NOT NULL
ORDER BY date_added DESC
LIMIT 10";

$result = mysqli_query($conn, $sql);
?>

<h2>Recent Feedbacks with Ratings</h2>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Bill ID</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Date Added</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['bill_id']}</td>
                    <td>{$row['rating']}</td>
                    <td>{$row['comment']}</td>
                    <td>{$row['date_added']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>

