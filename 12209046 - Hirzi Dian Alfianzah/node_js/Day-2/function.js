const testFunction = () => {
    console.log("Saya berasal dari function.js");
  };
  
  const newFunction = (massage) => {
    console.log(massage);
  };
  
  // Mengekspor fungsi-fungsi menggunakan objek
  module.exports = {
    testFunction,
    newFunction,
  };
  