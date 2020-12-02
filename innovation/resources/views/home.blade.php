<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
        .service p1{
            font-size:20px;
        }
        .service a{
            margin: auto;
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
            height:200px;
            margin: auto;
        }
        .card{
            height:300px;
            width:400px;
            margin: auto;
            margin-top: 50px;
        }
        .card img{
            height:150px;
            width:120px;
            display: block;
            margin: auto;
  
        }
        .room{
            margin-top:20px;
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
            @if(session('user')!='admin')
            <li class="nav-item">
                <a title="service" href="#service" class="nav-link" href="">บริการ</a> 
            </li>
            <li class="nav-item">
                <a title="event" href="#event" class="nav-link" href="">กิจกรรม</a> 
            </li>
            <li class="nav-item">
                <a title="contact" href="#contact" class="nav-link" href="">ติดต่อ</a> 
            </li>
            @endif
            @if(session('user')==null)
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#login" href="">เข้าสู่ระบบ</a> 
            </li>
            @else
                @if(session('user')=='admin')
                <li class="nav-item">
                    <a class="nav-link" href="main_admin">หน้าเมนู admin</a> 
                </li>
                @endif
                @if(session('user')=='user')
                <li class="nav-item">
                    <a class="nav-link" href="main_user">บริการของฉัน</a> 
                </li>
                @endif
            <li class="nav-item">
                <a class="nav-link" >{{ session('user_name') }}</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout">ออกจากระบบ</a> 
            </li>
            @endguest
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
    <!-- Modal login -->
    <form method="post" action="login">
    {!! csrf_field() !!}
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login">เข้าสู่ระบบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <input name="username" type="text" placeholder="ชื่อผู้ใช้" require>
                        <input name="password" type="password" placeholder="รหัสผ่าน" require>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#register">สมัครสมาชิก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ตกลง</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal login -->
    <!-- Modal register -->
    <form method="post" action="register">
    {!! csrf_field() !!} 
        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="register">สมัครสมาชิก</h5>
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
                        <input name="phone" type="text" placeholder="เบอร์โทรศัพท์" require><br><br>
                        <input name="email" type="text" placeholder="อีเมล" require>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#login">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ตกลง</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal register -->
    <!-- poster -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @if ($data_news=="[]")
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            @elseif ($data_news!="[]")
                @for ($i = 0; $i < count($data_news); $i++)
                    @if ($i==0)
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i ?>" class="active"></li>
                    @else
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i ?>"></li>
                    @endif
                @endfor
            @endif
        </ol>
        <div class="carousel-inner">
            @if ($data_news=="[]")
                <div class="carousel-item active">
                    <img src="img/icons/camera.png">
                </div>
            @elseif ($data_news!="[]")
                <?php $i=0; ?>
                @foreach ($data_news as $data_news)
                    @if ($i==0)
                        <div class="carousel-item active">
                            <img src="{{$data_news->news_img}}">
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{$data_news->news_img}}">
                        </div>
                    @endif
                    <?php $i++; ?>
                @endforeach
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- poster -->
    <!-- Text -->
    <section id="text" style="background:#239B56;" class="text">
		<div class="container">
            <div class="row">
                <img class="what"  src="img/icons/text.png" alt="" />
                <img class="coffee" src="img/icons/coffee-cup.png" alt="" />
            </div>
		</div>
	</section>
    <!-- Text -->
    <!-- service -->
    <section id="service" style="background:#F39C12;" class="service">
		<div class="container">
            <center> 
                <br><p>บริการ</p>
            </center>
            <div class="row">
                <a href="serviceroom">
                    <div class="card">
                        <div class="card-body">
                            <div class="room">
                            <img  src="img/icons/meeting_room.png"  style="width:%;" alt=""/><br>
                            </div>
                            <center><p1>บริการห้อง</p1></center>
                        </div>
                    </div>
                </a>
                <a href="service_item">
                    <div class="card">
                        <div class="card-body">
                            <img src="img/icons/camera.png" alt="" /><br>
                            <center><p1>ยืมอุปกรณ์</p1></center>
                        </div>
                    </div>
                </a>
            </div>
		</div>
	</section>
    <!-- service -->
    <!-- event -->
    <section id="event" style="background:#F1C40F;" class="event">
		<div class="container">
            <center> 
                <br><p>กิจกรรม</p>
            </center>
            <div class="row-6">
                <center>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                    <a href="">
                        <img src="img/icons/camera.png"/>
                    </a>
                </center> 
            </div>
		</div>
	</section>
    <!-- event -->
    <!-- contact -->
    <section id="contact" style="background:#3498DB;" class="contact">
		<div class="container">
            <center> 
                <br><p1>ติดต่อ</p1><br>
                <a href="">
                    <img style="width:100px;background:white;" src="img/icons/facebook.png"/>
                </a><br>
                <p2>E-MAIL : xxxxxxxx@kkumail.com</p2><br>
                <p2>PHONE : xxx-xxxxxxx</p2>
            </center>
		</div>
	</section>
    <!-- contact -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>