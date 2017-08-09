// JavaScript Document
const User = require('./usermodel.js'),
	mongoose = require('mongoose');

mongoose.connect('mongodb://localhost/agenda')

var db = mongoose.connection;
db.on('error', console.error.bind(console, 'connection error:'));
db.once('open', function () {});

let user = new User({
	id: Math.floor(Math.random() * 500),
	nombre: 'alvaro',
	password: '12345',
	birthday: Date('1981-05-10'),
	email: 'alvaro@mail.cl'
})
user.save(function (error) {
	if (error) {
		console.log("error: " + error);
	}
	console.log("Registro guardado");
})
