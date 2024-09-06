<?php
include('config.php');
$ID=$_GET['id'];
$up=mysqli_query($con,"select * from prod where id=$ID");
$data=mysqli_fetch_array($up);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=SUSE:wght@100..800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تاكيد شراء المنتج</title>
    <style>
        input{
            display: none;
        }
       
    </style>

</head>
<body>
    <center>
        <form action="insert_card.php" method="post">
            <h2>هل فعلا تود شراء المنتج</h2>
            <input type="text" name="id" value='<?php echo $data['id']?>'>
            <input type="text" name="name"value='<?php echo $data['name']?>'> >
            <input type="text" name="price"value='<?php echo $data['price']?>'> >
            <button name="add" type="submit" class='btn btn-warning' >تاكيد اضافة المنتج للعربة</button>
        </form>


    </center>
</body>
</html>