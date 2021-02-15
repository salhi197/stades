<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LsRapide</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>

        .login-container{
            margin-top: 5%;
            margin-bottom: 5%;
        }
        .btn:hover{
            background: #f05837;
        }

        .login-logo{
            position: relative;
            margin-left: -41.5%;
        }
        .login-logo img{
            position: absolute;
            width: 20%;
            margin-top: 19%;
            background: #282726;
            border-radius: 4.5rem;
            padding: 5%;
        }
        .login-form-1{
            padding: 9%;
            background:#7f72ea;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }
        .login-form-1 h3{
            text-align: center;
            margin-bottom:12%;
            color:#fff;
        }
        .login-form-2{
            padding: 9%;
            background: white;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }
        .login-form-2 h3{
            text-align: center;
            margin-bottom:12%;
            color: #fff;
        }
        .btn{
            border : 1px solid #f05837;
            background: #f05837;
        }
        .btnSubmit{
            font-weight: 600;
            width: 50%;
            color: #282726;
            background-color: #fff;
            border: none;
            border-radius: 1.5rem;
            padding:2%;
        }
        .btnForgetPwd{
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }
        .btnForgetPwd:hover{
            text-decoration:none;
            color:#fff;
        }

        </style>
    </head>
    <body>
    <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>
                        <img src="<?php echo e(asset('img/lsweb.jpg')); ?>" alt="" 
                            width="60%"
                        />
                    </h3>
                    <p class="text-white">
                    </p>                   
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Login</h3>
                        <?php if(isset($url)): ?>
                            <form method="POST" action='<?php echo e(url("login/$url")); ?>' aria-label="<?php echo e(__('Login')); ?>">
                        <?php else: ?>
                            <form method="POST" action="<?php echo e(route('login')); ?>" aria-label="<?php echo e(__('Login')); ?>">
                        <?php endif; ?>
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <input id="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Login"  />
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Login" />
                            </div>
                            <div class="form-group">

                            </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center" style="padding-top:15px;">
            Copyright©2021 
            </div>

        </div>

    </body>
</html>
