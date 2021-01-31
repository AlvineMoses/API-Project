@extends('layouts.master')

@section('title')
Foodapp's | Edit User
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header-primary">
                    <h3>Edit Registered User</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/user-register-update/{{ $users->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" value="{{ $users->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Give Role</label>
                                    <select name="user_type" class="form-control">
                                        <option value="ADM">admin</option>
                                        <option value="USR">user</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/role-register" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
