const tesFunction = () => {
    console.log('Saya berasal dari function.js')
};

const newFunction = (msg) => {
    console.log('newFunction - function')
    console.log(msg)
};

module.exports = {
    tesFunction,
    newFunction
};