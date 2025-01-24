<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .login-container h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }
        .form-group label {
            font-weight: 600;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h3>{{$Sys_CompanyName}}</h3>
    <form action="{{ route('check_login') }}" method="POST">
   @csrf   

<input type="hidden" id="Sys_CompanyID" name="Sys_CompanyID" value="{{$Sys_CompanyID}}" >

        <div class="form-group">
            <label for="Staff_Code">Staff Code</label>
            <input type="text" class="form-control" id="Staff_Code" name="Staff_Code" required>
        </div>

     
        <div class="form-group">
            <label for="Staff_Pwd">Password</label>
            <input type="password" class="form-control" id="Staff_Pwd" name="Staff_Pwd" required>
        </div>
        @if ($errors->has('login_error'))
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{ $errors->first('login_error') }}
                        </div>
                    </div>
                    @endif

     
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@include('common.db_mdl')

</body>
</html>
