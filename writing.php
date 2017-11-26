<?php
  session_start();
  $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Memoires</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/device-camera-icon.png"/>
        <link rel="stylesheet" href="./libraries/jquery-ui.css">
        <link rel="stylesheet" href="./libraries/bootstrap.css">
        <link rel="stylesheet" href="./libraries/bootstrap-colorpicker.css">
        <link async href="http://fonts.googleapis.com/css?family=Passero%20One" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="./libraries/jquery-3.2.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type"text/javascript" src="./libraries/bootstrap-filestyle.js"></script>
        <script type="text/javascript" src="./libraries/bootstrap-colorpicker.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Space+Mono|Spirax|Anton|Pacifico|Cabin+Sketch|Sigmar+One" rel="stylesheet">
        <script>
            $(document).ready(function() {
                $("#Color_input").colorpicker();
                $("#fileUpload").on("change" , function () {
                    
                var tmppath = URL.createObjectURL(event.target.files[0]);
                $("#target_img").attr("src",tmppath);
                });
                
                $("#opacity").click(function () {
                    $("#target_img").css({
                        "opacity" : "+=0.1"
                    })
                   
                })
              
                $("#opacity-").click(function () {
                    $("#target_img").css({
                        "opacity" : "-=0.1"
                    })
                })
                $("#radius").click(function () {
                    $("#target_img").css({
                        "border-radius" : "+=50px"
                    })
                   
                })
              
                $("#radius-").click(function () {
                    $("#target_img").css({
                        "border-radius" : "-=50px"
                    })
                })
                
                $("#font_select").on("change" , function () {
                    
                    $("#font_select option").each(function () {
                    if($(this).is(':selected')){
                        $("form").find(".font_input").css({
                            fontFamily : $(this).val()
                        })
                        $("form").find(".font_input").css({
                            fontFamily : $(this).val()
                        })
                    }
                })
                })

                $("#Type_select").on("change" , function () {
                    
                    $("#Type_select option").each(function () {
                    if($(this).is(':selected')){
                        // alert($(this).val());
                        $("#target_img").css({
                            borderStyle : $(this).val()
                        })
                    }
                })
                })
                
                $("#Color_input").on("change" , function () {
                   var Color_value = $(this).val(); 
                //    alert(Color_value);
                   $("#target_img").css({
                        borderColor : Color_value
                   })
               
                })

                $("#Thick_input").on("change" , function () {
                   var Thick_value = $(this).val(); 
                //    alert(Thick_value);
                   $("#target_img").css({
                        borderWidth : Thick_value+"px"
                   })
               
                })

                $("#grayscale_select").on("change" , function () {
                    
                    $("#grayscale_select option").each(function () {
                    if($(this).is(':selected')){
                        $("#target_img").css({
                            filter : "grayscale("+$(this).val()+")"
                        })
                       
                    }
                })
                })

                $("#border_Apply").on('click',function () {
                    // var How_Thick = $('#Thick_input').val();
                    // var What_Type = $('#Type_select').val();
                    // var What_Color = $('#Color_input').val();

                  
                    $('#Thick_input').attr("disabled",true);
                    $('#Type_select').attr("disabled",true);
                    $('#Color_input').attr("disabled",true);
                    // form에 해당 변수값 전달.

                    
                })

                $("#border_Cancel").on('click',function () {
                    // var How_Thick = $('#Thick_input').val();
                    // var What_Type = $('#Type_select').val();
                    // var What_Color = $('#Color_input').val();

                    
                    $('#Thick_input').attr("disabled",false);
                    $('#Type_select').attr("disabled",false);
                    $('#Color_input').attr("disabled",false);
                    // form에 해당 변수값 전달.

                    
                })


                // 저장시 설정했던 CSS 밸류들이 저장됨.
                $("#sumbit_btn").click(function () {
                    var opacity_Val =  $("#target_img").css("opacity");
                })
              
                
            });
           
            // 이미지 효과 버튼 누를시 이미지.CSS 변경되는 스크립트 추가 예정.
       
        </script>
        <style>
            .grayscale_20{
                filter: grayscale(20%);
            }
            .grayscale_40{
                filter: grayscale(40%);
            }
            .grayscale_60{
                filter: grayscale(60%);
            }
            .grayscale_80{
                filter: grayscale(80%);
            }
            .grayscale_100{
                filter: grayscale(100%);
            }
            .btn-plus{
                background-color : #DDC5A2;
            }
            .btn-minus{
                background-color : #5D5B48;
            }
            .btn-alone{
                bakground-color : #FFFAFB
                
            }
            .Space_Mono{
                font-family : 'Space Mono', monospace;
            }
            .Amatic_SC{
                font-family : 'Amatic SC', cursive;
            }
            .Spirax{
                font-family : 'Spirax', cursive; 
            }
            .Anton{
                font-family: 'Anton', sans-serif;
            }
            .Pacifico{
                font-family: 'Pacifico', cursive;
            }
            .Cabin_Sketch{
                font-family: 'Cabin Sketch', cursive;
            }
            .Sigmar_One{
                font-family: 'Sigmar One', cursive;
            }
            .bg-1{
                background-color : #FFFAFB;
            }
            #profile_img{
                border-radius: 50%;
            }
            #target_img{
                width : 100%;
                height : 100%;
               
            }
            .form_container{
                width : 80%;
            }
            
            .container-fluid{
                height :100vh;
            }
            #submit_btn{
                margin-top : 20px;
            }
            .rect{
                width : 45%;
                height : 50px;
            }
             #font_select , #grayscale_select{
                margin-top : -43.5%;
                margin-bottom: 5%;
                height : 50px;
                
            } 
            .target_img_container{
                width : 1000px;
                height : 600px;
                margin : 0px auto;
                border-color: gray;
                
           
            }
            .card{
                margin-bottom : 4px;
            }
            .mar_B{
                margin-bottom : 5px;
            }
           
            
           
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="col-1"></div>
                <div class="collapse navbar-collapse">
                    <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/device-camera-icon.png" alt="" width="30" height="30">
                    <ul class="navbar-nav mr-auto" id="navbarText">
                        <li class="nav-item large">
                        <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item large">
                        <a class="nav-link" href="mymemories.php">My Memories</a>
                        </li>
                        <li class="nav-item large">
                        <a class="nav-link active" href="writing.php">Writing</a>
                        </li>
                       </ul>
                    <span class="navbar-text">
                    </span>
                </div>
                  
            <div class="col-2">
                       
                        <ul class="navbar-nav mr-auto">
                            <img id="profile_img" width="45" height="45" src="http://www.vogue.co.kr/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png" alt="">
                            <li class="nav-item large">
                                <a class="nav-link active" href=""><?= $name ?></a>
                            </li>
                        </ul>
            </div> 
                
            
            <div class="col-1" >
            <a href="logout.php"><span class="fa fa-sign-out fa-2x" style="color : white"></span></a>
            </div>
        </nav>
        <div class="container-fluid">
           
            <div class="row bg-1 h_100">
            
                   <div class="col-12 h_20">
                 
               </div>
                <div class="col-1"></div>
                <div class="col-10">

                
                    <div class="row bg-1 h_90 align-items-center">
                        
                        <div class="col-2 text-center">
                            <form action="writing.php" method="POST">
                                <div class="form-group">
                                    
                                        
                                        <select class="form-control-lg form-control" id="font_select">
                                        <optgroup label="Fonts..."></optgroup>    
                                        <option value="Space Mono" class="Space_Mono large" >Space Mono</option>
                                        <option value="Amatic SC" class="Amatic_SC large">Amatic SC</option>
                                        <option value="Spirax" class="Spirax large">Spirax</option>
                                        <option value="Anton" class="Anton large">Anton</option>
                                        <option value="Pacifico" class="Pacifico large">Pacifico</option>
                                        <option value="Cabin Sketch" class="Cabin_Sketch large">Cabin_Sketch</option>
                                        <option value="Sigmar One" class="Sigmar_One large">Sigmar_One</option>
                                        
                                        </select>
                                        <div class="card">
                                                <div class="card-body text-center">
                                                  <h4 class="card-title">Opacity</h4>
                                                  <p class="card-text">The level of transparency of an element</p>
                                                  <button type="button" id="opacity" class="rect btn btn-primary btn-sm">Opacity +</button>
                                                  <button type="button" id="opacity-" class="rect btn btn-danger btn-sm">Opacity -</button>
                                                </div>
                                        </div>
                                        <div class="card">
                                                <div class="card-body text-center">
                                                  <h4 class="card-title">Radius</h4>
                                                  <p class="card-text">Radius property is used to add rounded corners to an element.</p>
                                                  <button type="button" id="radius" class="rect btn btn-primary btn-sm ">radius +</button>
                                                  <button type="button" id="radius-" class="rect btn btn-danger btn-sm ">radius -</button>
                                                </div>
                                        </div>
                                        <div class="card">
                                                <div class="card-body text-center">
                                                    <h4 class="card-title">Colored Boder</h4>
                                                    <p class="card-text">Giving image to various types of border with color </p>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                  <input id="Thick_input" type="text" class="form-control mar_B" placeholder="Thickness(Number)" />
                                                            </div>

                                                            <div class="col-12">
                                                            <select class="form-control mar_B " id="Type_select">
                                                            <optgroup label="Types..."></optgroup>    
                                                            <option value="">Border Type</option>
                                                            <option value="solid" class="text-center" >solid</option>
                                                            <option value="dotted" class="">dotted</option>
                                                            <option value="double" class="">double</option>
                                                            <option value="ridge" class="">ridge</option>
                                                           
                                                                
                                                            </div>

                                                            <div class="col-12">
                                                                <input id="Color_input" type="text" class="form-control mar_B" placeholder="Color" />
                        
                                                                <button type="button" id="border_Apply" class="btn btn-success btn-sm btn-block">Apply</button>
                                                                <button type="button" id="border_Cancel" class="btn btn-danger btn-sm btn-block">Cancel</button>
                                                            </div>
                                                           
                                                        </div>
                                                      
                                                    </div>
                                                    
                                                    
                                                </div>
                                        </div>
                                        </div>
                                      
                                        
                                       
                                       
                                
                            </form>
                        </div>
                            <div class="col-8 text-center">
                            
                                <form action="writing.php" method="POST">    
                                        <div class="input-group input-group-lg">
                                        <span class="input-group-addon fa fa-pencil fa-3x"></span>
                                        <input name="subject" type="text" class="form-control font_input" placeholder="What Subject?">
                                        </div>

                                        
                                            <div class="target_img_container">
                                            <img id="target_img" class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3bB2Nnsn4WGGfywAwJ0NkQw_Br0emYjAzJZIhca9VZlZAh0IlZQ" alt="">
                                            </div>
                                       

                                        <div class="input-group input-group-lg">
                                        <span class="input-group-addon fa fa-calendar fa-3x"></span>
                                        <input  name="date" type="date" class="form-control font_input" placeholder="">
                                        </div>

                                        <div class="input-group input-group-lg">
                                        <span class="input-group-addon fa fa-comment fa-3x"></span>
                                        <input name="comment" type="text" class="form-control font_input" placeholder="Some Comments...">
                                        </div>
                                
                                    <label class="control-label">
                                    <input type="file" name="file" id="fileUpload" class="filestyle">
                                    </label>
                                    <button id="sumbit_btn" type="submit" class="btn btn-primary btn-lg">I Want To Save This</button>
                                </form>
                            </div>
                        <div class="col-2">
                            <div class="row algin-items-top"></div>
                                <form action="writing.php" method="POST">
                                        <div class="form-group">
                                          
                                                <label for="grayscale_select"></label>
                                                <select class="form-control-lg form-control" id="grayscale_select">
                                                 
                                                <option value="0%" class="large" >GrayScale(%)</option>   
                                                <option value="10%" class="large" >10%</option>
                                                <option value="20%" class="large">20%</option>
                                                <option value="30%" class="large">30%</option>
                                                <option value="40%" class="large">40%</option>
                                                <option value="50%" class="large">50%</option>
                                                <option value="60%" class="large" >60%</option>
                                                <option value="70%" class="large">70%</option>
                                                <option value="80%" class="large">80%</option>
                                                <option value="90%" class="large">90%</option>
                                                <option value="100%" class="large">100%</option>
                                                
                                                
                                                </select>
                                                
                                                
                                                <div class="card">
                                                        <div class="card-body text-center">
                                                          <h4 class="card-title">Special title treatment</h4>
                                                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                          <a href="#" class="btn btn-primary">Go somewhere</a>
                                                        </div>
                                                </div>
                                                <div class="card">
                                                        <div class="card-body text-center">
                                                          <h4 class="card-title">Special title treatment</h4>
                                                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                          <a href="#" class="btn btn-primary">Go somewhere</a>
                                                        </div>
                                                </div>
                                                <div class="card">
                                                        <div class="card-body text-center">
                                                          <h4 class="card-title">Special title treatment</h4>
                                                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                          <a href="#" class="btn btn-primary">Go somewhere</a>
                                                        </div>
                                                </div>
                                        </div>
                                        
                                    </form>
                        </div>
                        
                    </div>

                </div>
                <div class="col-1"></div>
                
            </div>

                    
        </div>
               
             
      
    </body>
    </html>