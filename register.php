<?php
// register.php — Lab 4 Step 4: the membership form, answered by PHP.
// Fields are exactly first_name, last_name, phone, route, as the lab
// sheet requires — PHP finds each value by the field's name, not its id.
// This replaces the earlier register form (full name, ID, email,
// password) for Lab 4; the form posts to process-register.php.
$page_title = 'Apply for membership';
include 'includes/header.php';
?>

  <main>
    <h2>Ereteti Sacco</h2>
    <form action="process-register.php" method="post">
      <label for="first-name">First name</label>
      <input type="text" id="first-name" name="first_name" autocomplete="given-name" required><br>

      <label for="last-name">Last name</label>
      <input type="text" id="last-name" name="last_name" autocomplete="family-name" required><br>

      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone" autocomplete="tel" required><br>

      <label for="route">Route</label>
      <select id="route" name="route" required>
        <option value="">Choose a route</option>
        <option value="1">Kiserian</option>
        <option value="2">Ngong</option>
        <option value="3">Rongai</option>
      </select><br>

      <button type="submit">Apply to join</button>
    </form>
  </main>

<?php include 'includes/footer.php'; ?>
