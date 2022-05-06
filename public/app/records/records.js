/** @format */

export default class Records {
	constructor() {
		this.recordsContainer = $('.records-container')
		this.playing = $('.playing')
		this.musicModifyWrapper = $('.music-modify-wrapper')
		this.musicModifyFilter = this.musicModifyWrapper.find('.filter')
		this.keywordsBtn = $('.keyword')
		this.searchField = $('.search input')

		this.showPlaying = this.showPlaying.bind(this)
		this.hidePlaying = this.hidePlaying.bind(this)
		this.showModify = this.showModify.bind(this)
		this.hideModify = this.hideModify.bind(this)
		this.getMusicByKeyword = this.getMusicByKeyword.bind(this)
		this.getMusicByName = this.getMusicByName.bind(this)

		this.musicModifyFilter.on('click', this.hideModify)
		this.keywordsBtn.on('click', this.getMusicByKeyword)
		this.searchField.on('keyup', this.getMusicByName)

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

	getMusicByName(e) {
		fetch(`/WebProject2A19/musics/getByName?name=${e.target.value}`, {
			method: 'GET',
		})
			.then(res => res.json())
			.then(data => {
				this.recordsContainer.html('')
				data.forEach(this.mount)
				this.update_records_events()
			})
			.catch(console.log)
	}

	getMusicByKeyword(e) {
		const keyword = e.target.innerHTML
		fetch(`/WebProject2A19/musics/getByKeyword?keyword=${keyword}`, {
			method: 'GET',
		})
			.then(res => res.json())
			.then(data => {
				this.recordsContainer.html('')
				data.forEach(this.mount)
				this.update_records_events()
			})
			.catch(console.log)
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

				fetch(`/WebProject2A19/musics/getMusicians?id=${id}`)
					.then(res => res.json())
					.then(data => {
						data.forEach(item => {
							fetch(
								`https://www.googleapis.com/customsearch/v1?key=AIzaSyBHIsIBu4-oaWTLQldPNK2KkCpd6Yf6XI4&cx=b693f5eef4a30bfa8&q=${item.name}&searchType=image&fileType=jpg&imgSize=small&alt=json`,
							)
								.then(res => res.json())
								.then(data => {
									item.imgUrl = data.items[0].link
									const artistHtml = this.consturctArtist(item)
									artistsWrapper.append(artistHtml)
								})
						})
					})

				this.playingFilter = this.playing.find('.filter')
				this.likeBtn = this.playing.find('.like')
				this.shareBtn = this.playing.find('.share')
				localStorage.setItem('views', +localStorage.getItem('views') + 1)
				this.numberViews = this.playing
					.find('.number-views')
					.html(localStorage.getItem('views'))
				this.playingFilter.on('click', this.hidePlaying)

				if (localStorage.getItem('liked') === 'liked') {
					this.likeBtn.addClass('active')
				} else {
					this.likeBtn.on('click', () => {
						localStorage.setItem('liked', 'liked')
					})
				}
				this.shareBtn.on('click', () => {
					console.log($(this).attr('data-url'))
				})
			})

		this.playing.addClass('active')
	}

	hidePlaying() {
		this.playingFilter.off('click', this.hidePlaying)

		this.playing.removeClass('active')
	}

	showModify(e) {
		const id = $(e.target).parent().parent().parent().attr('id')

		this.musicModifyWrapper
			.css({
				display: 'block',
			})
			.attr('id', id)

		fetch(`/WebProject2A19/musics/getById?id=${id}`)
			.then(res => res.json())
			.then(data => {
				this.musicModifyWrapper.find('#name').val(data.name)
				this.musicModifyWrapper.find('#year').val(data.year)
				this.musicModifyWrapper
					.find('#genre')
					.find('option[value=' + data.genre + ']')
					.prop('selected', true)
				this.musicModifyWrapper.find('#url').val(data.url)
			})

		fetch(`/WebProject2A19/musics/getMusicians?id=${id}`)
			.then(res => res.json())
			.then(data => {
				const mutilpleInputs = this.musicModifyWrapper.find('.multiple-inputs')
				data.forEach(item => {
					mutilpleInputs.prepend(
						`<input name="musician[]" type="text" placeholder="Enter Name" value="${item.name}"></input>`,
					)
				})
			})
	}

	hideModify() {
		this.musicModifyWrapper.css({
			display: 'none',
		})
	}

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
				<div class="share" data-url="${item.url}">
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
		return `<div class="artist" style="background-image: url(${item.imgUrl})">
					<div class="info">
						<h4>${item.band}</h4>
						<h3>${item.name}</h3>
					</div>
				</div>`
	}
}
