var Font_Val;
var GrayScale_Val;
var Opacity_Val;
var Radius_Val;
var Border_Thick_Val;
var Border_Type_Val;
var Border_Color_Val;
var Subject_Val;
var Date_Val;
var Comment_Val;
var File_Path_Val;

$(document).ready(function () {

    $("#Color_input").colorpicker();
    $("#fileUpload").on("change", function () {

        var tmppath = URL.createObjectURL(event.target.files[0]);
        File_Path_Val = tmppath;
        $("#target_img").attr("src", tmppath);
    });

    $("#opacity").click(function () {
        $("#target_img").css({"opacity": "+=0.1"});
        Opacity_Val = $("#target_img").css("opacity");

    });

    $("#opacity-").click(function () {
        $("#target_img").css({"opacity": "-=0.1"})
        Opacity_Val = $("#target_img").css("opacity");

    });
    $("#radius").click(function () {
        $("#target_img").css({"border-radius": "+=50px"})
        Radius_Val = $("#target_img").css("border-radius");
    });

    $("#radius-").click(function () {
        $("#target_img").css({"border-radius": "-=50px"})
        Radius_Val = $("#target_img").css("border-radius");
    });

    $("#font_select").on("change", function () {

        $("#font_select option").each(function () {
            if ($(this).is(':selected')) {
                $("div")
                    .find(".font_input")
                    .css({fontFamily: $(this).val()})
                Font_Val = $(this).val();
            }
        });
    });

    $("#Type_select").on("change", function () {

        $("#Type_select option").each(function () {
            if ($(this).is(':selected')) {
                $("#target_img").css({borderStyle: $(this).val()})
                Border_Type_Val = $(this).val();
            }
        });
    });

    $("#Color_input").on("change", function () {
        var Color_value = $(this).val();
        $("#target_img").css({borderColor: Color_value});
        Border_Color_Val = Color_value;
    });

    $("#Thick_input").on("change", function () {
        var Thick_value = $(this).val();
        $("#target_img").css({
            borderWidth: Thick_value + "px"
        });
        Border_Thick_Val = Thick_value + "px";
    });

    $("#grayscale_select").on("change", function () {

        $("#grayscale_select option").each(function () {
            if ($(this).is(':selected')) {
                $("#target_img").css({
                    filter: "grayscale(" + $(this).val() + ")"
                });
                GrayScale_Val = $(this).val();
            }
        });
    });

    $("#border_Apply").on('click', function () {
        $('#Thick_input').attr("disabled", true);
        $('#Type_select').attr("disabled", true);
        $('#Color_input').attr("disabled", true);
    });

    $("#border_Cancel").on('click', function () {
        $('#Thick_input').attr("disabled", false);
        $('#Type_select').attr("disabled", false);
        $('#Color_input').attr("disabled", false);
    });

    $("#submit_btn").click(function () {
        
        if(File_Path_Val!=undefined){
            

            Subject_Val = $("#subject").val();
            Date_Val = $("#date").val();
            Comment_Val = $("#comment").val();

            var Input_Json_Ob = {
                "Font": Font_Val,
                "GrayScale": GrayScale_Val,
                "Opacity": Opacity_Val,
                "Radius": Radius_Val,
                "Border_Thick": Border_Thick_Val,
                "Border_Type": Border_Type_Val,
                "Border_Color": Border_Color_Val,
                "Subject": Subject_Val,
                "Date": Date_Val,
                "Comment": Comment_Val,
            };

            $.ajax({
                type: "post", url: "./php/Image_Saver.php", data: Input_Json_Ob,
                success: function (response) {
                    alert("당신의 추억을 저장했습니다.");
                }
            });
         }else{
             alert("이미지는 반드시 넣어주세요");
         }
    
    });
});
