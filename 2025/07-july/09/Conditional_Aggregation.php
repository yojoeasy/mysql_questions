<?php
// Count how many bills have a rating of 5 (assuming 5 is highest).

include("../db.php");

$sql = "select count(*) as 5_star_rating from bf_bills_archive where rating = 5";
$result = mysqli_query($conn,$sql);
?>
<h2>Bills have a rating of 5</h2>

<?php
if($result){
    $row = mysqli_fetch_assoc($result);
    echo "Count :" .$row["5_star_rating"];
} else{
    echo"Query is failed";
}
?>