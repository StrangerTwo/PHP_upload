<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Upload Souboru</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
    <style>
        #dropZone {
            height: 150px;
            background-color: #eee;
            margin: 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: larger;
            font-width: bold;
            font-family: 'Varela Round', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method='post' class="form-group row"
              action='process.php' enctype='multipart/form-data'>
            <div class="form-group">
                <label class="form-control" for="file">Select file to upload:</label>
                <input class="form-control" id="file" type="file" name="uploadedName"/>
                <div id="dropZone">Drop your files here</div>
            </div>
            <input class="mt-3 btn btn-primary" type="submit" value= "Nahrát" name="submit" />
        </form>
    </div>
    <script src="drag_drop.js">

    </script>
</body>
</html>