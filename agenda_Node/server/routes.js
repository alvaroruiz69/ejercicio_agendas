// JavaScript Document
import express from 'express'
import Evento from './model.js'

const Router = express.Router()

Router.post('/new', (req, res) => {
	let ev = req.body.ev
	let newEvent = new Evento({
		eventId: Math.floor(Math.random() * 1000),
		start: ev.start,
		title: ev.title,
		end: ev.end
	});

	newEvent.save();
});

Router.get('all', (req, res) => {
	let events = Evento.find()
	res.status(200);
	res.json(events);
});

export default Router
