<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=SUSE:wght@100..800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products -المنتجات</title>
    <style>
        body {
            font-family: 'Nerko One', cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #f0a500;
        }

        .main {
            margin-top: 20px;
        }

        .card {
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            text-align: center;
        }

        .btn-primary {
            background-color: #343a40;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #f0a500;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .col-md-4 {
            margin-bottom: 20px;
        }

        p {
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>متجر المنتجات</h1>
            <nav>
                <ul>
                    <li><a href="index.html">الرئيسية</a></li>
                    <li><a href="products.html">المنتجات</a></li>
                    <li><a href="about.html">من نحن</a></li>
                    <li><a href="card.php">عربتي</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <center>
        <h2>المنتجات المتوفرة</h2>
    </center>
    <div class="container">
        <div class="row">
            <?php
            include('config.php');
            $result = mysqli_query($con, "SELECT * FROM prod");
            while ($row = mysqli_fetch_array($result)) {
                echo '
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['name'] . '</h5>
                            <p class="card-text">' . $row['price'] . '</p>
                            <a href="val.php?id=' . $row['id'] . '" class="btn btn-success">إضافة إلى السلة</a>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>
</body>
</html>
