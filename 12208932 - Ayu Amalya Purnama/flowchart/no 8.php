<!DOCTYPE html>
<html>
<head>
    <title>Pemisahan Angka Satuan, Puluhan, dan Ratusan</title>
</head>
<body>
    <h1>Pemisahan Angka Satuan, Puluhan, dan Ratusan</h1>
    <form>
        <label for="bilangan">Masukkan Bilangan Bulat:</label>
        <input type="number" id="bilangan" name="bilangan" required>
        <button type="button" onclick="pemisahanAngka()">Pemisahan Angka</button>
    </form>
    <p>Angka Satuan: <span id="angkaSatuan"></span></p>
    <p>Angka Puluhan: <span id="angkaPuluhan"></span></p>
    <p>Angka Ratusan: <span id="angkaRatusan"></span></p>

    <script>
        function pemisahanAngka() {
            const bilangan = parseInt(document.getElementById("bilangan").value);
            const angkaSatuan = bilangan % 10;
            const angkaPuluhan = Math.floor((bilangan % 100) / 10);
            const angkaRatusan = Math.floor(bilangan / 100);

            document.getElementById("angkaSatuan").textContent = angkaSatuan;
            document.getElementById("angkaPuluhan").textContent = angkaPuluhan;
            document.getElementById("angkaRatusan").textContent = angkaRatusan;
        }
    </script>
</body>
</html>