<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subway Station</title>
    <link rel="stylesheet" href="subway2.css">
</head>

<body>
    <div class="subway">
        <img src="subway_logo.jpeg" alt="desktop">
        <h1>Welcome to the Subway Station</h1>
        <p>Your one-stop destination for delicious subs!</p>

        <h2>Menu:</h2>
        <table>
            <tr>
                <th>Sub</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>Classic Italian BMT</td>
                <td>$6.99</td>
            </tr>
            <tr>
                <td>Turkey & Ham</td>
                <td>$5.99</td>
            </tr>
            <tr>
                <td>Veggie Delight</td>
                <td>$4.99</td>
            </tr>
            <tr>
                <td>Spicy Italian</td>
                <td>$6.49</td>
            </tr>
            <tr>
                <td>Subway Club</td>
                <td>$7.49</td>
            </tr>

        </table>

        <div class="promotions">
            <h2>Promotions:</h2>
            <p>Check out our latest promotions:</p>
            <ul>
                <li>Buy one footlong, get one free!</li>
                <li>Free cookie with any purchase</li>
                <li>10% off on all online orders</li>
            </ul>
        </div>

        <div class="contact-form">
            <h2>Contact Us:</h2>
            <form action="#" method="post">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required value="Gurman Kaur"><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required value="gurmansidhu@012gmail.com"><br>

                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" required></textarea><br>

                <input type="hidden" id="id" name="id" value="202106784">

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <section id="employees">
        <h2>Employees</h2>
        <div class="container">
            <ul>
                <li><a href="create.php">Add New Employee</a></li>
            </ul>
        </div>
        <?php
        $query = "SELECT * FROM employees";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) :
            ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['address']; ?>
                        </td>
                        <td>
                            <?php echo $row['salary']; ?>
                        </td>
                        <td>
                            <a href="back-end/read.php?id=<?php echo $row['id']; ?>" title="View Record">View</a>
                            <a href="back-end/update.php?id=<?php echo $row['id']; ?>" title="Update Record">Update</a>
                            <a href="back-end/delete.php?id=<?php echo $row['id']; ?>" title="Delete Record">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else : ?>
            <p>No records found.</p>
            <?php endif; ?>
    </section>
    <?php
?>

</body>

</html>