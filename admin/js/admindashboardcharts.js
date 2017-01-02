function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function getRandomRGBA() {
	var hue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
	
	return hue;
}

$(document).ready(function(){
    //Call for Utilization Chart
    $.ajax({
        url : "functions/charts/admindashboardutilizationchart.php",
        type : "GET",
        success : function(data){
            console.log(data);
            
            var Corporation = [];
            var ISK = [];
            var bgColor = [];
            var hoverColor = [];
            var chart;

            for(var i in data) {
                Corporation.push(data[i].corp);
                ISK.push(data[i].isk);
                bgColor.push(getRandomColor());
            }

            var chartdata = {
                labels: Corporation,
                datasets: [{						
                    data: ISK,
                    backgroundColor: bgColor
                }]
            };

            var ctx = $("#UtilizationChart");
            //Set chart global option
            Chart.defaults.global.maintainAspectRatio = false;
            Chart.defaults.global.defaultFontColor  = "#FFFFFF";
            chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: chartdata,
            });
        },
        error : function(data) {
            console.log(data);
        }
    });
    //Call for Contract Distribution Chart
    $.ajax({
        url : "functions/charts/admindashboardcontractchart.php",
        type : "GET",
        success : function(data){
            console.log(data);
            
            var ContractType = [];
            var NumOfContracts = [];
            var chart;
			var Color = [];
			var hue = getRandomRGBA();

            for(var i in data) {
                ContractType.push(data[i].Type);
                NumOfContracts.push(data[i].Number);
				Color.push(hue);
            }

            var chartData = {
                labels: ContractType,
                datasets: [{
						label: "Contracts",
						backgroundColor: Color,
                        data: NumOfContracts
						
                }]
            };

            var ctx = $("#ContractsChart");
            //Set chart global option
            Chart.defaults.global.maintainAspectRatio = false;
            Chart.defaults.global.defaultFontColor  = "#FFFFFF";
            
            var barChart = new Chart(ctx, {
                type: 'horizontalBar',
                data: chartData
            });
        },
        error : function(data) {
            console.log(data);
        }
    });
    
});
