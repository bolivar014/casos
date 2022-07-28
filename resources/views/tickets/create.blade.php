@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-ticket-alt"></i>Creación de caso</h1>
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
                    <input type="hidden" name="objAbogados[]" id="objAbogados" class="form-group">
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
                                        <option value="1" id="selopt-1" name="selopt-1" data-idnombre="1-Sofia Perez" {{ old('selIdAbogado') == "1" ? "selected" : "" }}>Sofia Perez</option>
                                        <option value="2" id="selopt-2" name="selopt-2" data-idnombre="2-Andres Hernandez" {{ old('selIdAbogado') == "2" ? "selected" : "" }}>Andres Hernandez</option>
                                        <option value="3" id="selopt-3" name="selopt-3" data-idnombre="3-Mairen Herrera" {{ old('selIdAbogado') == "3" ? "selected" : "" }}>Mairen Herrera</option>
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
                                    <input type="text" id="txt_solicitud_caso" name="txt_solicitud_caso" class="form-control" placeholder="Asunto del caso" required minlength="5" maxlength="50" value="{{ old('txt_solicitud_caso') }}">
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
                                    <textarea class="form-control" name="textDescripcion" id="textDescripcion" cols="30" rows="3" placeholder="Descripción del caso..." required minlength="1" maxlength="255" value="{{ old('textDescripcion') }}"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-comment"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>#</th>
                                        <th>Abogado</th>
                                        <th>Eliminar</th>
                                    </thead>
                                    <tbody id="tbodyAbogado" name="tbodyAbogado">
                                        <!-- CUERPO HTML PARA TABLA ABOGADOS ASIGNADOS -->
                                    </tbody>
                                </table>
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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            
            $(document).ready(function() {
                var arrayAbogadosAsignados = [];

                $('#selIdAbogado').on('change', function(e) {
                    // Buscamos parametro seleccionado
                    var datosCli = $(this).find(':selected').attr('data-idnombre');
                    
                    // Separamos obj
                    objDatosSplit = datosCli.split('-');
                    
                    // Creamos tr de abogado
                    objTrAbogado = "<tr id='trid-" + objDatosSplit[0] + "'>";
                    objTrAbogado += "<td>" + objDatosSplit[0] + "</td>";
                    objTrAbogado += "<td>" + objDatosSplit[1] + "</td>";
                    objTrAbogado += '<td><a href="#" class="badge badge-success" onclick="eliminarIdAb('+objDatosSplit[0]+')" data-idElimIdAb="'+objDatosSplit[0]+'" title="Eliminar"><i class="fas fa-trash"></i></a></td>';
                    objTrAbogado += "<tr>";
                    
                    // Agregamos tag a tabla
                    $('#tbodyAbogado').append(objTrAbogado);
                    
                    // Deshabilitamos tabla
                    $('#selopt-' + objDatosSplit[0]).prop('disabled', true);

                    arrayAbogadosAsignados.push(objDatosSplit[0]);
                    
                    //console.log('----------');
                    console.log(arrayAbogadosAsignados);

                    $('#objAbogados').val(arrayAbogadosAsignados);
                });

            });
                function eliminarIdAb(idAbonadoEliminar) {
                    // Eliminamos tr de abogado 
                    $('#trid-' + idAbonadoEliminar).remove();
                    // Habilitamos selector de abogado
                    $('#selopt-' + idAbonadoEliminar).prop('disabled', false);
                }
        </script>
    @endsection