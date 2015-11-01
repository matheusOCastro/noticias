

/* global $array_grafico, google, $arrayGrafico_js */


var string_grafico_pie = $arrayGrafico_js_pie;
var arrayGrafico_pie = string_grafico_pie.split("|");

var string_grafico_column = $arrayGrafico_js_column;
var arrayGrafico_column = string_grafico_column.split("|");

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
    
    function drawChart() {
        var dataPie;
        
            dataPie = google.visualization.arrayToDataTable([
                ['Situação', 'Quantidade'],
                ['Indisponível',     parseInt(arrayGrafico_pie[0])],
                ['Abandonado',      parseInt(arrayGrafico_pie[1])],
                ['Bombeando',  parseInt(arrayGrafico_pie[2])],
                ['Colmatado', parseInt(arrayGrafico_pie[3])],
                ['Equipado',    parseInt(arrayGrafico_pie[4])],
                ['Fechado',     parseInt(arrayGrafico_pie[5])],
                ['Não Instalado',      parseInt(arrayGrafico_pie[6])],
                ['Não Utilizável',  parseInt(arrayGrafico_pie[7])],
                ['Obstruído', parseInt(arrayGrafico_pie[8])],
                ['Parado',    parseInt(arrayGrafico_pie[9])],
                ['Precário',      parseInt(arrayGrafico_pie[10])],
                ['Seco',  parseInt(arrayGrafico_pie[11])]
            ]);

            var optionsPie = {
                title: 'Poços por situação',
                is3D: true
            };
                
        
        
            
            var dataColumn = google.visualization.arrayToDataTable([
                ['Qualidade', 'Quantidade', { role: "style" }],
                ['Consumo Humano',     parseInt(arrayGrafico_column[0]), 'red'],
                ['Dessedentação de Animais',      parseInt(arrayGrafico_column[1]), 'blue'],
                ['Irrigação',  parseInt(arrayGrafico_column[2]), 'yellow'],
                ['Recreação', parseInt(arrayGrafico_column[3]), 'green']
            ]);
            var viewColumn = new google.visualization.DataView(dataColumn);
                viewColumn.setColumns([0, 1,
                    { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" 
                    },
                    2]);

            var optionsColumn = {
                title: 'Poços por qualidade',
                legend: { position: "none" },
                is3D: true
            };
            function resizeColumn () {
                var chartColumn = new google.visualization.ColumnChart(document.getElementById('columnchart'));
                chartColumn.draw(viewColumn, optionsColumn);

                var chartPie = new google.visualization.PieChart(document.getElementById('piechart'));
                chartPie.draw(dataPie, optionsPie);
            }
            window.onload = resizeColumn();
            window.onresize = resizeColumn;


var string_grafico = $arrayGrafico_js;
var arrayGrafico = string_grafico.split("|");

google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data;
        if (arrayGrafico.length >10){
            data = google.visualization.arrayToDataTable([
                ['Situação', 'Quantidade'],
                ['Indisponível',     parseInt(arrayGrafico[0])],
                ['Abandonado',      parseInt(arrayGrafico[1])],
                ['Bombeando',  parseInt(arrayGrafico[2])],
                ['Colmatado', parseInt(arrayGrafico[3])],
                ['Equipado',    parseInt(arrayGrafico[4])],
                ['Fechado',     parseInt(arrayGrafico[5])],
                ['Não Instalado',      parseInt(arrayGrafico[6])],
                ['Não Utilizável',  parseInt(arrayGrafico[7])],
                ['Obstruído', parseInt(arrayGrafico[8])],
                ['Parado',    parseInt(arrayGrafico[9])],
                ['Precário',      parseInt(arrayGrafico[10])],
                ['Seco',  parseInt(arrayGrafico[11])]
            ]);

            var options = {
                title: 'Poços por situação',
                is3D: true
            };
            function resizePie () {
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        window.onload = resizePie();
        window.onresize = resizePie;    
        
        }else{
            
            data = google.visualization.arrayToDataTable([
                ['Qualidade', 'Quantidade', { role: "style" }],
                ['Consumo Humano',     parseInt(arrayGrafico[0]), 'red'],
                ['Dessedentação de Animais',      parseInt(arrayGrafico[1]), 'blue'],
                ['Irrigação',  parseInt(arrayGrafico[2]), 'yellow'],
                ['Recreação', parseInt(arrayGrafico[3]), 'green']
            ]);
            var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" 
                    },
                    2]);

            var options = {
                title: 'Poços por qualidade',
                legend: { position: "none" },
                is3D: true
            };
            function resizeColumn () {
                var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));
                chart.draw(view, options);
            }
            window.onload = resizeColumn();
            window.onresize = resizeColumn;
        }
    }
    }
