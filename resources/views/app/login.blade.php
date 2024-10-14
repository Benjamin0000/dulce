<!DOCTYPE html>
<html lang="zxx" class="js">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Softnio">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
        <link rel="shortcut icon" href="/demo1/images/favicon.png">
        <title>Login | Dulce</title>
        <link rel="stylesheet" href="/assets/css/dashlite.css">
        <link id="skin-default" rel="stylesheet" href="/assets/css/theme.css">
    </head>
    <body class="nk-body bg-white npc-general  pg-auth" theme="light">
        <div class="nk-app-root">
            <div class="nk-main">
                <div class="nk-wrap nk-wrap-nosidebar">
                    <div class="nk-content">
                        <div class="bg-white">
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5 text-center">
                                    <a href="#" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="/logo.png" srcset="/logo.png" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="/logo.png" srcset="/logo.png" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title text-center">Sign In</h5>
                                    </div>
                                </div>
                                <div>
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach 
                                            </ul>
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger">
                                            <div>&#9432; {{session('error')}}</div>
                                        </div>
                                    @endif 
                                </div>
                                <form action="{{route('login')}}" method="POST" class="form-validate is-alter" autocomplete="off">
                                    <div class="form-group">
                                        <div class="form-label-group"><label class="form-label" >Username</label></div>
                                        <div class="form-control-wrap"><input autocomplete="off" value='{{old('username')}}' type="text" name="username" class="form-control form-control-lg" required placeholder="Enter your username"></div>
                                    </div> @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" id="togglePassword">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off" style="display:none;"></em>
                                            </a>
                                            <input autocomplete="new-password" type="password" name="password" class="form-control form-control-lg" required id="password" placeholder="Enter your password">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group"><button class="btn btn-lg btn-primary btn-block">Sign in</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('togglePassword').addEventListener('click', function (e) {
                e.preventDefault();
                const passwordInput = document.getElementById('password');
                const showIcon = this.querySelector('.icon-show');
                const hideIcon = this.querySelector('.icon-hide');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    showIcon.style.display = 'none';
                    hideIcon.style.display = 'inline';
                } else {
                    passwordInput.type = 'password';
                    showIcon.style.display = 'inline';
                    hideIcon.style.display = 'none';
                }
            });
        </script>
    </body> 
</html>