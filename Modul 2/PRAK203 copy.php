<!DOCTYPE html>
<html>
<body>

<?php
function toCelcius($val, $from) {
    return match($from) {
        'F'  => ($val - 32) * 5/9,
        'Re' => $val * 5/4,
        'K'  => $val - 273.15,
        default => $val
    };
}

function fromCelcius($val, $to) {
    return match($to) {
        'F'  => $val * 9/5 + 32,
        'Re' => $val * 4/5,
        'K'  => $val + 273.15,
        default => $val
    };
}

$nilai = $_POST['nilai'] ?? '';
$dari  = $_POST['dari']  ?? '';
$ke    = $_POST['ke']    ?? '';
$hasil = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $dari && $ke) {
    $hasil = ($dari === $ke) ? $nilai : fromCelcius(toCelcius($nilai, $dari), $ke);
    $simbol = ["C" => "°C", "F" => "°F", "Re" => "°Re", "K" => "K"];
}

$suhu = [
    "C" => "Celcius",
    "F" => "Fahrenheit", 
    "Re" => "Reamur", 
    "K" => "Kelvin"
];

?>

<form method="post">
    Nilai: <input type="number" name="nilai" required value="<?= htmlspecialchars($nilai) ?>"><br>

    Dari :<br>
    <?php foreach ($suhu as $kode => $label): ?>
        <label><input type="radio" name="dari" value="<?= $kode ?>" <?= $dari === $kode ? "checked" : "" ?>> <?= $label ?></label><br>
    <?php endforeach; ?>
    
    Ke :<br>
    <?php foreach ($suhu as $kode => $label): ?>
        <label><input type="radio" name="ke" value="<?= $kode ?>" <?= $ke === $kode ? "checked" : "" ?>> <?= $label ?></label><br>
    <?php endforeach; ?>
    
    <input type="submit" name="konversi" value="Konversi">
</form>

<?php if ($hasil !== null): ?>
    <h2>Hasil Konversi: <?= round($hasil, 2) . " " . $simbol[$ke] ?></h2>
<?php endif; ?>

</body>
</html>