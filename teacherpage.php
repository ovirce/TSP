<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Page</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="home_page.php">Home</a></li>
            <li><a href="students.html">Students</a></li>
            <li><a href="teacher.html" class="active">Class Management</a></li>
        </ul>
    </nav>

    <main>
        <!-- Sidebar containing the list of classes -->
        <aside class="classList">
            <h2>Your Classes</h2>
            <ul id="classListSection">
                <li class="classButton"><button id="classOneButton">Class One</button></li>
                <li class="classButton"><button id="classTwoButton">Class Two</button></li>
                <li class="classButton"><button id="classThreeButton">Class Three</button></li>
            </ul> 
            <button id="addClassButton">Add Class</button>
            <button id="removeClassFormButton">Remove Class</button>
        </aside>
        
        <!-- Section to display class details -->
        <section id="classDetails">
            <h2>Class Details</h2>
            <div id="details">Select a class to view details.</div>
            <div id="classOne" class="hiddenClass">
                <p>Class one information </p>
            </div>
            <div id="classTwo" class="hiddenClass">
                <p>Class two information.</p>
            </div>
            <div id="classThree" class="hiddenClass">
                <p>Class three information.</p>
            </div>
        </section>

        <section id="classRemovalSection" class="hiddenClass">
          <!--  <div id="classRemoval" class="hiddenClass"> --> 
                <form id="classRemovalForm">
                    <!-- <div class="form-group"> -->
                        <input type="text" placeHolder="Enter class name" name="className" id="classNameID">
                    <!-- </div> -->
                        <button type="submit" form="classRemovalForm" id="removeClassButton" value="Submit">Remove Class</button>         
                </form>
           <!-- </div> --> 
        </section>
    </main>
    <script src="scripts/teacher.js"></script>
</body>
</html>
