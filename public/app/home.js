/** @format */

import Nav from './nav/nav.js'
import AccountNav from './accountNav/accountNav.js'
import Description from './description/description.js'

const nav = new Nav()
const accountNav = new AccountNav()

// TODO: get the real values
const testCheckpoints = new Array(7)
	.fill(0)
	.map((checkpoint, index) => (index + 1) * 25.5)

const description = new Description(testCheckpoints)
