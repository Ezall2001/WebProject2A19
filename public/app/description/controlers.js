/** @format */

export default class Controlers {
	constructor(videoPlayer) {
		this.isHidden = false
		this.isMuted = true
		this.isPaused = false

		this.videoPlayer = videoPlayer
		this.muteButton = $('.controls-volume')
		this.pauseButton = $('.pause-play')
		this.description = $('.description')
		this.toggleHideButton = $('.description-hide')
		this.header = $('header')
		this.landing = $('.landing')
		this.logo = $('.logo')

		this.toggleHide = this.toggleHide.bind(this)
		this.toggleMute = this.toggleMute.bind(this)
		this.togglePause = this.togglePause.bind(this)

		this.toggleHideButton.on('click', this.toggleHide)
		this.muteButton.on('click', this.toggleMute)
		this.pauseButton.on('click', this.togglePause)
	}

	toggleHide() {
		if (!this.isHidden) {
			this.description.css({
				transform: 'translateY(85%)',
			})
			this.header.css({
				transform: 'translateY(-100%)',
			})
			this.landing.css({
				paddingTop: '0',
			})
			this.logo.css({
				transform: 'translate(-50%,-100%)',
			})
			this.isHidden = true
		} else {
			this.description.css({
				transform: 'translateY(0)',
			})
			this.header.css({
				transform: 'translateY(0%)',
			})
			this.landing.css({
				paddingTop: '5rem',
			})
			this.logo.css({
				transform: 'translate(-50%,0)',
			})
			this.isHidden = false
		}
	}

	toggleMute() {
		this.isMuted = !this.isMuted
		this.videoPlayer.prop('muted', this.isMuted)

		if (this.isMuted) {
			$('.fa-volume-high').show()
			$('.fa-volume-xmark').hide()
		} else {
			$('.fa-volume-high').hide()
			$('.fa-volume-xmark').show()
		}
	}

	togglePause() {
		if (!this.isPaused) {
			this.videoPlayer.get(0).pause()
			this.isPaused = true
			$('.fa-circle-play').show()
			$('.fa-circle-pause').hide()
		} else {
			this.videoPlayer.get(0).play()
			this.isPaused = false
			$('.fa-circle-play').hide()
			$('.fa-circle-pause').show()
		}
	}
}
