function submitLoginForm(event) {
    event.preventDefault(); // Prevent the default form submission
  
    // Get the values from the input fields
    const email = document.getElementById("emailInput").value;
    const password = document.getElementById("passwordInput").value;
  
    // Create a new FormData object
    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
  
    // Create a new AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "Login.php", true);
  
    xhr.onload = function () {
      console.log("success");
      window.location.href = "/HomePage/testPage.html";
    };
  
    // Send the FormData object as the request body
    xhr.send(formData);
  }