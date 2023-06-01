const nicknameInput = document.getElementById("fname");
const surnameInput = document.getElementById("sname");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");
const birthDateInput = document.getElementById("birthdate");
const warningFields = document.getElementsByClassName("warning");
const submitButton = document.getElementById("button");

function validateForm() {
    showWarning(validateNickname(), "fnameLength");
    showWarning(validateSurname(), "snameLength");
    showWarning(validatePassword(), "passwordWar");
    showWarning(validateAge(), "age");
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
    lnameTooShort: "Last name is too short.",
    lnameTooLong: "Last name is too long.",
    pwTooShort: "Password is too short.",
    pwDontMatch: "Passwords don't match.",
    isUnderFifteen: "Under 15 years old",
    isEighteen: "18",
};

document.addEventListener("submit", (e) => {
    e.preventDefault();
    validateForm();
});
