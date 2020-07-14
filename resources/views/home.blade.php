@extends('layouts.app')

@section('content')

<!-- DEIXANDO O STYLE NA PAGINA PARA MAIOR CONTROLE -->
<style type="text/css">
      #map {
        height: 15em;
      }
    #floating-panel {
    visibility: hidden
    }
    </style>

<!--  DIVERSIDADE  -->

<!-- UTILIZANDO REACT PARA A PRIMEIRA PARTE -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div id="user">
    </div>
<div id="registro">
</div>
<!-- React JS -->
 <script src="{{ asset('js/app.js') }}" defer></script>
 <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

 <!-- Maps-->
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8wOPAzJwErpDx9hGV7f6J93kx7kCpWWE&callback=initMap&libraries=&v=weekly"
      defer
    ></script>


    <script>
     (function(exports) {
        "use strict";

        function initMap() {
          var directionsService = new google.maps.DirectionsService();
          var directionsRenderer = new google.maps.DirectionsRenderer();
          var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 7,
            center: {
              lat: 41.85,
              lng: -87.65
            }
          });
          directionsRenderer.setMap(map);

          var onChangeHandler = function() {
            calculateAndDisplayRoute(directionsService, directionsRenderer);
          };

          document
            .getElementById("start")
            .addEventListener("change", onChangeHandler);
          document
            .getElementById("end")
            .addEventListener("change", onChangeHandler);
            document
            .getElementById("start")
            .addEventListener("click", onChangeHandler);
          document
            .getElementById("end")
            .addEventListener("click", onChangeHandler);
          
        }
        function calculateAndDisplayRoute(
          directionsService,
          directionsRenderer
        ) {
          directionsService.route(
            {
              origin: {
                query: document.getElementById("start").value
              },
              destination: {
                query: document.getElementById("end").value
              },
              travelMode: "DRIVING"
            },
            function(response, status) {
              if (status === "OK") {
                directionsRenderer.setDirections(response);
              } else {
                window.alert("Directions request failed due to " + status);
              }
            }
          );
        }

        exports.calculateAndDisplayRoute = calculateAndDisplayRoute;
        exports.initMap = initMap;
      })((this.window = this.window || {}));
    </script>

    
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script> 

<br><br>

<!-- UTILIZANDO PHP NA SEGUNDA-->
<div id="maps" style="width: 100%;">
<!-- DIV INVISIVEL PARA TRAJETO-->
<div id="floating-panel">
      <b>Start: </b>
      <select id="start">
        <tbody>  <tr>      
@if($campos)
    @foreach($campos as $camposs) 
        <option id="partida{{$camposs->id}}" value="{{$camposs->Pontodepartida}}">{{$camposs->Pontodepartida}}</option>    
    @endforeach
@endif
      </select>
      <b>End: </b>
     <select id="end">
@if($campos)
    @foreach($campos as $camposs) 
            <option id="destino{{$camposs->id}}" value="{{$camposs->Pontodedestino}}" class="destino">{{$camposs->Pontodedestino}}</option>
            @endforeach
@endif
      </select>
    </div>
<div id="map"></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de entregas') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    </div>
                    <h1 align="center"> LISTA DE ENTREGAS </h1>
                    <table class="table">  
                    <thead class="thead-dark">
                    <tr>
  
    <th> CLIENTE</th>
    <th> Entrega </th>
    <th> PARTIDA </th>
    <th> DESTINO </th>
    <th>...</th>
    <th>Mapa</th>
</tr></thead>
@if($campos)
    @foreach($campos as $camposs)
    <tbody>  <tr id="{{$camposs->id}}">
            <td>{{$camposs->NomedoCliente}}</td>
            <td>{{$camposs->Datadeentrega}}</td>
            <td class="partida">{{$camposs->Pontodepartida}}</td>
            <td class="destino">{{$camposs->Pontodedestino}}</td>
            <td> <form action="{{route('delete', $camposs->id)}}" method="post">
                            <input type="hidden" name="id" value="{{$camposs->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></button>
                        </form></td>
                        <td class="mapa2">
                        <button>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg></button></td>
<br>
        </tr>
        </tbody>
    @endforeach
@endif
</table>
        </div>
    </div>
</div>

<!-- Script jQuery na home para uma análise mais fácil -->
<script>
$('.mapa2').click(function(){
  var local = $(this).parents('tr').attr('id');
  var localpartida = "partida" + local;
  var localdestino = 'destino' + local;
    console.log("partida" + local);

    $('#start option, #end option').each(function() {
      if($(this).attr('id') == localpartida || $(this).attr('id') == localdestino ) {
        $(this).attr('selected', true).click();
        //console.log("ID ENCONTRADO");

        // SUBINDO O SCROLL 
        var target_offset = $("#start").offset();
        var target_top = target_offset.top; 
        $('html, body').animate({ scrollTop: target_top }, 0);
      }
    });

});
</script>

@endsection



