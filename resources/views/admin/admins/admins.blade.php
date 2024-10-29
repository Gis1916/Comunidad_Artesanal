@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card" style="background-color: #F2F2F2;">
                        <div class="card-body">
                            <h4 class="card-title" style="color: #D95436;">{{ $title }}</h4>

                            <!-- Botón para abrir el formulario de crear administrador -->
                            <a href="{{ route('admins.create') }}" class="btn" style="background-color: #04BFBF; color: white;">Crear Usuario</a>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered" style="background-color: #FFFFFF;">
                                    <thead style="background-color: #D99A25; color: white;">
                                        <tr>
                                            <th>ID del Admin</th>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th>Imagen</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin['id'] }}</td>
                                                <td>{{ $admin['name'] }}</td>
                                                <td>
                                                    <span class="badge" style="
                                                        @if ($admin['type'] == 'Artesano') background-color: #D95436; 
                                                        @elseif ($admin['type'] == 'Delivery') background-color: #04BFBF; 
                                                        @elseif ($admin['type'] == 'Admin') background-color: #A66953; 
                                                        @endif
                                                        color: white; padding: 5px 10px;">
                                                        {{ $admin['type'] }}
                                                    </span>
                                                </td>
                                                <td>{{ $admin['mobile'] }}</td>
                                                <td>{{ $admin['email'] }}</td>
                                                <td>
                                                    @if ($admin['image'] != '')
                                                        <img src="{{ asset('admin/images/photos/' . $admin['image']) }}" style="width: 50px; height: 50px; border-radius: 5px;">
                                                    @else
                                                        <img src="{{ asset('admin/images/photos/no-image.gif') }}" style="width: 50px; height: 50px; border-radius: 5px;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($admin['status'] == 1)
                                                        <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px; color: #04BFBF;" class="mdi mdi-bookmark-check" status="Activo"></i>
                                                        </a>
                                                    @else
                                                        <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px; color: #D95436;" class="mdi mdi-bookmark-outline" status="Inactivo"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/view-vendor-details/' . $admin['id']) }}">
                                                        <i style="font-size: 25px; color: #D99A25;" class="mdi mdi-file-document"></i>
                                                    </a>
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
        </div>
    </div>
@endsection
