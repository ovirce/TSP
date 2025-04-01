<!DOCTYPE html>
<header>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/levelStyle.css">
    <title>16th Century Quest - Level 2</title>
  <body>
    
    <h1>16th Century Quest </h1>
     <h2>Level two</h2>
     <p>Who was the famous English playwright born in 1564?</p>

     <div class="imageRow">
      <div class="imageColumn">
        <button id="incorrectAnswerBtnOne" data-option="1">
          <img src="./images/martin-luther.jpg" alt="Martin Luthor">
        </button>
        <div id="incorrectAnswerOne" class="hiddenClass">
          <p>Incorrect, this is Martin Luther who started the Protestant Reformation in 1517.</p>
        </div>
      </div>
    
      <div class="imageColumn">
        <button id="incorrectAnswerBtnTwo" data-option="2">
          <img src="./images/henry8.jpg" alt="Henry 8th">
        </button>
        <div id="incorrectAnswerTwo" class="hiddenClass">
          <p>Incorrect, this is Tudor King Henry the 8th. </p>
       </div> 
      </div>
    
      <div class="imageColumn">
        <button id="correctAnswerBtn" data-option="3">
          <img src="./images/shakespeare.jpg" alt="Shakespeare">
        </button>
        <div id="correctAnswer" class="hiddenClass">
          <p>Correct! William Shakespeare wrote famous plays such as Romeo and Juliet, Hamlet and The Tempest...</p>
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
      <button onclick="window.location.href='Level_three.php'">Next Level</button>
      <button onclick="window.location.href='index.php'">Sign Out</button>
      <button onclick="window.location.href='studentPage.php'">Return to Student Page</button>
    </div>
    

    <script src="scripts/level2.js"> </script>
  </body>
</header>

