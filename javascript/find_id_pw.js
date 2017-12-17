$(document).ready(function () {
    input_Controller(1);

    $(".form-group").focusin(function () {
        $("h1").addClass("rainbow");

    });

    $("#findpw").click(function () {
        input_Controller(3);
        $("#guide").text("");
        $("#guide").text("YOUR PW IS");
        $("#value").text("");
        
    });
    $("#findid").click(function () {
        input_Controller(2);
        $("#email").val("");
        $("#guide").text("");
        $("#guide").text("YOUR ID IS");
        $("#value").text("");
    });

    $("#clear").click(function () { 
        $("#name").val("");
        $("#birthday").val("");
        $("#phone_num").val("");
        $("#email").val("");
     });

    $("#submit").click(function () {
        
        var GetAllData = getdata();
        JSON.stringify(GetAllData);
        
        $.ajax({

            type: "post",
            url: "./php/find.php",
            data: GetAllData,
            dataType: "json",
            success: function($JSON_ID){
                // alert("잘 왔어요");
                var MYID = JSON.stringify($JSON_ID);
                var slice = MYID.slice(8,MYID.length-3);
                // alert(slice);
                $("#value").text(slice);
            }
        });
     });
});

    function getdata() {
        var DataOB = {};

        if($("#email").val() == ""){   
            DataOB = {
                name : $("#name").val(),
                birthday : $("#birthday").val(),
                phone_num : $("#phone_num").val()
            }
            return DataOB;
        }

        else{
            DataOB = {
                name : $("#name").val(),
                birthday : $("#birthday").val(),
                phone_num : $("#phone_num").val(),
                email : $("#email").val()
            }
            return DataOB;
        }
    }

    function input_Controller(switch_num) {
        switch (switch_num) {
            // initial state
            case 1:
            $("#name").prop("disabled",true);
            $("#birthday").prop("disabled",true);
            $("#phone_num").prop("disabled",true);
            $("#email").prop("disabled",true);
                break;
            // find id
            case 2:
            $("#name").prop("disabled",false);
            $("#birthday").prop("disabled",false);
            $("#phone_num").prop("disabled",false);
            $("#email").prop("disabled",true);   
                break;
            //  find pw
            case 3:
            $("#name").prop("disabled",false);
            $("#birthday").prop("disabled",false);
            $("#phone_num").prop("disabled",false);
            $("#email").prop("disabled",false);    
            break;   
        }
    }