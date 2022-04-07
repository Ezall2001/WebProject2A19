/** @format */

import Timeline from './timeline.js'
import Controlers from './controlers.js'
export default class Description {
	constructor(checkpoints) {
		this.videoPlayer = $('.video-player')

		this.controlers = new Controlers(this.videoPlayer)
		this.timeline = new Timeline(checkpoints)
	}
}
