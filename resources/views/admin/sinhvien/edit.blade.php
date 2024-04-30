@extends('admin.main')
@section('content')
<form action="/admin/sinhvien/edit/{{$sinhvien->id}}" method="post" id="quickForm" novalidate="novalidate">
    @include('share.error')
    <div class="card-body">
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" name="Name" value="{{$sinhvien->Name}}" class="form-control" id="Name"
                placeholder="Name...">
        </div>
        <div class="form-group">
            <label for="Age">Age:</label>
            <input type="text" name="Age" value="{{$sinhvien->Age}}" class="form-control" id="Age" placeholder="Age...">
        </div>
        <div class="form-group">
            <label for="MSSV">MSSV:</label>
            <input type="text" name="MSSV" value="{{$sinhvien->MSSV}}" class="form-control" id="MSSV"
                placeholder="MSSV...">
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    @csrf
</form>
@endsection