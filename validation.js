function checkEmail() {
    var email = document.forms["regForm"]["email"];
    var parts = email.value.split("@");
  
    if (email.value == "") {
      window.alert("Please enter your e-mail.");
      return false;
    } else if (parts.length === 2) {
      console.log(parts[1]);
      if (parts[1] === "gmail.com") {
        return true;
      } else {
        window.alert("Invalid domain.");
        return false;
      }
    } else {
      window.alert("E-mail error.");
      return false;
    }
  }
  
  function openlink() {
      window.location.href = "./registration.php";
  }
    
  function openFPassword() {
      window.location.href = "./forgotpassword.php";
  }
  
  function checkValidation() {
  
      var username = document.forms["loginForm"]["sNumber"];
      var password = document.forms["loginForm"]["password"];
    
      if (username.value == "" || password.value == "") {
        window.alert("Please enter valid username/password");
        username.focus();
        return false;
      }
      return true;
  }
  
  function forgotPassword() { 
      var password = document.forms["formFPass"]["fp_password"];
      var cPassword = document.forms["formFPass"]["fp_confirmPassword"];
      if (password.value != cPassword.value) { 
        window.alert("PASSWORD MISMATCH");
        return false;
      }
      return true
    }