<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Agile Sphere- Login</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ asset('main.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        label {
            font-weight: bold;
            color: #333;
        }

    </style>
</head>

<body>


    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>
                        <form class="">
                            @csrf 
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Email</label>
                                <input name="email" id="email" placeholder="Enter Your Email" type="email"
                                    class="form-control">
                            </div>
                            <div class="position-relative form-group">
                                <label for="examplePassword" class="">Password</label>
                                <input name="password" id="password" placeholder="Enter your Password"
                                    type="password" class="form-control">
                            </div>
                            <div class="text-center">
                                <button id="login" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app.js') }}"></script>
</body>

</html>
