<style>
    .main-conten {
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

<div class="main-conten">
    <div class="myChart" id="comboChart"></div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawComboChart);

        function drawComboChart() {
            // thong ke danh muc san pham
            const data = google.visualization.arrayToDataTable([
                ['Danh mục', 'Số lượng sản phẩm', 'Giá cao nhất', 'Giá thấp nhất', 'Giá trung bình'],
                <?php

                $tongdm = count($list_tkdm);
                $i = 1;
                foreach ($list_tkdm as $thongke) {
                    if ($i == $tongdm) $dauphay = "";
                    else $dauphay = ",";
                    echo "['" . $thongke['tendm'] . "', " . $thongke['countdmsp'] . ", " . $thongke['maxprice'] . ", " . $thongke['minprice'] . ", " . $thongke['avgprice'] . "]" . $dauphay;
                    $i++;
                }
                ?>
            ]);

            const options = {
                title: 'Thống kê theo danh mục sản phẩm',
                titleTextStyle: {
                    fontSize: 38, // Custom font size
                    bold: true, // Bold font weight
                    fontName: 'Arial', // Custom font family
                    color: '#333' // Custom font color
                },
                hAxis: {
                    title: 'Danh mục'
                },
                vAxis: {
                    title: 'Giá trị'
                },
                seriesType: 'bars'
            };

            const chart = new google.visualization.ComboChart(document.getElementById('comboChart'));
            chart.draw(data, options);
        }
    </script>