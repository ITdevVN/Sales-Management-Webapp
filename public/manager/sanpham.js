
$(document).ready(function(){

    //Event for Adding
    $('#thembutton').on('click',function(){
        $('#background-popup').removeClass('hide');
        $('#popup-them').removeClass('hide');
    });

    $('#form').submit(function(e){
       // var postData = new FormData($("#uploadForm")[0]);
        var route=$('#form').data('route');
        $.ajax({
            type: "post",
            url: route,
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache:false,
            processData: false,
            success: function(res){
                $('#tablediv').html(res.output);
                //Thêm phần báo lỗi erros
                $('#errors').html("<div class=\"alert alert-danger\"><ul id=\"itemdiv\"></ul></div>");
                $.each(res.errors,function(index,value){
                    $('#itemdiv').append("<li>"+value+"</li>");
                });
            //    // alert(res.result);
            //     if (res.result==0){
            //         alert("result=0");
            //     }else{
            //         $('#background-popup').addClass('hide');
            //         $('#popup-them').addClass('hide');
            //     }
            },
            error: function(res){
                alert("Xuất hiện lỗi: "+res);
            }

        });
        e.preventDefault();
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
                var masanpham=$('#main-table').find(".ma_san_pham").eq(number_of_Id).text(); //lấy ra thuộc tính id theo vị trí
                        //Hiển thị trên popup
                // $('#maNhaCungCapSua').val(maNhaCungcap);
                // $('#tenNhaCungCapSua').val(tenNhaCungCap);
                // $('#sodienthoaiSua').val(soDienThoai);
                // $('#emailSua').val(email);
                // $('#diachiSua').val(diaChi);
                // $('#tenNhomHangsua').val("");
                $.ajax({
                    type:"GET",
                    url:'sanpham/laychitietsanpham',
                    data:{'masanpham':masanpham}
                }).done(function(res){
                    $('#masanphamsua').val(res[0]);
                    $('#tensanphamsua').val(res[1]);
                    $('#masanphamsua').val(res[2]);
                    $('#masanphamsua').val(res[3]);
                    $('#tensanphamsua').val(res[4]);
                    $('#masanphamsua').val(res[6]);
                    $('#giavonsua').val(res[7]);
                    $('#giabansua').val(res[8]);
                    $('#tonkhosua').val(res[9]);
                    $('#textareasua').val(res[11]);
                })
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
                url:'sanpham/xoatatca',
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
                    var ID=$('#main-table').find(".ma_san_pham").eq(number_of_Id).text();
                    listCheckBoxXoa.push(ID);
                    $.ajax({
                        type:"GET",
                        url:'sanpham/xoa',
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
