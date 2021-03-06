
@extends('admin.admin_template')
@section('content')
    <form method="post" action="{{url('users')}}" id="users">
        {{csrf_field()}}
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <strong>Whoops!!!</strong> There are some problems with your inputs.</br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Firstname :</strong>
                    <input type="text" name="firstname" placeholder="FirstName" class="form-control">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Lastname :</strong>
                    <input type="text" name="lastname" placeholder="LastName" class="form-control">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Email :</strong>
                    <input type="email" name="email" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Password Confirmation :</strong>
                    <input type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Password Confirmation :</strong>
                    <input  type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Status :</strong>
                    <input type="radio" id="active" name="status" value="active">
                    <label for="active">Active</label>
                    <input type="radio" id="inactive" name="status" value="inactive">
                    <label for="active">InActive</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="select">Select Category:</label>
                    <select class="form-control" id="post" name="role_id">
                        <option value="">Select Category</option>
                        @foreach($users as $user)
                            <option value="{{ $user->role_id}}">{{ $user->role_name }}</option>

                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-xs-12">
                <a class="btn btn-xs btn-success" href="{{route('users.index')}}">Back</a>
                <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
            </div>
        </div>
    </form>
@endsection
