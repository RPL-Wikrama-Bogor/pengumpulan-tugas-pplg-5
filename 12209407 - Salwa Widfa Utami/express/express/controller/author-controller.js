const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
//createPool : menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig)

//klu add err, err nya akna muncul di console
pool.on('error', (err)=> {
    console.error(err)
})

//membuat format hasil API klu http reponse status codeny 400an
const responseAuthorNotfound = (res) => res.status(404).json({
    sucsess: false,
    massage: 'Author Not Found',
})

const responseSuccess = (res, result, message) => res.status(200).json({
    sucsess: true,
    message: message,
    data: result
})

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;';
    // menyambungkna ke konfigurasi db sblmny
    // err=parameter 1 untuk menangkap error
    //connection = parameter 2 unutk mencoba koneksi ke db ny
    pool.getConnection((err, connection) => {
        //if tanpa {} bisa digunakan ketika proses dlm id hanya satu
        //saat proses awal koneksi ketemu err, kode dibawah bakal di skip dam mengembalikan hasil response err-nya
        if (err) throw err; 
        //menjalankalan perintah sql : parameter 3
        // param 1 : variable yg sinya perintah sql
        // param 2 : (optional) : mengiri data (hanya dijalankan untuk tambha/update)
        // param 3 : function yg menangani hasil reqs sql ny : 2 parameter (mengambil data err, data hasil)
        connection.query(query,(err,results) => {
            if (err) throw err;
            //ketika berhasil, format API disamakan dgn di func responseSuccess
            responseSuccess(res,results, 'author successfully fetched');
        });
        //memberhentikan koneksi klu query ny udh sleesai dijalankan
        connection.release()
    });
};

// get author
const getAuthor = (req, res) => {
    const id = req.params.id;

    const query = `SELECT * FROM author WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, results) => {
            if (err) throw err;

            if(results.length == 0) {
                responseAuthorNotfound(res);
                return;
            }
            responseSuccess(res, results, 'Author successfully fetched');
        });
        connection.release();
    });
}

// add author
const addAuthor = (req, res) => {
    //sebelum : disamain sama database, req.body dari postman
    const data= {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };
    // ? : parameter yg perlu diisi, diisi oleh connection.query parameter ke 2 
    const query = "INSERT INTO author SET ?;";

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            responseSuccess(res, results, 'Author successfully added');
        });
        
        connection.release();
    });
};

const editAuthor = (req,res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };

    const id = req.params.id
    
    const query = `UPDATE author SET ? WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            if(results.affectedRows == 0 ){
                responseAuthorNotfound(res)
                return
            }

            responseSuccess(res, results, 'Author succesfully updated')
        })
        
        connection.release()
    })
}


const deleteAuthor = (req,res) => {
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id}`

    pool.getConnection((err, connection) => {
        if(err) throw err

        connection.query(query, (err, results) => {
             if (err) throw err
             
            if(results.affectedRows == 0) {
                responseAuthorNotfound(res)
                return
            }

            responseSuccess(res, results, 'Author successfully deleted')
        })
        connection.release()
    })
}

//klu tdk diexport tdk bisa dijalankan (WAJIB)
module.exports = {
    getAuthors, getAuthor, addAuthor, editAuthor, deleteAuthor
}