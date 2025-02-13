document.addEventListener("DOMContentLoaded", function()
{
const teacherBtn = document.getElementById('teacherLogin');
//Activates function when submit button is clicked.
teacherBtn.addEventListener("click", function(event)
{
    event.preventDefault();
    inputValidation();
});

//Checks that there is a value for the teacher's username and password.
function inputValidation()
{
    let userName = document.forms["teacherForm"]["teacherUsername"].value; 
    let password = document.forms["teacherForm"]["teacherPassword"].value; 
    if (userName == "" || password == "")
    {
        alert ("Error: Missing username or password");
        return false;
    }
    else
    {
        teacherClick();
    }
}

//Open teacher webpage. 
function teacherClick()
{
    window.location.href = "teacherpage.html";
}

})