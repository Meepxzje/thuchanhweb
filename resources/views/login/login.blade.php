<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VM Login</title>
    <link rel="stylesheet" href="{{ asset('asset_login/login.css') }}">
    <link rel="stylesheet" href="{{ asset('thongbao.css') }}">
    <link href="{{asset('admin')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_login')}}/login.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="{{asset('admin')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body>
    <h2>Vinn Meep xin chào </h2>
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    <script>
        swal("Đăng ký thành công!", "Ấn vào nút bên dưới", "success");
    </script>
    </div>
    @endif
    <div> <br></div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('login.dangky') }}" method="post">
                @csrf
                <h1>Tạo tài khoản</h1>
                <div class="social-container">
                </div>
                <span>Sử dụng email của bạn để đăng ký</span>
                <input type="text" placeholder="Name" name="name" />
                <input type="email" placeholder="Email" name="email" />
                <input type="password" placeholder="Password " name="password" />
                <button type="submit">Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post" action="{{ route('login.dangnhap') }}">
                @csrf
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    @if ($message = Session::get('error'))
                    <div class="custom-alert">
                        <div class="alert alert-danger">
                            <strong>{{$message}}</strong>
                        </div>
                    </div>
                    @endif
                </div>
                <span>Hoặc đăng ký bằng Email của bạn</span>
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <script>
                        swal("Email này đã được đăng ký!", "Ấn vào nút bên dưới để đăng nhập", "warning");
                    </script>
                    @endforeach
                </div>
                @endif
                <input type="email" placeholder="Email" name="email" />
                <input type="password" placeholder="Password" name="password" />
                <button type="submit">Đăng nhập</button>

                <u><a href="/"><span>Trở về trang chủ</span></a></u>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng bạn!</h1>
                    <p>Để kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost" id="signIn">Đăng Nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn</h1>
                    <h3>(～￣▽￣)～</h3>
                    <p>Nhập thông tin của bạn và bắt đầu hành trình với chúng tôi</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Đồ án chuyên ngành</i> của
            <a target="_blank" href="https://www.facebook.com/mt.meep">Huỳnh Nhật Viên & Trịnh Minh Thuận</a>
            - Chi tiết xin liên hệ
            <a target="_blank" href="https://www.facebook.com/nhatvien.2605/">tại đây</a>.
        </p>
    </footer>
    <script src="{{ asset('asset_login/login.js') }}"></script>
</body>

</html>
