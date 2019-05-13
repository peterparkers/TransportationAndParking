<?php
    include_once 'includes/dbh.inc.php';
    // Code of Conversion
    $query = "SELECT n_parking FROM book;";
    $result = mysqli_query($conn , $query);

    if ($result) {
    // Conversion of result object into JSON format
        $rows = array();
        while($temp = mysqli_fetch_assoc($result)) {
            $rows[] = $temp;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parking</title>
    <link rel="stylesheet" href="../css/parking1.css">
    <link href="https://fonts.googleapis.com/css?family=Palanquin+Dark" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <nav>
            <h1>Parking</h1>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../html/map.html">Map</a></li>
                <li><a href="../html/transport.html">Transportation</a></li>
                <li><a href="parking.php" class="current">Parking</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="map">
            <div class="parking">
                <div class="top">
                    <div class="p p1"><h3>A1</h3></div>
                    <div class="p p2"><h3>A2</h3></div>
                    <div class="p p3"><h3>A3</h3></div>
                    <div class="p p4"><h3>A4</h3></div>
                    <div class="p p5"><h3>A5</h3></div>
                    <div class="p p6"><h3>A6</h3></div>
                    <div class="p p7"><h3>A7</h3></div>
                    <div class="p p8"><h3>A8</h3></div>
                    <div class="p p9"><h3>A9</h3></div>
                    <div class="p p10"><h3>A10</h3></div>
                </div>
                <div class="middle">
                    <i class="fa fa-long-arrow-left" style="font-size:48px;color:#fff"></i>
                    <i class="fa fa-long-arrow-left" style="font-size:48px;color:#fff"></i>
                    <i class="fa fa-long-arrow-left" style="font-size:48px;color:#fff"></i>

                    <i class="fa fa-long-arrow-right" style="font-size:48px;color:#fff"></i>
                    <i class="fa fa-long-arrow-right" style="font-size:48px;color:#fff"></i>
                    <i class="fa fa-long-arrow-right" style="font-size:48px;color:#fff"></i>
                </div>
                <div class="bottom">
                    <div class="p p11"><h3>B1</h3></div>
                    <div class="p p12"><h3>B2</h3></div>
                    <div class="p p13"><h3>B3</h3></div>
                    <div class="p p14"><h3>B4</h3></div>
                    <div class="p p15"><h3>B5</h3></div>
                    <div class="p p16"><h3>B6</h3></div>
                    <div class="p p17"><h3>B7</h3></div>
                    <div class="p p18"><h3>B8</h3></div>
                    <div class="p p19"><h3>B9</h3></div>
                    <div class="p p20"><h3>B10</h3></div>
                </div>
            </div>
            <div class="road">
                <i class="fa fa-long-arrow-up" style="font-size:48px;color:#fff"></i>
                <h2 class="guide-text">Entrance</h2>
            </div>
        </div>
        <div class="input-content">
            <form action="booking.php" method="post" onsubmit="return validateForm()">
                <label>Please input ticket Code for booking</label>
                <input type="text" name="ticket" id="text" autocomplete="off" autofocus>
                <input type="submit" value="Book" name="submit">
            </form>
        </div>
    </div>
    <script>
        var n = "";
        n = <?php echo json_encode($rows); ?>;
        var p = document.getElementsByClassName('p');
        for(let i = 0; i < n.length; i++) {
            p[n[i].n_parking - 1].style.background = '#e74c3c';
        }
        function validateForm() {
            var textInput = document.getElementById('text');
            if(textInput.value.length <= 0) {
                alert('Please Input ticket ID');
                return false;
            }
        }
    </script>
</body>
</html>
<?php } ?>