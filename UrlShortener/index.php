
<a href="index.php">На головну</a>
<br>
<br>


<?php


require_once 'UrlShortener.php';

$urlShortener = new UrlShortener();

if (isset($_POST['url'])) {
    $url = $_POST['url'];

    // Validate URL
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        echo "Напишіть саме валідний Url, будь ласка";
        exit;
    }


}

if (isset($_POST['url'])) {
    $shortUrl = $urlShortener->shorten($_POST['url']);
} else {
    $shortUrl = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>URL Shortener</title>
</head>
<body>
    <h1>URL Shortener</h1>
    <form method="post">
        <label for="url">Скопіюйте сюди посилання, яке треба скоротити:</label>
        <input type="text" name="url" id="url">
        <button type="submit">Shorten</button>
    </form>
    <?php if ($shortUrl): ?>
        <p>Скорочений URL:</p>
        <a href="<?php echo $shortUrl ?>"><?php echo $shortUrl ?></a>
        </br>
    <?php endif ?>
</body>
</html>
