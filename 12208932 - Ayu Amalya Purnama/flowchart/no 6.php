<!DOCTYPE html>
<html>
<head>
    <title>Konversi Detik ke Jam-Menit-Detik</title>
</head>
<body>
    <h1>Konversi Detik ke Jam-Menit-Detik</h1>
    <form>
        <label for="totalDetik">Masukkan Total Detik:</label>
        <input type="number" id="totalDetik" name="totalDetik" required>
        <button type="button" onclick="konversiDetik()">Konversi</button>
    </form>
    <p id="hasilKonversi"></p>

    <script>
        function konversiDetik() {
            const totalDetik = parseInt(document.getElementById("totalDetik").value);
            const jam = Math.floor(totalDetik / 3600);
            const sisaDetik = totalDetik % 3600;
            const menit = Math.floor(sisaDetik / 60);
            const detik = sisaDetik % 60;

            const hasilKonversi = `${jam} jam ${menit} menit ${detik} detik`;
            document.getElementById("hasilKonversi").textContent = hasilKonversi;
        }
    </script>
</body>
</html>