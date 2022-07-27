@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-plus"></i>Crear Usuario</h1>
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <!-- FILA 1 -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-sm-6">Tipo Documento</label>
                            <div class="input-group mb-3 col-sm-9">
                                <select name="selTipoDoc" id="selTipoDoc" class="form-control" disabled>
                                    <option value="" selected disabled>Seleccione opción</option>
                                    <option value="CC" {{ $person->tipo_doc == "CC" ? 'selected' : '' }}>CC</option>
                                    <option value="CE" {{ $person->tipo_doc == "CE" ? 'selected' : '' }}>CE</option>
                                    <option value="TI" {{ $person->tipo_doc == "TI" ? 'selected' : '' }}>TI</option>
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
                                <input type="text" id="txt_num_doc" name="txt_num_doc" class="form-control" placeholder="Número Doc" minlength="4" maxlength="15" value="{{ $person->num_doc }}" readonly>
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
                                <input type="text" id="txt_nombre_comp" name="txt_nombre_comp" class="form-control" placeholder="¿Cual es su nombre?"  minlength="5" maxlength="255" value="{{ $person->nombre_completo }}" readonly>
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
                                <input type="text" id="txt_email" name="txt_email" class="form-control" placeholder="email"  minlength="5" maxlength="255" value="{{ $person->email }}" readonly>
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
                                <input type="text" id="txt_telefono" name="txt_telefono" class="form-control" placeholder="Télefono"  minlength="10" maxlength="10" value="{{ $person->telefono }}" readonly>
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
            </div>
        </section>
    @endsection