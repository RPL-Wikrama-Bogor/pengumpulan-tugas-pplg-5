<!DOCTYPE html>
<html>
<head>
    <title>Mencetak Bilangan Terbesar, Terkecil, dan Rata-rata dengan While</title>
</head>
<body>
    <h1>Masukkan 20 Bilangan</h1>
    <form id="input-form">
        <input type="number" id="bilangan">
        <button type="button" id="tambah">Tambah</button>
    </form>

    <h2>Hasil:</h2>
    <p>Bilangan Terbesar: <span id="terbesar"></span></p>
    <p>Bilangan Terkecil: <span id="terkecil"></span></p>
    <p>Rata-rata: <span id="rata-rata"></span></p>

    <script>
        var bilanganArray = [];
        var counter = 0;

        document.getElementById("tambah").addEventListener("click", function() {
            var inputBilangan = parseInt(document.getElementById("bilangan").value);
            
            if (!isNaN(inputBilangan)) {
                bilanganArray.push(inputBilangan);
                counter++;

                if (counter === 20) {
                    document.getElementById("input-form").style.display = "none";
                    var terbesar = bilanganArray[0];
                    var terkecil = bilanganArray[0];
                    var total = 0;

                    for (var i = 0; i < bilanganArray.length; i++) {
                        if (bilanganArray[i] > terbesar) {
                            terbesar = bilanganArray[i];
                        }

                        if (bilanganArray[i] < terkecil) {
                            terkecil = bilanganArray[i];
                        }

                        total += bilanganArray[i];
                    }

                    var rataRata = total / bilanganArray.length;

                    document.getElementById("terbesar").textContent = terbesar;
                    document.getElementById("terkecil").textContent = terkecil;
                    document.getElementById("rata-rata").textContent = rataRata.toFixed(2);
                }

                document.getElementById("bilangan").value = "";
            }
        });
    </script>
</body>