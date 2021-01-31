@extends('layouts.master')

@section('title')
Foodapp's | Menu Edit
@endsection

@section ('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title"> Menu - Edit Data </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/menus-update/'.$menus->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="dish" class="col-form-label">Dish:</label><br>
                            <input type="text" name="dish"  id="title"class="form-control" value="{{ $menus->dish }}" >
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description:</label><br>
                            <textarea name="description" id="description" class="form-control" rows="6">{{ $menus->description }}</textarea>
                        </div>
                        <input type="file" name="imagePath" class="form-group" id="imagePath">
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price:</label><br>
                            <input type="double" id="price" name="price" class="form-control" value="{{ $menus->price}}">
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/admin/menus') }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
