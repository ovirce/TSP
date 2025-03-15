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

const addClassFormBtn = document.getElementById('addClassFormButton');
const classListContent = document.getElementById('classListSection');
//const removeClassForm = document.getElementById('removeClassFormHidden');
const removeClassFormBtn = document.getElementById('removeClassFormButton');
const removalElement = document.getElementById('classRemovalSection');
const removeClassBtn = document.getElementById('removeClassButton');
let addClassForm = document.forms["addClassForm"];
submitClassBtn = document.getElementById('submitClassButton');

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
    classButton.classList.add("classButton");
    classButton.textContent = buttonText; 
    classListContent.appendChild(classButton);
}
/* --- Saves the created buttons using session storage. --- */
addClassFormBtn.addEventListener("click", function()
{
    addClassForm.classList.remove('hiddenClass');
})

submitClassBtn.addEventListener("click", setClassName);

function setClassName()
{
    let className = document.forms["addClassForm"]["className"].value;
    if (className == "")
    {
        alert("Please enter a class name.");
    }
    else
    {
        saveButton(className);
    }
}

function saveButton(className)
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

    let buttonText = className;
    savedButton.push(buttonText);
    localStorage.setItem('savedButton', JSON.stringify(savedButton)); //Converts the object into JSON. 
    buttonCreate(buttonText); 
    localStorage.clear(); //Removes the buttons created. 
}

removeClassFormBtn.addEventListener("click", function()
{
    console.log("Before class removal");
    removalElement.classList.remove('hiddenClass');
    console.log("After class removal");
});

removeClassBtn.addEventListener("click", function(event)
{
    event.preventDefault();
    var removedClass = document.getElementById('classNameID').value;
    removeClass(removedClass);
})

function removeClass(removedClass)
{
   /* var temp = document.querySelector(removedClass);
    if (temp)
    {
        console.log("If statement executed");
        alert("Class exists");
    }
    else
    {
        console.log("Else statement executed");
        alert("Class does not exist");
    }*/
    const savedButton = JSON.parse(localStorage.getItem('savedButton')) || []; //Converts the object from JSON back into button object
    const classButtons = document.getElementsByClassName("classButton"); //Finds all buttons with specific class name. 
    var temp = false; 
    for (let i = 0; i <= classButtons.length; i++) //Loop through all the buttons on the page. 
    {
        if (removedClass == classButtons[i].innerText) //If inputted text matches button innertext...
            {
                let warningText = "Warning: Removing a class will delete it permanently. Do you wish to continue?";
                if(confirm(warningText) == true)
                    {
                        warningText = "Class Successfully Removed";
                        alert(warningText);
                        console.log("If statement executed.")
                        //alert("Class exists.");
                        // var random = classButtons[i].innerText;
                        classButtons[i].remove(); //Remove button with matched name. 
                         // console.log("Random = " + random);
                        // localStorage.removeItem(random);
                        temp = true; 
                        break; 
                    }
                else
                    {
                        warningText = "Removal Cancelled";
                        alert(warningText);
                    }
            }
    }
    
    console.log("Value of boolean is: " + temp);
    if (temp)
    {
        let updatedButtons = savedButton.filter(button => button !== removedClass); //Filters through array, removing removedClass element. 
        localStorage.setItem('savedButton', JSON.stringify(updatedButtons)) //Updates the local storage. 
        //alert("Successful Removal");
       // console.log("Value of boolean in if statement: " + temp);
       // alert("Class does not exist");
    }
    else
    {
        console.log("Class does not exist.");
    }

  //  saveButton(classButtons);
      
    /*
    console.log("Before if statement:"+ removedClass);
    if (classListContent !== removedClass)
    {
        console.log("Else statement executed");
        alert("Class does not exist");
    }
    else
    {
        console.log("If statement executed");
        alert("Class exists");
    }
   
    /* if (removedClass == 1)
    {
        console.log("if statement");
        alert("Hi");
    }
    else
    {
        console.log("else statement");
        alert("Bye");
    }*/
};

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