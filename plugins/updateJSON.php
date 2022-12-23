<?php
function updateJSON($id)
{
    try {
        include 'plugins\bookViewFun.php';
        $db = new PDO("mysql:host=localhost; dbname=shams", "root", "");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    $query = $db->prepare("SELECT * FROM books WHERE id = " . $id);
    $query->execute();
    $books = array();
    foreach ($query as $data) {
        $book = array(
            'img' => $data['cover'],
            'name' => $data['name'],
            'artist' => $data['author'],
            'book' => $data['dir'],
            'description' => $data['dis'],

        );
        array_push($books, $book);
    }

    $json = json_encode($books);

    file_put_contents('books.json', $json);

    echo "<script>let book_list = " . json_encode($books) . ";</script>";
}