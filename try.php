<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <script>
    function toggleUserType() {
      var userType = document.getElementById('userType').value;
      if (userType === 'student') {
        document.getElementById('studentLogin').style.display = 'block';
        document.getElementById('adminLogin').style.display = 'none';
      } else if (userType === 'admin') {
        document.getElementById('studentLogin').style.display = 'none';
        document.getElementById('adminLogin').style.display = 'block';
      }
    }
  </script>
</head>
<body>
  <h1>Login</h1>
  
  <form method="post" action="" onsubmit="toggleUserType()">
    <label for="userType">Select User Type:</label>
    <select id="userType" name="userType" onchange="toggleUserType()">
      <option value="student">Student</option>
      <option value="admin">Admin</option>
    </select>
    
    <!-- Student Login Section -->
    <div id="studentLogin" style="display: block;">
      <h2>Student</h2>
      <label for="studentName">Name:</label>
      <input type="text" id="studentName" name="studentName" required><br><br>
      
      <label for="course">Course:</label>
      <input type="text" id="course" name="course" required><br><br>
      
      <label for="studentID">Student ID:</label>
      <input type="text" id="studentID" name="studentID" required><br><br>
      
      <input type="checkbox" id="consent" name="consent" required>
      <label for="consent">I consent to the use of my medical records.</label><br><br>
      
      <input type="submit" name="submit" value="Login">
    </div>
    
    <!-- Admin Login Section -->
    <div id="adminLogin" style="display: none;">
      <h2>Admin</h2>
      <label for="username">Username:</label>
      <input type="text" id="adminUsername" name="adminUsername" required><br><br>
      
      <label for="password">Password:</label>
      <input type="password" id="adminPassword" name="adminPassword" required><br><br>
      
      <input type="submit" name="submit" value="Login">
    </div>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['userType'] === 'student') {
      // Handle student form data
      $studentName = $_POST['studentName'];
      $course = $_POST['course'];
      $studentID = $_POST['studentID'];
      $consent = isset($_POST['consent']) ? 'Yes' : 'No'; // Check if consent checkbox is checked

      // Process the student data as needed
      // For example: You can perform database operations, validation, etc.
      // Use the variables $studentName, $course, $studentID, $consent
    } elseif ($_POST['userType'] === 'admin') {
      // Handle admin form data
      $adminUsername = $_POST['adminUsername'];
      $adminPassword = $_POST['adminPassword'];

      // Admin credentials
      $admins = array(
        'admin1' => '123',
        'admin2' => '456',
        'admin3' => '789'
      );

      if (array_key_exists($adminUsername, $admins)) {
        if ($admins[$adminUsername] === $adminPassword) {
          echo '<script>alert("Log-In Successfully. You\'ll be directed to SCAS PORTAL");</script>';
          // Redirect to SCAS Portal or perform other actions
        } else {
          echo '<script>alert("Username and Password Does not Match");</script>';
        }
      } else {
        echo '<script>alert("Incorrect username and password");</script>';
      }
    }
  }
  ?>
</body>
</html>
