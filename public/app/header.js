/** @format */

//TODO: seperate and refactor into classes

prvActive = currActive
if (animationData.direction === 'rtl') currActive = (prvActive - 1 + 3) % 3
targetActive = index

////////////////// account-nav
const accoutNavs = document.querySelectorAll('.account-nav .logged-out button')

accoutNavs[0].addEventListener('mouseenter', e => {
	accoutNavs[1].classList.remove('active')
	e.target.classList.add('active')
})

accoutNavs[0].addEventListener('mouseleave', e => {
	accoutNavs[1].classList.add('active')
	e.target.classList.remove('active')
})
