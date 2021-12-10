$(document).ready(function () {
  // Get all data
  $.ajax({
    type: 'GET',
    url: '/api/search.php',
    cache: true,
    success: function (html) {
      $('#display').html(html).show()
    }
  })

  //On pressing a key on "Search box". This function will be called.
  $('#search').keyup(function () {
    const query = $('#search').val()
    //Validating, if "query" is empty.
    if (query === '') {
      $('#display').html('')
      $.ajax({
        type: 'GET',
        url: '/api/search.php',
        cache: true,
        success: function (html) {
          $('#display').html(html).show()
        }
      })
    }
    //If query is not empty.
    else {
      $.ajax({
        type: 'POST',
        url: '/api/search.php',
        data: { search: query },
        success: function (html) {
          $('#display').html(html).show()
        }
      })
    }
  })
})