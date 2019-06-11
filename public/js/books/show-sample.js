$(function () {
    $isbn = $('input[name=isbn]').val();
    google.books.load();

    function alertNotFound() {
        toastr.warning("We could not find any book based on the given ISBN!");
    }

    function initialize() {
        var viewer = new google.books.DefaultViewer(document.getElementById('bookViewer'));
        viewer.load('ISBN:' + $isbn, alertNotFound);
    }

    google.books.setOnLoadCallback(initialize);
});