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
$books = array();

foreach ($query as $data) {

    $name = $data['name'];
    $discription = $data['dis'];
    $cover = $data['cover'];
    $id = $data['id'];

    $book = array(
        'img' => $data['cover'],
        'name' => $data['name'],
        'artist' => $data['author'],
        'book' => $data['dir'],
        'description' => $data['dis'],

    );
    array_push($books, $book);

    echo bookView($name, $discription, $cover, $id);
}


$json = json_encode($books);

file_put_contents('books.json', $json);

?>

<script>
storeBook(1)
</script>