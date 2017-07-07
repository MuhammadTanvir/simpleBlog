@extends('admin.master')
@section('title','Profile')

@section('content')

<br>

<form class="form-horizontal" method="POST" action="">

{{ csrf_field() }}

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-6">
     <input type="number" class="form-control" id="Id" placeholder="Id"
     name="id" value="{{ Auth::user()->id }}" disabled>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" value="{{ Auth::user()->name }}">
      @if($errors->has('name'))
      <span class="help-block">
        <strong>{{$errors->first('name')}}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
       @if($errors->has('email'))
      <span class="help-block">
        <strong>{{$errors->first('email')}}</strong>
      </span>
      @endif
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
         @if($errors->has('password'))
      <span class="help-block">
        <strong>{{$errors->first('password')}}</strong>
      </span>
      @endif
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password" name="password_confirmation">
    </div>
       @if($errors->has('password_confirmation'))
      <span class="help-block">
        <strong>{{$errors->first('password_confirmation')}}</strong>
      </span>
      @endif
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>

@endsection