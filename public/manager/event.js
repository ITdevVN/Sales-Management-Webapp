$(document).ready(function(){
    $('.nav-item,.nav-item>a').hover(function(){
        $(this).css({
            'background-color':'rgb(39,130,192)',
            'color':"white"
        });
    },function(){
        $(this).css('background-color','rgb(46,148,218)');
    });

    //Click vào vai trò
    $('.div_vaitro').click(function(e){
        $('.background-popup').removeClass('hide');
        console.log($(e.target))

        // if ($(e.target).closest('.vaitro_popup').length)
        // return;
        // else{
        // $('.background-popup').click(function(){
        //     $('.background-popup').addClass('hide');
        // })
        // }
        if ($(e.target).hasClass("background-popup")){
            console.log($(e.target))
            $('.background-popup').addClass('hide');
        }
    })

})
