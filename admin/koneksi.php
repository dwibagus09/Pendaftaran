<!-- author : Yudi Setyawan
email author : yudi.setyawan07@gmail.com
handphone : 082382000703 -->

<!-- file ini digunakan untuk menghubungkan antara database dan script php
serta menampung informasi website -->

<?php 
session_start();
$dbhost ='localhost';
$dbuser ='root';
$dbpass ='';
$dbname ='barista';
$con 	= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$web 	= 'Pendaftaran Prakerja';
?>