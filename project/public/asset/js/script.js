$(document).on('click', '#btn-edit', function (){
    $('.modal-body #id-siswa').val($(this).data('id'));
    $('.modal-body #nama').val($(this).data('nama'));
    $('.modal-body #school').val($(this).data('school'));
    $('.modal-body #grade').val($(this).data('grade'));
    $('.modal-body #department').val($(this).data('department'));
    $('.modal-body #phone').val($(this).data('phone'));
    $('.modal-body #email').val($(this).data('email'));
})