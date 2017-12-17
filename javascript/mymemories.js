var JSONDATA;

var Font = Array();
var GrayScale = Array();
var Opacity = Array();
var Radius = Array();
var Border_Thick = Array();
var Border_Type = Array();
var Border_Color = Array();
var Subject = Array();
var Date = Array();
var Comment = Array();
var File = Array();
var Hits = Array();
window.onload = function () {

    Image_Call();

    $("#page_Up").on("click", function () {

        var Y = $(window).scrollTop();
        var body = $("html, body");
        body
            .stop()
            .animate({
                scrollTop: Y - 800
            }, 500, 'swing', function () {});

    });
    $("#page_Down").on("click", function () {

        var Y = $(window).scrollTop();
        var body = $("html, body");
        body
            .stop()
            .animate({
                scrollTop: Y + 800
            }, 500, 'swing', function () {});

    })

    $("#Img_Container").on("mouseover", ".img_div", function () {
        $(this).addClass("blueBorder");
    })
    $("#Img_Container").on("mouseleave", ".img_div", function () {
        $(this).removeClass("blueBorder");
    })
    $("#Img_Container").on("click", ".img_div", function () {
        var Path_val = $(this)
            .children()
            .attr("src");

        $.ajax({
            type: "post",
            url: "../php/hitadder.php",
            data: {
                "Path": Path_val
            },
            dataType: "json",
            success: function (response) {

                for (var i = 0; i < response.Hits.length; i++) {

                    Hits[i] = response.Hits[i];

                }

            }
        });

        var index_num = index_Checker(Path_val);

        var Font_val = Font[index_num];

        var GrayScale_val = GrayScale[index_num];

        var Opacity_val = Opacity[index_num];

        var Radius_val = Radius[index_num];

        var Border_Thick_val = Border_Thick[index_num];
        var Border_Type_val = Border_Type[index_num];
        var Border_Color_val = Border_Color[index_num];
        var Subject_val = Subject[index_num];
        var Date_val = Date[index_num];
        var Comment_val = Comment[index_num];
        var Hits_val = Hits[index_num];

        $("#Subject").text(Subject_val);
        $("#Comment").text(Comment_val);
        $("#final_img").attr("src", Path_val);
        $("#Date").text(Date_val);
        $("#HIT_NUM").text(Hits_val);

        $("#final_img").css({
            "filter": "grayscale(" + GrayScale_val + ")",
            "Opacity": Opacity_val,
            "border-radius": Radius_val,
            "borderWidth": Border_Thick_val,
            "borderColor": Border_Color_val,
            "borderStyle": Border_Type_val,
            "width": "500px",
            "height":"310px",
            "margin-bottom": "20px"

        })


        $("#Subject , #Date , #HIT_NUM , #Comment").css({
            "fontFamily": Font_val,
            "fontSize" : "20px"
        })

        $("#myModal").modal("show");

    })

}
function index_Checker(Path) {
    for (i = 0; i < File.length; i++) {
        if (File[i] == Path) {
            return i;
        }
    }
}

function Image_Call() {

    $.ajax({
        type: "post",
        url: "../php/Image_Json_Generator.php",
        dataType: "json",
        success: function (response) {

            JSONDATA = response;
            for (i = 0; i < JSONDATA.IMAGE.length; i++) {
                Font[i] = JSONDATA
                    .IMAGE[i]
                    .Font;
                GrayScale[i] = JSONDATA
                    .IMAGE[i]
                    .GrayScale;
                Opacity[i] = JSONDATA
                    .IMAGE[i]
                    .Opacity;
                Radius[i] = JSONDATA
                    .IMAGE[i]
                    .Radius;
                Border_Thick[i] = JSONDATA
                    .IMAGE[i]
                    .Border_Thick;
                Border_Type[i] = JSONDATA
                    .IMAGE[i]
                    .Border_Type;
                Border_Color[i] = JSONDATA
                    .IMAGE[i]
                    .Border_Color;
                Subject[i] = JSONDATA
                    .IMAGE[i]
                    .Subject;
                Date[i] = JSONDATA
                    .IMAGE[i]
                    .Date;
                Comment[i] = JSONDATA
                    .IMAGE[i]
                    .Comment;
                File[i] = JSONDATA
                    .IMAGE[i]
                    .Path;
                Hits[i] = JSONDATA
                    .IMAGE[i]
                    .Hits;
            }

            Image_Maker(response);

        }

    });
}

function Image_Maker(JSONOB) {

    JSONOB
        .IMAGE
        .reverse();
    for (i = 0; i < JSONOB.IMAGE.length; i++) {

        var new_Img_div = document.createElement("div");
        new_Img_div.setAttribute("class", " col-2 text-center img_div ");
        var Img = document.createElement("img");
        Img.setAttribute("class", "img-thumbnail img_size");
        Img.setAttribute("src", JSONOB.IMAGE[i].Path);
        var Select = JSONOB.IMAGE[i].Path;
        
        if(Select.charAt(Select.length-1)=="."){
            Img.setAttribute("src", "../materials/img/default.png");
        }
  
        
        new_Img_div.appendChild(Img);
        $("#Image_pointer").after(new_Img_div);

    }
}
