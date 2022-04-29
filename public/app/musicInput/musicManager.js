/** @format */

export default class MusicManager {
	constructor() {
		this.musicManagerWarpper = $('.music-modify-wrapper')
		this.musicModifyForm = this.musicManagerWarpper.find('form')
		this.musicModify = this.musicManagerWarpper.find("input[value='Modify']")
		this.musicDelete = this.musicManagerWarpper.find("input[value='Delete']")
		this.musicianAddInput = this.musicManagerWarpper.find('.add-input')

		this.submitModify = this.submitModify.bind(this)
		this.submitDelete = this.submitDelete.bind(this)
		this.addMusicianInput = this.addMusicianInput.bind(this)

		this.musicModify.on('click', this.submitModify)
		this.musicDelete.on('click', this.submitDelete)
		this.musicianAddInput.on('click', this.addMusicianInput)
	}

	addMusicianInput(e) {
		e.preventDefault()
		const newInput =
			'<input name="musician[]" type="text" placeholder="Enter Name">'
	}

	hideModify() {
		this.musicManagerWarpper.css({
			display: 'none',
		})
	}

	submitModify(e) {
		e.preventDefault()

		const bodyFormData = new FormData(this.musicModifyFrom.get(0))

		fetch('/WebProject2A19/musics/modify', {
			method: 'POST',
			body: bodyFormData,
		})
			.then(res => res.json())
			.then(data => {
				if (data.status === '200') {
					this.hideModify()
				} else {
					this.outputErr(data)
				}
			})
			.catch(console.log)
	}

	submitDelete(e) {
		e.preventDefault()

		fetch('/WebProject2A19/musics/modify', {
			method: 'POST',
			body: bodyFormData,
		})
			.then(res => res.json())
			.then(data => {
				if (data.status === '200') {
					this.hideModify()
				} else {
					this.outputErr(data)
				}
			})
			.catch(console.log)
	}

	outputErr({nameErr, yearErr, genreErr, urlErr, musicianErr}) {
		this.musicManagerWarpper.find('.name-err').html(nameErr)
		this.musicManagerWarpper.find('.year-err').html(yearErr)
		this.musicManagerWarpper.find('.genre-err').html(genreErr)
		this.musicManagerWarpper.find('.url-err').html(urlErr)
		this.musicManagerWarpper.find('.musician-err').html(musicianErr)
	}
}
