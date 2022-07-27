@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-ticket-alt"></i>Información del caso</h1>
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <form action="{{ url('/tickets/' . $ticket->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('put')
                    <!-- FILA 1 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-6">Cliente</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <select name="selIdCliente" id="selIdCliente" class="form-control" required>
                                        <option value="" selected disabled>Seleccione opción</option>
                                        @foreach ($peoples as $people)
                                            <option value="{{ $people->id }}">{{ $people->nombre_completo }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-6">Abogado</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <select name="selIdAbogado" id="selIdAbogado" class="form-control" required>
                                        <option value="" selected disabled>Seleccione opción</option>
                                        <option value="1" {{ $ticket->fk_id_abogado == "1" ? "selected" : "" }}>Sofia Perez</option>
                                        <option value="2" {{ $ticket->fk_id_abogado == "2" ? "selected" : "" }}>Andres Hernandez</option>
                                        <option value="3" {{ $ticket->fk_id_abogado == "3" ? "selected" : "" }}>Mairen Herrera</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-gavel"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FILA 2 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-6">Solicitud</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <input type="text" id="txt_solicitud_caso" name="txt_solicitud_caso" class="form-control" placeholder="Asunto del caso"  minlength="5" maxlength="50" value="{{ $ticket->nombre_caso }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-file-signature"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-6">Descripción</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <textarea class="form-control" name="textDescripcion" id="textDescripcion" cols="30" rows="4" placeholder="Descripción del caso..." required minlength="1" maxlength="255" >{{ $ticket->descripcion }}</textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-comment"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BOTONES -->    
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ url('/tickets') }}" class="btn btn-danger btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    @endsection