$(function () {
    $(".buton").on("click", function (event) {
        if ($('.textbox').val().toString().includes("Ana are mere")) {
            event.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "GET",
                contentType: "application/JSON",
                url: "/split",
                data: {"data": 1},
                success: function (result) {
                    document.body.innerHTML = JSON.stringify(result);
                },
                error: function () {}
            });
        }
    });
});

