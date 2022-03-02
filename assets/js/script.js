const roleChange = (list) => {
    for(let i = 0; i < list.length; i++) {
        if(list[i] !== "active") {
            $(".role-login").toggleClass("active")
        }
    }
}
$(document).ready(function () {
    $(".role-login").on("click", e => roleChange(e.target.classList))
})