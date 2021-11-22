
const block = (e) => {
    e.preventDefault();
    alert('Unauthorized! Log in to rate.');
    document.getElementById('rateFrom').reset();
}