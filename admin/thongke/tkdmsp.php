<style>
    .main-content {
        display: flex;
        justify-content: center;
        margin-top: 100px;
        margin-bottom: 100px;
    }

    .myChart {
        max-width: 1200px;
        width: 100%;
        height: 800px;
        margin-left: 300px;
        border: 1px solid #ccc;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="main-content">
    <div class="myChart" id="comboChart"></div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawComboChart);

    function drawComboChart() {
        // product category statistics
        const data = google.visualization.arrayToDataTable([
            ['Category', 'Number of Products', 'Highest Price', 'Lowest Price', 'Average Price'],
            <?php

            $totalCategories = count($list_tkdm);
            $i = 1;
            foreach ($list_tkdm as $statistics) {
                if ($i == $totalCategories) $comma = "";
                else $comma = ",";
                echo "['" . $statistics['tendm'] . "', " . $statistics['countdmsp'] . ", " . $statistics['maxprice'] . ", " . $statistics['minprice'] . ", " . $statistics['avgprice'] . "]" . $comma;
                $i++;
            }
            ?>
        ]);

        const options = {
            title: 'Product Category Statistics',
            titleTextStyle: {
                fontSize: 38, 
                bold: true, 
                fontName: 'Arial', 
                color: '#333' 
            },
            hAxis: {
                title: 'Category'
            },
            vAxis: {
                title: 'Value'
            },
            seriesType: 'bars'
        };

        const chart = new google.visualization.ComboChart(document.getElementById('comboChart'));
        chart.draw(data, options);
    }
</script>
