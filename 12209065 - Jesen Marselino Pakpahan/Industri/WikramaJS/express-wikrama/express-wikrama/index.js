// Import 
const cors = require('cors');
const express = require('express');
const bookRouter = require('./router/book-router');
const penulisRouter = require('./router/penulis-router');
const authRouter = require('./router/auth-router');
const authenticateJWT = require('./middleware/jwt-auth-middleware')

// Instansiasi
const app = express();

//Middleware JSON Parser
app.use(express.json());
//Middlewaree request body
app.use(express.urlencoded({
    extended: true,
}));

app.use(cors());
// Book Routing with book router
app.use('/book', authenticateJWT, bookRouter);
app.use('/penulis',authenticateJWT, penulisRouter);
app.use('/auth', authRouter);



// HTTPS Method: GET, POST, PUT/PATCH/, DELETE
// URL Root

//localhost:3000/contohparam/han?sort=asc

// const siswa = [
//     {
//         id : '1', 
//         nama:'Ivan',
//     },
//     {
//         id : '2', 
//         nama:'Barnes', 
//     },
//     {
//         id : '3', 
//         nama:'Fakhri', 
//     },
// ];

// app.post('/test', (req, res) => {
//     res.send('POST test nodemon');
// });
// app.put('/test', (req, res) => {
//     res.send('PUT test');
// });
// app.delete('/test', (req, res) => {
//     res.send('DELETE test');
// });

// app.get('/siswa/:id', (req, res) => {
//     const { id } = req.params;

//     const student = siswa.find((student) => student.id == parseInt(id))
//     res.send(student.nama)
//   })

// app.get('/contohparam/:username', (req, res) => {
//     // Deconstructor 
//     // const {username, id} = req.params;
//     // res.send(username);
//     const { sort } = req.query;
//     res.send(sort ?? 'desc');
// });

// app.get('/', MainPage );
// app.get('/home', handleHome );
// app.get('/about', handleAbout);
// app.get('/contact', handleContact);
// app.get('/news', handleNews);

app.listen(3000, () => {
    console.log(`Server Berjalan di http://localhost:3000`);
});
