const testFunction = () => {
  console.log("saya berasal dari function.js");
};

const newFunction = (msg) => {
  console.log(msg);
};

module.exports = {
    testFunction,
    newFunction
}
