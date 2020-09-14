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
if(isset($_POST["submit"])){

    // print_r($_POST);
     
    // Checking For Blank Fields..

    //[name] => Ahmad [address] => Jakarta [gender] => female [prop] => 17 [kota] => 1701 [kec] => 170108 [kel] => 1701082001 [phone] => +6282240063030 [email] => dedimu@gmail.com [course] => OUTLET-WARKOP [info] => test

    if($_POST["name"]==""||$_POST["address"]==""||$_POST["gender"]==""||$_POST["prop"]=="" || $_POST["kota"]=="" || $_POST["kec"]=="" || $_POST["kel"]=="" || $_POST["phone"]=="" || $_POST["email"]=="" ){
    
        //echo "Silakan isi data semuanya ya ... ";
        disp_err();
    
    } else {
      
    // 		insert ke table
    //    $dbhost ='localhost';
    //    $dbuser ='root';
    //    $dbpass ='';
    //    $dbname ='u1098311_barista';
    //    $db_dsn = "mysql:dbname=$dbname;host=$dbhost";
	
	
	    $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'barista';
	    $db_dsn = "mysql:dbname=$dbname;host=$dbhost";
	
        try {
            $db = new PDO($db_dsn, $dbuser, $dbpass);
            // set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$_POST['name'], $_POST['address'], $_POST['gender'], $_POST['prop'], $_POST['kota'], $_POST['kec'], $_POST['kel'], $_POST['phone'], $_POST['email'], $_POST['course'], $_POST['info'], $_POST['tgllahir'], $_POST['ig'], $_POST['fb'], $_POST['wa']
            $sql = "INSERT INTO formpendaftaran 
                    (name, address, gender, prop, kota, kec, kel, phone, email,  info, tgllahir, ig, fb, wa, minat, nkp, wktdaf ) 
                    VALUES 
                    (:name, :address, :gender, :prop, :kota, :kec, :kel, :phone, :email, :info, :tgllahir, :ig, :fb, :wa, :minat, :nkp, :wktdaf)";
            
            $stmt = $db->prepare($sql);
            
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':prop', $prop);
            $stmt->bindParam(':kota', $kota);
            $stmt->bindParam(':kec', $kec);
            $stmt->bindParam(':kel', $kel);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            //$stmt->bindParam(':course', $course);
            $stmt->bindParam(':info', $info);
            $stmt->bindParam(':tgllahir', $tgllahir);
            $stmt->bindParam(':ig', $ig);
            $stmt->bindParam(':fb', $fb);
            $stmt->bindParam(':wa', $wa);
			$stmt->bindParam(':minat', $minat);
			$stmt->bindParam(':nkp', $nkp);
			$stmt->bindParam(':wktdaf', $wktdaf);
			
            $name    = $_POST['name'];
            $address = $_POST['address'];
            $gender  = $_POST['gender']; 
            $prop    = $_POST['prop'];
            $kota    = $_POST['kota'];
            $kec     = $_POST['kec'];
            $kel     = $_POST['kel'];
            $phone   = $_POST['phone'];
            $email   = $_POST['email'];
            //$course  = $_POST['course'];
            $info    = " ";
			$tgllahir    = $_POST['tgllahir'];
            $ig  = $_POST['ig'];
            $wa    = $_POST['wa'];
			$fb    = $_POST['fb'];
			$minat    = "";
			$nkp    = $_POST['nkp'];
			$wktdaf = date("Y-m-d");
			
            $stmt->execute();
            //echo "Data pendaftaran telah disimpan.";
            disp_simpan();

            /*
            if ($stmt->execute() === TRUE) {
                echo "Data pendaftaran telah disimpan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }*/

            //$stmt->close();
            //$db->close();

            $_SESSION['formSubmitted'] = true; // Sets session once form is submitted and input fields are not empty

            // Check if the "Sender's Email" input field is filled out
            $email=$_POST['email'];
            // Sanitize E-mail Address
            $email =filter_var($email, FILTER_SANITIZE_EMAIL);
            // Validate E-mail Address
            $email= filter_var($email, FILTER_VALIDATE_EMAIL); 
            $emailConfirmed=$_POST['email'];
            if (!$email){
                echo "<!--Jangan lupa untuk memasukkan alamat email Anda, Kalau tidak, kami tidak bisa menghubungi Anda.-->"; 
            } else {
                $subject = 'Registrasi Pelatihan Barista';
                $message = print_r($_POST,true);
                $headers =  'From:' . 'cs.bencoolencoffee@gmail.com' . "\r\n"; // Sender's Email
                $headers .= 'Cc:' . $email . "\r\n"; // Carbon copy to Sender
                // Message lines should not exceed 70 characters (PHP rule), so wrap it
                $message = wordwrap($message, 70);
                // Send Mail By PHP Mail Function
                //di hosting niaga hoster email tdk jln
                //mail("dher2000@gmail.com", $subject, $message, $headers);
                //echo "<script>$('#thankyouModal').modal('show')</script>";
            };

            if(isset($_SESSION['formSubmitted']) && $_SESSION['formSubmitted'] === true) {
                //echo "<script>$('#thankyouModal').modal('show')</script>"; // Show modal
                unset($_SESSION['formSubmitted']); // IMPORTANT - this will unset the value of $_SESSION['formSubmitted'] and will make the value equal to null
            }

        }
        catch(PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }
}else{

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Barista</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/signup-img2.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="." method="post">
                        <!--<h2 align="center">Form Registrasi Pelatihan Barista</h2>-->
                        <h2 align="center"><font size=+1 Color=red>Formulir Pendaftaran</font> <br>Pelatihan Wirausaha, Barista<br> dan Pemasaran Kopi</h2>
                        <div class="form-group">
                            <div class="form-group">
                                <font text-align=right size=2px Color=red>Kolom dengan tanda (*) wajib diisi</font>
                                <label for="name">Nama Lengkap :  <font Color=red>*</font></label>
                                <input type="text" name="name" id="name" placeholder="Nama Lengkap" required/>
                            </div>
                            
                        </div>
                        <script type="text/javascript">
                        function tampil_nkp(param)
                        {
                            if(param==1)
                            document.getElementById("nkp").style.visibility = 'visible';
                            else
                            document.getElementById("nkp").style.visibility = 'hidden';
                        }
                        </script>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name">Nomor Kartu Prakerja :</label>
                        
                        <div class="form-radio">
                            <div class="form-radio-item">
                                <input type="radio" name="nkpe" id="punya" value="true" onclick="tampil_nkp (1)">
                                <label for="punya">Punya Kartu Prakerja</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="nkpe" id="tidak" value="false" onclick="tampil_nkp (0)">
                                <label for="tidak">Tidak Punya Kartu Prakerja</label>
                                <span class="check"></span>
                            </div>
                        </div>
                                <input type="text" name="nkp" id="nkp"/ placeholder="001xxxxxx" style="visibility: hidden";>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat lengkap :  <font Color=red>*</font></label>
                            <input type="text" name="address" id="address" placeholder="Alamat" required/>
                        </div>
						<div class="form-group">
                            <label for="address">Tanggal Lahir :  <font Color=red>*</font></label>
                            <input type="date" name="tgllahir" id="tgllahir" required/>
                        </div>
						
                        <div class="form-radio">
                            <label for="gender" class="radio-label">Jenis Kelamin :  <font Color=red>*</font></label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="male" value="laki-laki" checked>
                                <label for="male">Laki laki</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="female" value="perempuan">
                                <label for="female">Perempuan</label>
                                <span class="check"></span>
                            </div>
                        </div>
						
                        <div class="form-row">
                            <div class="form-group">
                                <label for="state">Provinsi :  <font Color=red>*</font></label>
                                <div class="form-select">
                                    <!-- PROP -->
                                    <select name="prop" id="prop" onchange="ajaxkota(this.value)">
                                    <option value="">Pilih Provinsi</option>
                                    <?php
                                    include_once 'koneksi.php';
                                    $query=$db->prepare("SELECT id_prov,nama FROM provinsi ORDER BY nama");
                                    $query->execute();
                                    while ($data=$query->fetchObject()){
                                    echo '<option value="'.$data->id_prov.'">'.$data->nama.'</option>';
                                    }
                                    ?>
                                    <select>
                                    <!-- -->
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">Kabupaten/Kota :  <font Color=red>*</font></label>
                                <div class="form-select">
                                    <!-- KOTA / KAB -->
                                    <select name="kota" id="kota" onchange="ajaxkec(this.value)">
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                    <!--  -->
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
						
						  <div class="form-row">
                            <div class="form-group">
                                <label for="state">Kecamatan :  <font Color=red>*</font></label>
                                <div class="form-select">
                                    <!-- KEC -->
                                    <select name="kec" id="kec" onchange="ajaxkel(this.value)">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                    <!-- -->
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">Kelurahan/Desa :  <font Color=red>*</font></label>
                                <div class="form-select">
                                    <!-- DESA -->
                                    <select name="kel" id="kel" onchange="showCoordinate();">
                                        <option value="">Pilih Kelurahan/Desa</option>
                                    </select>
                                    <!-- -->
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label for="phone">Nomor Telpon :  <font Color=red>*</font></label>
                            <input type="text" name="phone" id="phone" placeholder="628xxxxxxxxx" required>
                        </div>
						     <div class="form-group">
                            <label for="email">Email :  <font Color=red>*</font></label>
                            <input type="email" name="email" id="email" placeholder="email@gmail.com" required/>
                        </div>
                        <div class="form-group">
                            <label for="ig">Instagram/IG:</label>
                            <input type="text" name="ig" id="ig" placeholder="Instagram" />
						 </div>
	                        <div class="form-group">
                            <label for="fb">Facebook/FB:</label>
                            <input type="text" name="fb" id="fb" placeholder="Facebook" />
						 </div>
                        <div class="form-group">
                            <label for="wa">Whatsapp/Telegram:</label>
                            <input type="text" name="wa" id="wa" placeholder="628xxxxxxxxx" />
						 </div>
                     
	                    <!-- <div class="form-group">
                            <label for="course">Tertarik Pelatihan yang akan diikuti: <font Color=red>*</font></label>
                            <div class="form-select">
                                <select name="course" id="course">
                                     <option value="BARISTA_PEMULA">BARISTA PEMULA</option>
                                    <option value="USAHA_KEDAI">USAHA KEDAI KOPI SUSU KEKINIAN DENGAN MODAL MINIM</option>
                                    <option value="OUTLET-WARKOP">OUTLET WARUNG KOPI</option>
									 <option value="MITRA_ONLINE_WARKOP">MITRA OUTLET WARUNG KOPI</option> 
									 <option value="PEMASARAN_KOPI_ONLINE">PEMASARAN KOPI ONLINE</option> 
									 <option value="SALES_KOPI_KELILING">SALES KOPI KELILING WILAYAH</option>

									
									
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div> -->
						<!--<div class="form-group">
                            <label for="info">Keterangan tambahan : </label>
                            	<textarea name="info" id="info" rows="5" cols="40" value=""></textarea>
						 </div>-->					 
						 
						
						   <div class="form-submit">
                            <input type="submit" value="Ulangi" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Kirim" class="submit" name="submit" id="submit" />
                        </div>
						
						
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!--
    <div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Terimakasih atas registrasi Anda</h4>
                </div>
                <div class="modal-body">
                    <p>Thanks for getting in touch!</p>                     
                </div>    
            </div>
        </div>
    </div>
    -->

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="ajax_daerah.js"></script>
</body>
</html>
<?php
}
function disp_err() {
    $html='
    <!DOCTYPE html>
    <html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>Pendaftaran Pelatihan bencoolen Coffee</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="main">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-img">
                        <img src="images/signup-img.jpg" alt="">
                    </div>
                    <div class="signup-form">
                    <p><br><br><br>
                            <h2 align="center"><font color="red">Pesan Kesalahan</font></h2><br><br>
                            <h2 align="center">Maaf Anda belum mengisi kolom secara lengkap <br><br><br>
                        
                        <button onclick="goBack()">Kembali kehalaman sebelumnya</button>

    <script>
    function goBack() {
    window.history.back();
    }
    </script>
                        
                        </h2>
                    </div>
                </div>
            </div>

        </div>

        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body>
    </html>
    ';
    echo $html;
}

