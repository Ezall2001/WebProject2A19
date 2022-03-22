/** @format */

export default class AccountNav {
	constructor() {
		this.accountNav = $('.account-nav .logged-out button')
		this.mask = $('.account-nav .logged-out .mask')

		this.mouseEnterEvent = this.mouseEnterEvent.bind(this)
		this.accountNav.on('mouseenter', this.mouseEnterEvent)

		this.mouseLeaveEvent = this.mouseLeaveEvent.bind(this)
		this.accountNav.on('mouseleave', this.mouseLeaveEvent)
	}

	mouseEnterEvent(e) {
		const index = this.accountNav.index(e.target)

		if (index === 0) this.playToLeft()
		else if (index === 1) this.playToRight()
	}

	mouseLeaveEvent() {
		this.playToRight()
	}

	playToRight() {
		this.mask.removeClass('left').addClass('right')
	}

	playToLeft() {
		this.mask.removeClass('right').addClass('left')
	}
}
