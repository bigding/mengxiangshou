$(function () {
    /*控制步骤的数量*/
    for (var i = 4; i < 11; i++) {
        $(".step-num-" + i).hide();
    }
    $("#step-num").change(function () {
        var stepNum = parseInt($(this).val());
        for(var j = 1     ; j < 11; j++){
            if(j < stepNum +1)
                $(".step-num-" + j).show();
            else
                $(".step-num-" + j).hide();
        }
    })
})