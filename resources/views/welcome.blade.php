<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Something App</title>
    <style>
        body {
            font-family: 'Poppins';font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-body-tertiary" style="height: 100vh">
        <div class="bg-white mt-2 p-2 d-flex justify-content-between">
            <div>
                <h3>Home</h3>
            </div>
            <div>
                <a href="{{route('login')}}" class="btn btn-outline-primary">Login</a>
            </div>
        </div>
        <div class="text-center d-flex justify-content-center align-items-center" style="height: 90%">
            <h1>Something...</h1>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>