document.addEventListener("DOMContentLoaded", function()
{
const teacherBtn = document.getElementById('teacherLogin');
teacherBtn.addEventListener("click", function(event)
{
    event.preventDefault();
    teacherClick();
});

function teacherClick()
{
    alert ("This should appear when button is clicked!");
    window.location.href = "teacherpage.html";
}


})