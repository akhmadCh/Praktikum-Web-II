<html>
<head>
    <title>Praktikum Soal 4</title>
</head>
<style>

</style>
<body>

<?php 
    $phones = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5");
?>

<table border="1">
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    <?php $i = 0 ?>
    <?php foreach ($phones as $phone) : ?>
        <tr>
            <td>
                <?= $phone ?>
            </td>
        </tr>
        <?php $i++ ?>
    <?php endforeach; ?>
</table>
    
</body>
</html>