/** @format */

export default class AnimationFrame {
	static leaveRight(mask, duration) {
		mask
			.css({
				direction: 'ltr',
				left: '0',
				right: '100%',
			})
			.animate({right: '0', left: '0'}, duration)
	}

	static leaveLeft(mask, duration) {
		mask
			.css({
				direction: 'rtl',
				left: '100%',
				right: '0',
			})
			.animate({right: '0', left: '0'}, duration)
	}

	static enterRight(mask, duration) {
		mask
			.css({
				direction: 'ltr',
				left: 0,
				right: 0,
			})
			.animate({right: '100%', left: '0'}, duration)
	}

	static enterLeft(mask, duration) {
		mask
			.css({
				direction: 'rtl',
				left: 0,
				right: 0,
			})
			.animate({right: '0', left: '100%'}, duration)
	}
}
