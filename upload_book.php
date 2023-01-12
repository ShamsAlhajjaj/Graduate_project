<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="plugins\upload_status.php" method="POST" enctype="multipart/form-data">
        Select Book
        <br>
        <input type="file" name="ubook" id="ubook" accept="audio/*">
        <br><br>
        Select Cover Image
        <br>
        <input type="file" name="uimg" id="uimg" accept=" image/*">
        <br><br>
        Book name:
        <input id="book_name" name="book_name">
        <br><br>
        author name:
        <input id="author_name" name="author_name">
        <br><br>
        Book discription:
        <input id="book_dis" name="book_dis">

        <input type="submit" name="upload">


    </form>
</body>

</html>