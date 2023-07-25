var selectOpt = $(".select2");
const csrf = $('meta[name="csrf-token"]').attr("content");

$.each(selectOpt, function (index) {
    $(".select2").select2({
        theme: "bootstrap",
    })[index];
});
// fitur download file
$("#download-skripsi").on("click", function () {
    let loadingClass = $(this).hasClass("loading");
    let targetFile = $(this).attr("data-file");
    if (!loadingClass) {
        $(this)
            .addClass("loading")
            .html('<span class="spinner"></span>')
            .after(
                `<p class="fw-bold message-loading">Tunggu sebentar ...</p>`
            );
        $("#download-skripsi .spinner").animate(
            { borderColor: "black" },
            4000,
            function () {
                $("#download-skripsi")
                    .removeClass("loading")
                    .html('<i class="fas fa-cloud-download-alt"></i> Download');

                $(".message-loading").remove();

                window.location.href = targetFile;
            }
        );
    }
});

// fitur searching

$("#form-search").submit(function (e) {
    e.preventDefault();
    var url = $(this).attr("data-route");
    var formData = $(this).serialize();
    $("#screen-loading")
        .removeClass("d-none")
        .addClass("loading-search")
        .animate(
            {
                borderColor: "none",
            },
            1500,
            function () {
                $("#screen-loading")
                    .removeClass("loading-search")
                    .addClass("d-none");

                $.ajax({
                    method: "GET",
                    url: url,
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            $("#result-search").html(response.html);
                            if (response.loadAction == "disable") {
                                $("button#loadMore").hide();
                            } else {
                                $("button#loadMore").show();
                            }
                        }
                    },
                    error: function (xhr) {
                        window.location.reload();
                    },
                });
            }
        );
});

// for filter
$("#formFilter").on("click", 'input[name="keyword[]"]', function () {
    var url = $("#formFilter").attr("data-target");
    var formData = [];
    $('input[name="keyword[]"]:checked').each(function () {
        formData.push($(this).val());
    });

    $("#screen-loading")
        .removeClass("d-none")
        .addClass("loading-search")
        .animate(
            {
                borderColor: "none",
            },
            1500,
            function () {
                $("#screen-loading")
                    .removeClass("loading-search")
                    .addClass("d-none");
                $.ajax({
                    method: "GET",
                    url: url,
                    data: { keyword: formData },
                    success: function (response) {
                        if (response.success) {
                            $("#result-search").html(response.html);
                            if (response.loadAction == "disable") {
                                $("button#loadMore").hide();
                            } else {
                                $("button#loadMore").show();
                            }
                        }
                    },
                    error: function (xhr) {
                        window.location.reload();
                    },
                });
            }
        );
});

let targetMessage = $("#message-target");

function showNotif(iconType) {
    var content = {};
    content.message = targetMessage.attr("data-message");
    content.icon = iconType;

    $.notify(content, {
        type: targetMessage.attr("data-type"),
        placement: {
            from: "top",
            align: "right",
        },
        time: 1000,
        delay: 0,
    });
}
if (targetMessage.attr("data-type") == "warning") {
    $(".container-login").hide();
    $(".container-signup").show();
    showNotif("fa fa-bell");
} else if (targetMessage.attr("data-type") == "success") {
    showNotif("fa fa-check");
} else if (targetMessage.attr("data-type") == "danger") {
    showNotif("fa fa-times");
}

// upload image
$('input[name="uploadImage"]#uploadImage').on("change", function () {
    var file = $(this)[0].files[0];
    var reader = new FileReader(file);

    if (!file.type.includes("image")) {
        swal("Extensi Gambar Tidak Sesuai!", {
            buttons: {
                confirm: {
                    className: "btn btn-warning",
                },
            },
        });
    } else {
        reader.onload = function (e) {
            $('label[for="uploadImage"]')
                .hide()
                .before(
                    '<span class="spinner upload-cover" style="transform:none;"><span>'
                );
            $("#img-tampil")
                .attr("src", e.target.result)
                .addClass("uploaded")
                .animate({ borderColor: "none" }, 3000, function () {
                    // Animation complete.
                    $(this).removeClass("uploaded");
                    $('label[for="uploadImage"]').show();
                    $(".spinner").remove();
                });
        };
        reader.readAsDataURL(file);
    }
});

