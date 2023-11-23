const MainPage = (req, res) => {
    res.send('<h1>Welcome!</h1>')
}

const handleHome = (req,res) => {
    res.send('<h1>Home</h1>')
};

const handleAbout = (req,res) => {
    res.send('<h1>About</h1>')
};

const handleContact = (req, res) => {
    res.send('<h1>Contact</h1>')
};

const handleNews = (req, res) => {
    res.send('<h1>News</h1>')
};

module.exports = {
    MainPage,
    handleHome,
    handleAbout,
    handleContact,
    handleNews,
}