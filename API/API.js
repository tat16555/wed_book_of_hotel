const express = require('express');
const mysql = require('mysql');

const app = express();

// เชื่อมต่อกับ MySQL Database
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'book_of_hotel'
});

// เชื่อมต่อกับ MySQL Database
db.connect((err) => {
  if (err) {
    throw err;
  }
  console.log('Connected to database');
});

// API Endpoint เพื่อดึงข้อมูล
app.get('/api/users', (req, res) => {
  let sql = 'SELECT * FROM users ORDER BY id';
  db.query(sql, (err, result) => {
    if (err) throw err;
    res.json(result);
  });
});

// Port ที่ใช้งาน
const port = 3000;

app.listen(port, () => console.log(`Server started on port ${port}`));
