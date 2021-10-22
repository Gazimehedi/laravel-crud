@extends('layout')
@section('content')
<div class="card">
    <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
    <div class="card-body">
       <div class="col-sm-6">
           <form action="{{route('insert')}}" method="POST" enctype="multipart/form-data">@csrf
                <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" >
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" >
                    </div>
                    <div class="form-group">
                        <label>Mobile <span class="text-danger">*</span></label>
                        <input type="tel" class="tel form-control" name="phone"  placeholder="Enter mobile">
                    </div>
                    <div class="form-group">
                        <label>Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="image" id="image" >
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add User</button>
                    </div>
                </form>
            </div>
    </div>
 </div>
@endsection
