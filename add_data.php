<!-- Internal php code style-->

<?php

    // Include the configuration of database file
    require('config.php');

    session_start();

    $x = $_SESSION["email"];


    // Triggers the following statements when add button is pressed
    if(isset($_REQUEST['amount'])){

        //Rectify user inputs
        $value = stripslashes($_REQUEST['amount']);
        $value = mysqli_real_escape_string($con, $value);
        $detail = stripslashes($_REQUEST['detail']);
        $detail= mysqli_real_escape_string($con, $detail);

        //If checkbox, unchecked that means its an income only
        if(empty($_REQUEST['income']))
        {
            $income = "INSERT INTO income (email, amount, detail) VALUES ('$x', '$value', '$detail')";
            $result = mysqli_query($con, $income) or die("Error!");
            header('Location: add_data.php');
        }else{
            $expense = "INSERT INTO expenses (email, amount, detail) VALUES ('$x', '$value', '$detail')";
            $result = mysqli_query($con, $expense) or die("Error!");
            header('Location: add_data.php');
        }

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add data</title>
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
                    <a class="nav-link active" href="add_data.php">Add data</a>
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
        <h3>Add income or expense</h3>
        <p>Please enter the data in the form below, properly.
        </p>

        <form action="">
            <div class="mb-3 mt-3">
                <label for="text" class="form-label">Enter the amount:</label>
                <input type="text" class="form-control" id="amount" placeholder="i.e Rs 120.00" name="amount" required>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Details/Category</label>
                <input type="text" class="form-control" id="detail" placeholder="i.e Rent" name="detail" required>
            </div>
            <div class="form-check mb-3">
                <h6>Please check the box if it is an expense. By default every is income.</h6>
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="income"> Expense
                </label>
                
            </div>
            <button type="submit" class="btn btn-primary" name="name">(+) Add</button>
        </form>
    </div>

</body>

</html>