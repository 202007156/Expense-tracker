<!-- Internal php code style-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-data-adapter.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="image/img.png" alt="Logo" style="width:40px;" class="rounded-pill">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="add_data.php">Add data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_data.php">View Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-3">

        <?php

            include "config.php"; // Using database connection file here

            // start session and store value for authentication
            session_start();
            $y = $_SESSION["email"];
            //$userid = $_COOKIE["user_IN"];


            // SQL statement to a variable
            $records = mysqli_query($con,"SELECT SUM(amount) AS total FROM income WHERE email = '$y' "); // fetch data from database

            // excute statement and stare data in array
            $data = mysqli_fetch_array($records);

            $sum = $data['total'];

            $record = mysqli_query($con,"SELECT SUM(amount) AS total FROM expenses WHERE email = '$y' "); // fetch data from database

            $dataEx = mysqli_fetch_array($record);

            $SUM = $dataEx['total'];


            // Chart data
 

            $cquery = mysqli_query($con, "SELECT amount, detail FROM income WHERE email= '$y'");

            $cdata = array();

            for($x=0; $x < mysqli_num_rows($cquery); $x++){

                $cdata[] = mysqli_fetch_assoc($cquery);
            }

            echo json_encode($cdata);

               
        ?>

        <!-- Display sql statement result in DOM-->

        <h3>Total amount of income: <?php echo 'Rs ' . $sum ?></h3>
        <h3>Total amount of expenses: <?php echo 'Rs ' . $SUM ?></h3>
        <p>Click View data to see, all the incomes and expenses in detail.
        </p>

        <div id="container"></div>
        <script>
        anychart.onDocumentReady(function() {
            anychart.data.loadJsonFile( function(cdata) {
                // create a chart and set loaded data
                chart = anychart.bar(cdata);
                chart.container("container");
                chart.draw();
            });
        });
        </script>

    </div>

</body>

</html>