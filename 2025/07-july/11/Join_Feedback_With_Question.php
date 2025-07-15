<?php
// Join Feedback With Question
// Get the feedback given along with the feedback question title from bf_alt_feedback.

include("../../../db.php");

$sql = "SELECT 
  f.bill_id AS `Bill Id`,
  f.rating AS Rating,
  f.comment AS Comment,
  a.title AS Title
FROM bf_bills_feedback f
JOIN bf_alt_feedback a ON f.alt_fb_id = a.id
WHERE f.rating IS NOT NULL
ORDER BY date_added DESC
LIMIT 1000,500";

$result = mysqli_query($conn, $sql);
?>

<h2>Feedback With Question</h2>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Bill ID</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Title</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['Bill Id']}</td>
                    <td>{$row['Rating']}</td>
                    <td>{$row['Comment']}</td>
                    <td>{$row['Title']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>

