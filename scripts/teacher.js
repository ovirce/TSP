document.addEventListener("DOMContentLoaded", function()
{

/* --- Button and code for showing class one information --- */
const classOneBtn = document.getElementById('classOneButton');
const classTwoBtn = document.getElementById('classTwoButton');
const classThreeBtn = document.getElementById('classThreeButton');
const element = document.getElementById('classDetails');
const classOneContent = document.getElementById('classOne');
const classTwoContent = document.getElementById('classTwo');

classOneBtn.addEventListener("click", function()
{
    classToggle(classOneContent);
});

classTwoBtn.addEventListener("click", function()
{
    classToggle(classTwoContent);
});

function classToggle(chosenClass)
{
    chosenClass.classList.toggle('hiddenClass');
    chosenClass.replaceWith(chosenClass);
}

})