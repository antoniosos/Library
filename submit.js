const nicknameInput = document.getElementById("nicknameInput");
const emailInput = document.getElementById("emailInput");
const passwordInput = document.getElementById("passwordInput");
const confirmPasswordInput = document.getElementById("confirm-passwordInput");
//const birthDateInput = document.getElementById("birthdate");
const warningFields = document.getElementsByClassName("warning");
const submitButton = document.getElementById("button");
const form = document.querySelector("form");

form.addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent form submission
  
  if (!validateForm()) {
    return false; // Validation failed, prevent form submission
  }
  
  // Validation passed
  const nickname = nicknameInput.value;
  const password = passwordInput.value;
  const email = emailInput.value;

  // Create an XMLHttpRequest object
  const xhr = new XMLHttpRequest();
  const url = "Register.php";
  const params = `nickname=${nickname}&password=${password}&email=${email}`;

  // Configure the request
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Handle the response
  xhr.onload = function() {

    $response = xhr.responseText;
      if($response === "success"){
        window.location.href = "home.html";
      }

  };

  // Send the request
  xhr.send(params);
});


function validateForm() {
    // Perform form validation checks here
    
    const nicknameValidation = validateNickname();
    const passwordValidation = validatePassword();
    
    showWarning(nicknameValidation, "fnameLength");
    showWarning(passwordValidation, "passwordWar");
    
    return nicknameValidation === "" && passwordValidation === ""; // Return false if any validation fails
  }

function validateNickname() {
    if (nicknameInput.value.length < 2) {
        return Warnings.fnameTooShort;
    }
    if (nicknameInput.value.length > 32) {
        return Warnings.fnameTooLong;
    }
    return "";
    
}

function validatePassword() {
    if (
        (passwordInput.value.length < 6 || confirmPasswordInput.value.length < 6) &&
        (confirmPasswordInput.value.length > 0 || passwordInput.value.length > 0)
    ) {
        return Warnings.pwTooShort;
    }
    if (passwordInput.value !== confirmPasswordInput.value) {
        return Warnings.pwDontMatch;
    }
    return "";
}

function showWarning(warningMessage, id) {
    let warningElement = document.getElementById(id);
    warningElement.textContent = warningMessage;
    warningElement.style.display = warningMessage ? "block" : "none";
}

const Warnings = {
    fnameTooShort: "Name is too short.",
    fnameTooLong: "Name is too long.",
    lnameTooShort:"Last name is too short.",
    lnameTooShort: "Last name is too short.",
    lnameTooLong: "Last name is too long.",
    pwTooShort: "Password is too short.",
    pwDontMatch: "Passwords don't match.",
    isUnderFifteen: "Under 15 years old",
    isEighteen: "18"
}

