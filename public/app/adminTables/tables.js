/** @format */

import MusicTable from './musicTable.js'
import MusicianTable from './musiciansTable.js'

export default class Tables {
	constructor() {
		this.tables = $('.tables')
		this.sideNavItems = $('.side-nav li')

		this.musicTable = new MusicTable()
		this.musicianTable = new MusicianTable()

		this.tables.hide()
		this.tables.eq(0).show()

		this.toggleTables = this.toggleTables.bind(this)

		this.sideNavItems.on('click', this.toggleTables)
	}

	toggleTables(e) {
		const index = this.sideNavItems.index(e.target)
		this.tables.hide()
		this.tables.eq(index).show()
	}
}
