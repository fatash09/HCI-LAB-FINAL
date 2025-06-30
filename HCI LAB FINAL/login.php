<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Include Font Awesome -->
  <style>
    body {
      background-color: #343a40; /* Dark background color */
      color: #fff; /* Light text color */
    }

    .navbar {
      background-color: #212529; /* Dark navbar color */
    }

    .login-container {
      max-width: 400px;
      margin: auto;
      margin-top: 50px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #495057; /* Gray login container background color */
    }

    .form-group label {
      color: #fff; /* Light label text color */
    }

    .form-control {
      background-color: #e9ecef; /* Light form control background color */
    }

    .btn-primary {
      background-color: #007bff; /* Primary button color */
    }
  </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <span class="navbar-brand mb-0 h1">Login Form</span>
</nav>

<div class="container login-container">
  <form id="loginForm" onsubmit="return submitForm()">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <div class="input-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        <div class="input-group-append">
          <span class="input-group-text" id="eye-icon" onclick="togglePasswordVisibility()">
            <i class="fas fa-eye"></i> <!-- Use the correct Font Awesome class -->
          </span>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  function submitForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Send the username and password to the server for authentication
    // Using AJAX to send a POST request to the same file
    var xhr = new XMLHttpRequest();
    xhr.open('POST', window.location.href, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        if (xhr.responseText === 'success') {
          alert('Login successful. Redirecting to the dashboard.');
          // You can redirect to another page here
        } else {
          alert('Invalid username or password.');
        }
      }
    };
    xhr.send('username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password));

    return false; // Prevent the form submission
  }

  function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var eyeIcon = document.getElementById('eye-icon');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
      passwordInput.type = 'password';
      eyeIcon.innerHTML = '<i class="fas fa-eye"></i>';
    }
  }
</script>

</body>
</html>
