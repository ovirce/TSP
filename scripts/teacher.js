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
const removeClassForm = document.getElementById('removeClassFormHidden');
//const removeClassBtn = document.getElementById('removeClassButton');
const removalElement = document.getElementById('classRemoval');

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

function buttonLoad()
{
    let savedButton =  JSON.parse(localStorage.getItem('savedButton')) || [];
   // savedButton.forEach(text => buttonCreate(text));
    savedButton.forEach(function(text)
    {
        buttonCreate(text);
    });
}

function buttonCreate(buttonText)
{
    var classButton = document.createElement("BUTTON");
    classButton.textContent = buttonText; 
    classListContent.appendChild(classButton);
}
/* --- Will not work because the new class will need to be saved --- */
addClassBtn.addEventListener("click", function()
{
    const savedButton = JSON.parse(localStorage.getItem('savedButton')) || []; //Converts the object from JSON back into button object. 
   // localStorage.setItem(classButton, JSON.stringify(savedButton));
  /*   let currentClassNo = 3; 
     for (i = 3; i < savedButton.length; i++)
     {
        console.log("Entered loop");
        let buttonText = "Class" + i; 
        return buttonText; 
     }*/
   // let buttonText = `Class ${savedButton.length + 1}`; 
   // let buttonText = `Class ${currentClassNo + 1}`; 
    /*let buttonText = 0;
    foreach(savedButon)
    {
         buttonText++; 
    }*/ 
   // console.log("Left loop");

    let buttonText = `Class ${savedButton.length + 1}`;
    savedButton.push(buttonText);
    localStorage.setItem('savedButton', JSON.stringify(savedButton)); //Converts the object into JSON. 
    buttonCreate(buttonText); 
    localStorage.clear(); //Removes the buttons created. 
});

removeClassForm.addEventListener("click", function()
{
    console.log("Before class removal");
    removalElement.remove('removeClassFormHidden');
    console.log("After class removal");
});

/*removeClassBtn.addEventListener("click", function()
{
    
});*/

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

buttonLoad();
//Changes. 

})