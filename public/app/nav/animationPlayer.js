/** @format */

import AnimationFrame from './animationFrame.js'

export default class AnimationPlayer {
	static animationDuration = 400

	constructor(pageNavs, activeSetter) {
		this.pageNavs = pageNavs
		this.animationQueue = []
		this.isAnimationPlaying = false
		this.activeSetter = activeSetter

		AnimationFrame.enterLeft(this.getMask(0))
	}

	clearAnimationQueue() {
		this.animationQueue.splice(0, this.animationQueue.length)
	}

	animationQueueHandler(animationData = []) {
		if (animationData.length <= 0) return
		this.animationQueue = this.animationQueue.concat(animationData)

		if (this.isAnimationPlaying) return
		this.animationPlayer()
	}

	animationPlayer() {
		if (this.animationQueue.length <= 0) {
			this.isAnimationPlaying = false
			return
		}

		this.isAnimationPlaying = true
		const animationToPlay = this.animationQueue.shift()

		this.activeSetter(animationToPlay.curr, animationToPlay.next)
		this.playFrame(animationToPlay).then(this.animationPlayer.bind(this))
	}

	playFrame({direction, next, curr}) {
		return new Promise((resolve, reject) => {
			if (direction === 'ltr') {
				AnimationFrame.leaveRight(
					this.getMask(curr),
					AnimationPlayer.animationDuration,
				)
				AnimationFrame.enterLeft(
					this.getMask(next),
					AnimationPlayer.animationDuration,
				)
			} else if (direction === 'rtl') {
				AnimationFrame.leaveLeft(
					this.getMask(curr),
					AnimationPlayer.animationDuration,
				)
				AnimationFrame.enterRight(
					this.getMask(next),
					AnimationPlayer.animationDuration,
				)
			}

			setTimeout(resolve, AnimationPlayer.animationDuration + 50)
		})
	}

	getMask(index) {
		return this.pageNavs.eq(index).find('.mask')
	}
}
