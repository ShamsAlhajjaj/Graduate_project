    <?php
    try {
        $db = new PDO("mysql:host=localhost; dbname=shams", "root", "");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $query = $db->prepare("SELECT * FROM books WHERE id=10");
    $query->execute();
    echo "<script>" . "let book_list = [];" . "</script>";
    foreach ($query as $data) {

        $name = $data['name'];
        $discription = $data['dis'];
        $cover = $data['cover'];
        $author = $data['author'];
        $dir = $data['dir'];

        $script = "
    book_list.push({
            img: '{$cover}',
            name: '{$name}',
            artist: '{$author}',
            book: '{$dir}',
        })

    ";

        echo "<script>" . $script . "</script>";
    }
//echo "<script>" . "loadTrack(track_index);" . "</script>";