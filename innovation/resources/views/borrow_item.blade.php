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
        img{
            height: 400px;
        }
        textarea{ 
            width: 700px; 
            min-width:700px; 
            max-width:700px; 

            height:400px; 
            min-height:400px;  
            max-height:400px;
        }
        #calendar{
             width: 800px;margin: auto;
         }
        iframe{
            width: 700px; 
            height:400px; 
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
                <a class="nav-link" href="service_item">กลับ</a> 
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
            <h3 align="center">ยืมสำเร็จ</h3> 
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
        <div class="alert alert-danger" role="alert">
            <h3 align="center">เฉพาะนักศึกษาและบุคลากรเท่านั้น</h3> 
        </div> 
    @elseif(session('status')==8)
        <div class="alert alert-danger" role="alert">
            <h3 align="center">กรุณาล็อคอิน</h3> 
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
    <!-- container -->
	<div style="background:#FFFACD;">
            <center> 
                <br><h3>ยืมอุปกรณ์</h3>
                <div class="card" style="margin:auto;background:#FFFACD;">
                    <div class="card-body"> 
                        <div class="row">
                            <div class="col-4" style="margin-left:200px;">
                            <h4>{{ $data_item->name }}</h4>
                            <img src="{{ $data_item->image }}"/>
                            </div>
                            <div class="col-8" style="margin-left:-200px;">
                            <h4>รายละเอียด</h4>
                            <textarea class="form-control textarea-autosize" readonly>{{ $data_item->detail }}</textarea>
                            </div>
                        </div><br><br>
                        <?php echo $data_item->video ?>
                        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/5rRMvyv-MIc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    </div>
                </div>
                <div class="card">
                    <center>
                    <div class="col">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-4" style="background:#3498DB;">
                            <br>
                                <form action="add_borrow_db" method="post">
                                {!! csrf_field() !!}
                                    <input type="hidden" value="{{ $data_item->item_id }}" name="item_id">
                                    <input type="hidden" value="{{session('user_id')}}" name="user_id">
                                    <h5>  <label for=""> วันที่เริ่มจอง  </label></h5> 
                                    <input type="date" id="date_start" name="date_start"><br><br>
                                    <h5>  <label for=""> วันที่สิ้นสุดจอง  </label></h5> 
                                    <input type="date" id="date_end" name="date_end"><br><br>
                                    <button type="submit" class="btn btn-success">ตกลง</button>
                                </form>
                            </div>
                            <div class="col-8">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                    </center>
                </div>
            </center> 
            
	</div>
    <!-- container -->
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
                @foreach($data_borrow as $data_borrow )
                    {
                    title: 'ถูกยืมแล้ว',
                    start: '{{$data_borrow->date_start}}',
                    end: addDays('{{$data_borrow->date_end}}'),
                    color: 'red',
                    textColor: 'white'
                    },
                @endforeach
            ],
        }
        
        );
          
         // แสดงปฏิทิน 
        calendar.setOption('height', 500);
        calendar.render();  
           
      });
      </script> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>