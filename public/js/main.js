$(function () {
  $('.textarea').val('');
  $("button.add_comment").click(function (e) {
    $(this).hide();
    idSelect = this.name;
    //$('#add_comment_' + idSelect + '')[0].val('');
    // $('.textarea').val('');
    $('#add_comment_' + idSelect + '').show();
    /*  if (idSelect == 'add') {
        let cityIdFirst = ($("#add_select_city_id option:selected").attr('value'));
        if (cityIdFirst == '8') AddressInDB(idSelect);
        let add_select_city_id = $('#add_select_city_id')[0];
        $(add_select_city_id).click(function () {
          add_select_city_id.onchange = function () {
            let addCityId = ($("#add_select_city_id option:selected").attr('value'));
            if (addCityId == '8') AddressInDB(idSelect);
            else {
              if (sityAddressInDB == true) location.reload();
            }
          }
        });
      }
      let cityId = $('#city_label_' + idSelect + '').attr('name');
      if (cityId == '8') AddressInDB(idSelect);*/
  });

  $("body").on("click", "#form_submit", function (e) {
    //e.preventDefault();
    $(this).parents("form").ajaxForm(options);
  });

  var options = {
    complete: function (response) {
      console.log(response);
      if ($.isEmptyObject(response.responseJSON.error)) {
        //	$("input[name='title']").val('');
        //alert('');
        window.location.href = '/', true;
      } else {
        printErrorMsg(response.responseJSON.error);
      }
    }
  };

  function printErrorMsg(msg) {
    $(".print_msg").find("ul").html('');
    $(".print_msg").css('display', 'block');
    $.each(msg, function (key, value) {
      $(".print_msg").find("ul").append('<li>' + value + '</li>');
    });
  }

  /*
  $("#form_submit").click(function (e) {
    e.preventDefault();
    var form_data = new FormData();
    form_data.append("file", document.getElementById('form_file').files[0]);
    form_data.append('body', $('#form_body').val());
    form_data.append('_token', $('input[name=_token]').val());
    console.log(form_data);
    $.ajax({
      url: '',
      type: 'PUT',
      data: form_data,
      contentType: false,
      processData: false,
      success: function (data) {
        if ($.isEmptyObject(data.error)) {
          console.log(data.success);
          // printErrorMsg(data.success, 'job-form');
        } else {
          console.log(data.error);
          // printErrorMsg(data.error, 'job-form');
        }
      }
    });
  });
*/
});
/*
$(window).on(function () {
});
*/
