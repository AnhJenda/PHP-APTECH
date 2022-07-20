<?php
// include config file
require_once 'config.php';
// define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $salary_err = $address_arr = "";
// processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    // validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)){
        $name_err = "Please enter a name";
    } elseif (!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[a-zA-Z'-.\s]+$/")))){
        $name_err = "Please enter a valid name";
    } else{
        $name = $input_name;
    }
    // validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)){
        $address_arr = "Please enter address";
    } else{
        $address = $input_address;
    }
    // validate salary
    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)){
        $salary_err = "Please enter the salary amount";
    }elseif (!ctype_digit($input_salary)){
        $salary_err = "Please enter the positive integer value";
    } else{
        $salary = $input_salary;
    }
    // check input error before insert to database
    if (empty($name_err) && empty($address_arr) && empty($salary_err)){
        // prepare an insert statement
        $sql = "INSERT INTO employees(name, address, salary) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)){
            // bind variables to the prepare statement parameter
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            // set parameter
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            // attempt to execute prepare statement
            if (mysqli_stmt_execute($stmt)){
                //Records created successfully. redirect to landing page
                header("index.php");
                exit();
            }else{
                echo "Something went wrong. please try again later";
            }
        }mysqli_stmt_close($stmt);
    }mysqli_close($link);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn/bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <title>Create Record</title>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill the form and submit to add the employee to database</p>
                    <form action="<?php echo htmlspecialchars($_SERVER(["PHP_SELF"]));?>" method="post">
                        <div class="form-group <?php echo(!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name ;?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo(!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo(!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default"> Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
