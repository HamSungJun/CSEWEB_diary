<!DOCTYPE html>
<html lang="en">
<head>
    <title>Memoires</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/device-camera-icon.png"/>
    <link rel="stylesheet" href="./libraries/jquery-ui.css">
    <link rel="stylesheet" href="./libraries/bootstrap.css">
    <link async href="http://fonts.googleapis.com/css?family=Passero%20One" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="./libraries/jquery-3.2.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./libraries/bootstrap-filestyle.js"></script>
    <script>
        $(document).ready(function () {

        $(".form-group").focusin(function () {
            $("h1").addClass("rainbow");

        })

        $("#findpw").click(function () {
            $("#email").prop("disabled" , false)
          
            
        })
        $("#findid").click(function () {
            $("#email").prop("disabled" , true)
            $("#email").val("");
        })
        });


    </script>
    <style>

        .bg-1{
            background-color : #1abc9c;
        }
        .container-fluid{
            height : 100vh;
        }
        .H_20{
            height : 20%;
        }
        .H_100{
            height : 100%;
        }
        .monitor{
            /* border: 2px solid tomato; */
            height : 460px;
            background: linear-gradient(45deg, tomato 25%,
                white 25%, white 50%, 
                tomato 50%, tomato 75%, 
                white 75%);
            padding : 0px;
            background-size:100px 100px;
            
        }
        .contentbox{
            height : 360px;
            width : 540px;
            background-color : white;
            margin-top : 50px;
            margin-left : 50px;
        }   
       

    </style>
</head>
<body>
<form action="find.php" method="POST" enctype="multipart/form-data">
<div class="container-fluid">
<div class="row align-items-center bg-primary fixed-top">
    <div class="col-md-1"></div>
  <div class="col-md-1 bg-primary text-center">
    <a href="index.html"><button type="button" class="btn btn-light" aria-label="Left Align">
        <span class="fa fa-home fa-3x" aria-hidden="true"></span>
    </button></a>
  </div>
  <div class="col-md-8 text-center bg-primary">
    <h1>Find ID/PW</h1>
  </div>
  <div class="col-md-2 bg-primary"></div>
</div>

<div class="row align-items-center bg-1 H_100">

    <div class="col-md-1"></div>

    <div class="col-md-4">



              <div class="form-group">
                  <label for="name"><h3>User Name:</h3></label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Put your name...">
              </div>
              <div class="form-group">
                  <label for="birthday"><h3>BirthDay (YYYY-MM-DD):</h3></label>
                  <input type="date" name="birthday" class="form-control" id="birthday">
              </div>
              <div class="form-group">
                  <label for="phone_num"><h3>Phone Number (OOO-OOOO-OOOO):</h3></label>
                  <input type="text" name="phone_num" class="form-control" id="phone_num" placeholder="Put your phone number...">
              </div>
              <!-- visible when finding Password -->
              <div class="form-group">
                  <label for="email"><h3>User email</h3></label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Put your email...">
              </div>

              <div class="row">
                  
                   
                    <div class="col-3">
                            <button type="button" class="btn btn-light btn-lg btn-block" id="findid">Find ID</button>
                    </div>
                    <div class="col-3">
                            <button type="button" class="btn btn-dark btn-lg btn-block" id="findpw">Find PW</button>
                    </div>
                    <div class="col-3">
                            <button type="button" class="btn btn-danger btn-lg btn-block" id="clear">Clear</button>
                    </div>
                    <div class="col-3">
                            <button type="submit" class="btn btn-success btn-lg btn-block" id="submit">Submit</button>
                    </div>

                 
              </div>




      </div>

    <div class="col-md-2"></div>

    <div class="col-md-4">
        <div class="row align-items-center">
            <div class="col-12 monitor">
                <!-- 내부 모니터에 등장할 텍스트는 PHP를 통해 나타내 주세요 -->
                <div class="row contentbox align-items-center">
                    
                <p></p>

                </div>
            </div>
        </div>
    </div>


            

    <div class="col-md-1"></div>

</div>

</div>
</form>
</body>
</html>
