<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Harga Buah Jeruk</title>
</head>
<body>
    <h1>Kalkulator Harga Buah Jeruk</h1>
    <form>
        <label for="beratBuah">Masukkan Berat Buah (gram):</label>
        <input type="number" id="beratBuah" name="beratBuah" required>
        <button type="button" onclick="hitungHarga()">Hitung Harga</button>
    </form>
    <p>Total Harga Sebelum Diskon: <span id="totalSebelumDiskon"></span></p>
    <p>Diskon: <span id="diskon"></span></p>
    <p>Total Harga Setelah Diskon: <span id="totalSetelahDiskon"></span></p>

    <script>
        function hitungHarga() {
            const beratBuah = parseFloat(document.getElementById("beratBuah").value);
            const hargaPer100Gram = 500; // dalam rupiah
            const hargaPerKg = hargaPer100Gram * 10; // 1000 gram = 1 kg
            const totalSebelumDiskon = beratBuah / 1000 * hargaPerKg;
            const diskon = totalSebelumDiskon * 0.05; // 5% diskon
            const totalSetelahDiskon = totalSebelumDiskon - diskon;

            document.getElementById("totalSebelumDiskon").textContent = `${totalSebelumDiskon.toFixed(2)} rupiah`;
            document.getElementById("diskon").textContent = `${diskon.toFixed(2)} rupiah`;
            document.getElementById("totalSetelahDiskon").textContent = `${totalSetelahDiskon.toFixed(2)} rupiah`;
        }
    </script>
</body>
</html>