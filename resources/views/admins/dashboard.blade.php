@extends('admins.layouts.app')

@section('title',' dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Người dùng</div>
                            <div class="h5 mb-0 font-weight-bold text-primary counter" data-count="{{$userCount}}">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Slide</div>
                            <div class="h5 mb-0 font-weight-bold text-info counter" data-count="{{$slideCount}}">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sản phẩm </div>
                            <div class="h5 mb-0 font-weight-bold text-primary counter" data-count="{{$productCount}}">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-product-hunt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Thương hiệu </div>
                            <div class="h5 mb-0 font-weight-bold text-primary counter" data-count="{{$couponCount}}">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-product-hunt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Danh mục </div>
                            <div class="h5 mb-0 font-weight-bold text-primary counter" data-count="{{$categoryCount}}">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-product-hunt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mã giảm giá  </div>
                            <div class="h5 mb-0 font-weight-bold text-primary counter" data-count="{{$couponCount}}">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-product-hunt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nhóm quyền </div>
                            <div class="h5 mb-0 font-weight-bold text-primary counter" data-count="{{$roleCount}}">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-product-hunt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Quyền </div>
                            <div class="h5 mb-0 font-weight-bold text-primary counter" data-count="{{$permissionCount}}">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-product-hunt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
