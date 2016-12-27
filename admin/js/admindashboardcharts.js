$(document).ready(function(){
    $.ajax({
        url : "http://localhost/chartjs/followersdata.php",
        type : "GET",
        success : function(data){
            console.log(data);
            
            var corporation = [];
            var isk= [];

            for(var i in data) {
                corporation.push(data[i].corp);
                isk.push(data[i].isk);
            }

            var chartdata = {
                labels: corporation,
                datasets: [{
                        data: isk
                }]
            };

            var ctx = $("#Utilization");

            var DoughnutGraph = new Chart(ctx, {
                    type: 'doughnut',
                    data: chartdata
            });
        },
        error : function(data) {

        }
    });
});
