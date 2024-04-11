
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Management</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('peakpx.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #f4f4f4;
  }
  .container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h1 {
    text-align: center;
    color: #333;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  th, td {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    text-align: left;
  }
  th {
    background-color: #f2f2f2;
  }
  td.password {
    position: relative;
  }
  .add-button {
    margin-top: 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  form {
    margin-top: 20px;
    display: none;
  }
  .form-input {
    margin-bottom: 20px;
  }
  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }
  button[type="submit"], .delete-button {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  }
  button[type="submit"]:hover, .delete-button:hover {
    background-color: #218838;
  }
</style>
</head>
<body>

<div class="container">
  <h1>Password Management System</h1>
  
  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Website</th>
        <th>Password</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody id="password-rows">
      <?php
          include("database.php");
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $sql = "SELECT * FROM passwords";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['website'] . "</td>";
              echo "<td class='password'>" . $row['password'] . "</td>";
              echo "<td><button class='delete-button' onclick='deletePassword(" . $row['id'] . ")'>Delete</button></td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='4'>No passwords found.</td></tr>";
      }

      mysqli_close($conn);
      ?>
    </tbody>
  </table>

  <button class="add-button" onclick="toggleForm()">Add New Password</button>

  <form id="password-form" action="add_password.php" method="post">
    <div class="form-input">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="form-input">
      <label for="website">Website:</label>
      <input type="text" id="website" name="website" required>
    </div>
    <div class="form-input">
      <label for="password">Password:</label>
      <input type="text" id="password" name="password" required>
    </div>
    <button type="submit">Submit</button>
  </form>
</div>

<script>
  function toggleForm() {
    var form = document.getElementById("password-form");
    form.style.display = form.style.display === "none" ? "block" : "none";
  }

  function deletePassword(id) {
    if (confirm("Are you sure you want to delete this password?")) {
      window.location.href = "add_password.php?delete=" + id;
    }
  }
</script>

</body>
</html>
