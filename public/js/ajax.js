$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
//   var table = $('.data-table').DataTable({
//       processing: true,
//       serverSide: true,
//       ajax: "{{ route('books.index') }}",
//       columns: [
//           {data: 'title', name: 'title'},
//           {data: 'title', name: 'title'},
//           {data: 'author', name: 'author'},
//           {data: 'action', name: 'action', orderable: false, searchable: false},
//       ]
//   });
  $('#createNewBook').click(function () {
      $('#saveBtn').val("create-book");
      $('#book_id').val('');
      $('#bookForm').trigger("reset");
      $('#modelHeading').html("Create New Book");
      $('#ajaxModel').modal('show');
  });
  $('body').on('click', '.editBook', function () {
    var book_id = $(this).data('id');
    $.get("{{ route('books.index') }}" +'/' + book_id +'/edit', function (data) {
        $('#modelHeading').html("Edit Book");
        $('#saveBtn').val("edit-book");
        $('#ajaxModel').modal('show');
        $('#book_id').val(data.id);
        $('#title').val(data.title);
        $('#author').val(data.author);
    })
 });
  $('#saveBtn').click(function (e) {
      e.preventDefault();
      $(this).html('Save');

      var book_id = $(this).data('id');
        alert(book_id);
    //   $.ajax({
    //     data: $('#bookForm').serialize(),
    //     url: "{{ route('books.store') }}",
    //     type: "POST",
    //     dataType: 'json',
    //     success: function (data) {
   
    //         $('#bookForm').trigger("reset");
    //         $('#ajaxModel').modal('hide');
    //         table.draw();
       
    //     },
    //     error: function (data) {
    //         console.log('Error:', data);
    //         $('#saveBtn').html('Save Changes');
    //     }
    // });
  });
  
  $('body').on('click', '.deleteBook', function () {
   
      var book_id = $(this).data("id");
      confirm("Are You sure want to delete !");
    
      $.ajax({
          type: "DELETE",
          url: "{{ route('books.store') }}"+'/'+book_id,
          success: function (data) {
              table.draw();
          },
          error: function (data) {
              console.log('Error:', data);
          }
      });
  });
   
});