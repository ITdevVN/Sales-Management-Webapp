
$(document).ready(function(){
    alert("helllo")

    $('#checkall').on('click',function(){
        alert("Function when click checkall");
        if ($(this).prop("checked")==true)
            $('.checkbox-group').prop('checked',true);
        else{
            $('.checkbox-group').prop('checked',false);
        }
    });


    //Event for Adding
    $('.thembutton').on('click',function(){
        $('#background-popup').removeClass('hide');
        $('#popup-them').removeClass('hide');
        alert("Hiển thị cửa sổ");

        $('#btnLuuThem').click(function(){
            var tenNhomHang=$('#tenNhomHangthem').val(); //lấy giá trị từ textbox người dùng nhập
           // $('#tenNhomHangthem').val(""); //trả giá trị về null cho textbox
            alert("Luu");
            // $('#background-popup').addClass('hide'); //ẩn cửa sổ thêm
            // $('#popup-them').addClass('hide'); //ẩn cửa sổ thêm
            $.ajax({ //ajax đưa đến controller
                type:"GET",
                url:'nhomsanpham/them',
                data:{'tenNhomHang':tenNhomHang}
            }).done(function(res){
                $('#tablediv').fadeOut();
                    $('#tablediv').fadeIn();
                    $('#tablediv').html(res);
            })
        })

        $('#btnHuyThem').click(function(){
            $('#background-popup').addClass('hide');
            $('#popup-them').addClass('hide');
        })
    });


    //Event for Editing

    $('#suabutton').click(function(){
        //kiểm tra liệu người dùng đã check hay chưa
        // if ($('.checkbox-group').prop("checked")==true){

        $('#background-popup').removeClass('hide');
        $('#popup-sua').removeClass('hide');
        var thongTinNhomCanXoa=[];
            $('.checkbox-group').each(function(){
                if ($(this).prop("checked")==true){
                    var number_of_Id=$(this).attr("id").match(/\d+/);
                    var ID=$('#main-table').find(".ma_nhom_hang").eq(number_of_Id).text();
                    var tenNhomHang=$('#main-table').find(".ten_nhom_hang").eq(number_of_Id).text();
                    //Hiển thị trên popup
                    $('#maNhomHangsua').val(ID);
                    $('#tenNhomHangsua').val(tenNhomHang);

                }
            });


        $('#btnLuuSua').click(function(){
            //lấy giá trị mới từ người dùng nhập
            thongTinNhomCanXoa.push($('#maNhomHangsua').val());
            thongTinNhomCanXoa.push($('#tenNhomHangsua').val());
            $.ajax({
                type:"GET",
                url:'nhomsanpham/sua',
                data:{'thongTinNhomCanXoa':thongTinNhomCanXoa}
            }).done(function(res){
                $('#tablediv').fadeOut();
                    $('#tablediv').fadeIn();
                    $('#tablediv').html(res);
            })


            $('#tenNhomHang').val("");
            $('#background-popup').addClass('hide');
            $('#popup-them').addClass('hide');
        })

        $('.btnHuySua').click(function(){
            $('#background-popup').addClass('hide');
            $('#popup-sua').addClass('hide');
        })
   // }
    })
    //Event for Deleting


    $('.xoabutton').click(function(){
        //xet 2 truong hop
        if ($('#checkall').prop("checked")==true){

            $.ajax({
                type:"GET",
                url:'nhomsanpham/xoatatca',
                data:"",
            }).done(function(res){
                $('#tablediv').fadeOut();
                    $('#tablediv').fadeIn();
                    $('#tablediv').html(res);
            })

            $('#background-popup').addClass('hide');
            $('#popup-them').addClass('hide');
            //truong hop xoa tung dong
        }else{
            var listCheckBoxXoa=[];
            $('.checkbox-group').each(function(){
                if ($(this).prop("checked")==true){
                    var number_of_Id=$(this).attr("id").match(/\d+/);
                    var ID=$('#main-table').find(".ma_nhom_hang").eq(number_of_Id).text();
                    listCheckBoxXoa.push(ID);
                    $.ajax({
                        type:"GET",
                        url:'nhomsanpham/xoa',
                        data:{'listCheckBoxXoa':listCheckBoxXoa},
                    }).done(function(res){
                        $('#tablediv').fadeOut();
                            $('#tablediv').fadeIn();
                            $('#tablediv').html(res);
                    })

                }
            });

         }

})


})
