function login() {
  // Get username and password from form fields
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  // Send username and password to PHP script for verification
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "login.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // If login is successful, hide the login form and show the user info
      if (this.responseText === "success") {
        document.getElementById("login-form").style.display = "none";
        document.getElementById("user-name").textContent = username;
        document.getElementById("user-info").style.display = "block";
      } else {
        // If login is unsuccessful, display an error message
        alert("Incorrect username or password.");
      }
    }
  };
  xhr.send("username=" + username + "&password=" + password);
}

// Function to log out the user
function logout() {
  // Send request to PHP script to log out the user
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "logout.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // If logout is successful, hide the user info and show the login form
      if (this.responseText === "success") {
        document.getElementById("user-info").style.display = "none";
        document.getElementById("login-form").style.display = "block";
      } else {
        // If logout is unsuccessful, display an error message
        alert("Error logging out.");
      }
    }
  };
  xhr.send();
}