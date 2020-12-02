<?php
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/specimen/Anton">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link href='<?=$fullcalendar_path?>/core/main.css' rel='stylesheet' />
    <link href='<?=$fullcalendar_path?>/daygrid/main.css' rel='stylesheet' />
 
    <script src='<?=$fullcalendar_path?>/core/main.js'></script>
    <script src='<?=$fullcalendar_path?>/daygrid/main.js'></script>
    <title>Service</title>
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
            color: black;
            margin-bottom:-20px;
        }
 
        .contact{
            height: 250px;
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
                <a class="nav-link" href="home">กลับ</a> 
            </li>
        @if(session('user_name')!=null)
            <li class="nav-item">
                <a class="nav-link" >{{ session('user_name') }}</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout">ออกจากระบบ</a> 
            </li>
        @elseif(session('user_name')==null)
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#login" href="">เข้าสู่ระบบ</a> 
            </li>
        @endif
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
    @elseif(session('status')==7)
        <div class="alert alert-success" role="alert">
            <h3 align="center">ท่านได้จองห้องแล้ว</h3> 
        </div>
    @elseif(session('status')==8)
        <div class="alert alert-danger" role="alert">
            <h3 align="center">กรุณาล็อคอิน</h3> 
        </div>
    @elseif(session('status')==9)
        <div class="alert alert-danger" role="alert">
            <h3 align="center">เฉพาะนักศึกษา</h3> 
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

    <!-- service -->
    <section id="service" style="background:#FFFACD;" class="service">
		<div class="container">
            <center> 
                <br><p>จองห้อง</p>
            </center>
            <form action="add_room_db" method="post" enctype="multipart/form-data" >
            <div class="row">
                <div class="card">
                    <div class="card-body">
                     {!! csrf_field() !!}
                     <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                     <input type="hidden" name="admin_id" value="0">
                     <input type="hidden" name="status" value="0">
                    <h5> <label for="">เลือกห้องที่ต้องการใช้งาน</label> </h5>
                        <input type="radio" id="room0" name="room_name" value="ห้องโถงกลาง จำนวน 30 ที่นั่ง">
                        <label for="room0"> ห้องโถงกลาง จำนวน 30 ที่นั่ง</label><br>

                         <input type="radio" id="room1" name="room_name" value="ห้องประชุม 1 จำนวน 10 ที่นั่ง">
                        <label for="room1">ห้องประชุม 1 จำนวน 10 ที่นั่ง</label><br>

                         <input type="radio" id="room2" name="room_name" value="ห้องประชุม 2 จำนวน 10 ที่นั่ง">
                        <label for="room2"> ห้องประชุม 2 จำนวน 10 ที่นั่ง</label><br>

                         <input type="radio" id="room3" name="room_name" value="ห้องสตูดิโอ จำนวน - ที่นั่ง">
                        <label for="room3"> ห้องสตูดิโอ จำนวน - ที่นั่ง </label>
      
                    </div>
                </div>
                <div class="card">
                <center>
                    <div class="card-body">
                    <h5>  <label for=""> วันที่เริ่มจอง  </label></h5> 
                    <input type="date" id="datetimestart" name="date_startR"><br><br>
                    <h5>  <label for=""> วันที่สิ้นสุดจอง  </label></h5> 
                    <input type="date" id="datetimeend" name="date_endR"><br><br>
                    <input type="radio" id="event" name="room_event" value="จัดกิจกรรม">
                    <label for="event">จัดกิจกรรม</label>
                    <input type="radio" id="meet" name="room_event" value="จัดประชุม">
                    <label for="meet">ประชุม</label><br>
                    <button type="submit" class="btn btn-success">ตกลง</button>
                </center>

                
                    </div>
                </div>
              
                
            </div>
            </form>
		</div>
	</section>
    <!-- service -->
    <!-- calenda -->
    <center> 
                <h1>ตารางห้อง</h1>
    </center>
    <div id='calendar'></div>
    <script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="crossorigin="anonymous"></script>
    <script type="text/javascript">
        function addDays(date) {
            var result = new Date(date);
            return result;
        }
        $(function(){
          // กำหนด element ที่จะแสดงปฏิทิน
        var calendarEl = $("#calendar")[0];
 
          // กำหนดการตั้งค่า
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid' ],
            displayEventTime: false,
            events: [
                @foreach($data_room1 as $data_room1 )
                    {
                    title: 'ถูกจองแล้ว',
                    start: '{{$data_room1->date_startR}}',
                    end: addDays('{{$data_room1->date_endR}}'),
                    color: 'red',
                    },
                @endforeach
            ],
        }
        
        );
          
         // แสดงปฏิทิน 
 
        calendar.render();  
           
      });
      </script> 
    <!-- calenda -->

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>