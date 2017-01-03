$(document).ready(function(){
    
    //Call for Mineral Price Line Chart
    $.ajax({
        url : "functions/charts/mineralpricechart.php",
        type : "GET",
        success : function(data){
            console.log(data);
            
            var TritaniumPrice = [];
            var TritaniumTime = [];
            var PyeritePrice = [];
            var MexallonPrice = [];
            var IsogenPrice = [];
            var NocxiumPrice = [];
            var ZydrinePrice = [];
            var MegacytePrice = [];
            var MorphitePrice = [];
            
            var TritaniumHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
            var PyeriteHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';;
            var MexallonHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
            var IsogenHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';;
            var NocxiumHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
            var ZydrineHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
            var MegacyteHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
            var MorphiteHue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
            
            for(var i in data['Tritanium']) {
                TritaniumPrice.push(data['Tritanium'][i]['Price']);
                TritaniumTime.push(data['Tritanium'][i]['Time']);
            }
            for(var i in data['Pyerite']) {
                PyeritePrice.push(data['Pyerite'][i]['Price']);
            }
            for(var i in data['Mexallon']) {
                MexallonPrice.push(data['Mexallon'][i]['Price']);
            }
            for(var i in data['Isogen']) {
                IsogenPrice.push(data['Isogen'][i]['Price']);
            }
            for(var i in data['Nocxium']) {
                NocxiumPrice.push(data['Nocxium'][i]['Price']);
            }
            for(var i in data['Zydrine']) {
                ZydrinePrice.push(data['Zydrine'][i]['Price']);
            }
            for(var i in data['Megacyte']) {
                MegacytePrice.push(data['Megacyte'][i]['Price']);
            }
            for(var i in data['Morphite']) {
                MorphitePrice.push(data['Morphite'][i]['Price']);
            }

            var mineralChartData = {
                labels: TritaniumTime,
                datasets: [{
                    label: "Tritanium",    
                    data: TritaniumPrice,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: TritaniumHue
                },
                {
                    label: "Pyerite",
                    data: PyeritePrice,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: PyeriteHue
                },
                {
                    label: "Isogen",
                    data: IsogenPrice,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: IsogenHue
                },
                {
                    label: "Mexallon",
                    data: MexallonPrice,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: MexallonHue
                },
                {
                    label: "Nocxium",
                    data: NocxiumPrice,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: NocxiumHue
                },
                {
                    label: "Zydrine",
                    data: ZydrinePrice,
                    fill: false,
                    lineTenion: 0.1,
                    backgroundColor: ZydrineHue
                },
                {
                    label: "Megacyte",
                    data: MegacytePrice,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: MegacyteHue
                },
                {
                    label: "Morphite",
                    data: MorphitePrice,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: MorphiteHue
                }]
            };
            
            var ctx = $("#MineralPriceLineChart");
            //Set global chart options
            Chart.defaults.global.maintainAspectRatio = false;
            Chart.defaults.global.backgroundColor = "#FFFFFF";
            
            //Declare the mineral Line Chart variable and create the chart
            var mineralLineChart = new Chart(ctx, {
                type: 'line',
                data: mineralChartData
            });
			
            
        },
        error : function(data) {
            console.log(data);
        }
    });    
});
