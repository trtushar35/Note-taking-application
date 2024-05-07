<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
</head>

<body>

    <div class="container col-md-5 mt-5 mb-5 py-3 card shadow">
        <h2 style="text-align:center;">Sign Up Here</h2>
        <form action="{{route('registration.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                @error('name')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required>
                @error('email')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="integer" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Enter phone number" required>
                @error('phone')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                @error('password')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="py-1">
                <button type="submit" style="margin-left: 263px;" class="btn btn-success">Sign Up</button>
            </div>
            <div style="text-align: center;">
                <a href="">Already Account?</a>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>