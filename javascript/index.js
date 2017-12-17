$(document).ready(function () {
  $("#submit").click(function () {
    $.ajax({
      type: "post",
      url : "../php/index.php",
      data : {
        "email" : $("#email").val(),
        "pw" : $("#pw").val()
      },
      dataType:"json",
      success : function(response) {
        if(response.result == true){
          location.href = './home.html';
        }
        else if(response.result == false){
          $("#fail").css("visibility","visible");
          setTimeout(function(){
            $("#fail").css("visibility","hidden");
          }, 1000);
        }
        else{

        }
      }
    });
  });

    $(".form-group").focusin(function () {
      $("h1").addClass("rainbow");
    })
});