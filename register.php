<?php
// register.php — converted from register.html for Lab 4 Steps 1–3
// (shared header/footer, .php pages). Lab 4 Step 4 — the form answered
// by process-register.php, with fields first_name, last_name, phone,
// route — is NOT done here yet; this form is unchanged from the HTML
// version, action="#" and its original fields.
$page_title = 'Apply for membership';
include 'includes/header.php';
?>

  <main>
    <h2>Ereteti Sacco</h2>
    <form action="#" method="post">
      <label for="full-name">Full Name</label>
      <input type="text" id="full-name" name="full-name" autocomplete="name" required><br>

      <label for="id-number">ID Number</label>
      <input type="text" id="id-number" name="id-number" autocomplete="off" required><br>

      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone" autocomplete="tel" required><br>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" autocomplete="email" required><br>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" autocomplete="new-password" required><br>

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password" autocomplete="new-password" required><br>

      <button type="submit">Register</button>
    </form>
  </main>

<?php include 'includes/footer.php'; ?>
