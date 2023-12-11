const testFunction = () => {
    console.log('saya berasal dari padang')
};

const newFunction = (massage) => {
    console.log(massage)
};

// meng exports function
module.exports = {
    testFunction,
    newFunction,
}
    ;