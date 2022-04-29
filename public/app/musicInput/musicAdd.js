/** @format */

export default class MusicAdd {
	constructor() {
		this.addMusicBtn = $('.add-music')
		this.musicAddWrapper = $('.music-add-wrapper')
		this.musicAddSubmit = this.musicAddWrapper.find('input[value="ADD"]')
		this.musicAddFrom = this.musicAddWrapper.find('form').get(0)
		this.wrapperFilter = this.musicAddWrapper.find('.filter')
		this.musicianAddInput = this.musicAddWrapper.find('.add-input')

		this.toggleMusicAddWrapper = this.toggleMusicAddWrapper.bind(this)
		this.submitMusicAdd = this.submitMusicAdd.bind(this)
		this.addMusicianInput = this.addMusicianInput.bind(this)

		this.wrapperFilter.on('click', this.toggleMusicAddWrapper(false))
		this.musicAddSubmit.on('click', this.submitMusicAdd)
		this.addMusicBtn.on('click', this.toggleMusicAddWrapper(true))
		this.musicianAddInput.on('click', this.addMusicianInput)
	}

	addMusicianInput(e) {
		e.preventDefault()
		const inputs = $('.multiple-inputs > input')
		const newInput =
			'<input name="musician[]" type="text" placeholder="Enter Name">'
		inputs.eq(inputs.length - 1).after(newInput)
	}

	toggleMusicAddWrapper(show) {
		return () => {
			this.musicAddWrapper.css({
				display: show ? 'block' : 'none',
			})
		}
	}

	submitMusicAdd(e) {
		e.preventDefault()

		const bodyFormData = new FormData(this.musicAddFrom)

		fetch('/WebProject2A19/musics/add', {
			method: 'POST',
			body: bodyFormData,
		})
			.then(res => res.json())
			.then(data => {
				if (data.status === '200') {
					this.toggleMusicAddWrapper(false)()
				} else {
					this.outputErr(data)
				}
			})
			.catch(console.log)
	}

	outputErr({nameErr, yearErr, genreErr, urlErr, musicianErr}) {
		this.musicAddWrapper.find('.name-err').html(nameErr)
		this.musicAddWrapper.find('.year-err').html(yearErr)
		this.musicAddWrapper.find('.genre-err').html(genreErr)
		this.musicAddWrapper.find('.url-err').html(urlErr)
		this.musicAddWrapper.find('.musician-err').html(musicianErr)
	}
}
