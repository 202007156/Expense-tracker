
<?php

    /* Database Configuration file */
    /* Defining the credentials for the setup and connection t the MySQL Database */

    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','expenseData');

    /* Establish link to database */
    $con = mysqli_connect(DB_SERVER,DB_USERNAME, DB_PASSWORD,DB_NAME);

    // Check connection link
    if($con===false)
    {
        die("Error Deteted: System failed to connect with Database !". mysqli_connect_error());
    }

?>
