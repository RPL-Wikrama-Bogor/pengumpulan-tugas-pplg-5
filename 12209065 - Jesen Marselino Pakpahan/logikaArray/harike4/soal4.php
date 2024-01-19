<?php
$barang = [
    [
    'nama'=>'Ban',
    'diskon'=>10,
],
[
    'nama'=>'Oli mesin',
],
[
    'nama'=>'Kampas Rem',
],
[
    'nama'=>'Busi',
    'diskon'=>9,
],
[
    'nama'=>'Akumulator',
    'diskon'=>7,
],
];

foreach($barang as $item) {
    if(!empty($item['diskon'])){
        echo $item['nama'].$item ['diskon'];
    }
}
?>