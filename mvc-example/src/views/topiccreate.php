<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/mvc-example/public/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Bootstrap images -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Document</title>
</head>
<body>
<div class="container mt-5">

<form method="post">
    <div>
        <label for="nameField" class="form-label">Title: </label>
        <input id="nameField" class="form-control" name="title">
    </div>
    <div>
        <label for="descriptionSurname" class="form-label">Description: </label>
        <textarea id="descriptionSurname"  class="form-control" name="description"></textarea>
    </div>
    <div>
        <label for="imageURLField" class="form-label">Image URL: </label>
        <input id="imageURLField"  class="form-control" name="imageUrl">
    </div>
    <div>
        <label for="newsReferenceField" class="form-label">News Topic reference: </label>
        <input id="newsReferenceField" class="form-control" name="newsReference">
    </div>
    <button class="btn btn-primary mt-3">Create topic</button>
</form>
</div>
</body>
</html>