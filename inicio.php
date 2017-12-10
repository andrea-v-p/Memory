<html>
  <head>
    <title>Memory</title>
    <link rel="stylesheet" href="style.css">
    <script src="memory.js"></script> 
  </head>
  <body>
    <?php
      session_start();

      if(!isset($_SESSION["nick"])){
        echo ("<div id='nivel'>
          <form action='memory.php' method='post' >
            <input type='text' name='nick' required='true'>
            <select name='choice' id='selecion'>
              <option value='easy'>Facil 4X4</option>
              <option value='standard'>Normal 6X6</option>
              <option value='hard'>Dificil 8X8</option>
            </select>
            <input value='COMENZAR!' type='submit' id='start' name='start' />
          </form>
        </div>");
      }elseif (isset($_SESSION["nick"])) {
        echo ("<div id='nivel'>
          <form action='memory.php' method='post' >
            <input type='text' name='nick' value='".$_SESSION["nick"]."' readonly='true'>
            <select name='choice' id='selecion'>
              <option value='easy'>Facil 4X4</option>
              <option value='standard'>Normal 6X6</option>
              <option value='hard'>Dificil 8X8</option>
            </select>
            <input value='COMENZAR!' type='submit' id='start' name='start' />
          </form>
        </div>
         <a href='logout.php'><button>cambiar usuario</button></a>
      ");

    }
    ?>

   
  </body>
</html>
