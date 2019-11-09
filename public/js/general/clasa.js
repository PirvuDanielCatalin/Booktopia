document.getElementsByClassName("buton")[0].onclick = function (event) {
    caseta = document.getElementsByClassName("clasa")[0];
    if (caseta.value.toString().includes("Ana are mere"))
    {
        event.preventDefault();
        $.ajax({
            url: "/split",
            contentType : "application/JSON",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {"data" : "1"},
            success: function(result) {
                document.body.innerHTML = '';
                document.body.innerText = JSON.stringify(result);
            },
            error: function() {}
        });
    }
}
