// JavaScript Document
import http from 'http'
import express from 'express'
import bodyParser from 'body-parser'
import mongoose from 'mongoose'
import routing from './toutes'

mongoose.connect('mongodb://localhost/events');
const app = express()
const Server = http.createServer(app)
const port = 3000

app.use(express.static('public'))
app.use('/events', routing)

Server.listen(port, ( => console.log('Servidor corriendo en el puerto ${port}')))