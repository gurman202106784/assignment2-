<?php
require_once "config.php";

$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } else {
        $name = $input_name;
    }

    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    } else {
        $address = $input_address;
    }

    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)) {
        $salary_err = "Please enter the salary amount.";
    } else {
        $salary = $input_salary;
    }

    if (empty($name_err) && empty($address_err) && empty($salary_err)) {
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);

            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;

            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Employee Record</title>
    <link rel="stylesheet" href="../styles/style.css">

</head>
<body>
<header>
<img src="..images/Lacoste-logo.jpeg" alt="Lacoste Logo" style="max-width: 200px; height: auto;">
        <h1>Lacoste</h1>
    </header>

    <section id="main">
        <div class="container">
            <h2>Create New Employee Record</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                    <span class="invalid-feedback"><?php echo $address_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Salary</label>
                    <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                    <span class="invalid-feedback"><?php echo $salary_err; ?></span>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="../index.php" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
        <p>&copy; 2024 Lacoste Web App</p>
        </div>
    </footer>
</body>
</html>
