<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Saloh Compiler</title>
    <style type="text/css" media="screen">
        body {
            overflow: hidden;
        }

        #editor {
            margin: 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            font-size: 20pt;
        }

        #run {
            top: 0;
            right: 0;
            position: absolute;
            z-index: 1000;
            background-color: #32CD32;
            color: white;
            padding: 8px 15px;
        }
        #clear{
            top: 0;
            right: 0;
            position: absolute;
            z-index: 1000;
            background-color: #F3240E;
            color: white;
            padding: 8px 15px;
        }

        #view {
            background-color: #313D4D;
            width: 100%;
            height: 40%;
            position: absolute;
            z-index: 100;
            left: 0px;
            right: 0px;
            bottom: 0px;
        }

        #result{
            background-color: #313D4D;
            width: 100%;
            height: 90%;
            color: #ffffff;
            position: relative;
            padding: 20px;
            left: 0px;
            right: 0px;
            bottom: 0px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <pre id="editor"></pre>
    <button id="run">RUN</button>
    <div id="view">
        <textarea id="result" readonly>
        </textarea> 
        <button id="clear">Clear</button>
    </div>

    <script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/vibrant_ink");
        editor.session.setMode("ace/mode/php");
    </script>
    <script>
          $("#clear").on("click", function() {
            document.getElementById("result").innerHTML="";
          });
            $("#run").on("click", function() {
                //alert("Hello");
            
                var code = editor.getValue();

                $.ajax({
                    type: 'POST',
                    url: "compiler.php",
                    data: { 
                        "code" : code,
                    },
                    success: function(result) {
                        document.getElementById("result").innerHTML=result;
                    },
                });
            });
    </script>
    

</body>

</html>