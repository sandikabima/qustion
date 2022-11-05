$(function () {

    $('.tambahData').on('click', function () {
        $('#formModalLabel').html('Form Tambah Data')
        $('.modal-footer button[type=submit]').html('Simpan Data');
    });

    $('.tampilModalUbah').on('click', function () {
        $('#formModalLabel').html('Ubah Data Morning');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/morn/public/Morning/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/morn/public/Morning/getubah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $("#tanggal").val(data.tanggal);
                $("#pimpinan").val(data.pimpinan);
                $("#moderator").val(data.moderator);
                $("#id").val(data.id);
                $("#status").val(data.status);
            }
        })
    });
});