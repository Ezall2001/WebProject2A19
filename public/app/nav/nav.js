/** @format */

import AnimationPlayer from './animationPlayer.js'
import DropNavAnimationPlayer from './dropNav.js'
export default class Nav {
	constructor() {
		this.nextActive = 0
		this.currActive = 0

		this.pageNav = $('.page-nav')
		this.pageNavs = this.pageNav.children('.nav-item')
		this.mouseEnterEvent = this.mouseEnterEvent.bind(this)
		this.mouseLeaveEvent = this.mouseLeaveEvent.bind(this)
		this.pageNavs.on('mouseenter', this.mouseEnterEvent)
		this.pageNav.on('mouseleave', this.mouseLeaveEvent)

		this.dropNavAnimationPlayer = new DropNavAnimationPlayer(
			this.pageNavs.eq(0).children('li'),
		)
		this.animationPlayer = new AnimationPlayer(
			this.pageNavs,
			this.setActiveData.bind(this),
		)
	}

	mouseEnterEvent(e) {
		let navIndex = this.pageNavs.index(e.target)
		if (navIndex < 0) navIndex = 0
		let {direction, dist} = this.findLowestDist(navIndex)

		if (dist === 0) return
		const animationFrames = this.constructFrames(dist, direction)
		this.animationPlayer.clearAnimationQueue()
		this.animationPlayer.animationQueueHandler(animationFrames)
	}

	mouseLeaveEvent(e) {
		const dist = this.pageNavs.index(e.target)
		const direction = 'rtl'

		const animationFrames = this.constructFrames(dist, direction)
		this.animationPlayer.clearAnimationQueue()
		this.animationPlayer.animationQueueHandler(animationFrames)
	}

	constructFrames(dist, direction) {
		const itemsLength = this.pageNavs.length
		const frames = []
		let curr = this.currActive,
			next,
			step

		if (direction === 'ltr') step = 1
		else if (direction === 'rtl') step = -1

		while (dist > 0) {
			next = (curr + step + itemsLength) % itemsLength
			frames.push({
				direction,
				next,
				curr,
			})
			curr = next
			dist--
		}

		return frames
	}

	findLowestDist(index) {
		const itemsLength = this.pageNavs.length
		const distLtr = (index - this.currActive + itemsLength) % itemsLength
		const distRtl = (this.currActive - index + itemsLength) % itemsLength

		if (distLtr < distRtl) return {direction: 'ltr', dist: distLtr}
		else return {direction: 'rtl', dist: distRtl}
	}

	setActiveData(next, curr) {
		this.currActive = curr
		this.nextActive = next
	}
}
