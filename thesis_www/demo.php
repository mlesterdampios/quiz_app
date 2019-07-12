<!DOCTYPE html>
<html>
  <head>

    <meta name="viewport" content="user-scalable=1.0,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

    <title>pell</title>

    <link rel="stylesheet" type="text/css" href="dist/pell.css">

    <style>
      body {
        margin: 0;
        padding: 0;
      }

      .content {
        box-sizing: border-box;
        margin: 0 auto;
        max-width: 600px;
        padding: 20px;
      }

      #html-output {
        white-space: pre-wrap;
      }
    </style>

  </head>
  <body>
    <?php
      if(isset($_POST['textareafield'])){
        echo $_POST['textareafield'];
      }
    ?>
    <form action="demo.php" method="post">
    <div class="content">
      <h1>pell</h1>
      
        <div id="editor" class="pell" name="textareafield"></div>
        <input type="submit" value="Submit">
      
      <div style="margin-top:20px;">
        <h3>Text output:</h3>
        <div id="text-output"></div>
      </div>
      <div style="margin-top:20px;">
        <h3>HTML output:</h3>
        <textarea type="text" id="html-output" name="textareafield"></textarea>
      </div>
    </div>
    </form>
    <script src="dist/pell.js"></script>
    <script>
      var editor = window.pell.init({
        element: document.getElementById('editor'),
        defaultParagraphSeparator: 'p',
        onChange: function (html) {
          document.getElementById('text-output').innerHTML = html
          document.getElementById('html-output').textContent = html
        }
      })
    </script>

  </body>
</html>
