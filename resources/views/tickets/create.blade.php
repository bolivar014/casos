@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-ticket-alt"></i> Casos</h1>
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <h1 class="m-0">Completar los siguientes campos del formulario:</h1>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('/tickets') }}" method="POST">
                    {{ csrf_field() }}
                    <!-- FILA 1 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-6">Cliente</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <select name="selIdCliente" id="selIdCliente" class="form-control" >
                                        <option value="" selected disabled>Seleccione opción</option>
                                        <option value="1" {{ old('selIdCliente') == "1" ? "selected" : "" }}>Pepito Perez</option>
                                        <option value="2" {{ old('selIdCliente') == "2" ? "selected" : "" }}>Laura Hernandez</option>
                                        <option value="3" {{ old('selIdCliente') == "3" ? "selected" : "" }}>Andrea Herrera</option>
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
                                    <select name="selIdAbogado" id="selIdAbogado" class="form-control" >
                                        <option value="" selected disabled>Seleccione opción</option>
                                        <option value="1" {{ old('selIdAbogado') == "1" ? "selected" : "" }}>Sofia Perez</option>
                                        <option value="2" {{ old('selIdAbogado') == "2" ? "selected" : "" }}>Andres Hernandez</option>
                                        <option value="3" {{ old('selIdAbogado') == "3" ? "selected" : "" }}>Mairen Herrera</option>
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
                                    <input type="text" id="txt_solicitud_caso" name="txt_solicitud_caso" class="form-control" placeholder="Asunto del caso"  minlength="5" maxlength="50" value="{{ old('txt_solicitud_caso') }}">
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
                                    <textarea class="form-control" name="textDescripcion" id="textDescripcion" cols="30" rows="4" placeholder="Descripción del caso..."  minlength="1" maxlength="255" value="{{ old('textDescripcion') }}"></textarea>
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
                            <button type="submit" class="btn btn-primary btn-block">Crear</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ url('/tickets') }}" class="btn btn-danger btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    @endsection