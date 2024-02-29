function handleLogin(event) {
    event.preventDefault();
  
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
  
    window.location.href = "sleepMain.html";  
    document.getElementById("login-form").reset();
  }
  
  function handleSignupClick(event) {
    event.preventDefault();
      window.location.href = "signup.html";
  }
  
  document.getElementById("login-form").addEventListener("submit", handleLogin);
  document.getElementById("signup").addEventListener("click", handleSignupClick);