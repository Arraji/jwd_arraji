<?php
    //Fungsi luas segitiga
    function lSegitiga($a, $t){
        $luas=($a*$t)/2;
        return $luas;
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEGITIGA</title>
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
</head>
<body>
    <!--navbar-->
    <?php include 'navbar.php';?>   
    <br><br><br>
    <div class="page-container2">
        <!-- hitung segitiga-->
        <div class="card p-3 bg-light mb-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header small-box bg-warning">
                                Hitung Luas Segitiga
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
            <table >            
                <tr class="form-group">
                    <td><b>Masukkan Alas</td>
                    <td>:</td>
                    <td><br><input type="text" onkeypress="return isNumberKey(event)" name="alas" required class="form-control"></br></td>
                </tr>

                <tr class="form-group">
                    <td><b>Masukkan Tinggi</td>
                    <td>:</td>
                    <td><br><input type="text" onkeypress="return isNumberKey(event)" name="tinggi" required class="form-control"><br></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><br><input type="submit" name="submit" value="Hitung" class="btn btn-info"></br></td>
                </tr>
            </table>
        </form>   

        <br>
        <?php 
        if(isset($_POST['submit'])){ // proses s
        $alas=$_POST['alas']; //melakukan pengecekan apakah data itu ada isinya 
        $tinggi=$_POST['tinggi'];

        // menghitung luas segitiga
        $luasSegitiga=lSegitiga($alas, $tinggi);

        //Tanggal dan waktu sekarang
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date("l,d-m-Y H:i:s");   
        
        // Format data yang akan diparsing
        $data = "\n $alas|$tinggi|$luasSegitiga|$tgl";

        // Buka file segitiga.txt, kemudian tuliskan isi variabel di atas kedalam segitiga.txt
        $fh = fopen("../output/segitiga.txt", "a");
        fwrite($fh, $data);

        // Tutup file data.txt
        fclose($fh);

        echo "Diketahui : <br />";
        echo "Hasil hitung Segitiga yaitu sebagai berikut<br />";
        echo "Pada $tgl <br />";
        echo "Alas = $alas<br />";
        echo "Tinggi = $tinggi<br />";
        echo "Maka luas Segitiga[ ($alas x $tinggi)/2 ] = $luasSegitiga<br />";

    }  ?>
    </div>


    <script src="assets/vendors/js/bootstrap.min.js"></script>
<script language=Javascript>
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
        return false;

    return true;
}
</script>
</body>
</html>