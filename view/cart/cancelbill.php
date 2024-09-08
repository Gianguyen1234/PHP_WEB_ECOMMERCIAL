<?php
// Set the HTTP response status code to 404 (Page Not Found)
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/error.css">

</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <h1>404 Đơn hàng đã hết hạn!</h1>
                    <h2>UH OH! You're lost.</h2>
                    <p>The page you are looking for does not exist.
                        How you got here is a mystery. But you can click the button below
                        to go back to the homepage.
                    </p>
                    <a href="http://localhost/client(webbanhang)/index.php"><button class="btn green">HOME</button></a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>