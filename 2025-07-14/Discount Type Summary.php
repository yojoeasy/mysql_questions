<?php
// Count how many coupons were issued by each disc_type (amount/percent/buy-one-get-one).

include("../db.php");

// $sql = "SELECT disc_type, COUNT(*) AS total
// FROM bf_coupons
// GROUP BY disc_type
// ";

$sql ="SELECT 
  CASE disc_type
    WHEN 'a' THEN 'Amount'
    WHEN 'p' THEN 'Percent'
    WHEN 'bg' THEN 'Buy-Gift'
    ELSE 'Unknown'
  END AS discount_type,
  COUNT(*) AS total
FROM bf_coupons
GROUP BY disc_type;
";

$result = mysqli_query($conn, $sql);
?>

<h2>Discount Type Summary</h2>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Discount Type</th>
                <th>Total</th>
            </tr>";

        $sr = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['discount_type']}</td>
                    <td>{$row['total']}</td>
                </tr>";
            $sr++;
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>

