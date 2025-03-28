document.addEventListener("DOMContentLoaded", function()
{

    const incorrectAnswerBtnOne = document.getElementById('incorrectAnswerBtnOne');
    const incorrectAnswerOne = document.getElementById('incorrectAnswerOne');
    const incorrectAnswerBtnTwo = document.getElementById('incorrectAnswerBtnTwo');
    const incorrectAnswerTwo = document.getElementById('incorrectAnswerTwo');
    const correctAnswerBtn = document.getElementById('correctAnswerBtn');
    const correctAnswer = document.getElementById('correctAnswer');


    incorrectAnswerBtnOne.addEventListener("click", function()
    {
        //divClear();
        console.log("Event started.")
        incorrectAnswerOne.classList.toggle('hiddenClass');
        console.log("Event finished");
    });

    incorrectAnswerBtnTwo.addEventListener("click", function()
    {
      //  divClear();
        console.log("Event started.")
        incorrectAnswerTwo.classList.toggle('hiddenClass');
        console.log("Event finished");
    });

    correctAnswerBtn.addEventListener("click", function()
    {
       // divClear();
        console.log("Event started.")
        correctAnswer.classList.toggle('hiddenClass');
        console.log("Event finished");
    });




})