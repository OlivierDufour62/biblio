$(document).ready(function () {
    var url = window.location.pathname;
    var urlsplit = url.split('/');
    $('#testurl').attr('action', 'http://localhost/biblio/' +  urlsplit[2] + '/av');
    console.log(urlsplit[2].split('s'));
    $('.linkadd').attr('href', 'http://localhost/biblio/' +  urlsplit[2] + '/a');
});