function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image-preview').attr('src', e.target.result);
      $('#image-preview').hide();
      $('#image-preview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function readURLEdit(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#img_editProduct').attr('src', e.target.result);
      $('#img_editProduct').hide();
      $('#img_editProduct').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function readURLProfile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#avatar_pro').attr('src', e.target.result);
      $('#avatar_pro').hide();
      $('#avatar_pro').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function readURLUser(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#avatar_pro').attr('src', e.target.result);
      $('#avatar_pro').hide();
      $('#avatar_pro').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function readURLUserEdit(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#img_editUser').attr('src', e.target.result);
      $('#img_editUser').hide();
      $('#img_editUser').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#fileProduct").change(function () {
  readURL(this);
});
$("#fileProductEdit").change(function () {
  readURLEdit(this);
});
$("#fileProfile").change(function () {
  readURLProfile(this);
});
$("#fileUser").change(function () {
  readURLUser(this);
});
$("#fileUserEdit").change(function () {
  readURLUserEdit(this);
});
$(document).ready(function () {
  // Product
  $(".editProductBtn").on("click", function () {
    $("#editProduct").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    let category_id = $(this)
      .parents("tr")
      .find(".field-category")
      .data("category_id");
    let tag_id = $(this).parents("tr").find(".field-tag").data("tag_id");
    tag_id = tag_id.split(",");
    $(".form-tag input").prop("checked", false);
    tag_id.forEach(function (value) {
      if (value !== "") {
        $(".form-tag .tag-" + value).prop("checked", true);
      }
    });
    $("#id_editProduct").val(data[0]);
    $("#img_editProduct").attr(
      "src",
      $tr.children(".imgProductBtn").children().attr("src")
    );
    $("#name_editProduct").val(data[2]);
    $("#description_editProduct").val(data[3]);
    $("#category_editProduct").val(category_id);
    $("#price_editProduct").val(data[6]);
  });
  $(".deleteProductBtn").on("click", function () {
    $("#deleteProduct").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#id_deleteProduct").val(data[0]);
  });
  //Product Tag

  $(".editProductTagBtn").on("click", function () {
    $("#editProductTag").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#id_editProductTag").val(data[0]);
    $("#name_editProductTag").val(data[1]);
  });
  $(".deleteProductTagBtn").on("click", function () {
    $("#deleteProductTag").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    $("#id_deleteProductTag").val(data[0]);
  });
  // Product Category

  $(".editProductCategoryBtn").on("click", function () {
    $("#editProductCategory").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#id_editProductCategory").val(data[0]);
    $("#name_editProductCategory").val(data[1]);
    $("#parent_id_editProductCategory").val(data[2]);
  });
  $(".deleteProductCategoryBtn").on("click", function () {
    $("#deleteProductCategory").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    $("#id_deleteProductCategory").val(data[0]);
  });
});
$(document).ready(function () {
  // User
  $(".editUserBtn").on("click", function () {
    $("#editUser").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#id_editUser").val(data[0]);
    $("#img_editUser").attr(
      "src",
      $tr.children(".imgProductUser").children().attr("src")
    );
    $("#firstname_editUser").val(data[2]);
    $("#lastname_editUser").val(data[3]);
    $("#email_editUser").val(data[4]);
    $("#phone_editUser").val(data[5]);
    $("#address_editUser").val(data[6]);

  });
  $(".deleteUserBtn").on("click", function () {
    $("#deleteUser").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#id_deleteUser").val(data[0]);
  });
  //Roles
  $(".editRoleBtn").on("click", function () {
    $("#editRole").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#id_editRoles").val(data[0]);
    $("#name_editRoles").val(data[1]);
  });
  $(".deleteRoleBtn").on("click", function () {
    $("#deleteRole").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#id_deleteRoles").val(data[0]);
  });
  //inventory
  //edit
  $(".editInventoryBtn").on("click", function () {
    $("#editInventory").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#id_editInventory").val(data[0]);
    $("#stock_editInventory").val(data[2]);
  });
  //delete
  $(".deleteInventoryBtn").on("click", function () {
    $("#deleteInventory").modal("show");
    $tr = $(this).closest("tr");
    let data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#id_deleteInventory").val(data[0]);
  });
});

$(document).ready(function () {
  $(".perChecked input").each(function () {
    $(this).click(function () {
      if ($(this).prop("checked") === true) {
        $(this).parent().next().children().prop("checked", true);
        $(this).parent().next().next().children().prop("checked", true);
        $(this).parent().next().next().next().children().prop("checked", true);
        $(this)
          .parent()
          .next()
          .next()
          .next()
          .next()
          .children()
          .prop("checked", true);
      } else if ($(this).prop("checked") === false) {
        $(this).parent().next().children().prop("checked", false);
        $(this).parent().next().next().children().prop("checked", false);
        $(this).parent().next().next().next().children().prop("checked", false);
        $(this)
          .parent()
          .next()
          .next()
          .next()
          .next()
          .children()
          .prop("checked", false);
      }
    });
  });
});
