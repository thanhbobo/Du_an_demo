@extends('Admin.layout.master_ad')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi tiết đơn hàng
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID Đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>HT thanh toán</th>
                                <th>Sản phẩm mua </th>
                                <th>Số lượng mua</th>
                                <th>Gía tiền</th>
                                {{-- <th>Tình trạng</th> --}}
                                <th>Delete</th>
                                {{-- <th>Edit</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($billdetail as $bill)
                            <tr class="odd gradeX" align="center">
                                <td>{{$bill->id_bill}}</td>
                                <td>{{$bill->bills->customer->name}}</td>
                                <td>{{$bill->bills->customer->address}}</td>
                                <td>{{$bill->bills->customer->phone_number}}</td>
                                <td>{{$bill->bills->payment}}</td>
                                <td>{{$bill->products->name}}</td>
                                <td>{{$bill->quantity}}</td>
                                <td>{{$bill->unit_price}}</td>
                                {{-- <td>{{$bill->bills->note}}</td> --}}
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/BillDetail/xoa/{{$bill->id}}"> Delete</a></td>
                               {{--  <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/BillDetail/sua/{{$bill->id}}">Edit</a></td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection