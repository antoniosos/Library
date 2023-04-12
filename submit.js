const userNameInput = document.getElementById("fname");
const surnameInput = document.getElementById("sname");
const passowordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");
const birthDateInput = document.getElementById("birthdate");
const warningField = document.getElementsByClassName("warning");
const sButton = document.getElementById("button"); 

//fajfku učitleka radila udělat tak že když je něco dobře je tam obrázek disply none

function validateForm()
{
    showWarning(validateNickname(), "fnameLength");
    showWarning(validateSurname(), "snameLength");
    showWarning(valitdatePassword(), "passwordWar");
    showWarning(validateAge(), "age");

}

function validateNickname()
{
    if(nicknameInput.value.length < 2)
    {
        return Warnings.fnameTooShort;
    }
    if(nicknameInput.value.length > 32)
    {
        return Warnings.fnameTooLong;
    }
}

function valitdatePassword()
{
    if((passowordInput.value.length < 6 || confirmPasswordInput.value.length < 6) &&
        (confirmPasswordInput.value.length > 0 || passowordInput.value.length > 0))
    {
        return Warnings.pwTooShort;
    }
    if(passowordInput.value != confirmPasswordInput.value)
    {
        return Warnings.pwDontMatch;
    }
}

function showWarning(warningMessage, id)
{
    let warningElement = document.getElementById(id);
    warningElement.textContent = warningMessage;
}

function playSound()
{
    console.log("sound played");
}

const Warnings = {
    fnameTooShort: "Name is too short.",
    fnameTooLong: "Name is too long.",
    lnameTooShort:"Last name is too short.",
    lnameTooLong: "Last name is too long.",
    pwTooShort: "Password is too short.",
    pwDontMatch: "Passwords don't match.",
    isUnderFifteen: "Under 15 years old",
    isEighteen: "18"
}

document.addEventListener('submit', (e) => {
    e.preventDefault();
})