/** @format */

export default class MusiciansManager {
	constructor() {
		this.addMusicianBtn = $('.add-musician')
		this.musicianAddWrapper = $('.musician-add-wrapper')
		this.wrapperFilter = this.musicianAddWrapper.find('.filter')

		this.musicianAddForm = this.musicianAddWrapper.find('form.add')
		this.musicianModifyForm = this.musicianAddWrapper.find('form.modify')
		this.musicianDeleteForm = this.musicianAddWrapper.find('form.delete')

		this.musicianAddSubmit = this.musicianAddForm.find('input[type="submit"]')
		this.musicianModifySubmit = this.musicianModifyForm.find(
			'input[type="submit"]',
		)
		this.musicianDeleteSubmit = this.musicianDeleteForm.find(
			'input[type="submit"]',
		)

		this.toggleMusicianAddWrapper = this.toggleMusicianAddWrapper.bind(this)
		this.submitMusicianAdd = this.submitMusicianAdd.bind(this)
		this.submitMusicianModify = this.submitMusicianModify.bind(this)
		this.submitMusicianDelete = this.submitMusicianDelete.bind(this)

		this.wrapperFilter.on('click', this.toggleMusicianAddWrapper(false))
		this.addMusicianBtn.on('click', this.toggleMusicianAddWrapper(true))

		this.musicianAddSubmit.on('click', this.submitMusicianAdd)
		this.musicianModifySubmit.on('click', this.submitMusicianModify)
		this.musicianDeleteSubmit.on('click', this.submitMusicianDelete)
	}

	toggleMusicianAddWrapper(show) {
		return () => {
			this.musicianAddWrapper.css({
				display: show ? 'block' : 'none',
			})
		}
	}

	submitMusicianAdd(e) {
		e.preventDefault()

		const bodyFormData = new FormData(this.musicianAddForm.get(0))

		fetch('/WebProject2A19/musicians/add', {
			method: 'POST',
			body: bodyFormData,
		})
			.then(res => res.json())
			.then(data => {
				if (data.status === '200') {
					this.toggleMusicianAddWrapper(false)()
				} else {
					this.outputErr(this.musicianAddForm, data)
				}
			})
			.catch(console.log)
	}

	submitMusicianModify(e) {
		e.preventDefault()

		const bodyFormData = new FormData(this.musicianModifyForm.get(0))

		fetch('/WebProject2A19/musicians/modify', {
			method: 'POST',
			body: bodyFormData,
		})
			.then(res => res.json())
			.then(data => {
				if (data.status === '200') {
					this.toggleMusicianAddWrapper(false)()
				} else {
					this.outputErr(this.musicianModifyForm, data)
				}
			})
			.catch(console.log)
	}

	submitMusicianDelete(e) {
		e.preventDefault()

		const bodyFormData = new FormData(this.musicianDeleteForm.get(0))

		fetch('/WebProject2A19/musicians/delete', {
			method: 'POST',
			body: bodyFormData,
		})
			.then(res => res.json())
			.then(data => {
				if (data.status === '200') {
					this.toggleMusicianAddWrapper(false)()
				} else {
					this.outputErr(this.musicianDeleteForm, data)
				}
			})
			.catch(console.log)
	}

	outputErr(formElem, {idErr, nameErr, bandErr}) {
		formElem.find('.name-err').html(nameErr)
		formElem.find('.band-err').html(bandErr)
		formElem.find('.id-err').html(idErr)
	}
}
