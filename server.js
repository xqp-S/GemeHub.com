const express = require('express');
const mysql = require('mysql2');
console.log("Hellow world");


const port = 8082;

const app = express();
app.set('view engine','ejs');
app.use(express.static("public"));
app.use(express.static("image"));
app.use("/", (req,res)=>{
    res.render("Index", abc)
})

app.listen(port);

const db = mysql.createConnection(
    {
        host: "127.0.0.1",
        user: "root",
        password: "Sa0567176142",
        database: "db_gh"
    }
)


db.query("select * from items;" ,(err, result) => {
    console.log(result);
    console.log(result[0].Name);
});

// db.end();

