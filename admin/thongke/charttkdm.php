<style>
    .main-conten {
        display: flex;
        justify-content: center;
        margin-top: 150px;
    }

    .myChart {
        max-width: 1200px;
        width: 100%;
        height: 800px;
        border: 1px solid #ccc;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="main-conten">
    <div class="myChart" id="myChart"></div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Dữ liệu thống kê số lượng sản phẩm
        var data1 = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php
            foreach ($list_tkdm as $thongke) {
                echo "['" . $thongke['tendm'] . "', " . $thongke['countdmsp'] . "],";
            }
            ?>
        ]);

        // Tùy chọn cho biểu đồ
        var options = {
            title: 'Thống kê sản phẩm',
            titleTextStyle: {
                fontSize: 48,
                bold: true,
                fontName: 'Arial',
                color: '#333'
            },
            is3D: true
        };

        // Vẽ biểu đồ
        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data1, options);
    }
</script>
