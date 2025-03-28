document.addEventListener("DOMContentLoaded", function()
{

    const incorrectAnswerBtnOne = document.getElementById('incorrectAnswerBtnOne');
    const incorrectAnswerOne = document.getElementById('incorrectAnswerOne');
    const incorrectAnswerBtnTwo = document.getElementById('incorrectAnswerBtnTwo');
    const incorrectAnswerTwo = document.getElementById('incorrectAnswerTwo');
    const correctAnswerBtn = document.getElementById('correctAnswerBtn');
    const correctAnswer = document.getElementById('correctAnswer');
    const questionsAndAnswers = document.getElementById('questionsAndAnswers');

    incorrectAnswerBtnOne.addEventListener("click", function()
    {
        console.log("Event started.")
        incorrectAnswerOne.classList.toggle('hiddenClass');
        console.log("Event finished");
        incorrectAnswerTwo.classList.add('hiddenClass');
        correctAnswer.classList.add('hiddenClass');
    });

    incorrectAnswerBtnTwo.addEventListener("click", function()
    {
        console.log("Event started.")
        incorrectAnswerTwo.classList.toggle('hiddenClass');
        console.log("Event finished");
        incorrectAnswerOne.classList.add('hiddenClass');
        correctAnswer.classList.add('hiddenClass');
    });

    correctAnswerBtn.addEventListener("click", function()
    {
        console.log("Event started.")
        correctAnswer.classList.toggle('hiddenClass');
        console.log("Event finished");
        incorrectAnswerOne.classList.add('hiddenClass');
        incorrectAnswerTwo.classList.add('hiddenClass');
    });




})