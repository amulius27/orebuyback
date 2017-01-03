$(document).ready(function(){
    $.ajax({
        url : "functions/charts/orepricechart.php",
        type : "GET",
        success : function(data){
            console.log(data);
            
            var VeldsparPrice = [];
            var VeldsparTime = [];
            var ScorditePrice = [];
            
            var VeldsparHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
            var ScorditeHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
            
            for(var i in data['Veldspar']) {
                VeldsparPrice.push(data['Veldspar'][i]['Price']);
                VeldsparTime.push(data['Veldspar'][i]['Time']);
            }
            for(var i in data['Scordite']) {
                ScorditePrice.push(data['Scordite'][i]['Price']);
            }

            var oreChartData = {
                labels: VeldsparTime,
                datasets: [{
                    label: "Veldspar",    
                    data: VeldsparPrice,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: VeldsparHue
                },
                {
                    label: "Scordite",
                    data: ScorditePrice,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: ScorditeHue
                }]
            };
            
            var ctx = $("#OrePriceLineChart");
            //Set global chart options
            Chart.defaults.global.maintainAspectRatio = false;
            Chart.defaults.global.backgroundColor = "#FFFFFF";
            
            //Declare the mineral Line Chart variable and create the chart
            var oreLineChart = new Chart(ctx, {
                type: 'line',
                data: oreChartData
            });
			
            
        },
        error : function(data) {
            console.log(data);
        }
    });
    
    
});
