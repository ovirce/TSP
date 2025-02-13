document.addEventListener("DOMContentLoaded", function()
{
const teacherBtn = document.getElementById('teacherLogin');
const studentBtn = document.getElementById('studentLogin');

/* --- Activates function when student submit button is clicked. --- */
studentBtn.addEventListener("click", function(event) 
{
 //  alert ("alert");
    event.preventDefault();
    let studentForm = document.forms["studentForm"];   
    let username = document.forms["studentForm"]["studentUsername"].value;   
    let password = document.forms["studentForm"]["studentPassword"].value; 
    inputValidation(studentForm, username, password, "student"); 
});

/* --- Activates function when teacher submit button is clicked. --- */ 
teacherBtn.addEventListener("click", function(event)
{
    event.preventDefault();
    let teacherForm = document.forms["teacherForm"];
    let username = document.forms["teacherForm"]["teacherUsername"].value; 
    let password = document.forms["teacherForm"]["teacherPassword"].value; 
    inputValidation(teacherForm, username, password, "teacher");
});

/* --- Checks that there is a value for the form's username and password. --- */ 
function inputValidation(form, username, password, page)
{
    //let teacherForm = document.forms["teacherForm"]; 
    if (username == "" || password == "")
    {
        alert ("Error: Missing username or password");
        form.reset(); 
        return false;
    }
    else
/* --- Switch statement for opening correct page, based on passed variable. --- */ 
    switch (page)
    {
    case "student":
        studentClick();
        form.reset();
        break;
    case "teacher":
        teacherClick();
        form.reset();
    }
}

/* --- Method for opening webpage. --- */ 
function teacherClick()
{
    window.location.href = "teacherpage.html";
}

function studentClick()
{
    alert("This webpage does not exist");
}


/* --------- waiting for HTML files ---------------

function createAnAccountClick()
{
    window.location.href = "accountCreation.html";
}

function guestClick()
{
    window.location.href = "gamePage.html";
}
*/

})