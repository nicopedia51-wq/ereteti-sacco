<?php
$page_title = 'Deliveries';
include 'includes/header.php';
?>
    <main>
        <h2>Milk received at Olepolos centre</h2>
        <p>Milk received on the Kiserian route, Monday 12 October 2026. Both sessions are listed: the morning collection from 6.30am and the evening collection from 4.00pm.</p>

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
                    <tr>
                        <td>ER-0001</td><td>Peter Mwangi</td><td>Morning</td><td>5.38</td><td>Yes</td>
                    </tr>
                    <tr>
                        <td>ER-0002</td><td>Peter Mwangi</td><td>Evening</td><td>4.29</td><td>Yes</td>
                    </tr>
                    <tr>
                        <td>ER-0003</td><td>Grace Wanjiku</td><td>Morning</td><td>4.39</td><td>Yes</td>
                    </tr>
                    <tr>
                        <td>ER-0004</td><td>Grace Wanjiku</td><td>Evening</td><td>3.02</td><td>Yes</td>
                    </tr>
                    <tr>
                        <td>ER-0005</td><td>Joseph Kamau</td><td>Morning</td><td>7.73</td><td>No</td>
                    </tr>
                    <tr>
                        <td>ER-0006</td><td>Joseph Kamau</td><td>Evening</td><td>6.75</td><td>Yes</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" scope="row">Accepted today</th>
                        <td id="accepted-total">23.83</td>
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
