<?php
// Find all unused and valid coupons as of today.

include("../db.php");

// Write a SELECT query
$sql = "SELECT coupon_code, title, user_phone, validity_date
    FROM bf_coupons
    WHERE is_used = 'n'
    AND status = 'a'
    AND validity_date >= CURDATE()
";

$result = mysqli_query($conn, $sql);
?>

<h2>Active Coupons</h2>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Coupon Code</th>
                <th>Title</th>
                <th>User Phone</th>
                <th>Validity Date</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['coupon_code']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['user_phone']}</td>
                    <td>{$row['validity_date']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>

