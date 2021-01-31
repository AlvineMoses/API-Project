@extends('layouts.master')

@section('title')
Foodapp's | Menu
@endsection

@section('styles')
<style>
    .w-10p{
        width:20% !important;
    }
    .w-5p{
        width:2.5% !important;
    }
</style>
@endsection

@section('content')

{{-- Display Modal --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Menu</h4>
                <button type="button" class="float-right btn btn-success" data-toggle="modal" data-target="#exampleModal">ADD</button>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="dataTable" class="table">
                        <thead class=" text-primary">
                            <th class="w-5p">ID</th>
                            <th class="w-10p">Dish</th>
                            <th class="w-10p">Image</th>
                            <th class="w-10p">Description</th>
                            <th class="w-10p">Price</th>
                            <th class="w-10p"></th>
                            <th class="w-10p"></th>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                                <tr>
                                    <td>{{ $menu->id }}</td>
                                    <td>{{ $menu->dish }}</td>
                                    <td>
                                        <img style="width:200px; height:100px; overflow:hidden;" src="/storage/menu_images/{{ $menu->imagePath }}" alt="{{ __('Menu Image') }}">
                                    </td>
                                    <td>{{ $menu->description }}</td>
                                    <td>KES {{ $menu->price }}</td>
                                    <td>
                                        <a href="{{ url('menus/'.$menu->id) }}" class="btn btn-warning">EDIT</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-danger deletebtn">DELETE</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Add Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-dish" id="exampleModalLabel">Add Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/save-menu" method="post" enctype = "multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="dish" class="col-form-label">Dish:</label><br>
                    <input type="text" name="dish" class="form-control" id="dish">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Description:</label><br>
                    <textarea name="description" class="form-control" id="description"></textarea>
                </div>
                <input type="file" name="imagePath" class="form-group" id="imagePath">
                <div class="form-group">
                    <label for="price" class="col-form-label">Price:</label><br>
                    <input type="double" name="price" class="form-control" id="price">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
{{-- End of Add Modal --}}

{{-- Delete Modal --}}
<div class="modal fade" id="deleteModalPop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Please confirm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="delete_modal_Form" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE')}}
            <div class="modal-body">
                <input type="hidden" id="delete_menu_id">
                <h5>Are you sure?</h5>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </form>

        </div>
    </div>
</div>
{{-- End Delete Modal --}}

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();

            $('#dataTable').on('click', '.deletebtn', function() {
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                // console.log($data);

                $('#delete_menu_id').val(data[0]);

                $('#delete_modal_Form').attr('action','/admin/menus-delete/'+data[0]);

                $('#deleteModalPop').modal('show');
            });
        });
    </script>
@endsection

