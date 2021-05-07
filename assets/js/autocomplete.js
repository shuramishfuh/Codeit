$(document).ready( function(){
    $('#search_box').keyup(function () {
        var find = $('#search_box').val();
        if (find != "") {
            $.ajax({

                url: '/IR/Codit/autocompleteApi.php',
                method: 'POST',
                data: { search: find },
                success: function (data) {
                    $('#content').html(data);
                }
            });
        }
        else {
            $('#content').html('');
        }

        $(document).on('click', 'a', function () {
            $('#search_box').val($(this).text());
            $('#content').html('');
        })
    })
});