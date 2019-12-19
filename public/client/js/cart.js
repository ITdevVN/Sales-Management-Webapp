$(document).ready(function(){
    $('.cart-add').click(function(){
        var ID=parseInt($(this).attr("id").match(/\d+/));
        var makh=parseInt($('.makh_hidden').attr("id").match(/\d+/));
        //Truyền ID sản phẩm, id khách hàng lấy từ session, số lượng mặc định là 1
        $('.cart-add').attr('href','homepage/themvaogiohang/'+makh+'/'+ID+'/1')
    })

    $('.themgiohang_hethang_quickview').click(function(){
        var IDD=parseInt($(this).attr("id").match(/\d+/));
    })

    //Xử lý khi click nút thanh toán
    $('#thanhtoan-client').click(function(){
        var makh=parseInt($('.makh_hidden').attr("id").match(/\d+/));
        $('#thanhtoan-client').attr('href','homepage/thanhtoan/'+makh);
    })

    $('.button-remove').click(function(){
        var sanpham=parseInt($(this).attr("id").match(/\d+/));
        var makh=parseInt($('.makh_hidden').attr("id").match(/\d+/));
        $('.button-remove').attr('href','homepage/xoasanpham/'+sanpham+'/'+makh);
    })
})