// upload file
$('input[name="uploadFile"]#uploadFile').on("change", function () {
    var file = $(this)[0].files[0];
    const curlFile = $(this).val().split("\\").pop();
    var sizeFile = file.size.toFixed(2);

    if (!file.type.includes("application/pdf")) {
        swal("Extensi file harus PDF!", {
            buttons: {
                confirm: {
                    className: "btn btn-warning",
                },
            },
        });
    } else {
        $('label[for="uploadFile"]')
            .addClass("uploaded")
            .animate({ borderColor: "none" }, 3000, function () {
                $(this).removeClass("uploaded");
                $("#fileName").html(curlFile + " <b>of " + sizeFile + "KB</b>");
            });
    }
});

$("#keyword").tagsinput({
    tagClass: "badge-warning",
});

$("#refrensi").summernote({
    focus: true,
    placeholder: "Atlantis",
    fontNames: ["Arial", "Arial Black", "Comic Sans MS", "Courier New"],
    tabsize: 2,
    height: 300,
});

$("input,select,textarea,.note-editor").on("change input", function () {
    $(this)
        .removeClass("is-invalid")
        .parents(".form-group")
        .children(".message-error")
        .html("");

    $(this).parents(".position-relative").children(".message-error").html("");
});

$("#form-tambah-skripsi").submit(function (e) {
    e.preventDefault();
    let form = new FormData(this);
    const url = $(this).attr("data-url");
    form.append("refrensi", $("#refrensi").summernote("code"));
    swal({
        title: "Simpan Skripsi",
        text: "Apakah Anda Yakin!",
        type: "warning",
        buttons: {
            confirm: {
                text: "Ya",
                className: "btn btn-success",
            },
            cancel: {
                visible: true,
                className: "btn btn-danger",
            },
        },
    }).then((simpan) => {
        if (simpan) {
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": csrf,
                },
                success: function (response) {
                    if (response.success) {
                        swal({
                            title: "Berhasil!",
                            text: response.success,
                            type: "success",
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: "Ok!",
                                    className: "btn btn-success",
                                },
                            },
                        }).then((simpan) => {
                            if (simpan) {
                                window.location.href = "/all_Skripsi";
                            }
                        });
                    }
                },
                error: function (xhr, status, error) {
                    let errors = xhr.responseJSON.errors;
                    if (xhr.responseJSON.errors) {
                        $.each(errors, function (field, messages) {
                            let fieldInput = $(`#${field}`);
                            $.each(messages, function (index, message) {
                                if (
                                    field == "uploadFile" ||
                                    field == "uploadImage"
                                ) {
                                    fieldInput
                                        .parents(".position-relative")
                                        .children(".message-error")
                                        .html(
                                            `<p class="text-danger"><i class="fas fa-star-of-life"></i> ${message}</p>`
                                        );
                                }
                                fieldInput
                                    .parents(".form-group")
                                    .children(".message-error")
                                    .html(
                                        `<p class="text-danger"><i class="fas fa-star-of-life"></i> ${message}</p>`
                                    );
                            });
                        });
                    } else {
                        console.error("Terjadi kesalahan saat menyimpan data");
                    }
                },
            });
        } else {
            swal.close();
        }
    });
});

