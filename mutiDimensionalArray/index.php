<form action="" method="get">
    <div>
        <label>Sekolah</label>
        <select name="tingkat">
            <option value="SMP">SMP</option>
            <option value="SMA">SMA</option>
            <option value="SMK">SMK</option>
        </select>
        <button type="submit" name="button">Tampilkan</button>&nbsp;&nbsp;&nbsp;
    </div>
    
</form>

<?php

$data = require_once("./array.php");
// $data = json_encode($data);

$tingkat = $_GET['tingkat']??null;

$dataFiltered = array_filter($data,function($key) use ($tingkat){
    // return $key == 'SMA 01 Malang';
    return preg_match('/'.$tingkat.'/',$key);
}, ARRAY_FILTER_USE_KEY);

$sekolah = array_keys($dataFiltered);
$i=0;
foreach($dataFiltered as $output)
{
    echo "Nama Sekolah: " . $sekolah[$i]."<br>";
    echo "Alamat Sekolah: ". $output['alamat']."<br>";
    echo "Telp: ". $output['tlp']."<br>";
    if(!empty($output['siswa'])){
        echo "-----------------------<br>";
        foreach($output['siswa'] as $siswa){
            echo "NIS: " . $siswa['nis']." # ";
            echo "Nama Siswa: ". $siswa['nama']." # ";
            echo "Tgl Lahir: ". $siswa['tgl_lahir']."<br>";
        }
        echo "=======================<br><br>";
    }else{
        echo "=======================<br><br>";
    }
    $i++;
}
?>