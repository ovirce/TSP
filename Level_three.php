<!DOCTYPE html>
<header>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/levelStyle.css">
    <script src="scripts/index.js"></script>
    <title>16th Century Quest - Level 3</title>
  <body>

    <h1>16th Century Quest </h1>
    <h2>Level three</h2>
    <p>Which English Monarch tried to bring back Catholicism and is known as "Bloody Mary"?</p>

    <div class="imageRow">
    <div class="imageColumn">
        <button id="correctAnswerBtn" data-option="1">
          <img src="./images/mary.jpg" alt="Mary 1st">
        </button>
        <div id="correctAnswer" class="hiddenClass">
          <p>Correct! Mary Tudor/Mary I was the daughter of Henry the 8th and Catherine of Aragon.</p>
        </div>
      </div>

      <div class="imageColumn">
        <button id="incorrectAnswerBtnOne" data-option="2">
          <img src="./images/anne.jpg" alt="Anne of Cleeves">
        </button>
        <div id="incorrectAnswerOne" class="hiddenClass">
          <p>Incorrect, This is Anne of Cleeves, Henry the 8th 4th Wife.</p>
        </div>
      </div>
    
      <div class="imageColumn">
        <button id="incorrectAnswerBtnTwo" data-option="3">
          <img src="./images/elizabeth.jpg" alt="Queen Elizabeth">
        </button>
        <div id="incorrectAnswerTwo" class="hiddenClass">
          <p>Incorrect, this is Queen Elizabeth, the daughter of Henry the 8th and his second wife Anne Boleyn. She had a 44 year reign between 1558 - 1608. </p>
       </div> 
      </div>
    </div>

    <div id="timer">
      <h id="timerCountdown"></h>
      <img src="./images/timer.png" alt="timer">
      </div>

    <div id="playAgainContainer" class="hiddenClass">
      <h2>Play again?</h2>
      <button onclick ="window.location.href='Level_two.php'">Yes</butto>
      <button onClick ="window.location.href='studentPage.php'">Return to Student Page</button>
    </div>

    <div class="buttons-container">
      <button onclick="window.location.href='index.php'">Log Out</button>
      <button onclick="window.location.href='index.php'">Sign Out</button>
      <button onclick="window.location.href='studentPage.php'">Finish Game</button>
    </div>


    <script src="scripts/level3.js"></script>
  </body>
</header>

  