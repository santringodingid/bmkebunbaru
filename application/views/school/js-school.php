<script>
    let url = $('#url').val()
    $('[data-mask]').inputmask();

    toastr.options = {
        "positionClass": "toast-top-center",
        "timeOut": "2000"
    }

    const errorAlert = message => {
        toastr.error(`Opss.! ${ message }`)
    }

    $('body').on('keyup', e => {
        if (e.keyCode == 113) {
            $('#changeName').focus().val('')
        }
    })

    $(function() {
        loadData()
    })

    const loadData = () => {
        $('.skeleton_loading__').show()
        $('#show-product').html('')

        let name = $('#changeName').val()
        let status = $('#changeCategory').val()
        $.ajax({
            url: `${url}school/loaddata`,
            method: 'POST',
            data: {
                name,
                status
            },
            success: function(response) {
                $('#show-product').html(response)
            },
            complete: function() {
                $('.skeleton_loading__').hide()
            }
        })
    }

    function copyToClipboard(text) {
        var sampleTextarea = document.createElement("textarea");
        document.body.appendChild(sampleTextarea);
        sampleTextarea.value = text; //save main text in it
        sampleTextarea.select(); //select textarea contenrs
        document.execCommand("copy");
        document.body.removeChild(sampleTextarea);
        toastr.success('URL berhasil disalin ke clipboard')
    }
</script>
</body>

</html>