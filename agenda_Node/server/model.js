// JavaScript Document
import mongoose, {
	Schema
} from 'mongoose'
const userSchema = new Schema({
	userId: {
		type: Number,
		required: true
	},
	nombre: {
		type: String,
		required: true
	},
	apellido: {
		type: String,
		required: true
	},
	pass: {
		type: String,
		required: true
	},
	eventos: [{
		type: Schema.Types.ObjectId,
		ref: 'Eventos'
	}]
})

const eventSchema = new Schema({
	eventId: {
		type: Number,
		required: true,
		unique: true
	},
	userId: {
		type: Schema.Types.ObjectId,
		ref: 'Usuarios'
	},
	start: {
		type: String,
		required: true
	},
	title: {
		type: String,
		required: true
	},
	end: {
		type: String
	}
})

const userModel = mongoose.model('Usuarios', userSchema)
const eventModel = mongoose.model('Eventos', eventSchema)

export default eventModel
