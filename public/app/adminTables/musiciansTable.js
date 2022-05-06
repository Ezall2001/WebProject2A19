/** @format */

export default class MusicianTable {
	constructor() {
		this.musicTableWrapper = $('.tables .musician-table')

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
						url: 'http://localhost/WebProject2A19/Musicians/get',
						data: filter,
					})
				},
				insertItem: function (item) {
					$.ajax({
						type: 'POST',
						url: 'http://localhost/WebProject2A19/Musicians/add',
						data: item,
					})
					return item
				},
				updateItem: function (item) {
					$.ajax({
						type: 'POST',
						url: 'http://localhost/WebProject2A19/Musicians/modify',
						data: item,
					})

					return item
				},
				deleteItem: function (item) {
					$.ajax({
						type: 'POST',
						url: 'http://localhost/WebProject2A19/Musicians/delete',
						data: item,
					})
				},
			},

			fields: [
				{name: 'id', type: 'number'},
				{name: 'name', type: 'text', validate: 'required'},
				{name: 'band', type: 'text'},
				{type: 'control'},
			],
		})
	}
}
