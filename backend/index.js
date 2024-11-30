const express = require("express");
const bodyparser = require('body-parser')
const app = express();
app.use(bodyparser.urlencoded({ extended: false }))
app.use(bodyparser.json())
const stripe = require("stripe")("sk_test_51NsJylSDWf8pw13Yejis6JZtlEJTU8LmhafAoT297bxWnkjVL4xGhP50onqeyBeHVCd5wUfhf16l6EonsBtYgdCR00yA0ElZ67");
const cors = require('cors')

app.use(cors())
const mysql = require('mysql2');

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'blogging'
});
  
// Update your existing route
app.post('/create-payment-intent', async (req, res) => {
    const { amount, name, id, month, date } = req.body;
    const status='1';

    try {
        const session = await stripe.checkout.sessions.create({
            payment_method_types: ['card'],
            line_items: [
                {
                    price_data: {
                        currency: 'usd',
                        unit_amount: amount * 100,
                        product_data: {
                            name: 'Custom Product',
                        },
                    },
                    quantity: 1,
                },
            ],
            mode: 'payment',
            success_url: 'http://localhost:4200/success',
            cancel_url: 'https://yourwebsite.com/cancel',
        });

        // Insert data into the database
        //const db = require('./dbconfig'); // Import your database connection
        db.query(
            'INSERT INTO subscription(username, userid, amount,status,month,date) VALUES (?, ?, ?,?,?,?)',
            [name, id, amount,status,month,date],
            (err, result) => {
                if (err) {
                    console.error(err);
                    res.status(500).json({ error: err.message });
                } else {
                    res.status(200).json({ sessionId: session.id });
                }
            }
        );
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

 
app.listen(5000, () => {
    console.log("App is listening on Port 5000")
})