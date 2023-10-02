$(document).ready(function () {
    var url = window.location.href;
    // console.log(url);
    $('.menu-head').filter(function () {
        return this.href == url;
    }).addClass('active');
});