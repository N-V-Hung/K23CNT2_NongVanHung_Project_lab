@extends('nvhLayout.Admin.nvhMaster')
@section('title','Xem THông Tin Quản Trị')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1>Chi Tiết Quản Trị</h1>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
                                <b>Hóa Đơn ID:</b>
                                {{$nvhquantri->nvhTaiKhoan	}}
                            </p>
                            <p class="card-text">
                                <b>Sản Phầm ID:</b>
                                {{$nvhquantri->nvhMatKhau}}
                            </p>
                                   
                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$nvhquantri->nvhTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('nvhAdmin.nvhquantri')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection