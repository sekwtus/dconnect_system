function droptify() {
  // Basic
  $(".dropify").dropify();

  // Translated
  $(".dropify-fr").dropify({
    messages: {
      default: "Glissez-déposez un fichier ici ou cliquez",
      replace: "Glissez-déposez un fichier ou cliquez pour remplacer",
      remove: "Supprimer",
      error: "Désolé, le fichier trop volumineux",
    },
  });

  // Used events
  var drEvent = $("#input-file-events").dropify();

  drEvent.on("dropify.beforeClear", function (event, element) {
    return confirm(
      'Do you really want to delete "' + element.file.name + '" ?'
    );
  });

  drEvent.on("dropify.afterClear", function (event, element) {
    alert("File deleted");
  });

  drEvent.on("dropify.errors", function (event, element) {
    console.log("Has Errors");
  });

  var drDestroy = $("#input-file-to-destroy").dropify();
  drDestroy = drDestroy.data("dropify");
  $("#toggleDropify").on("click", function (e) {
    e.preventDefault();
    if (drDestroy.isDropified()) {
      drDestroy.destroy();
    } else {
      drDestroy.init();
    }
  });
}

function repeater(index) {
  "use strict";
  window.id = 0;

  $(".repeater" + index).repeater({
    defaultValues: {
      id: window.id,
    },
    show: function () {
      window.id++;
      $.each($(".seam" + index), function (index, value) {
        var count = index + 1;
        $(value).html("รอยต่อที่ " + count);
      });

      var params = [this];
      $(this)
        .find("label[for]")
        .each(function (index, element) {
          var currentRepeater = params[0];
          var originalFieldId = $(element).attr("for");
          var newField = $(currentRepeater).find(
            "input[id='" + originalFieldId + "']"
          );
          if ($(newField).attr("type") == "file") {
            $(newField).dropify();
          }
          if ($(newField).length > 0) {
            var newFieldName = $(newField).attr("name");
            var newFieldID = $(newField).attr("id");
            if ($(newField).attr("type") == "radio") {
              newFieldName = newFieldID.replace(0, newFieldName[12]);
            }
            $(newField).attr("id", newFieldName);

            $(currentRepeater)
              .find("label[for='" + originalFieldId + "']")
              .attr("for", newFieldName);
          }
        }, params);

      $(this).slideDown();

      $(this).show();
    },
    hide: function (deleteElement) {
      if (confirm("Are you sure you want to delete this element?")) {
        window.id--;
        $(this).slideUp(deleteElement);
      }

      setTimeout(function () {
        $.each($(".seam" + index), function (index, value) {
          var count = index + 1;
          $(value).html("รอยต่อที่ " + count);
        });
      }, 500);
    },
    ready: function (setIndexes) {},
  });
  $("input[name*='page-group[" + index + "][note]").dropify();
}

function del($id) {
  if (confirm("Are you sure you want to delete this element?")) {
    var index_page = parseInt($("#page").val());
    $("#nav" + $id).remove();
    $("#content" + $id).remove();
    $("#page").val(index_page - 1);

    $.each($(".nav-item-page"), function (index, value) {
      var count = parseInt(index);
      $(value).attr("id", "nav" + count);
    });

    $.each($(".nav-link-page"), function (index, value) {
      var count = parseInt(index);
      $(value).attr("href", "#content" + count);
      $(value).attr("id", "nav-link" + count);
    });

    $.each($(".btn-del"), function (index, value) {
      var count = parseInt(index) + 1;
      $(value).attr("id", "btn-del" + count);
      $(value).attr("onclick", "del(" + count + ")");
    });

    $.each($(".tab-pane"), function (index, value) {
      var count = parseInt(index);
      $(value).attr("id", "content" + count);
      $(value).attr("class", "tab-pane p-40 repeater" + count);
    });

    $.each($(".data-repeater-list"), function (index, value) {
      var count = parseInt(index);
      var index_content = $(value).attr("data-repeater-list").slice(-1);
      $(value).attr("data-repeater-list", "page-group" + count);
      $('input[name^="page-group' + index_content + '"]').each(function (
        index,
        value
      ) {
        $(value).attr(
          "name",
          $(value)
            .attr("name")
            .replace("page-group" + index_content, "page-group" + count)
        );
      });
    });

    $.each($(".title-nav"), function (index, value) {
      var count = parseInt(index) + 2;
      $(value).html("Page " + count);
    });
    $("#nav0").addClass("active");
    $("#content0").addClass("active");
    $("#myTab li:first-child a").tab("show");
  }
}

