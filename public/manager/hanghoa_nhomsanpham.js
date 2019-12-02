
$(document).ready(function(){

    // $('#checkall').on('click',function(){
    //     alert("Function when click checkall");
    //     if ($(this).prop("checked")==true)
    //         $('.checkbox-group').prop('checked',true);
    //     else{
    //         $('.checkbox-group').prop('checked',false);
    //     }
    // });


    //Event for Adding
    $('#thembutton').on('click',function(){
        $('#background-popup').removeClass('hide');
        $('#popup-them').removeClass('hide');
    });

    $('#btnLuuThem').click(function(){
        var tenNhomHang=$('#tenNhomHangthem').val(); //lấy giá trị từ textbox người dùng nhập
       $('#tenNhomHangthem').val(""); //trả giá trị về null cho textbox
        $('#background-popup').addClass('hide'); //ẩn cửa sổ thêm
        $('#popup-them').addClass('hide'); //ẩn cửa sổ thêm
        $.ajax({ //ajax đưa đến controller
            type:"GET",
            url:'nhomsanpham/them',
            data:{'tenNhomHang':tenNhomHang}
        }).done(function(res){
            $('#tablediv').fadeOut();
                $('#tablediv').fadeIn();
                $('#tablediv').html(res);
        })
    });


    $('#btnHuyThem').click(function(){
        $('#background-popup').addClass('hide');
        $('#popup-them').addClass('hide');
    });


    //Event for Editing

    $('#suabutton').click(function(){
        //kiểm tra liệu người dùng đã check hay chưa
        //($('input[type=checkbox]').is(':checked')) &&
       if (($('input[type=checkbox]:checked').not('#checkall').length<2) && ($('input[type=checkbox]:checked').not('#checkall').length>=1)){

        $('#background-popup').removeClass('hide');
        $('#popup-sua').removeClass('hide');


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
       }else{
           $('#tablediv').prepend('<div class="alert alert-danger">Vui lòng chọn 1 dòng để chỉnh sửa</div>');
       }
    });

    $('#btnLuuSua').click(function(){
        var thongTinCanSua=[];
        $('#background-popup').addClass('hide');
        $('#popup-sua').addClass('hide');
        //lấy giá trị mới từ người dùng nhập
        thongTinCanSua.push($('#maNhomHangsua').val());
        thongTinCanSua.push($('#tenNhomHangsua').val());
        $('#tenNhomHangsua').val("");
        $.ajax({
            type:"GET",
            url:'nhomsanpham/sua',
            data:{'thongTinCanSua':thongTinCanSua}
        }).done(function(res){
            $('#tablediv').fadeOut();
                $('#tablediv').fadeIn();
                $('#tablediv').html(res);
        })
    });

        $('#btnHuySua').click(function(){
            $('#background-popup').addClass('hide');
            $('#popup-sua').addClass('hide');
        });



    //Event for Deleting


    $('#xoabutton').click(function(){
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

    });

    $('#timkiem').change(function(){
        var keyWord=$('#timkiem').val();
        $.ajax({
            type:"GET",
            url:'nhomsanpham/timkiem',
            data:{'keyWord':keyWord}
        }).done(function(res){
            $('#tablediv').fadeOut();
                $('#tablediv').fadeIn();
                $('#tablediv').html(res);
        })
    })

})
