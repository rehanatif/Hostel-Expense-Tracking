<script>
    function generatePassword(length = 12, target) {
        let charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+<>?/";
        let password = '';

        for (var i = 0, n = charset.length; i < length; ++i) {
            password += charset.charAt(Math.floor(Math.random() * n));
        }

        $(target).val(password);
    }

    function uploadImage(obj, user_id, target) {
        showAjaxLoader();
        var formData = new FormData();
        var file = obj.files[0];

        if (!file) return;

        formData.append('image', file);
        formData.append('user_id', user_id);

        $.ajax({
            url: "{{ route('change_dp') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                if (result.status) {
                    $(target).attr('src', result.data); // Set new image src
                    messageToaster("success", result.message, "Success");
                } else {
                    messageToaster("error", result.message, "Error");
                }
                removeAjaxLoader();
            },
            error: function(xhr) {
                messageToaster("error", "Upload failed", "Error");
                removeAjaxLoader();
            }
        });
    }
</script>
