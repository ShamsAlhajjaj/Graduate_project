<?php
try {
    include 'plugins\bookViewFun.php';
    $db = new PDO("mysql:host=localhost; dbname=shams", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
$value = "%%";
if (isset($_GET['btn_search'])) {
    $value = "%" . $_GET['search'] . "%";
}

$query = $db->prepare("SELECT * FROM books WHERE name LIKE :value");
$query->bindParam("value", $value);
$query->execute();

foreach ($query as $data) {

    $name = $data['name'];
    $discription = $data['dis'];
    $cover = $data['cover'];

    echo bookView($name, $discription, $cover);
}