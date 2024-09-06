<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=SUSE:wght@100..800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتجاتي</title>
</head>
<body> 
    <center>
        <h3>المنتجات المحجوزة</h3>
    </center>
    <?php 
    include('config.php');
    $result = mysqli_query($con, "SELECT * FROM addcard");
    while ($row = mysqli_fetch_array($result)) {
        echo "
        <center>
            <main>
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>اسم المنتج</th>
                            <th scope='col'>سعر المنتج</th>
                            <th scope='col'>شراء المنتج</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{$row['name']}</td>
                            <td>{$row['price']}</td>
                            <td><a href='del_card.php?id={$row['id']}' class='btn btn-danger'>شراء</a></td>
                        </tr>
                    </tbody>
                </table>
            </main>
        </center>
        ";
    }
    ?>

    <center>
        <a href="shop.php">الرجوع الى صفحة المنتجات</a>
    </center>
</body>
</html>
