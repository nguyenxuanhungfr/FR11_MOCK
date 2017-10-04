@extends('back-end.layouts.layout-admin')

@section('title')
    Quản lý Bình luận
@endsection

@section('breadcrumb')
    <li><a href="{!! url('admin') !!}">Trang chủ</a></li>
    <li>Bình luận</li>
@endsection

@section('content')
    <!-- main content  -->
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Danh sách đơn hàng</h3>
        </div>
        <div class="panel-body">
            <!-- filter -->
            <div>
                <button class="btn btn-primary" role='button' data-toggle='modal' data-target='#filter-modal'>
                    <span class='glyphicon glyphicon-filter'></span> Lọc
                </button>
            </div>

            <!-- list -->
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Người đăng</th>
                        <th>Sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Tình trạng</th>
                        <th>Ngày đăng</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($list) < 1)
                        <tr>
                            <td colspan="7">Chưa có dữ liệu</td>
                        </tr>
                    @else
                        @foreach($list as $row)
                            <tr>
                                <td>{!! $row->id !!}</td>
                                <td>{!! $row->user->name !!}</td>
                                <td>{!! $row->product->name !!}</td>
                                <td>{!! $row->content !!}</td>
                                <td>@if($row->status == 0) Khóa @else Hiển thị @endif</td>
                                <td>{!! $row->create_at !!}</td>
                                <td>
                                    <a href="{!! url('admin/comment/sua-thong-tin/'.$row->id) !!}"
                                       class="btn btn-warning">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        @if($row->status == 0) Mở @else Khóa @endif
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- pagination -->
            <hr>
            <div style="text-align: center">
                {!! $list->links() !!}
            </div>
        </div>
    </div>
    <!-- ===================================== -->

    <!-- filter model -->
    <div id='filter-modal' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <form method='get' action='{!! url('admin/comment/filter') !!}' role='form'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h3>Lọc bình luận</h3>
                    </div>

                    <div class='modal-body'>
                    {{--{{ csrf_field() }}--}}
                    <!-- search -->
                        <div class='form-group'>
                            <label for='search-order'>Tìm kiếm</label>
                            <div id='search-order'>
                                <input type='search' name='search' class='form-control'
                                       value='<?php if (isset($data['key'])) echo $data['key'] ?>'
                                       placeholder='Nhập từ khóa .....'>
                            </div>
                        </div>

                        <!-- sort -->
                        <div class='form-group'>
                            <label for='sort-order'>Sắp xếp</label>
                            <div id='sort-order' class='form-control-static sort-frm'>
                                <div class='form-group'>
                                    <label for='feild-sort'>Sắp xếp theo :</label>
                                    <div id='feild-sort' class='form-control-static'>
                                        <div class='col-xs-4 col-md-4'>
                                            <input type='radio' name='sort' value='id'
                                            <?php if (empty($data['sort']) || (isset($data['sort']) && $data['sort'] == 'id')) echo 'checked'?>>
                                            ID
                                        </div>
                                        <div class='col-xs-4 col-md-4'>
                                            <input type='radio' name='sort' value='uid'
                                            <?php if (isset($data['sort']) && $data['sort'] == 'uid') echo 'checked'?>>
                                            Người đăng
                                        </div>
                                        <div class='col-xs-4 col-md-4'>
                                            <input type='radio' name='sort' value='pid'
                                            <?php if (isset($data['sort']) && $data['sort'] == 'pid') echo 'checked'?>>
                                            Sản phẩm
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class='form-group'>
                                    <label for='type-sort'>Kiểu sắp xếp :</label>
                                    <div id='type-sort' class='form-control-static'>
                                        <div class='col-xs-6 col-md-6'>
                                            <input type='radio' name='type_sort' value='asc'
                                            <?php if (empty($data['type']) || isset($data['type']) && $data['type'] == 'asc') echo 'checked'?>>
                                            Tăng dần
                                        </div>
                                        <div class='col-xs-6 col-md-6'>
                                            <input type='radio' name='type_sort' value='desc'
                                            <?php if (isset($data['type']) && $data['type'] == 'desc') echo 'checked'?>>
                                            Giảm dần
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- status filter -->
                        <div class='form-group'>
                            <label for='status-order'>Tình trạng</label>
                            <select id='status-order' class='form-control' name='status'>
                                <option value='-1'>--Tất cả--</option>
                                <option value='1'>Hiên thị</option>
                                <option value='0'>Khóa</option>
                            </select>
                        </div>
                    </div>

                    <div class='modal-footer'>
                        <button type="button" id='btn-filter-cus' class='btn btn-success'>Tìm</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

