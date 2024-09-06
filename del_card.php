<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=SUSE:wght@100..800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إتمام الشراء</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">إتمام الشراء</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $address = htmlspecialchars($_POST['address']);
            $product_id = intval($_POST['product_id']);

            // إعداد البريد الإلكتروني
            $to = "ademrouaibia@gmail.com"; // البريد الإلكتروني الذي سيتم إرسال الطلبات إليه
            $subject = "طلب شراء جديد";
            $message = "
            <html>
            <head>
            <title>طلب شراء جديد</title>
            </head>
            <body>
            <p>تفاصيل الطلب:</p>
            <table>
            <tr>
            <th>الاسم</th><td>$name</td>
            </tr>
            <tr>
            <th>البريد الإلكتروني</th><td>$email</td>
            </tr>
            <tr>
            <th>رقم الهاتف</th><td>$phone</td>
            </tr>
            <tr>
            <th>العنوان</th><td>$address</td>
            </tr>
            <tr>
            <th>معرف المنتج</th><td>$product_id</td>
            </tr>
            </table>
            </body>
            </html>
            ";

            // إعداد رؤوس البريد الإلكتروني
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: <$email>" . "\r\n";

            // إرسال البريد الإلكتروني
            if (mail($to, $subject, $message, $headers)) {
                echo "<script>alert('تم إرسال الطلب بنجاح'); window.location.href='products.php';</script>";
            } else {
                echo "<script>alert('حدثت مشكلة في إرسال الطلب'); window.location.href='products.php';</script>";
            }
        } else {
            $product_id = intval($_GET['id']);
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">الاسم الكامل</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">رقم الهاتف</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">العنوان</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <button type="submit" class="btn btn-primary">إرسال الطلب</button>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>
