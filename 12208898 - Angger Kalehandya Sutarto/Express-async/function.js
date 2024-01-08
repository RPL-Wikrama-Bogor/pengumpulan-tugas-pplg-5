const testFunction = () => {
    console.log('Saya Berasal dari function,js');
}

const newFunction = (message) => {
    console.log(message);   
}

// meng-export function.js
module.exports = {
    testFunction,
    newFunction,
};