$("#form-update-skripsi").submit(function (e) {
    e.preventDefault();
    const csrf = $('meta[name="csrf-token"]').attr("content");
    let form = new FormData(this);
    const url = $(this).attr("data-url");
    form.append("refrensi", $("#refrensi").summernote("code"));
    swal({
        title: "Simpan Skripsi",
        text: "Apakah Anda Yakin!",
        type: "warning",
        buttons: {
            confirm: {
                text: "Ya",
                className: "btn btn-success",
            },
            cancel: {
                visible: true,
                className: "btn btn-danger",
            },
        },
    }).then((simpan) => {
        if (simpan) {
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": csrf,
                },
                success: function (response) {
                    if (response.success) {
                        swal({
                            title: "Berhasil!",
                            text: response.success,
                            type: "success",
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: "Ok!",
                                    className: "btn btn-success",
                                },
                            },
                        }).then((simpan) => {
                            if (simpan) {
                                window.location.href = "/manageSkripsi";
                            }
                        });
                    }
                },
                error: function (xhr, status, error) {
                    let errors = xhr.responseJSON.errors;
                    if (xhr.responseJSON.errors) {
                        $.each(errors, function (field, messages) {
                            let fieldInput = $(`#${field}`);
                            $.each(messages, function (index, message) {
                                if (
                                    field == "uploadFile" ||
                                    field == "uploadImage"
                                ) {
                                    fieldInput
                                        .parents(".position-relative")
                                        .children(".message-error")
                                        .html(
                                            `<p class="text-danger"><i class="fas fa-star-of-life"></i> ${message}</p>`
                                        );
                                }
                                fieldInput
                                    .parents(".form-group")
                                    .children(".message-error")
                                    .html(
                                        `<p class="text-danger"><i class="fas fa-star-of-life"></i> ${message}</p>`
                                    );
                            });
                        });
                    } else {
                        console.error("Terjadi kesalahan saat menyimpan data");
                    }
                },
            });
        } else {
            swal.close();
        }
    });
});

function reloadTblSkripsi() {
    let tabelSkripsi = $("#table-skripsi").DataTable();
    tabelSkripsi.ajax.reload();
}

// table skripsi
$("#table-skripsi").DataTable({
    pageLength: 10,
    processing: true,
    serverside: true,
    info: false,
    responsive: true,
    ajax: "tableSkripsi",
    columns: [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            orderable: false,
            seacrable: false,
        },
        {
            data: "nim",
            name: "NIM",
            orderable: false,
        },
        {
            data: "judul",
            name: "Judul",
            orderable: false,
        },
        {
            data: "tema",
            name: "Tema",
            orderable: false,
        },
        {
            data: "tahun",
            name: "Tahun",
            orderable: false,
        },
        {
            data: "aksi",
            name: "Aksi",
            orderable: false,
        },
    ],
    // menghapus data didalam data tabel
    createdRow: function (row, data, dataIndex) {
        $(row)
            .find("#dataDelete")
            .click(function () {
                let urlTarget = $(this).attr("data-target");
                swal({
                    title: "Hapus Skripsi",
                    text: "Apakah Anda Yakin!",
                    type: "warning",
                    buttons: {
                        confirm: {
                            text: "Ya",
                            className: "btn btn-success",
                        },
                        cancel: {
                            visible: true,
                            className: "btn btn-danger",
                        },
                    },
                }).then((simpan) => {
                    if (simpan) {
                        $.ajax({
                            url: urlTarget,
                            type: "GET",
                            success: function (response) {
                                if (response.success) {
                                    swal({
                                        text: response.success,
                                        type: "success",
                                        icon: "success",
                                    });
                                    reloadTblSkripsi();
                                }
                            },
                            error: function (xhr, status, error) {
                                if (xhr.status === 404) {
                                    swal({
                                        text: xhr.responseJSON.error,
                                        type: "danger",
                                        icon: "warning",
                                    });
                                }
                            },
                        });
                    } else {
                        swal.close();
                    }
                });
            });
    },
});

var limit = 12;
$("#loadMore").on("click", function () {
    var target = $(this).attr("data-target");
    $.ajax({
        url: target,
        type: "get",
        data: {
            nextLimit: limit + 12,
        },
        success: function (response) {
            if (response.view) {
                limit = parseInt(response.nextLimit);
                $("#result-search").html(response.view);
                if (response.loadAction == "disable") {
                    $("button#loadMore").hide();
                }
            }
        },
        error: function (xhr, err) {
            if (xhr) {
                console.log("erorr.");
            }
        },
    });
});

