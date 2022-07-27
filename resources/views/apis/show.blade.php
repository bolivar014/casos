@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-ticket-alt"></i> Casos</h1>
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    el TRM para hoy del pais de colombia, es: $<span id="spanTrmCo" name="spanTrmCo"></span>
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

            $('#spanTrmCo').html(response);
        }).fail(function(err) {
            console.log('error');
            console.log(err);
            
        });
    </script>