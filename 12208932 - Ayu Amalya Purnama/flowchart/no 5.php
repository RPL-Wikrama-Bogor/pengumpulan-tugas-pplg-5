<!DOCTYPE html>
<html>
<head>
    <title>Konversi Waktu ke Detik</title>
</head>
<body>
    <h2>Konversi Jam-Menit-Detik ke Total Detik</h2>
    <form id="timeForm">
        <label for="hours">Jam:</label>
        <input type="number" id="hours" name="hours" min="0" required><br>

        <label for="minutes">Menit:</label>
        <input type="number" id="minutes" name="minutes" min="0" max="59" required><br>

        <label for="seconds">Detik:</label>
        <input type="number" id="seconds" name="seconds" min="0" max="59" required><br>

        <input type="button" value="hitung" onclick="convertToSeconds()">
    </form>

    <p>Total Detik: <span id="totalSeconds"></span></p>

    <script>
        function convertToSeconds() {
            var hours = parseInt(document.getElementById("hours").value);
            var minutes = parseInt(document.getElementById("minutes").value);
            var seconds = parseInt(document.getElementById("seconds").value);

            var total = hours * 3600 + minutes * 60 + seconds;

            document.getElementById("totalSeconds").textContent = total + " detik";
        }
    </script>
</body>