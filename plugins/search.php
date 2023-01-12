<?php


function bookView($name, $des, $coverSrc, $id)
{

    return
        '<div id="' . $id . '" class="Book" onmouseover="readText(this.innerText)" onmouseleave="stopSpeak()"
            onclick="mySpeech_en.stop(); openBook(' . $id . ')">
                <img class="BookCover" src="' . $coverSrc . '">
                <div class="BookInfo">
                    <p class="BookName">' . $name . '</p>
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

$query = $db->prepare("SELECT * FROM books WHERE name LIKE :value AND language = 'ar'");
$query->bindParam("value", $value);
$query->execute();

$num_rows = $query->rowCount();
echo "<script>

    let mySpeech_en = new p5.Speech();
    mySpeech_en.setLang('ar-SA');
    mySpeech_en.stop();

  if (document.referrer !== 'http://localhost:8080/graduate%20project/index.php') {
        console.log('you are in index');
        mySpeech_en.speak('أهلًا بك في الصفحة الرئيسيةِ');
}

    </script>";

if ($num_rows > 0) {
    // There are records in the database
    $books = array();


    $id = 0;
    foreach ($query as $data) {
        $name = $data['name'];
        $discription = $data['dis'];
        $cover = "_images/playback_images/" . $data['cover'];
        $id = $id;
        $id++;

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
        $results = $results . $i . '،' . $x['name'] . 'ْ' . '\n';
        $i++;
    }


    echo "<script>
    mySpeech_en.speak('الكُتُبُ المُتاحَةُ: '+'" . $results . "');
    </script>";
    $json = json_encode($books);
    file_put_contents('books.json', $json);
} else {
    // There are no records in the database
    echo "<h1>لا يوجد نتائج مطابقة لبحثك</h1>";
    echo "<script>
    mySpeech_en.speak('لا يوجد نتائج مطابقة لبحثك')
    </script>";
}


?>

<script>
function setCookie(cname, cvalue, exdays) {
    let d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function storeBook(index) {
    x = fetch('books.json')
        .then(response => response.json())
        .then(data => {
            async function setC() {
                console.log(index);
                console.log(data[index - 1]);
                await setCookie("name", data[index - 1].name, 1);
                await setCookie("img", data[index - 1].img, 1);
                await setCookie("artist", data[index - 1].artist, 1);
                await setCookie("book", data[index - 1].book, 1);
            }
            setC();

        });
}

async function openBook(index) {
    await storeBook(index);
    setTimeout(function() {
        window.location.assign("listening.php");
    }, 100);
}
</script>