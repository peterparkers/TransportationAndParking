<?php
    session_start();
    if(isset($_POST['submit'])) {
        include_once 'includes/dbh.inc.php';

        $ticket = mysqli_real_escape_string($conn, $_POST['ticket']);
        $sql1 = "SELECT * FROM ticket WHERE ticket_id='$ticket'";
        $result1 = mysqli_query($conn, $sql1);
        $resultCheck1 = mysqli_num_rows($result1);
        if ($resultCheck1 < 1) {
            echo "<script>alert('Invalid Ticket ID');
            window.location='parking.php';
            </script>";
        }
        else {
            $sql2 = "SELECT * FROM book WHERE ticket='$ticket'";
            $result2 = mysqli_query($conn, $sql2);
            $resultCheck2 = mysqli_num_rows($result2);
            if ($resultCheck2 >= 1) {
                echo "<script>alert('This Ticket ID already taken');
                window.location='parking.php';
                </script>";
            }

            $sql3 = "SELECT n_parking FROM book;";
            $result3 = mysqli_query($conn , $sql3);
            if ($result3) {
            // Conversion of result object into JSON format
                $rows = array();
                while($temp = mysqli_fetch_assoc($result3)) {
                    $rows[] = $temp;
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking</title>
    <link rel="stylesheet" href="../css/booking1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <a href="parking.php"><i class="fa fa-angle-left" style="font-size:36px;color:#fff"></i></a>
        <h1>Booking</h1>
    </header>
    <div class="map">
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
        <div class="middle"></div>
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

    <div class="display-box">
        <form action="generateQR.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="number_parking" value="A1" id="parking-number" readonly><br/>
            <label>Ticket ID : </label>
            <input type="text" name="ticket" value="<?php echo $ticket; ?>" readonly></br/>
            <input type="hidden" name="number" value="" id="number">
            <input type="submit" name="submit" value"Submit">
            <h4 id="distance"></h4>
        </form>
    </div>
    <script>
        var n = <?php echo json_encode($rows); ?>;
        var nArray = [];
        for(let i = 0; i < n.length; i++) {
            nArray.push(n[i].n_parking);
        }
    </script>
    <script src="../js/booking.js"></script>
</body>
</html>
<?php
        }
    }
    }
    else {
        header("Location: parking.php");
        exit();
    }
?>