var ifConnected = window.navigator.onLine;
if (!ifConnected) {
    $("#screen-loading").removeClass("d-none").addClass("loading-search");
} else {
    $("#screen-loading").removeClass("loading-search").addClass("d-none");
}
setInterval(function () {
    var ifConnected = window.navigator.onLine;
    if (!ifConnected) {
        $("#screen-loading").removeClass("d-none").addClass("loading-search");
    } else {
        $("#screen-loading").removeClass("loading-search").addClass("d-none");
    }
}, 3000);

$("#form-tema").on("submit", function (e) {
    e.preventDefault();
    var target = $(this).attr("data-target");
    var dataForm = $(this).serialize();
    $.ajax({
        url: target,
        type: "POST",
        data: dataForm,
        headers: {
            "X-CSRF-TOKEN": csrf,
        },
        success: function (response) {
            swal({
                title: "Berhasil!",
                text: response.success,
                type: "success",
                icon: "success",
                buttons: {
                    confirm: {
                        text: "Ok!",
                        className: "btn btn-success",
                    },
                },
            });
            reloadTblTema();
            $("#tema").val("");
        },
        error: function (xhr) {
            if (xhr.status == 422) {
                swal({
                    title: "Gagal!",
                    text: xhr.responseJSON.error.tema[0],
                    type: "error",
                    icon: "error",
                    buttons: {
                        confirm: {
                            text: "Ok!",
                            className: "btn btn-danger",
                        },
                    },
                });
            }
        },
    });
});

$("#table-tema").DataTable({
    pageLength: 10,
    processing: true,
    serverside: true,
    lengthChange: false,
    info: false,
    responsive: true,
    ajax: "tableTema",
    columns: [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            orderable: false,
            seacrable: false,
        },
        {
            data: "tema",
            name: "tema",
            orderable: false,
        },
        {
            data: "aksi",
            name: "Aksi",
            orderable: false,
        },
    ],
    // menghapus data didalam data tabel
    createdRow: function (row, data, dataIndex) {
        $(row)
            .find("#DeleteTema")
            .click(function () {
                let urlTarget = $(this).attr("data-target");
                swal({
                    title: "Hapus Tema",
                    text: "Apakah Anda Yakin!",
                    type: "warning",
                    buttons: {
                        confirm: {
                            text: "Ya",
                            className: "btn btn-success",
                        },
                        cancel: {
                            visible: true,
                            className: "btn btn-danger",
                        },
                    },
                }).then((simpan) => {
                    if (simpan) {
                        $.ajax({
                            url: urlTarget,
                            type: "GET",
                            success: function (response) {
                                if (response.success) {
                                    swal({
                                        text: response.success,
                                        type: "success",
                                        icon: "success",
                                    });
                                    reloadTblTema();
                                }
                            },
                            error: function (xhr, status, error) {
                                if (xhr.status === 404) {
                                    swal({
                                        text: xhr.responseJSON.error,
                                        type: "danger",
                                        icon: "warning",
                                    });
                                }
                            },
                        });
                    } else {
                        swal.close();
                    }
                });
            });
    },
});

function reloadTblTema() {
    let tabelSkripsi = $("#table-tema").DataTable();
    tabelSkripsi.ajax.reload();
}

// Make the DIV element draggable:
var element = document.querySelector("#modal");
dragElement(element);

function dragElement(elmnt) {
    var pos1 = 0,
        pos2 = 0,
        pos3 = 0,
        pos4 = 0;
    if (elmnt.querySelector(".modal-header")) {
        // if present, the header is where you move the DIV from:
        elmnt.querySelector(".modal-header").onmousedown = dragMouseDown;
    } else {
        // otherwise, move the DIV from anywhere inside the DIV:
        elmnt.onmousedown = dragMouseDown;
    }

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // set the element's new position:
        elmnt.style.top = elmnt.offsetTop - pos2 + "px";
        elmnt.style.left = elmnt.offsetLeft - pos1 + "px";
    }

    function closeDragElement() {
        // stop moving when mouse button is released:
        document.onmouseup = null;
        document.onmousemove = null;
    }
}
