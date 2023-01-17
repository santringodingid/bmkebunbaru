<script>
    $('[data-mask]').inputmask();

    const errorAlert = message => {
        toastr.error(`Opss.! ${ message }`)
    }

    $(function() {
        loadData()
    })

    $('body').on('keydown', e => {
        if (e.keyCode == 113) {
            $('#id').focus().val('')
        }
    })

    $('body').on('keydown', e => {
        if (e.keyCode == 119) {
            $('#modal-search').modal('show')
        }
    })

    $('body').on('keydown', e => {
        if (e.keyCode == 27) {
            $('#modal-search').modal('hide')
        }
    })

    $('#id').on('keyup', function(e) {
        let id = $(this).val()
        let key = e.which
        if (key != 13) {
            return false
        }

        if (key == 13 && id == '') {
            return false
        }

        save(id)
    })

    const save = id => {
        $.ajax({
            url: '<?= base_url() ?>checkin/save',
            method: 'POST',
            data: {
                id
            },
            dataType: 'JSON',
            beforeSend: function() {
                $('.wrap-loading__').show()
            },
            success: function(res) {
                let status = res.status
                if (status != 200) {
                    errorAlert(res.message)
                    $('#id').focus().val('')
                    return false
                }
                $('#id').focus().val('')

                showData(res.message)
                loadData()
            },
            complete: function() {
                $('.wrap-loading__').hide()
            },
        })
    }

    const showData = id => {
        $.ajax({
            url: '<?= base_url() ?>checkin/showdata',
            method: 'POST',
            data: {
                id
            },
            beforeSend: function() {
                $('.wrap-loading__').show()
            },
            success: function(res) {
                $('#show-data-check').html(res)
            },
            complete: function() {
                $('.wrap-loading__').hide()
            },
        })
    }

    const loadData = () => {
        $.ajax({
            url: '<?= base_url() ?>checkin/loadData',
            method: 'POST',
            beforeSend: function() {
                $('.wrap-loading__').show()
            },
            success: function(res) {
                $('#show-data').html(res)
            },
            complete: function() {
                $('.wrap-loading__').hide()
            },
        })
    }

    $('#modal-search').on('shown.bs.modal', () => {
        $('#changeName').focus().select()
    })

    $('#modal-search').on('hidden.bs.modal', () => {
        $('#changeName').val('')
        $('#show-search').html('')
    })

    const search = () => {
        $.ajax({
            url: '<?= base_url() ?>checkin/search',
            method: 'POST',
            data: {
                name: $('#changeName').val()
            },
            beforeSend: function() {
                $('.wrap-loading__').show()
            },
            success: function(res) {
                $('#show-search').html(res)
            },
            complete: function() {
                $('.wrap-loading__').hide()
            },
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

        $('#id').val(text).focus()

        $('#modal-search').modal('hide')
    }
</script>
</body>

</html>