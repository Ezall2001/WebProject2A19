/** @format */

const genres = [
	{Name: 'Pop', val: 'pop'},
	{Name: 'Jazz', val: 'jazz'},
	{Name: 'Rock', val: 'rock'},
	{Name: 'Classic', val: 'classic'},
	{Name: 'Slow', val: 'slow'},
]

export default class MusicTable {
	constructor() {
		this.musicTableWrapper = $('.tables .music-table')

		this.init()
	}

	init() {
		this.musicTableWrapper.jsGrid({
			width: '100%',
			height: '50vh',

			inserting: true,
			editing: true,
			sorting: true,
			autoload: true,

			controller: {
				loadData: function (filter) {
					return $.ajax({
						type: 'GET',
						url: 'http://localhost/WebProject2A19/Musics/getRand',
						data: filter,
					})
				},
				insertItem: function (item) {
					$.ajax({
						type: 'POST',
						url: 'http://localhost/WebProject2A19/Musics/add',
						data: item,
					})
					return item
				},
				updateItem: function (item) {
					$.ajax({
						type: 'POST',
						url: 'http://localhost/WebProject2A19/Musics/modify',
						data: item,
					})

					return item
				},
				deleteItem: function (item) {
					$.ajax({
						type: 'GET',
						url: 'http://localhost/WebProject2A19/Musics/delete?id=' + item.id,
					})
				},
			},

			fields: [
				{name: 'id', type: 'number', width: 35},
				{name: 'name', width: 80, type: 'text', validate: 'required'},
				{
					name: 'year',
					type: 'number',
					width: 50,
					validate: {validator: 'range', param: [1950, 2020]},
				},
				{
					name: 'genre',
					type: 'select',
					items: genres,
					valueField: 'val',
					textField: 'Name',
				},
				{name: 'url', type: 'text', validate: 'required'},
				{type: 'control'},
			],
		})
	}
}
