@extends('layouts/admin/layout')


@section('body')

    <div class="col-9 left_section">
        <div class="row left_section_1">
            <div class="col-12 left_section_1_inside">
                <h5>Kết quả bán hàng hôm nay</h5>
                        <div class="left_section_1_block">
                            <div class="left_section_1_img d-flex align-items-center justify-content-center">
                                <i class="fas fa-dollar-sign fa-2x"></i>
                            </div>
                            <div class="left_section_1_content">
                                <span>{{number_format($doanh_thu_thuan[0]->so_hoa_don)}} hóa đơn</span></br>
                                <span>{{number_format($doanh_thu_thuan[0]->doanh_thu_thuan)}} VNĐ</span></br>
                                <span>Doanh thu thuần</span>
                            </div>
                            <div class="vien"></div>
                        </div>

                        <div class="left_section_1_block">
                                <div class="left_section_1_img d-flex align-items-center justify-content-center">
                                    <i class="fas fa-shopping-cart fa-2x"></i>
                                </div>
                                <div class="left_section_1_content">
                                    <span>0 sản phẩm</span></br>
                                    <span>0</span></br>
                                    <span>Tổng số sản phẩm</span>
                                </div>
                                <div class="vien"></div>
                        </div>

                        <div class="left_section_1_block ">
                                <div class="left_section_1_img d-flex align-items-center justify-content-center">
                                    <i class="fas fa-chart-line fa-2x"></i>
                                </div>
                                <div class="left_section_1_content">
                                    <span></span></br>
                                    <span>40.6 %</span></br>
                                    <span>So với tháng trước</span>
                                </div>
                                <div class="vien"></div>
                        </div>
            </div>
        </div>
        <div class="row left_section_2">
            <div class="col-12 left_section_2_inside">
                <h5>Doanh thu thuần tháng này</h5>
                <canvas id="doanh_thu_barchart"></canvas>
            </div>
        </div>
        <div class="row left_section_3">
           <div class="col-12 left_section_3_inside">
                <h5>Top 10 hàng hóa bán chạy tháng trước</h5>
                <canvas id="Top_10_hang_hoa_barchart"></canvas>
           </div>
        </div>
    </div>
    <div class="col-3 right_section">
        <div class="row right_section_header">
            <div class="col-12 ">
                <h5>Các hoạt động gần đây</h5>
            </div>
        </div>
        <div class="row right_section_body">
            <div class="col-12 ">
                lácl;djflsdk
            </div>
        </div>
    </div>


@stop

@section('footer')
<script src="{{URL::asset('manager/manager.js')}}"></script>
<script src="{{URL::asset('manager/event.js')}}"></script>
@stop
