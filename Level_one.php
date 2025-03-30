
<!DOCTYPE html>
<header>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/levelStyle.css">
    <script src="scripts/index.js"></script>
    
  <body>

  <title><h1>16th Century Quest </h1></title>
   
    <title>Login Form</title>
    <h2>Level one</h2>
    <p> What type of fabric did the wealthy people in the 16th century often wear?</p>
    
<div class="imageRow">
  <div class="imageColumn">
    <button id="incorrectAnswerBtnOne">
      <img src="./images/Wool.png" alt="woolfabric">
    </button>
    <div id="incorrectAnswerOne" class="hiddenClass">
      <p>False, Wool was also worn and was much more affordable in the 16th century then in the 21st,  which made it a common item for peasants to wear aswell</p>
    </div>
  </div>

  <div class="imageColumn">
    <button id="correctAnswerBtn">
      <img src="./images/velvet.jpg" alt="velvet fabric">
    </button>
    <div id="correctAnswer" class="hiddenClass">
      <p>Correct! Tudor Kings and Queens wore the most expensive fabrics such as silk, velvet and satin</p>
    </div>
  </div>
 
  <div class="imageColumn">
    <button id="incorrectAnswerBtnTwo">
      <img src="./images/Denim.png" alt="denim fabric">
    </button>
    <div id="incorrectAnswerTwo" class="hiddenClass">
      <p>False, denim fabric originated in 17th century France </p>
   </div> 
  </div>
</div>

<div class="buttons-container">
    <button onclick="window.location.href='index.php'">Log Out</button>
    <button onclick="window.location.href='Level_two.php'">Next Level</button>
    <button onclick="window.location.href='index.php'">Quit</button>
    <button onclick="window.location.href='studentPage.php'">Return to Student Page</button>
</div>

    </div>
    <script src="scripts/level.JS"> </script>
  </body>

