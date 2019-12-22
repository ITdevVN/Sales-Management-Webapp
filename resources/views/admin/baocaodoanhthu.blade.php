<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div id="popup-them-header">Thêm nhà cung cấp</div>
        <div id="popup-them-body">
        <form id="form" action="{{route('doanhthu',Request()->loai)}}" method="GET">
                @csrf
                <div class="form-group row">
                    <label for="tungay" class="col-sm-5 col-form-label">Từ ngày</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" name="tungay" id="tungay" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="denngay" class="col-sm-5 col-form-label">Đến ngày</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" name="denngay" id="denngay" aria-describedby="emailHelp">
                    </div>
                </div>
                <div id="popup-body-button" class="float-right mb-3">
                    <input type="submit" value="Xuất file pdf" class="btn btn-success" id="btnLuuThem">
                </div>
            </form>
        </div>



</div>
</body>
</html>
