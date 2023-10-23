<?php
class RentalMotor {
    private $listMember = ['ana', 'sam', 'alex', 'ara'];
    
    // Tentukan harga untuk berbagai jenis sepeda motor
    private $motorbikePrices = [
        'Motor' => 80000,
        'Scoopy' => 70000,
        'Beat' => 50000,
        'Scooter' => 60000
    ];

    public function __construct() {
        $this->namaPelanggan = "";
        $this->lamaWaktuRental = "";
        $this->jenisMotor = "";
        $this->isMember = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->namaPelanggan = $_POST["namaPelanggan"];
            $this->lamaWaktuRental = $_POST["lamaWaktuRental"];
            $this->jenisMotor = $_POST["jenisMotor"];

            //Periksa apakah nama pelanggan ada dalam daftar anggota
            if (in_array(strtolower($this->namaPelanggan), array_map('strtolower', $this->listMember))) {
                $this->isMember = true;
            }

            // Dapatkan harga untuk tipe sepeda motor yang dipilih
            if (isset($this->motorbikePrices[$this->jenisMotor])) {
                $this->hargaPerHari = $this->motorbikePrices[$this->jenisMotor];
            } else {
                // Harga bawaan jika tipe motor tidak ditemukan
                $this->hargaPerHari = 70000;
            }

            $this->totalHarga = $this->hargaPerHari * $this->lamaWaktuRental + 10000; // Add tax of 10,000

            if ($this->isMember) {
                // Anggota mendapat diskon 5%.
                $diskon = $this->totalHarga * 0.05;
                $this->totalHarga -= $diskon;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rental Motor</title>
</head>
<body>
    <center>
    <h1>Rental Motor</h1>
    
    <?php
    $rentalMotor = new RentalMotor();
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nama Pelanggan:</td>
                <td>
                    <input type="text" name="namaPelanggan" required value="<?php echo $rentalMotor->namaPelanggan; ?>">
                </td>
            </tr>
            <tr>
                <td>Lama Waktu Rental (per hari):</td>
                <td>
                    <input type="number" name="lamaWaktuRental" required value="<?php echo $rentalMotor->lamaWaktuRental; ?>">
                </td>
            </tr>
            <tr>
                <td>Jenis Motor:</td>
                <td>
                    <select name="jenisMotor" required>
                        <option value="Motor" <?php echo ($rentalMotor->jenisMotor == 'Motor') ? 'selected' : ''; ?>>Motor</option>
                        <option value="Scoopy" <?php echo ($rentalMotor->jenisMotor == 'Scoopy') ? 'selected' : ''; ?>>Scoopy</option>
                        <option value="Beat" <?php echo ($rentalMotor->jenisMotor == 'Beat') ? 'selected' : ''; ?>>Beat</option>
                        <option value="Scooter" <?php echo ($rentalMotor->jenisMotor == 'Scooter') ? 'selected' : ''; ?>>Scooter</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Member:</td>
                <td>
                    <input type="checkbox" name="isMember" <?php echo $rentalMotor->isMember ? "checked" : ""; ?>>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($rentalMotor->isMember) {
            echo "<p>{$rentalMotor->namaPelanggan} berstatus sebagai member mendapatkan diskon sebesar 5%</p>";
        }
        echo "<p>Jenis motor yang di rental adalah {$rentalMotor->jenisMotor} selama {$rentalMotor->lamaWaktuRental} hari</p>";
        echo "<p>Harga rental per-harinya : " . number_format($rentalMotor->hargaPerHari, 0, ',', '.') . "</p>";
        echo "<p>Besar yang harus dibayarkan adalah Rp. " . number_format($rentalMotor->totalHarga, 0, ',', '.') . "</p>";
    }
    ?>
    </center>
</body>
</html>
