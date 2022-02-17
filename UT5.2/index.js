const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server);

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

var users = {}

app.get('/users', (req, res) => {
    res.send(users);
});

io.on('connection', (socket) => {
    const _id = socket.id
    socket.on('chat message', (msg, user) => {
        io.emit('chat message', msg, user);
    });
    socket.on('user info', (user) => {
        users[_id] = {
            color: user.color,
            username: user.username,
            writing: false,
        }
        io.emit('user connected', user, users);
    });
    socket.on('user writing', (writing) => {
        users[_id].writing = writing;
        io.emit('user writing', users);
    });
    socket.on('disconnect', () => {
        io.emit('user disconnected', _id, users);
        delete users[_id]
    });
});

server.listen(3000);