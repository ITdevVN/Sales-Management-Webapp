
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
        var tenNhaCungCap=$('#tenNhaCungCapThem').val(); //lấy giá trị từ textbox người dùng nhập
        var soDienThoai=$('#sodienthoaiThem').val();
        var email=$('#emailThem').val();
        var diachi=$('#diachiThem').val();
       $('#tenNhaCungCapThem').val(""); //trả giá trị về null cho textbox
       $('#sodienthoaiThem').val("");
       $('#emailThem').val("");
       $('#diachiThem').val("");
        $('#background-popup').addClass('hide'); //ẩn cửa sổ thêm
        $('#popup-them').addClass('hide'); //ẩn cửa sổ thêm
        $.ajax({ //ajax đưa đến controller
            type:"GET",
            url:'nhacungcap/them',
            data:{'tenNhaCungCap':tenNhaCungCap,'soDienThoai':soDienThoai,'email':email,'diachi':diachi}
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
                var number_of_Id=$(this).attr("id").match(/\d+/); //lấy ra id của nút tick
                var maNhaCungcap=$('#main-table').find(".ma_nha_cung_cap").eq(number_of_Id).text(); //lấy ra thuộc tính id theo vị trí
                var tenNhaCungCap=$('#main-table').find(".ten_nha_cung_cap").eq(number_of_Id).text();
                var soDienThoai=$('#main-table').find(".so_dien_thoai").eq(number_of_Id).text();
                var email=$('#main-table').find(".email").eq(number_of_Id).text();
                var diaChi=$('#main-table').find(".dia_chi").eq(number_of_Id).text();
                        //Hiển thị trên popup
                $('#maNhaCungCapSua').val(maNhaCungcap);
                $('#tenNhaCungCapSua').val(tenNhaCungCap);
                $('#sodienthoaiSua').val(soDienThoai);
                $('#emailSua').val(email);
                $('#diachiSua').val(diaChi);
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
        thongTinCanSua.push($('#maNhaCungCapSua').val());
        thongTinCanSua.push($('#tenNhaCungCapSua').val());
        thongTinCanSua.push($('#sodienthoaiSua').val());
        thongTinCanSua.push($('#emailSua').val());
        thongTinCanSua.push($('#diachiSua').val());
        $('#tenNhomHangsua').val("");
        $.ajax({
            type:"GET",
            url:'nhacungcap/sua',
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
                url:'nhacungcap/xoatatca',
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
                    var ID=$('#main-table').find(".ma_nha_cung_cap").eq(number_of_Id).text();
                    listCheckBoxXoa.push(ID);
                    $.ajax({
                        type:"GET",
                        url:'nhacungcap/xoa',
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
        var loaiTimKiem=$('#SelectForm').find(":selected").val();
        var keyWord=$('#timkiem').val();
        $.ajax({
            type:"GET",
            url:'nhacungcap/timkiem',
            data:{'keyWord':keyWord,'loaiTimKiem':loaiTimKiem}
        }).done(function(res){
            $('#tablediv').fadeOut();
                $('#tablediv').fadeIn();
                $('#tablediv').html(res);
        })
    });

    //Validate

})
