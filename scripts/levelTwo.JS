document.addEventListener("DOMContentLoaded", function() {
    const answerButtons = document.querySelectorAll('.imageColumn button');
    const level = 2; // Hardcoded for level 2

    answerButtons.forEach(btn => {
        btn.addEventListener("click", function() {
            const selectedOption = this.dataset.option;

            // Show feedback based on the selected option
            if (selectedOption === "1") {
                document.getElementById("incorrectAnswerOne").classList.remove("hiddenClass");
                document.getElementById("correctAnswer").classList.add("hiddenClass");
                document.getElementById("incorrectAnswerTwo").classList.add("hiddenClass");
            } else if (selectedOption === "2") {
                document.getElementById("incorrectAnswerTwo").classList.remove("hiddenClass");
                document.getElementById("correctAnswer").classList.add("hiddenClass");
                document.getElementById("incorrectAnswerOne").classList.add("hiddenClass");
            } else if (selectedOption === "3") {
                document.getElementById("correctAnswer").classList.remove("hiddenClass");
                document.getElementById("incorrectAnswerOne").classList.add("hiddenClass");
                document.getElementById("incorrectAnswerTwo").classList.add("hiddenClass");
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
