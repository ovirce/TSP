/*document.addEventListener("DOMContentLoaded", function()
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
})*/

document.addEventListener("DOMContentLoaded", function() {
    const answerButtons = document.querySelectorAll('.imageColumn button');
    const timer = setTimeout(finishedTimer, 5000);
    const level = 1; // Hardcoded for level 1
    let countdownTime = 6;

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


    answerButtons.forEach(btn => {
        btn.addEventListener("click", function() {
            const selectedOption = this.dataset.option;

            // Show feedback based on the selected option
            if (selectedOption === "1") {
                document.getElementById("incorrectAnswerOne").classList.remove("hiddenClass");
                document.getElementById("correctAnswer").classList.add("hiddenClass");
                document.getElementById("incorrectAnswerTwo").classList.add("hiddenClass");
            } else if (selectedOption === "2") {
                document.getElementById("correctAnswer").classList.remove("hiddenClass");
                document.getElementById("incorrectAnswerOne").classList.add("hiddenClass");
                document.getElementById("incorrectAnswerTwo").classList.add("hiddenClass");
            } else if (selectedOption === "3") {
                document.getElementById("incorrectAnswerTwo").classList.remove("hiddenClass");
                document.getElementById("incorrectAnswerOne").classList.add("hiddenClass");
                document.getElementById("correctAnswer").classList.add("hiddenClass");
            }

            // Disable all buttons after selection
            answerButtons.forEach(button => button.disabled = true);

            // Send the answer to the server
            fetch('record_answer.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ level: level, selectedOption: selectedOption })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => console.log('Answer recorded:', data))
            .catch(error => console.error('Error:', error));
        });
    });
});