@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-plus"></i>Crear Usuario</h1>
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <form action="POST" action="{{ url('/users') }}">
                    <!-- FILA 1 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-6">Tipo Documento</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <select name="" id="" class="form-control" required>
                                        <option value="" selected disabled>Seleccione opción</option>
                                        <option value="CC">CC</option>
                                        <option value="CE">CE</option>
                                        <option value="TI">TI</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-6">Num Documento</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <input type="text" class="form-control" placeholder="Número Doc" required minlength="4" maxlength="15">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-hashtag"></span>
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
                                <label for="" class="col-sm-6">Nombre completo</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <input type="text" class="form-control" placeholder="¿Cual es su nombre?" required minlength="5" maxlength="255">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-text-width"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-6">Email</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <input type="text" class="form-control" placeholder="email" required minlength="5" maxlength="255">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-at"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FILA 3 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-6">Telefono</label>
                                <div class="input-group mb-3 col-sm-9">
                                    <input type="text" class="form-control" placeholder="Télefono" required minlength="10" maxlength="10">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
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
                            <a href="{{ url('/users') }}" class="btn btn-danger btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    @endsection