$(document).ready(function(){

    $('.thembutton').click(function(){
        $('#background-popup').removeClass('hide');
        $('#popup-them').removeClass('hide');

    });

    $('.btnLuu').click(function(){
        alert($('#tenNhomHang').val())
    })

    $('.btnHuy').click(function(){
        $('#background-popup').addClass('hide');
        $('#popup-them').addClass('hide');
    })
})
