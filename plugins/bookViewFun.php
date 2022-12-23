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


function bookView($name, $des, $coverSrc, $id)
{

    return
        '<div id="' . $id . '" class="Book" onmouseover="readText(this.innerText)" onmouseleave="stopSpeak()"
            onclick="storeBook(' . $id . ') ;visitPage(\'listening.php\')">
                <img class="BookCover" src="' . $coverSrc . '">
                <div class="BookInfo">
                    <p class="BookName">' . $name . '</p>
                    <p class="BookDescription">' . $des . '</p>
                 </div>
            </div>';
}