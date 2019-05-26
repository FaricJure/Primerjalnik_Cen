$(document).ready(function() {
    $("#login").click(function (e) {
        $("#loginModal").show();
    });
});

function highlightStar(obj) {
    removeHighlight();
    $('li').each(function (index) {
        $(this).addClass('highlight');
        if (index == $("li").index(obj)) {
            return false;
        }
    });
}

function removeHighlight() {
    $('ul#rating li').removeClass('selected');
    $('ul#rating li').removeClass('highlight');
}

function addRating(obj) {
    $('ul#rating li').each(function (index) {
        $(this).addClass('selected');
        $('#rating').val((index + 1));
        if (index == $("ul#rating li").index(obj)) {
            return false;
        }
    });
}

function resetRating() {
    if ($("#rating").val()) {
        $('li').each(function (index) {
            $(this).addClass('selected');
            if ((index + 1) == $("#rating").val()) {
                return false;
            }
        });
    }
}


