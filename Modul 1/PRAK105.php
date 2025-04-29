<html>
<head>
    <title>Praktikum Soal 5</title>
</head>
<style>

</style>
<body>

<?php 
    $phones = [
        "1" => "Samsung Galaxy S22", 
        "2" => "Samsung Galaxy S22+", 
        "3" => "Samsung Galaxy A03", 
        "4" => "Samsung Galaxy Xcover 5"
    ];
?>

<table border="1">
    <tr style="background-color: red;"  >
        <th style="padding: 20px;">Daftar Smartphone Samsung</th>
    </tr>
    <?php foreach ($phones as $phone) : ?>
        <tr>
            <td>
                <?= $phone ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
    
</body>
</html>