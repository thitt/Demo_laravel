const User = (function () {
    let module = {};

    module.getIdModal = function (element) {
        $('#id-user-delete').val(element.data('id'));
    }

    module.deleteUser = function () {
        let id = $('#id-user-delete').val();
        window.location.href = '/user/delete/' + id;
    }

    return module;
}())

$(document).ready(function () {
    $('.icon-delete-user').on('click', function () {
        User.getIdModal($(this));
    })

    $('.btn-delete-user').on('click', function () {
        User.deleteUser();
    })

    $('#delete-modal').on('hidden.bs.modal', function () {
        $('#id-user-delete').val('');
    })
})
