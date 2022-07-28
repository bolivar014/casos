@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-solid fa-dollar-sign"></i> Información TRM</h1>
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box mb-3 bg-warning">
                            <!--<span class="info-box-icon"></span>-->
                            <i class="nav-icon fas fa-chart-bar info-box-icon"></i> 
                            <div class="info-box-content">
                                <span class="info-box-text">Valor TRM hoy <?php echo date('Y-m-d'); ?></span>
                                <span id="spanTrmCo" name="spanTrmCo" class="info-box-number"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $.ajax({
            type: "GET",
            url: "https://api.anicamenterprises.com/v1/rates/trm/co",
            dataType: 'JSON'
        }).done(function(response) {
            console.log('success');
            console.log(response);

            $('#spanTrmCo').html('$' + response);
        }).fail(function(err) {
            console.log('error');
            console.log(err);
            
        });
    </script>