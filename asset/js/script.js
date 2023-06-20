$(document).ready(function () {
  $(".seeDetail").click(function () {
    var productId = $(this).attr("href").split("=")[1];
    console.log(productId, "producttt");
    $.ajax({
      url: "fetch_product.php",
      method: "GET",
      dataType: "json",
      data: {
        id: productId,
      },
      success: function (response) {
        console.log(response, "responnn");
        var product = response.product;
        console.log(product, "prooooo");

        if (response.Response == "True") {
          $(".modal-body").html(`
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="admin/asset/img/produk/${product.gambar}" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <ul class="list-group">
                                        <li class="list-group-item"><h3>${product.nama_produk}</h3></li>
                                        <li class="list-group-item">Judul Produk : ${product.jenis_produk} </li>
                                        <li class="list-group-item">Stock : ${product.stok} </li>
                                        <li class="list-group-item">Harga : ${product.harga} </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `);
        }
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });
});
