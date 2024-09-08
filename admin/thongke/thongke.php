<?php
session_start();

// Tạo mảng để lưu trữ số lượt truy cập cho mỗi tháng
$monthly_visits = array_fill(1, 12, 0);

// Tính tổng số lượt truy cập cho mỗi tháng từ session
if (isset($_SESSION['visits'])) {
    foreach ($_SESSION['visits'] as $date => $visits) {
        $month = date("n", strtotime($date));
        $monthly_visits[$month] += $visits;
    }
}

// Chuyển mảng thành chuỗi JSON để sử dụng trong biểu đồ
$monthly_visits_json = json_encode(array_values($monthly_visits));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lượt truy cập</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            margin-top: 100px;
            font-size: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        span{
            margin-left: 400px;
        }
    </style>
</head>

<body>

    <h2>Số lượt truy cập và thời điểm</h2>
    <span>Tổng số lượt truy cập:<?=$_SESSION['visits'][date('Y-m-d')]?></span>

    <table>

        <tr>
            <th>Thời điểm</th>
            <th>Lượt truy cập trên trang chủ</th>
        </tr>
        <?php
            if (isset($_SESSION['visits'])) {
                foreach ($_SESSION['visits'] as $date => $visits) {
                    echo "<tr>
                    <td>$date</td>
                    <td>$visits</td>
                    </tr>";
                }
            }
        ?>

    </table>
    <div style="width: 60%; margin: 0 auto;">
        <canvas id="monthlyChart"></canvas>
    </div>

    <script>
        // Dữ liệu số lượt truy cập theo tháng từ PHP
        var monthlyData = <?php echo $monthly_visits_json; ?>;

        // Biểu đồ
        var ctx = document.getElementById('monthlyChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Số lượt truy cập',
                    data: monthlyData,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>
