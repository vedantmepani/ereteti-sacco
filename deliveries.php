<?php
require_once 'includes/db.php';            // 1 · CONNECT
$page_title = 'Deliveries';
include 'includes/header.php';

// 2 · QUERY — every delivery on one day, with the farmer's number and name
// Verified against ereteti-lab5.sql: 2026-10-12 gives 16 rows.
// All rows sum to 78.02; accepted-only sums to 70.29, the lab sheet's
// expected total. The rejected load is Joseph Kamau (ER-0003), MORNING,
// 7.73 litres, "Failed alcohol test" — shown as No, and Lab 3's
// JavaScript (js/main.js, Step 5) adds only the Yes rows into the total.
$sql = "SELECT f.member_no, f.first_name, f.last_name, d.session, d.litres, d.accepted
        FROM milk_delivery d
        JOIN farmer f ON f.farmer_id = d.farmer_id
        WHERE d.delivery_date = '2026-10-12'
        ORDER BY f.member_no, d.session";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>

  <main>
    <p><?php echo $count; ?> deliveries on this day.</p>

    <p>Milk received on Monday 12 October 2026, on all three routes — Kiserian, Ngong and Rongai. Both sessions are listed: the morning collection and the evening collection.</p>

    <div class="table-scroll">
      <table>
        <caption>Milk received, Monday 12 October 2026</caption>
        <thead>
          <tr>
            <th scope="col">Member</th>
            <th scope="col">Farmer</th>
            <th scope="col">Session</th>
            <th scope="col">Litres</th>
            <th scope="col">Accepted</th>
          </tr>
        </thead>
        <tbody>
<?php
if ($count === 0) {
    echo '<tr><td colspan="5">No deliveries recorded on this day.</td></tr>';
} else {
    // 3 · FETCH each row, and 4 · SHOW it as a table row
    while ($row = mysqli_fetch_assoc($result)) {
        // the database stores 1 or 0; the page says Yes or No
        if ($row['accepted'] == 1) {
            $accepted = 'Yes';
        } else {
            $accepted = 'No';
        }
        echo '<tr>';
        echo '<td>' . $row['member_no'] . '</td>';
        echo '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>';
        echo '<td>' . ucfirst(strtolower($row['session'])) . '</td>';
        echo '<td>' . $row['litres'] . '</td>';
        echo '<td>' . $accepted . '</td>';
        echo '</tr>';
    }
}
?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4" scope="row">Accepted today</th>
            <td id="accepted-total"></td>
          </tr>
        </tfoot>
      </table>
    </div>

    <p>Joseph Kamau's morning load failed the alcohol test and was rejected, so it is not counted in the day's accepted total. A rejected load is still listed: a rejected load is recorded, never deleted, because the farmer has a right to see what happened to their milk.</p>
  </main>

<?php include 'includes/footer.php'; ?>
