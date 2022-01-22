// logout 
$('a#logout').click(function(event) {
    // event.preventDefault();
    // console.log('hi');
    $.get('logout.php', function(obj) {
        if (obj['success']) {
            alert(`${obj['info']}`);

            setTimeout(function() {
                location.href = 'main-page.php';
            }, 1000);
        }
    }, 'json');
});