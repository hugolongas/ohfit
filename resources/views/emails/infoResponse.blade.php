<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        body{
            padding:0px;
            margin:0px;
            font-family: 'verdana',sans-serif;
        }
        .header{
            width: 100%;
            height:60px;
            background-color:#000000;
        }
        .footer {
            margin-top:20px;
            width: 100%;
            height:70px;
            background-color:#000000;
        }
    </style> 
</head>
<body>     
    <div class="header">
        <a style="display: block;width: 220px;margin: 0 auto;" href="{{route('home')}}" target="_blank">
            <img style="width: 150px;margin: 0 auto;" src="https://ohfit.barcelona/img/logo.png">
        </a>
    </div>
    <div class="main" style="text-align: left;width: 60%;margin: 0 auto;">        
       <p>{!! nl2br(e($mes)) !!}</p>
    </div>
    <div class="footer">
    </div>
</body>
</html>