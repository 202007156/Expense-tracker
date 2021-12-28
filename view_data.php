<!-- Internal php code style-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="image/img.png" alt="Logo" style="width:40px;" class="rounded-pill">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="add_data.php">Add data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="view_data.php">View Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        <h3>View incomes</h3>
        <p>View all the incomes in detail
        </p>
        <div class="container mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Income_ID</th>
                        <th>Amount</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        include "config.php"; // Using database connection file here

                        session_start();
                        $y = $_SESSION["email"];
                        //$userid = $_COOKIE["user_IN"];

                        $records = mysqli_query($con,"SELECT * FROM income WHERE email = '$y' "); // fetch data from database

                        while($data = mysqli_fetch_array($records))
                        {
                        ?>
                    <tr>
                        <td><?php echo $data['incomeid']; ?></td>
                        <td><?php echo $data['amount']; ?></td>
                        <td><?php echo $data['detail']; ?></td>
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="container mt-3">
            <h2>Expense Table</h2>
            <p>View all the expenses in detail =></p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Expense_ID</th>
                        <th>Amount</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        // Using database connection file here

                        $records = mysqli_query($con,"SELECT * FROM expenses WHERE email = '$y' "); // fetch data from database

                        while($data = mysqli_fetch_array($records))
                        {
                        ?>
                    <tr>
                        <td><?php echo $data['expenseid']; ?></td>
                        <td><?php echo $data['amount']; ?></td>
                        <td><?php echo $data['detail']; ?></td>
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>