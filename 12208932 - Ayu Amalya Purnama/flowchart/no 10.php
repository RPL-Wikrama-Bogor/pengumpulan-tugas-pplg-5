<!DOCTYPE html>
<html>
<head>
    <title>Grade Rata-Rata</title>
</head>
<body>
    <h1>Grade Rata-Rata</h1>
    <form>
        <label for="nilaiPABP">Nilai PABP:</label>
        <input type="number" id="nilaiPABP" name="nilaiPABP" required><br>
        <label for="nilaiMatematika">Nilai Matematika:</label>
        <input type="number" id="nilaiMatematika" name="nilaiMatematika" required><br>
        <label for="nilaiDPK">Nilai DPK:</label>
        <input type="number" id="nilaiDPK" name="nilaiDPK" required><br>
        <button type="button" onclick="hitungGrade()">Hitung Grade</button>
    </form>
    <p>Rata-Rata Nilai: <span id="rataRataNilai"></span></p>
    <p>Grade: <span id="grade"></span></p>

    <script>
        function hitungGrade() {
            const nilaiPABP = parseInt(document.getElementById("nilaiPABP").value);
            const nilaiMatematika = parseInt(document.getElementById("nilaiMatematika").value);
            const nilaiDPK = parseInt(document.getElementById("nilaiDPK").value);

            const rataRata = (nilaiPABP + nilaiMatematika + nilaiDPK) / 3;

            let grade;
            if (rataRata >= 80 && rataRata <= 100) {
                grade = "A";
            } else if (rataRata >= 75 && rataRata < 80) {
                grade = "B";
            } else if (rataRata >= 65 && rataRata < 75) {
                grade = "C";
            } else if (rataRata >= 45 && rataRata < 65) {
                grade = "D";
            } else if (rataRata >= 0 && rataRata < 45) {
                grade = "E";
            } else {
                grade = "K";
            }

            document.getElementById("rataRataNilai").textContent = rataRata.toFixed(2);
            document.getElementById("grade").textContent = grade;
        }
    </script>
</body>
</html>