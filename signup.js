// Function to handle the signup form submission
function handleSignup(event) {
    event.preventDefault();
  
    // Get the values from the signup form
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
  
    // Perform signup logic here (e.g., send a request to the server, store user data, etc.)
  
    // Display success message
    alert("Signup successful!");
  
    // Clear the form
    document.getElementById("signup-form").reset();
  }
  
  // Function to handle the login link click
  function handleLoginClick(event) {
    event.preventDefault();
  
    // Redirect to the login page (replace with your actual login page URL)
    window.location.href = "login.html";
  }
  
  // Add event listeners
  document.getElementById("signup-form").addEventListener("submit", handleSignup);
  document.getElementById("login").addEventListener("click", handleLoginClick);