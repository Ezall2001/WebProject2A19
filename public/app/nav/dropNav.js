/** @format */

export default class DropNavAnimationPlayer {
	static closingDelay = 1000

	constructor(explorePageNav) {
		this.timer = 0
		this.dropNav = $('.page-nav .drop-nav')
		this.explorePageNav = explorePageNav

		this.open = this.open.bind(this)
		this.setTimer = this.setTimer.bind(this)
		this.clearTimer = this.clearTimer.bind(this)

		this.explorePageNav.on('mouseenter', this.open)
		this.explorePageNav.on('mouseleave', this.setTimer)
		this.dropNav.on('mouseenter', this.clearTimer)
		this.dropNav.on('mouseleave', this.setTimer)
	}

	open() {
		this.clearTimer()
		this.dropNav.addClass('active')
	}

	close() {
		this.clearTimer()
		this.dropNav.removeClass('active')
	}

	setTimer() {
		this.timer = setTimeout(
			this.close.bind(this),
			DropNavAnimationPlayer.closingDelay,
		)
	}

	clearTimer() {
		clearTimeout(this.timer)
	}
}
