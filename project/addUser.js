
document.getElementById("modal-btn").addEventListener("click", function () {
    document.querySelector(".popupRegistre").style.display = "flex";
})
window.addEventListener('click', function (event) {
    var modal = document.querySelector(".popupRegistre");
    if (event.target == modal && event.target.parentNode != modal) {
        document.querySelector(".popupRegistre").style.display = "none";
    }
})