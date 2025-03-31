document.addEventListener("DOMContentLoaded", function()
{
    let countdownTime = 6;
    const incorrectAnswerBtnOne = document.getElementById('incorrectAnswerBtnOne');
    const incorrectAnswerOne = document.getElementById('incorrectAnswerOne');
    const incorrectAnswerBtnTwo = document.getElementById('incorrectAnswerBtnTwo');
    const incorrectAnswerTwo = document.getElementById('incorrectAnswerTwo');
    const correctAnswerBtn = document.getElementById('correctAnswerBtn');
    const correctAnswer = document.getElementById('correctAnswer');
   // const questionsAndAnswers = document.getElementById('questionsAndAnswers');
    var timerCountdown = document.getElementById('timerCountdown');
  //  const timer = setTimeout(finishedTimer, 5000);
    

    setInterval(timer, 1000);
    function timer()
    {
        if (countdownTime > 0)
        {
        console.log("hello");
        countdownTime--;
        console.log(countdownTime);
        timerCountdown.textContent = "Seconds left: " + countdownTime;
        }

        else
        {
           timerCountdown.textContent = "Timer has finished";
           playAgainMessage();
        }
           
    }
   // timerCountdown.innerHTML = time; 
    function playAgainMessage()
    {
        let playAgainContainer = document.getElementById('playAgainContainer');
        playAgainContainer.classList.remove('hiddenClass'); 
    }

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