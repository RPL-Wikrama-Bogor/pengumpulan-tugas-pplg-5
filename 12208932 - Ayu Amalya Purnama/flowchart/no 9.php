<!DOCTYPE html>
<html>
<head>
    <title>Pengecekan Kondisi Cuaca</title>
</head>
<body>
    <h1>Pengecekan Kondisi Cuaca</h1>
    <form>
        <label for="suhu">Masukkan Suhu (°F):</label>
        <input type="number" id="suhu" name="suhu" required>
        <button type="button" onclick="cekCuaca()">Cek Cuaca</button>
    </form>
    <p>Kondisi Cuaca: <span id="kondisiCuaca"></span></p>

    <script>
        function cekCuaca() {
            const suhuFahrenheit = parseFloat(document.getElementById("suhu").value);
            const suhuCelsius = (suhuFahrenheit - 32) * 5/9;

            let kondisi = "normal";
            if (suhuCelsius > 30) {
                kondisi = "panas";
            } else if (suhuCelsius < 10) {
                kondisi = "dingin";
            }

            document.getElementById("kondisiCuaca").textContent = kondisi;
        }
    </script>
</body>
</html>