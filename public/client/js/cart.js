$(document).ready(function(){
    $('.cart-add').click(function(){

        var masp=parseInt($(this).attr("id").match(/\d+/));
        var soluong=1;
        var makh=parseInt($('.makh_hidden').attr("id").match(/\d+/));
        $.ajax({
            type: "GET",
            url: 'http://localhost:82/DoAnWeb/public/client/homepage/themvaogio',
            data: {'masp':masp,'makh':makh,'soluong':soluong}, // gửi dữ liệu từ form qua controller

            success: function(res){
                //Trả về kết quả trên giỏ hàng
                $('#thongtingiohang').html(res[0]);
                $('#cart-online').html(res[1]);
            },
            error: function(res){
                alert("Xuất hiện lỗi: "+res);
            }

        });
    })

    $('.themgiohang_hethang_quickview').click(function(){
        var IDD=parseInt($(this).attr("id").match(/\d+/));
    })

    //Xử lý khi click nút thanh toán
    // $('#thanhtoan-client').click(function(){
    //     var makh=parseInt($('.makh_hidden').attr("id").match(/\d+/));
    //     $('#thanhtoan-client').attr('href','http://localhost:82/DoAnWeb/public/client/homepage/thanhtoan/'+makh);
    // })

    //Xử lý khi nhấn remove
    $('.button-remove').click(function(){

        var masp=parseInt($(this).attr("id").match(/\d+/));
        var makh=parseInt($('.makh_hidden').attr("id").match(/\d+/));
        $.ajax({
            type: "GET",
            url: 'http://localhost:82/DoAnWeb/public/client/homepage/xoasanpham',
            data: {'masp':masp,'makh':makh}, // gửi dữ liệu từ form qua controller

            success: function(res){
                //Trả về kết quả trên giỏ hàng
                $('#thongtingiohang').html(res[0]);
                $('#cart-online').html(res[1]);
            },
            error: function(res){
                alert("Xuất hiện lỗi: "+res);
            }

        });
    })
})