function disp_simpan() {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--<meta http-equiv="refresh"  content="10; url=http://pelatihan.bencoolen.coffee/">-->
        <script type="text/javascript">
        window.location.href = "https://prakerja.bencoolencoffee.com/pendaftaran/terimakasih/";</script>
        <title>Pendaftaran Pelatihan Bencoolen Coffee</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <!--<body>

        <div class="main">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-img">
                        <img src="images/signup-img2.jpg" alt="">
                    </div>
                    <div class="signup-form">
                    <p><br><br><br>
                            <h2 align="center"><font color="red">Form Registrasi Pelatihan Barista</font></h2><br><br>
                            <h3 align="center">Terimakasih Anda sudah mengisi form registrasi, selanjutnya akan diproses dan dihubungi oleh tim pelatihan Barista Bencoolen Coffee. <br><br>
							<h3 align="center">Langkah selanjutnya untuk Anda belum terdaftar prakerja silahkan registrasi di http://www.prakerja.co.id dan untuk yang telah terdaftar bisa mengikuti memilih  pelatihan di Mitra pelatihan resmi : http://www.pijarmahir.id, http://www.maubelajarapa.com, http://www.skillacademy.com <br><br><br>Salam, <br>Bencoolen Coffee</br></br></h2>
                    </div>
                </div>
            </div>

        </div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body> -->
    <body>

<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

</style>

        <div class="main">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-img">
                        <img src="images/signup-img2.jpg" alt="">
                    </div>
                    <div class="signup-form">
                    <p><br><br><br>
                            <h2 align="center"><font color="red">Form Registrasi Pelatihan Barista</font></h2><br><br>
                            <h3 align="center">Terimakasih Anda sudah mengisi form registrasi, selanjutnya akan diproses dan dihubungi oleh tim pelatihan Barista Bencoolen Coffee. <br><br>
							<h3 align="center">
							A. &nbsp;&nbsp;Apakah anda sudah memiliki kartu prakerja? Jika sudah, anda bisa memilih  pelatihan di <br>Mitra pelatihan resmi : <a href="https://www.pijarmahir.id">www.pijarmahir.id</a>, <a href="http://www.maubelajarapa.com">www.maubelajarapa.com</a>, <a href="http://www.skillacademy.com">www.skillacademy.com</a><br><br><br>
							<br>B. &nbsp;&nbsp;Belum memiliki kartu prakerja? <br><a href="https://www.prakerja.go.id/" class="button button3">Daftar!</a>
							<br><br><br>Salam, <br>Bencoolen Coffee</br></br></h2>
                    </div>
                </div>
            </div>

        </div>

        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body>
    </html>
    <?php
}
?>