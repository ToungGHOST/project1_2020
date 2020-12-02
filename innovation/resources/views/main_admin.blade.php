<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/specimen/Anton">
    <title>Innovation</title>
    <style>
        .carousel-item{
            height: 600px;
        } 
        .carousel-item img{
            display: block;
            height: 100%;
            margin: auto;
        }
        .text{
            height: 300px;
        }
        .service{
            height: 500px;
        }
        .service p{
            font-size:50px;
            color:white;
            margin-bottom:-20px;
        }
        .event{
            height: 500px;
        }
        .event p{
            font-size:50px;
            color:white;
            margin-bottom:-20px;
        }
        .contact{
            height: 300px;
        }
        .contact p1{
            font-size:50px;
            color:white;
            margin-bottom:-20px;
        }
        .contact p2{
            font-size:30px;
            color:white;
            margin-bottom:-20px;
        }
        .coffee{
            height:200px;
            margin: auto;
            margin-top: 50px;
        }
        .what{
            height:300px;
            margin: auto;
        }
        .card{
            height:300px;
            width:400px;
            margin: auto;
            margin-top: 50px;
        }
        .card img{
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand my-auto " href="home"><h1>INOVATION PARK</h1></a>
            </li>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#add_admin" href="">เพิ่ม admin</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" >{{ session('user_name') }}</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout">ออกจากระบบ</a> 
            </li>
        </ul>
    </nav>
    <!-- navbar -->
    <!-- alert -->
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <h4 align="center">ข้อมูลไม่ครบถ้วน</h4> 
            @foreach ($errors->all() as $error)
                <h5 align="center">{{ $error }}</h5>
            @endforeach
        </div>
    @endif
    @if (session('status')==1)
        <div class="alert alert-success" role="alert">
            <h3 align="center">สมัครสำเร็จ</h3> 
        </div>   
    @elseif(session('status')==2)
        <div class="alert alert-danger" role="alert">
            <h3 align="center">เกิดข้อผิดพลาด</h3> 
        </div> 
    @elseif(session('status')==3)
        <div class="alert alert-danger" role="alert">
            <h3 align="center">รหัสผ่านไม่ตรงกัน</h3> 
        </div> 
    @elseif(session('status')==4)
        <div class="alert alert-danger" role="alert">
            <h3 align="center">มีชื่อผู้ใช้นี้อยู่แล้ว</h3> 
        </div> 
    @elseif(session('status')==5)
        <div class="alert alert-danger" role="alert">
            <h3 align="center">รหัสผ่านไม่ถูกต้อง</h3> 
        </div> 
    @elseif(session('status')==6)
        <div class="alert alert-danger" role="alert">
            <h3 align="center">ไม่มีชื่อผู้ใช้นี้</h3> 
        </div> 
    @endif
    <!-- alert -->
    <!-- Modal add admin -->
    <form method="post" action="add admin">
    {!! csrf_field() !!}
        <div class="modal fade" id="add_admin" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >เพิ่ม admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <input name="username" type="text" placeholder="ชื่อผู้ใช้" require><br><br>
                        <input name="password" type="password" placeholder="รหัสผ่าน" require><br><br>
                        <input name="con_password" type="password" placeholder="ยืนยันรหัสผ่าน" require><br><br>
                        <input name="first_name" type="text" placeholder="ชื่อ" require><br><br>
                        <input name="last_name" type="text" placeholder="นามสกุล" require><br><br>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ตกลง</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal add admin -->
    <!-- body -->
    <div class="container">
        <div class="row">
            <div class="col">
                <center>
                    <a href="item">
                        <img src="img/icons/camera.png"/>
                        <p>อุปกรณ์</p>
                    </a>
                </center>
            </div>
            <div class="col">
                <center>
                    <a href="room">
                        <img src="img/icons/camera.png"/>
                        <p>จัดการห้อง</p>
                    </a>
                </center>
            </div>
            <div class="col">
                <center>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                        <p>***********</p>
                    </a>
                </center>
            </div>
            <div class="col">
                <center>
                    <a href="news">
                        <img src="img/icons/camera.png"/>
                        <p>ข่าวสาร</p>
                    </a>
                </center>
            </div>
        </div>
    </div>
    <!-- body -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>