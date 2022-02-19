const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

// create express app
const app = express();

app.use(bodyParser.urlencoded({ extended: true }))
app.use(bodyParser.json())

// Configuring the database

mongoose.Promise = global.Promise;

const opts = {
    //dbName: dbConfig.auth.database,
    //user: dbConfig.auth.user,
    //pass: dbConfig.auth.pass,
    useNewUrlParser: true,
    useUnifiedTopology: true,
    bufferCommands: false,
}

// Connecting to the database
mongoose.connect('mongodb://localhost:27017/UT51', opts).then(() => {
    console.log("Successfully connected to the database");
}).catch(err => {
    console.log('Could not connect to the database. Exiting now...', err);
    process.exit();
});

app.get('/', (req, res) => {
    res.json({ "message": "Welcome to EasyNotes application. Take notes quickly. Organize and keep track of all your notes." });
});

app.listen(3051, () => {
    require('./app/routes/note.routes.js')(app);
});