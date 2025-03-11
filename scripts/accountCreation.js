document.addEventListener("DOMContentLoaded", function()
{

const registrationBtn = document.getElementById('registration');

registrationBtn.addEventListener("click", function(event)
{
    event.preventDefault();
    let accountCreationForm = document.forms["accountCreationForm"];
    let username = document.forms["accountCreationForm"]["username"].value;
    let email = document.forms["accountCreationForm"]["email"].value;
    let password = document.forms["accountCreationForm"]["password"].value;
    let repeatedPassword = document.forms["accountCreationForm"]["repeatPassword"].value;
    checkPassword(password, repeatPassword);
    inputValidation(accountCreationForm, email, username, password);
});

function checkPassword(password, repeatPassword)
{
    if (password != repeatPassword)
    {
        alert("Passwords do not work");
    }
    else
    {
        return password; 
    }
}

function inputValidation(form, email, username, password)
{
    if (username == "" || email =="" || password == "")
    {
        alert("Field is missing an input."); 
    }
    else
    {
        alert("Account successfully created");
        form.reset();
    }
}






})