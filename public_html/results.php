<!DOCTYPE html>
<html lang="en">

<?php
    include_once('../.config.php');
    function random_string($length) {
        $str = random_bytes($length);
        $str = base64_encode($str);
        $str = str_replace(["+", "/", "="], "", $str);
        $str = substr($str, 0, $length);
        return strtoupper($str);
    }
    $db = CreateDbConnection();
    $replay = htmlspecialchars($_POST["replay"]);
    $ideo = "";
    $code = "";
    $stmt = $db->prepare("SELECT * FROM validator WHERE replay = ?;");
    $stmt->execute(array($replay));
    $result = $stmt->fetch();

    if($result)
    {
        $ideo = $result["ideo"];
        $code = $result["code"];
    } else {
        $ideo = htmlspecialchars($_REQUEST["ideo"]);
        $code = random_string(6);
        $stmt = $db->prepare('INSERT INTO validator (code, replay, ideo) VALUES (?, ?, ?);');
        $stmt->execute(array($code, $replay, $ideo));
    } 
?>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg+xml" href="assets/icon.svg">
    <title>Ideosorter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:ttl" content="600">
    <meta property="og:site_name" content="Pigeon CoOp Quiz">
    <meta property="og:title" content="Ideosorter">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Ideosorter quiz for entry into Pigeon CoOp & Conquer Discord">
    <meta property="og:url" content="http://pigeoncoop.top/">
    <meta property="og:image" content="http://pigeoncoop.top/assets/embedicon.png">
    <meta property="og:image:width" content="512">
    <meta property="og:image:height" content="512">
    <meta name="theme-color" content="#222222" data-react-helmet="true">
    <script>const ideo = "<?php echo $ideo; ?>"</script>
    <script src="scripts/common.js" type="module"></script>
</head>
<body>
    <h1 id="results_title">...</h1>
    <div id="result">...</div>
    <img id="image">
    <div id="desc"></div>
    <div id="code">
        Your code is <?php echo $code; ?><br/>
        Please use the command /quiz in the discord to activate your account.
    </div>
    <button id="copy" class="large-button" onclick="navigator.clipboard.writeText('/quiz <?php echo $code; ?>');">Copy command to clipboard</button>
    <button id="indexbutton" class="large-button"></button>
    <button id="creditsbutton" class="large-button" onclick="location.href = 'credits.html';"></button>
</body>
</html>
