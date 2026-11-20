<?php
require_once 'includes/db.php'; // 1 · CONNECT
$page_title = 'Deliveries';
include 'includes/header.php';
// 2 · QUERY — every delivery on one day, with the farmer's number and name
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
        <h2>Milk received at Olepolos centre</h2>
        <p>Milk received on all three routes, Monday 12 October 2026. Both sessions are listed: the morning collection from 6.30am and the evening collection from 4.00pm.</p>

        <form class="form" id="delivery-form" action="#" method="POST">

            <label for="member">Member Number: </label>
            <input type="text" id="member" name="Member" placeholder="ER-0000" required>
            <p class="message" id="member-message"></p>

            <label for="session">Session: </label>
            <select id="session" name="session" required>
                <option value="">Choose a session</option>
                <option value="Morning">Morning</option>
                <option value="Noon">Noon</option>
                <option value="Evening">Evening</option>
            </select>

            <label for="litres">Litres: </label>
            <input type="number" id="litres" name="Litres" step="0.01" required>
            <p class="message" id="litres-message"></p>

            <button type="submit">Record delivery</button>
            <p class="message" id="form-message"></p>
        </form>

        <section class="table-scroll" tabindex="0" aria-label="Milk deliveries table">
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
if ($count === 0) { // NEW
    echo '<tr><td colspan="5">No deliveries recorded on this day.</td></tr>'; // NEW
} else { // NEW
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
} // NEW
?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" scope="row">Accepted today</th>
                        <td id="accepted-total"></td>
                    </tr>
                </tfoot>
            </table>
        </section>
    </main>
    <aside>
        <h2>Collection sessions</h2>
        <p>Morning collection starts at 6.30am. Evening collection starts at 4.00pm at Olepolos centre.</p>
        <p><a href="routes.php#kiserian">See all Kiserian collection centres</a></p>
    </aside>
<?php include 'includes/footer.php'; ?>