@extends('layouts.guest')

@section('title')
Foodapps | Menu
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-warning">
                <h4 class="card-title">Menu</h4>
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
                                        <a href="{{ route('addToCart', ['id' => $menu->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
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

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection

