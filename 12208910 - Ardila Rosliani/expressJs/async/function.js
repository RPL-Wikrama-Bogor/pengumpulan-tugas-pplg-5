const testFunction = () => {
    console.log('Saya Berasal dari function.js')
};

const newFunction = (message) => {
    console.log(message)
};

module.exports = {
    testFunction,
    newFunction,
};