/** @format */

export default class Nav {
	static animationDuratin = 500

	constructor() {
		this.targetActive = 0
		this.nextActive = 0
		this.currActive = 0

		this.pageNavs = $('.page-nav>li')

		this.updateActive = this.updateActive.bind(this)

		this.pageNavs.on('mouseenter', this.updateActive)

		this.enterLeft(this.getMask(0))
	}

	updateActive(e) {
		const itemsLength = this.pageNavs.length
		const navIndex = this.pageNavs.index(e.target)
		const animationData = this.findLowestDist(navIndex)

		let step = 0
		let animationDelayMulti = 1

		if (animationData.direction === 'ltr') step = 1
		else if (animationData.direction === 'rtl') step = -1

		while (animationData.dist > 0) {
			const animationDelay = Nav.animationDuratin * animationDelayMulti
			this.nextActive = (this.currActive + step + itemsLength) % itemsLength

			this.moveActive(animationData.direction, animationDelay)

			this.currActive = this.nextActive

			animationDelayMulti++
			animationData.dist--
		}
	}

	//TODO: think about a better abort transition
	resetActive() {
		this.pageNavs.find('.mask').stop(true, true)
	}

	moveActive(direction, animationDelay) {
		this.resetActive()

		if (direction === 'ltr') {
			this.leaveRight(this.getMask(this.currActive), animationDelay)
			this.enterLeft(this.getMask(this.nextActive), animationDelay)
		} else if (direction === 'rtl') {
			this.leaveLeft(this.getMask(this.currActive), animationDelay)
			this.enterRight(this.getMask(this.nextActive), animationDelay)
		}
	}

	leaveRight(mask, delay) {
		mask
			.css({
				direction: 'ltr',
				left: '0',
				right: '100%',
			})
			.animate({right: '0', left: '0'}, delay)
	}

	leaveLeft(mask, delay) {
		mask
			.css({
				direction: 'rtl',
				left: '100%',
				right: '0',
			})
			.animate({right: '0', left: '0'}, delay)
	}

	enterRight(mask, delay) {
		mask
			.css({
				direction: 'ltr',
				left: 0,
				right: 0,
			})
			.animate({right: '100%', left: '0'}, delay)
	}

	enterLeft(mask, delay) {
		mask
			.css({
				direction: 'rtl',
				left: 0,
				right: 0,
			})
			.animate({right: '0', left: '100%'}, delay)
	}

	getMask(index) {
		return this.pageNavs.eq(index).find('.mask')
	}

	findLowestDist(index) {
		const itemsLength = this.pageNavs.length
		const distLtr = (index - this.currActive + itemsLength) % itemsLength
		const distRtl = (this.currActive - index + itemsLength) % itemsLength

		if (distLtr < distRtl) return {direction: 'ltr', dist: distLtr}
		else return {direction: 'rtl', dist: distRtl}
	}
}
