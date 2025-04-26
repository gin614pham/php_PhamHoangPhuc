@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh sách phòng trọ</div>

                <!-- Form search     -->
                <div class="card-body">
                    <form action="javascript:void(0)" class="d-flex mt-3 mb-3">
                        <input type="text" class="form-control me-2" id="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button type="submit" class="btn btn-primary" onclick="searchMotel()">Tìm kiếm</button>
                    </form>
                    <script>
                        function searchMotel() {
                            var search = document.getElementById("search").value;
                            var tableRef = document.getElementById('motelsTable');
                            var rows = tableRef.rows;
                            var tr = '';
                            for (var i = 1; i < rows.length; i++) {
                                tr = tableRef.rows[i];
                                var id = tr.cells[1].textContent;
                                var name = tr.cells[2].textContent;
                                var phone = tr.cells[3].textContent;
                                if (id.includes(search) || name.includes(search) || phone.includes(search)) {
                                    tr.style.display = "";
                                } else {
                                    tr.style.display = "none";
                                }
                            }
                        }
                    </script>
                </div>
                <!-- Form search end -->

                <!-- Form create     -->
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMotelModal">
                        Tạo phòng trọ
                    </button>
                </div>
                <!-- Form create end -->

                <!-- Form list     -->
                <div class="card-body">
                    <table class="table" id="motelsTable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Tên Người thuê trọ</th>
                                <th>Số điện thoại</th>
                                <th>Ngày bắt đầu</th>
                                <th>Phương thức thanh toán</th>
                                <th>Lưu ý</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($motels->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Không có phòng trọ</td>
                                </tr>
                            @else
                                @foreach ($motels as $motel)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $motel->id_motel }}</td>
                                        <td>{{ $motel->name_of_persion }}</td>
                                        <td>{{ $motel->phone_number }}</td>
                                        <td>{{ $motel->check_in }}</td>
                                        <td>{{ $motel->paymentMethod->name }}</td>
                                        <td>{{ $motel->note }}</td>
                                        <td>
                                            <input type="checkbox" name="id[]" value="{{ $motel->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Form list end -->
                <!-- Model create -->
                @include('motels.create')

                <!-- Model create end -->
            </div>
        </div>
    </div>
</div>
@endsection
