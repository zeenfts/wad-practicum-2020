var check = function () {
    if (document.getElementById('sandi1').value ==
        document.getElementById('sandi2').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = '';
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = '*password not matching';
        document.getElementById('submit').disabled = true;
    }
}