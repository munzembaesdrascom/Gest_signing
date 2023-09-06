$(document).ready(function () {
    let cookie = document.cookie.split('; ').find((row) => row.startsWith("username="))?.split("=")[1].split(' ');
    let CaissierName = cookie[0] + ' ' + cookie[1];
    let CaissierMat = cookie[2]
    $('.userN').html(CaissierName)
    $('#Caissier').attr('data-id', cookie[2])
    $('#Caissier').html(CaissierName)
})