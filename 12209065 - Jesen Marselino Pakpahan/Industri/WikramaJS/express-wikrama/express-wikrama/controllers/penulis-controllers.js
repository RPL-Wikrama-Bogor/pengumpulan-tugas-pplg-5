const dbConfig = require('../config/db-config');
const mysql = require('mysql2');
const pool = mysql.createPool(dbConfig);

pool.on('error', (error) => {
    console.log((error));
});
// const getBooks = (req, res) => {
//     const { sort, AscDesc } = req.query; 


//     // sort & orderby
//     let query = 'SELECT * FROM books;';

//     if (sort != null) {
//         let query = `SELECT * FROM books ORDER BY ${sort} ${AscDesc};`;
//     }


//     pool.getConnection((error, connection) => {
//         if (error) throw error; 

//         connection.query(query, (error, results) => {
//             if (error) throw error;

//             sendResponse(res, true, 'Buku Berhasil Ditemukan!', results, 200)
//             connection.release();
//         });
//     });
// };
const getpenulis = (req, res) => {
    const penulisId = req.params.id;
    const query = 'SELECT * FROM penulis ;';

    pool.getConnection((error, connection) => {
        if (error) throw error; 

        connection.query(query, (error, results) => {
            if (error) throw error;
            
            if (results.length < 1){
                sendResponse(res, false, 'Penulis Tidak Ditemukan', results, 200)
                return;
            }
            
            sendResponse(res, true, 'Penulis Ditemukan', results, 200)
            connection.release();
            });
        });
    };

const getpenulisid = (req, res) => {
    const { id } = req.params;
    const query = `SELECT * FROM penulis WHERE id = '${id}' ;`;

    pool.getConnection((error, connection) => {
        if (error) throw error; 

        connection.query(query, (error, results) => {
            if (error) throw error;
            
            if (results.length < 1){
                sendResponse(res, false, 'Penulis Tidak Ditemukan', results, 200)
                return;
            }
            
            sendResponse(res, true, 'Penulis Ditemukan', results, 200)
            connection.release();
            });
        });
    };


const addpenulis = (req, res) => {
    // id, nama, penulis, penerbit, halaman, tahun

    const datapenulis = {
        nama: req.body.nama,
    }
    // Prepared Statement
    const query = 'INSERT INTO penulis SET ? ; ';

    pool.getConnection((error, connection) => {
        if(error) throw error;

        connection.query(query, [datapenulis], (error, results) =>{
            if(error) throw error;
            
            sendResponse(res, true, 'Penulis Berhasil Ditambahkan', results, 200)
            connection.release();

            });

        });
    };
const editpenulis = (req, res) => {
    const { id } = req.params;

    const datapenulis = {
        nama: req.body.nama,
    };

    const query = `UPDATE penulis SET ? WHERE id = '${id}';`;

    pool.getConnection((error, connection) => {
        if(error) throw error;

        connection.query(query, [datapenulis], (error, results) => {
            if (error) throw error;

            if (results.affectedRows < 1){
                sendResponse(res, false, 'Penulis Tidak Ditemukan', null, 404)
                return;
            }
            
                sendResponse(res, true, 'Penulis Berhasil Di Edit!', results, 200)
                
            });
            connection.release();
        })
    };
const deletepenulis = (req, res) => {
    const deleteId = req.params.id;
    const query = 'DELETE FROM penulis WHERE id = ?; ';

    pool.getConnection((error, connection) => {
        if (error) throw error;

        connection.query(query, [deleteId], (error, results) => {
            if (error) throw error;

            sendResponse(res, true, 'Penulis Berhasil Di Hapus!', results, 200)
            connection.release();
        })
    })
};

const sendResponse = (res, success, message, data, statusCode) => res.status(statusCode).json({
    success: success,
    message: message,
    data: data
})



module.exports = {
    getpenulis, addpenulis,
    editpenulis, deletepenulis,
    getpenulisid
}