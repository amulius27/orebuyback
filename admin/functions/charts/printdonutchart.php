<?php

function PrintDonutChart() {
    
    $db = DBOpen();
    
    if($set === "ISK") {
        $corps = $db->fetchRowMany('SELECT * FROM Corps WHERE Deleted= :del', array('del' => 0));
    }
    
    foreach($corps as $corpName) {
        $isk[$corpName] = $db->fetchColumn('SELECT SUM(Value) FROM Contracts WHERE Corporation= :corp AND Paid= :paid', array('corp' => $corpName, 'paid' => 1));
    }
    
    foreach($isk as $i) {
        $i = $i / 1000000000.00;
    }
    
    printf("<script type=\"text/javascript\">
                    window.onload = function () {
                            var chart = new CanvasJS.Chart(\"chartContainer\",
                            {
                                title:{
                                    text: \"Buy Back Utilization\"
                                },
                                data: [
                                {
                                    type: \"doughnut\",
                                    dataPoints: [");
    foreach($isk as $key => $value) {
        printf("{ y: $value, indexLabel: \"$key {y}b ISK\"},");
    }
                            printf("]
                                }
                                ]
                            });
                            chart.render();
                    }
                </script>");
    
    DBClose($db);
}
