$(function () {
    /*用ajax来完成删除功能*/
    $(".infoDelete").click(function () {
        $that = $(this);
        $.post("./userInfo-delete.php",{
            id_type:$(this).attr("data-type"),
            sql:$(this).attr("data-sql"),
            id:$(this).attr("data-id")
        },function (data,textStatus) {
            // console.log(data);
            htmlcode = "<div class='notice'></div>";
            $("body").before(htmlcode);
            $(".notice")
                .css({
                    "position": "absolute",
                    "top": "100px",
                    "right": "0px",
                    "height": "auto",
                    "width": "auto",
                    "padding": "15px",
                    "color": "rgba(0, 0, 0, 0.69)",
                    "font-size": "20px",
                    "border-radius": "4px",
                    "z-index": "100",
                    "background-color": "rgba(255, 126, 77, 0.73)"
                });
            if(data == "1"){
                $that.parents("tr").remove();
                $(".notice")
                    .html("已成功删除数据记录!");
            }
            else{
                $(".notice")
                    .html("发生了错误请再次尝试!");
            }
            $(".notice").animate({"opacity":"0"},0,function () {
                $(this).animate({"opacity":"1"},500,function () {
                    $(this).delay(200).animate({"opacity":"0"},500)
                })
            })
        })

    });
});