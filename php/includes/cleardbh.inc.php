<?php
    include_once 'dbh.inc.php';
    // $url1=$_SERVER['REQUEST_URI'];
    // header("Refresh: 1; URL=$url1");
    
    $t = time();
    $sql = "SELECT live_time FROM book";
    $result = mysqli_query($conn, $sql);
    $firstrow = mysqli_fetch_assoc($result);

    $diffTime = $t - $firstrow["live_time"];
    // echo $diffTime;
?>
<html>
    <head>
    </head>
    <body>
        <h1 id="result">ss</h1>
        <script>
            var result = document.getElementById('result');
            setInterval(function() {
                result.innerHTML = <?php echo $diffTime; ?>;
            }), 1000);
        </script>
    </body>
</html>