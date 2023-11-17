const angka = new Array(1, 2, 3, 4, 5);

let newArray = angka.map((angka) => angka % 2 == 1);
let ganjil = angka.filter((angka) => angka % 2 == 1);


console.log(newArray);
console.log(ganjil);