$("#btn-add-page").click(function () {
  var index = parseInt($("#page").val());
  var show = parseInt(index) + 1;
  $(".nav-tabs").append(
    '\
            <li class="nav-item nav-item-page" id="nav' +
      index +
      '">\
                <a class="nav-link nav-link-page" id="nav-link' +
      index +
      '" data-toggle="tab" href="#content' +
      index +
      '" role="tab">\
                    <span class="hidden-xs-down title-nav">Page' +
      show +
      '</span>\
                    <button type="button" class="btn text-danger btn-del" id="btn-del' +
      index +
      '" onclick="del(' +
      index +
      ')">\
                        <i class="fa fa-times" aria-hidden="true"></i>\
                    </button>\
                </a>\
            </li>\
        '
  );

  $(".tab-content").append(
    '\
            <div class="tab-pane p-40 repeater' +
      index +
      '" id="content' +
      index +
      '" role="tabpanel">\
                <div class="row">\
                    <div class="col-md-12">\
                        <div class="form-group row">\
                            <div class="col-md-2">\
                                Tag ม้วนฟอยล์\
                            </div>\
                            <div class="col-md-10">\
                                <input type="file" id="tag_foil' +
      index +
      '" name="tag_foil' +
      index +
      '" class="dropify" data-default-file="" />\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-md-6">\
                        <div class="form-group row">\
                            <label for="time_roll' +
      index +
      '" class="col-sm-3 col-form-label">เวลาที่เปลี่ยนม้วน</label>\
                            <div class="col-sm-9">\
                                <input class="form-control" type="time" id="time_roll' +
      index +
      '" name="time_roll' +
      index +
      '">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-md-6">\
                        <div class="form-group row">\
                            <label for="number_pack' +
      index +
      '" class="col-sm-3 col-form-label">จำนวนซองที่ผลิตได้</label>\
                            <div class="col-sm-9">\
                                <input class="form-control" type="number" id="number_pack' +
      index +
      '" name="number_pack' +
      index +
      '">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-md-6">\
                        <div class="form-group row">\
                            <label for="" class="col-sm-3 col-form-label">\
                                ความถูกต้องของ Foil\
                            </label>\
                            <div class="col-sm-9">\
                                <div class="form-group row">\
                                    <div class="col-md-6">\
                                        <div class="input-group">\
                                            <label class="container">ถูกต้อง\
                                                <input type="radio" id="correct_foil' +
      index +
      '1" name="correct_foil' +
      index +
      '" value="1">\
                                                <span class="checkmark"></span>\
                                            </label>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-6">\
                                        <div class="input-group">\
                                            <label class="container">ไม่ถูกต้อง\
                                                <input type="radio" id="correct_foil' +
      index +
      '2" name="correct_foil' +
      index +
      '" value="2">\
                                                <span class="checkmark"></span>\
                                            </label>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-md-3">\
                        <div class="form-group row">\
                            <label for="machine_pack' +
      index +
      '" class="col-sm-6 col-form-label">เครื่องบรรจุที่</label>\
                            <div class="col-sm-6">\
                                <input type="text" class="form-control" id="machine_pack' +
      index +
      '" name="machine_pack' +
      index +
      '">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-md-3">\
                        <div class="form-group row">\
                            <label for="" class="col-sm-3 col-form-label">โดย</label>\
                            <div class="col-sm-9">\
                                <button type="button" class="btn btn-primary" data-toggle="modal"\
                                    data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-md-6">\
                        <div class="form-group row">\
                            <label for="count_seam" class="col-sm-3 col-form-label">จำนวนรอยต่อ</label>\
                            <div class="col-sm-9">\
                                <input class="form-control" type="text" name="count_seam" id="count_seam">\
                            </div>\
                        </div>\
                    </div>\
                </div>\
                <div class="data-repeater-list" data-repeater-list="page-group' +
      index +
      '">\
                    <div data-repeater-item>\
                        <div class="col-md-12">\
                            <div class="row">\
                                <div class="col-md-12 my-2 py-2 text-white bg-success">\
                                    <label class="mb-0 seam' +
      index +
      '">รอยต่อที่ 1</label>\
                                </div>\
                                <div class="col-md-6">\
                                    <div class="form-group row">\
                                        <label for="page-group' +
      index +
      '[0][time_roll]"\
                                            class="col-sm-3 col-form-label">เวลาที่ม้วน</label>\
                                        <div class="col-sm-9">\
                                            <input class="form-control" type="time"\
                                                id="page-group' +
      index +
      '[0][time_roll]" name="time_roll">\
                                        </div>\
                                        <div class="col-md-12">\
                                            <div class="form-group row">\
                                                <div class="col-md-6">\
                                                    <div class="input-group">\
                                                        <label class="container">ถูกต้อง\
                                                            <input type="radio" id="page-group' +
      index +
      '[0][correct1]" name="correct' +
      index +
      '" value="corect">\
                                                            <span class="checkmark"></span>\
                                                        </label>\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-6">\
                                                    <div class="input-group">\
                                                        <label class="container">ไม่ถูกต้อง\
                                                            <input type="radio" id="page-group' +
      index +
      '[0][correct2]" name="correct' +
      index +
      '" value="incorect">\
                                                            <span class="checkmark"></span>\
                                                        </label>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="col-md-6">\
                                    <div class="form-group row">\
                                        <label for="page-group' +
      index +
      '[0][note]"\
                                            class="col-sm-3 col-form-label">หมายเหตุ</label>\
                                        <div class="col-sm-9">\
                                            <input type="file" id="page-group' +
      index +
      '[0][note]" class name="note" />\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="row">\
                            <div class="col-md-12 text-right">\
                                <button class="btn btn-danger" data-repeater-delete type="button">\
                                    <i class="fa fa-trash" aria-hidden="true"></i>\
                                </button>\
                            </div>\
                        </div>\
                        <hr>\
                    </div>\
                </div>\
                <div class="row">\
                    <div class="col-md-12 mt-2 text-right">\
                        <button class="btn btn-success" data-repeater-create type="button">\
                            <i class="fa fa-plus" aria-hidden="true"></i>\
                        </button>\
                    </div>\
                </div>\
                <div class="row">\
                    <div class="col-md-12 text-right">\
                        ตรวจโดย <button type="button" class="btn btn-primary" data-toggle="modal"\
                            data-target="#modelId">กดเพื่อบันทึกลายเซ็น</button>\
                        (Line Leader/Supervisor) Time ............\
                    </div>\
                </div>\
            </div>\
        '
  );

  droptify();
  repeater(index);
  $("input[name*='page-group" + index + "[0][note]']").dropify();

  $("#page").val(index + 1);
});

$(document).ready(function () {
  droptify();
  repeater(0);

  $('input[name*="page-group0[0][note]"').dropify();
});
