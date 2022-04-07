/** @format */

export default class Timeline {
	constructor(checkpoints) {
		this.videoCheckpoint = checkpoints

		this.layers = $('.timeline')
		this.baseTimeline = this.layers.children('.base')
		this.hoverTimeline = this.layers.children('.hover')
		this.activeTimeline = this.layers.children('.active')
		this.timelineCheckpoints = this.baseTimeline.children('.circle')

		this.mouseEnterHandler = this.mouseEnterHandler.bind(this)
		this.mouseLeaveHandler = this.mouseLeaveHandler.bind(this)

		this.timelineCheckpoints.on('mouseenter', this.mouseEnterHandler)
		this.timelineCheckpoints.on('mouseleave', this.mouseLeaveHandler)
	}

	getCheckpointIndex(target) {
		let index = this.timelineCheckpoints.index(target)
		if (index == -1)
			index = this.timelineCheckpoints.children('span').index(target)

		return index
	}

	getWidth(index) {
		const totalWidth = this.baseTimeline.width()
		return (totalWidth / 8) * (index + 1) + 15
	}

	matchLayers(item, className, index) {
		this.baseTimeline.find(item).eq(index).toggleClass(className)
		this.hoverTimeline.find(item).eq(index).toggleClass(className)
		this.activeTimeline.find(item).eq(index).toggleClass(className)
	}

	mouseEnterHandler(e) {
		const index = this.getCheckpointIndex(e.target)
		this.matchLayers('.circle', 'hover', index)
		this.hoverTimeline.width(this.getWidth(index))
	}

	mouseLeaveHandler(e) {
		const index = this.getCheckpointIndex(e.target)
		this.matchLayers('.circle', 'hover', index)
		this.hoverTimeline.width(0)
	}
}
