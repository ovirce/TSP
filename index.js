document.addEventListener("DOMContentLoaded", function()
{
const studentBtn = document.getElementById('studentLogIn');
studentBtn.addEventListener("click", studentClick);

function studentClick()
{
    alert ("This should appear when button is clicked!");
}


})