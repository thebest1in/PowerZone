<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerZone</title>
    <link rel="stylesheet" href="{{url('./bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('./assets/vendors/themify-icons/css/themify-icons.css')}}">
</head>
<body>

<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
@if(!empty($_SESSION["id"]) && $_SESSION["idTest"]=='directeur')

    <div class="container" style="margin-top:100px;">
    <nav>
        <a href="/directeur" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
    </nav><hr>



    <h1>Statistique : </h1>
    <!-- L'élément "#mon-chart" où placer le chart -->
    <div id="mon-chart" style="height: 500px; width: 800px;margin-left:auto;margin-right:auto" ></div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['Activites', 'Nomber Adherents'],
        @foreach ($data as $i) // On parcourt les catégories
        [ "{{ $i->nomAct }}", {{ $i->nb }} ], // Proportion des produits de la catégorie
        @endforeach
        ]);

        var options = {
        title: "Adherents par activites", // Le titre
        is3D : true // En 3D
        };

        // On crée le chart en indiquant l'élément où le placer "#mon-chart"
        var chart = new google.visualization.PieChart(document.getElementById('mon-chart'));

        // On désine le chart avec les données et les options
        chart.draw(data, options);
    }
    </script>




@else
    <div class="container">
        <div class="row align-items-center text-center" style="margin-top:100px">
                <h3>pas de resultat</h3>
                <a href="/login" class="btn btn-warning" width="auto">clique ici</a>
        </div>
    </div>
@endif