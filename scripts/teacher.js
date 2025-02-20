document.addEventListener("DOMContentLoaded", function()
{

/* --- Assigning constant variables based on HTML IDs --- */
const classOneBtn = document.getElementById('classOneButton');
const classTwoBtn = document.getElementById('classTwoButton');
const classThreeBtn = document.getElementById('classThreeButton');
const element = document.getElementById('classDetails');
const classOneContent = document.getElementById('classOne');
const classTwoContent = document.getElementById('classTwo');
const classThreeContent = document.getElementById('classThree');

const addClassBtn = document.getElementById('addClassButton');
const classListContent = document.getElementById('classListSection');

classOneBtn.addEventListener("click", function()
{
    divClear();
    classToggle(classOneContent);
});

classTwoBtn.addEventListener("click", function()
{
    divClear();
    classToggle(classTwoContent);
});

classThreeBtn.addEventListener("click", function()
{
    divClear();
    classToggle(classThreeContent);
});

/* --- Will not work because the new class will need to be saved --- */
addClassBtn.addEventListener("click", function()
{
    var classButton = document.createElement("BUTTON");
    var buttonText = document.createTextNode("class test");
    classButton.appendChild(buttonText);
    classListContent.appendChild(classButton);
});

/* --- Clears the currently displayed content. --- */ 
function divClear()
{
    element.innerHTML = "";
    console.log("Content has been cleared");
}

/* --- Changes the hiddenClass property for the clicked button --- */
function classToggle(chosenClass)
{
    console.log("Begin classToggle method");
    let temp = chosenClass.cloneNode(true);
    temp.classList.remove('hiddenClass');
    element.appendChild(temp);
    console.log("New content should now be displayed.");
}

//Changes. 

})