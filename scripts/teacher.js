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
    divClear();
    //classToggle(classOneContent);
});

classTwoBtn.addEventListener("click", function()
{
    classToggle(classTwoContent);
});

function divClear()
{
    element.innerHTML = "Hello";
}

function classToggle(chosenClass)
{
   /* const temp = chosenClass; //stored as temp. 
    chosenClass.innerHTML = "";
    chosenClass.classList.toggle('hiddenClass');
    temp.classList.toggle('hiddenClass');*/
    
    

   /* if (!chosenClass.innerHTML)
    {
        alert("Something");
    }
    else
    {
        chosenClass.classList.toggle('hiddenClass');
        chosenClass.replaceWith(chosenClass);
    }*/
}



})