@extends('layout')
@section('content')

<div class="card">
    <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse User</strong> <a href="{{route('create')}}" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>
 </div>
 <hr>
 <div>
     @if (session()->has('msg'))
         <p class="alert alert-success">{{session('msg')}}</p>
     @endif
    <table class="table table-striped table-bordered">
       <thead>
          <tr class="bg-primary text-white">
             <th>#</th>
             <th>Name</th>
             <th>Email</th>
             <th>Mobile</th>
             <th>Image</th>
             <th class="text-center">Added On</th>
             <th class="text-center">Action</th>
          </tr>
       </thead>
       <tbody>
           @foreach ($user as $key=> $user)
          <tr>
             <td>{{$key+1}}</td>
             <td>{{$user->name}}</td>
             <td>{{$user->email}}</td>
             <td>{{$user->phone}}</td>
             <td><img src="{{asset('media/'.$user->image)}}" alt=""></td>
             <td>{{$user->created_at}}</td>
             <td align="center">
                <form action="{{route('destroy',$user->id)}}" method="post">@csrf
                    @method('DELETE')
                <a href="{{route('edit',$user->id)}}" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
                <button type="submit" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</button>
                </form>
             </td>
          </tr>
          @endforeach
          <!--<tr>
             <td colspan="6" align="center">No Records Found!</td>
          </tr>-->
       </tbody>
    </table>
 </div>

@endsection
