@extends('layout')
@section('content')
<div class="card">
    <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Edit User</strong> <a href="users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
    <div class="card-body">
       <div class="col-sm-6">
          <form action="{{route('update',$user->id)}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
             <div class="form-group">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
             </div>
             <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                @error('email')
                    <p style="color:red">{{$message}}</p>
                @enderror
             </div>
             <div class="form-group">
                <label>Mobile <span class="text-danger">*</span></label>
                <input type="tel" class="tel form-control" name="phone"  value="{{$user->phone}}">
             </div>
             <div class="form-group">
                <label>Image <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="image" id="image">
                <img width="80" src="{{asset('media/'.$user->image)}}">
             </div>
             <div class="form-group">
                <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Update User</button>
             </div>
          </form>
       </div>
    </div>
 </div>
@endsection
