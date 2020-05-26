$(document).ready(function () {

  // fungsi menampilkan password
  $('#checkbox').click(function () {
    if ($(this).is(':checked')) {
      $('#password').attr('type', 'text');
    } else {
      $('#password').attr('type', 'password');
    }
  });


  // menghilangkan tombol cari
  $('#tombol-cari').hide();

  // event ketika keyword ditulis
  $('#keyword').on('keyup', function () {
    // function icon loadung
    $('.loader').show();

    // // ajak menggunakan load
    // $('#containerTable').load('ajax/buku.php?keyword=' + $('#keyword').val());

    // $.get()
    $.get('ajax/buku.php?keyword=' + $('#keyword').val(), function (data) {
      $('#containerTable').html(data);
      $('.loader').hide();
    });
  });


});