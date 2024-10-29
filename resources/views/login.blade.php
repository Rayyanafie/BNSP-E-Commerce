<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="img/metrodata.jpg" alt="" style="width:400px;height:400px;padding-left: 80px">

                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="Post">
                                        <div class="form-group"> <input type="text" id="username" name="username"
                                                required placeholder="username"
                                                class="form-control form-control-user" />
                                        </div>
                                        <div class="form-group"> <input type="password" id="password" name="password"
                                                required placeholder="password"
                                                class="form-control form-control-user" />
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a href="{{ route('users.create') }}">Add New Product</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('users.create') }}">Add New Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>

</html>