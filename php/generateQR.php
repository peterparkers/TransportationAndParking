<?php
    
    if (isset($_POST['submit'])) {
        session_start();
        session_unset();
        session_destroy();

        include_once 'includes/dbh.inc.php';
        $t = time();
        $ticket = mysqli_real_escape_string($conn, $_POST['ticket']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);

        $sql = "INSERT INTO book (ticket, n_parking, live_time) VALUES ('$ticket', '$number', '$t');";
        mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Palanquin+Dark" rel="stylesheet">
    <title>QR Code</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            font-family: 'Palanquin Dark', sans-serif;
        }
        .content {
            width: 85%;
            margin: 0 auto;
            display: flex;
            height: 400px;
        }
        #qr {
            margin: auto;
        }
        .footer {
            text-align: center;
        }
        input[type="submit"] {
            margin-top: 1.6em;
            background-color: #1984c3;
            color: #fff;
            font-size: 1em;
            font-family: 'Palanquin Dark', sans-serif;
            border: 0;
            padding: 1em 5em;
            text-decoration: none;
            border-radius: 0.5em;
            border-bottom: 0.25em solid #0f5177;
            outline: none;
            cursor: pointer;
        }
        input[type="submit"]:active {
            background-color: #1e9feb;
            border-bottom-width: 0;
            margin-top: 1.8em;
        }
    </style>
</head>
<body>
    <h1>Generate QR CODE</h1>
    <div class="content">
        <div id="qr"></div>
    </div>
    <br/>
    <div class="footer">
        <form action="../index.html">
            <input type="submit" value="OK" />
        </form>
    </div>
    <script>
        document.getElementById('qr').innerHTML = '';
        var qrcode = new QRCode("qr");
        function makeCode () {
            var ticket = <?php echo json_encode($_POST['ticket']) ?>;
            var number = <?php echo json_encode($_POST['number']) ?>;
            var text = ticket + number;
            qrcode.makeCode(text);
            console.log(text);
        }
        makeCode();
    </script>
</body>
</html>
<?php
    }
    else {
        header("Location: parking.php");
    }
?>