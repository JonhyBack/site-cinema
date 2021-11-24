function rate(e) {
    $("#rateFrom").ajaxSubmit({url: 'rate.php', type: 'post'});
    console.log($('#rateFrom').serialize())
}

const block = (e) => {
    e.preventDefault();
    alert('Unauthorized! Log in to rate.');
    document.getElementById('rateFrom').reset();
}
