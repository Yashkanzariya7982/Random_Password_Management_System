<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('function/function.php');
if($_POST['text'] || $_POST['key']){
    $decrypted_txt = encrypt_decrypt('decrypt', $_POST['text'], $_POST['key']);
}
?>
<div>
    <form method="POST">
        <p><span style="color: black; font-size: 30px;"> Paste the copied password on textarea  &  <br> the key value Enter in Key box<br> Click on Decrypt password Button.</span></p><br>
        <textarea name="text" rows="8" cols="40" placeholder="Write text here (for decryption)"><?= $_POST['text'] ?></textarea><br/>
        <input name="key" placeholder="key" type="text" value="<?= $_POST['key'] ?>" /><br/><br/>
        <button class="btn">Decrypt Text</button><br/>
            <textarea disabled name="decryptedText" id="decryptedText" rows="8" cols="40"><?= $decrypted_txt ?></textarea><br>
            <button type="button" onclick="copyText()" class="btn" >Copy</button>
    </form>
    <form method="post" action="Feedback.html">
        <button class="btn">Exit</button>
    </form>
</div>

<script>
    function copyText() {
        var textarea = document.getElementById("decryptedText");
        textarea.select();
        document.execCommand("copy");
        alert("Copied the text: " + textarea.value);
    }
</script>
    

</body>
</html>
