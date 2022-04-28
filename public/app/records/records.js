/** @format */

export default class Records {
	constructor() {
		this.recordsContainer = $('.records-container')
		this.playing = $('.playing')

		this.showPlaying = this.showPlaying.bind(this)
		this.hidePlaying = this.hidePlaying.bind(this)
		this.showModify = this.showModify.bind(this)
		this.hideModify = this.hideModify.bind(this)

		this.init()
	}

	init() {
		this.mount = this.mount.bind(this)

		fetch('/WebProject2A19/musics/getRand', {
			method: 'GET',
		})
			.then(res => res.json())
			.then(data => {
				data.forEach(this.mount)
				this.update_records_events()
			})
			.catch(console.log)
	}

	update_records_events() {
		this.records = $('.record')
		this.play = this.records.find('.play-btn')
		this.modify = this.records.find('.modify-btn')

		this.modify.off('click', this.showModify)
		this.modify.on('click', this.showModify)

		this.play.off('click', this.showPlaying)
		this.play.on('click', this.showPlaying)
	}

	update_playing_events() {
		this.filter = this.playing.find('.filter')
		this.filter.on('click', this.hideModify)
	}

	showPlaying(e) {
		this.playingRecord = $(e.target).parent().parent().parent()
		const id = this.playingRecord.attr('id')

		fetch(`/WebProject2A19/musics/getById?id=${id}`)
			.then(res => res.json())
			.then(data => {
				const playing = this.constructPlaying(data)
				this.playing.html(playing)

				const artistsWrapper = this.playing.find('.artists-wrapper')

				///TODO: finish pulling the artists from the database and mounting them in the wrapper

				this.playingFilter = this.playing.find('.filter')
				this.playingFilter.on('click', this.hidePlaying)
			})

		this.playing.addClass('active')
	}

	hidePlaying() {
		this.playingFilter.off('click', this.hidePlaying)
		this.playing.removeClass('active')
	}

	showModify() {}

	hideModify() {}

	getId(url) {
		const parsedUrl = new URL(url)
		const params = new URLSearchParams(parsedUrl.search)
		return params.get('v')
	}

	getThumbnail(url) {
		return `https://img.youtube.com/vi/${this.getId(url)}/0.jpg`
	}

	mount(item) {
		item.thumbnail = this.getThumbnail(item.url)

		const record = this.constructRecord(item)

		this.recordsContainer.append(record)
	}

	constructRecord(item) {
		return `
					<div class="record" id="${item.id}">
            <div class="thumbnail" style="background-image:url(${item.thumbnail})">
              <div class="play">
                <i class="fa-solid fa-circle-play play-btn"></i>
								<i class="fa-solid fa-gear modify-btn"></i>
              </div>
              <p class="error"></p>
            </div>
            <h4>${item.year}</h4>
            <h3>${item.name}</h3>
          </div>`
	}

	constructPlaying(item) {
		return `
		<div class="filter"></div>
		<div class="playing-record-wrapper">
			<iframe
				src="https://www.youtube.com/embed/${this.getId(item.url)}"
				title="YouTube video player"
				frameborder="0"
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
				allowfullscreen
			></iframe>
			<div class="interactions">
				<div class="like">
					<i class="fa-regular fa-heart"></i>
				</div>
				<div class="save">
					<i class="fa-regular fa-bookmark"></i>
				</div>
				<div class="share">
					<i class="fa-regular fa-share-from-square"></i>
				</div>
				<p class="views">
					<span class="number-views">${item.views}</span> views
				</p>
			</div>
			<div class="artists-wrapper">
				
			</div>
		</div>`
	}

	consturctArtist(item) {
		return `<div class="artist">
					<div class="info">
						<h4>${item.bandName}</h4>
						<h3>${item.fullName}</h3>
					</div>
				</div>`
	}
}
