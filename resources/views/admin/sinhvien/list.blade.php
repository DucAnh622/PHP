@extends('admin.main')
@section('content')
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary js-toggle" style="margin-top: 10px; margin-bottom: 10px; margin-left:10px;">Ẩn ID</button>
        <form action="/admin/sinhvien/search" method="GET" class="form-inline" style="margin: 10px;">
            <div class="form-group">
                <input style="margin-left: 5px; border-top-right-radius: unset; border-bottom-right-radius: unset;" type="text" class="form-control" name="keyword" id="keyword" placeholder="Search...">
            </div>
            <button style="border-top-left-radius: unset; border-bottom-left-radius: unset;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
        </form>
        <select class="form-select form-inline-block" style="margin: 10px; outline: none;" aria-label="Default select example" name="select_sl" id="select_sl" onchange="selectPage(this.value)">
            <option value="0" selected>select paginate:</option>
            <option >2</option>
            <option >3</option>
            <option >5</option>
        </select>
        <form method="GET" action="/admin/sinhvien/sort" class="form-inline">
            <div class="form-group">
                <label for="orderBy">Tùy chọn:</label>
                <select name="orderBy" id="orderBy" class="form-select form-inline-block" style="margin: 10px; outline: none;">
                    <option selected>Sắp xếp theo:</option>   
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="age">Age</option>
                    <option value="MSSV">MSSV</option>
                </select>
            </div>
            <div class="form-group">
                <label>Sắp xếp theo:</label>
                <select name="orderDir" id="orderDir" class="form-select form-inline-block" style="margin: 10px; outline: none;">
                    <option selected>Kiểu sắp xếp:</option>
                    <option value="asc">Tăng dần</option>
                    <option value="desc">Giảm dần</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Lọc</button>
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th id="ID">ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>MSSV</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
                @foreach($sinhviens as $sinhvien)
                <tr>
                    <td class="ID_value">{{$sinhvien->id}}</td>
                    <td>{{$sinhvien->Name}}</td>
                    <td>{{$sinhvien->Age}}</td>
                    <td>{{$sinhvien->MSSV}}</td>
                    <td><a class="btn btn-primary mr-3" href="/admin/sinhvien/edit/{{$sinhvien->id}}"><i class="fa fa-edit "></i></a>
                        <a class="btn btn-danger" href="#" onclick="Delete({{$sinhvien->id}},'/admin/sinhvien/delete')"><i class = "fa fa-trash"></i></a>
                    </td>
                </tr
            @endforeach
        </tbody>
    </table>
{{ $sinhviens->appends(request()->all())->links() }}
@endsection
