@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-ticket-alt"></i> Casos</h1>
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title">Lista de casos</h3>
                                    </div>
                                    <div class="col-6" style="right: 0!important; position: absolute; display:flex; justify-content: end;">
                                        <a href="{{ url('/tickets/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Agregar caso</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Nombre cliente</th>
                                            <th>Abogado responsable</th>
                                            <th>Nombre caso</th>
                                            <th>Estado caso</th>
                                            <th style="width: 70px">&nbsp;&nbsp;Opciones&nbsp;&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                            <tr>
                                                <td>{{ $ticket->id }}</td>
                                                <td>{{ $ticket->nombre_completo }}</td>
                                                <td>{{ $ticket->name }}</td>
                                                <td>{{ $ticket->nombre_caso }}</td>
                                                <td>{{ $ticket->estado_caso }}</td>
                                                <td>
                                                    <!-- Ver -->
                                                    <a href="{{ url('/tickets/' . $ticket->id) }}" class="badge badge-success" title="Vér"><i class="fas fa-eye"></i></a>
                                                    <!-- Editar -->
                                                    <a href="{{ url('/tickets/' . $ticket->id . '/edit') }}" class="badge badge-primary" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                                    <!-- Eliminar
                                                    <a href="{{ url('/tickets/' . $ticket->id . '/confirmDelete') }}" class="badge badge-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a> -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    @endsection
