function confirmation(url) {
    let agreement = confirm('Вы уверены?')
    if (agreement) document.location.href = url;
}