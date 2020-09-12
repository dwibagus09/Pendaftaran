<?php
if (!empty($_GET)) {
    // prevent XSS
    $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
}
if (!empty($_POST)) {
    // prevent XSS
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //echo $_POST['name'];
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Para Pendaftar Pelatihan Barista</title>
<meta content="noindex, nofollow" name="robots">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Para Pendaftar Pelatihan Barista</h2>
</div>
<div class="divB">
<div class="divD">
<p>List Nama</p>
<?php
$connection = mysqli_connect("localhost", "u1098311_barista", "Barista123_","u1098311_barista"); 

//$query = mysql_query("select * from formpendaftaran", $connection);
$query = mysqli_query($connection, "select id,name from formpendaftaran");
$rowcount=mysqli_num_rows($query);

while ($row = mysqli_fetch_array($query)) {
echo "<b>{$row['id']}.<a href='./?id={$row['id']}'>{$row['name']}</a></b>";
echo "<br />";
}
?>
<!--
<br>
<b>Total:</b><?php echo $rowcount; ?>
-->
</div>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1 = mysqli_query($connection,"select id,name,gender,email,phone,address,(select nama from kelurahan where id_kel=a.kel) as kel, (select nama from kecamatan where id_kec=a.kec) as kec, (select nama from kabupaten where id_kab=a.kota) as kota, (select nama from provinsi where id_prov=a.prop) as prop, course,info from formpendaftaran a where id=$id");
    while ($row1 = mysqli_fetch_array($query1)) {
        ?>
        <div class="form">
        <h2>---Details---</h2>
        <!-- Displaying Data Read From Database -->
        <span>Nama:</span> <?php echo $row1['name']; ?><br><br>
        <span>Jenis Kelamin:</span> <?php echo $row1['gender']; ?><br><br>
        <span>E-mail:</span> <?php echo $row1['email']; ?><br><br>
        <span>No Kontak:</span> <?php echo $row1['phone']; ?><br><br>
        <span>Alamat:</span> <?php echo $row1['address']; ?><br><br>
        <span>Kelurahan/Desa:</span> <?php echo $row1['kel']; ?><br><br>
        <span>Kecamatan:</span> <?php echo $row1['kec']; ?><br><br>
        <span>Kota/Kab:</span> <?php echo $row1['kota']; ?><br><br>
        <span>Propinsi:</span> <?php echo $row1['prop']; ?><br><br>
        <span>KURSUS:</span> <?php echo $row1['course']; ?><br><br>
        <span>Info:</span> <?php echo $row1['info']; ?>
        </div>
        <?php
    }
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
mysqli_close($connection); // Closing Connection with Server
?>
</body>
</html>