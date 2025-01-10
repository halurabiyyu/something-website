<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Forgot Password - Something App</title>
    <style>
        body {
            font-family: 'Poppins';font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-body-tertiary">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="bg-white p-4 rounded-3 shadow d-flex flex-column justify-content-center align-items-center" style="width: min(90%, 400px);">
                <div>
                    <h1 class="text-center fw-bold">Reset Password</h1>
                    <p class="fs-6 fw-light text-center text-secondary">Please, input your email and password</p>
                </div>
                @if (session('status'))
                    <div class="alert alert-success p-2 w-100 text-center">
                        <p class="mb-0">{{session('status')}}</p>
                    </div>
                @endif
                <div class="w-100">
                    <form action="{{route('password.update')}}" method="POST" class="w-100">
                        @csrf
                        <input type="hidden" id="token" name="token" value="{{$token}}">
                        <label for="email" class="fs-6">Email</label>
                        <input type="email" id="email" name="email" placeholder="example@gmail.com" class="form-control mb-3" required>
                        <label for="password" class="fs-6">Password</label>
                        <input type="password" id="password" name="password" class="form-control mb-3" required>
                        @error('email')
                            <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-outline-primary px-4">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>