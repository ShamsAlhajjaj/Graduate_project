<?php


function bookView($name, $des, $coverSrc, $id)
{

    return
        '<div id="' . $id . '" class="Book" onmouseover="readText(this.innerText)" onmouseleave="stopSpeak()"
            onclick="openBook(' . $id . ')">
                <img class="BookCover" src="' . $coverSrc . '">
                <div class="BookInfo">
                    <p class="BookName">' . $name . $id . '</p>
                    <p class="BookDescription">' . $des . '</p>
                 </div>
            </div>';
}

try {
    $db = new PDO("mysql:host=localhost; dbname=shams", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
$value = "%%";
if (isset($_GET['btn_search']) && $_GET['search'] > 0) {
    $value = "%" . $_GET['search'] . "%";
    echo "<script>console.log('" . 'you searched for: ' . $_GET['search'] . "')</script>";
}

$query = $db->prepare("SELECT * FROM books WHERE name LIKE :value");
$query->bindParam("value", $value);
$query->execute();

$num_rows = $query->rowCount();

if ($num_rows > 0) {
    // There are records in the database
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
    $results = '';
    $i = 1;
    foreach ($books as $x) {
        $results = $results . $i . ',' . '-' . $x['name'] . '\n';
        $i++;
    }

    //print_r($results);

    echo "<script>
    let mySpeech_en = new p5.Speech();
    mySpeech_en.setLang('en-US');
    mySpeech_en.setVoice('Alice');
    mySpeech_en.speak('results: '+'" . $results . "')
    </script>";
    //if (!isset($_SESSION['first_time'])) {
    $json = json_encode($books);
    file_put_contents('books.json', $json);
    //}

} else {
    // There are no records in the database
    echo "<h1>There are no results matching your search</h1>";
    echo "<script>
    let mySpeech_en = new p5.Speech();
    mySpeech_en.setLang('en-US');
    mySpeech_en.setVoice('Alice');
    mySpeech_en.speak('There are no results matching your search')
    </script>";
}


?>

<script>
async function setCookie(cname, cvalue, exdays) {
    let d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function storeBook(id) {
    x = fetch('books.json')
        .then(response => response.json())
        .then(data => {
            setCookie("name", data[id - 1].name, 1);
            setCookie("img", data[id - 1].img, 1);
            setCookie("artist", data[id - 1].artist, 1);
            setCookie("book", data[id - 1].book, 1);
        });
}
async function openBook(id) {
    await storeBook(id);
    window.location.assign("listening.php");
}

storeBook(1);
</script>