</body>
<script>
    $('[data-mask]').inputmask();

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    const errorAlert = message => {
        toastr.error(`Opss.! ${ message }`)
    }

    $('#changeConfirmation').on('change', function() {
        let confirmation = $(this).val()
        if (confirmation === 'NO_CONFIRMED') {
            $('#wrap-content-form').hide()
        } else {
            $('#wrap-content-form').show()
        }
    })

    const saveConfirmation = () => {
        $.ajax({
            url: '<?= base_url() ?>registration/save',
            method: 'POST',
            data: $('#form-confirmation').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                $('.wrap-loading__').show()
            },
            success: function(res) {
                let status = res.status
                if (status != 200) {
                    errorAlert(res.message)
                    return false
                }
                window.location.href = '<?= base_url() ?>registration/success/' + res.message
            },
            complete: function() {
                $('.wrap-loading__').hide()
            },
        })
    }
</script>

</html>