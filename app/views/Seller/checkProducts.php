<html>
<head>
  <title>Products</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
<div class="bg-image"style="background-image: url('../../images/p.png');">

  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 20px;">
            <div class="card-body p-5">
              <h2 class="text-center mb-5">Check Products</h2>

                <form action='' enctype="multipart/form-data" method='post'>
                  <div class="form-outline mb-4">
                    <table width="100%" border="1" cellpadding="5" cellspacing="5">
                    <tr><th>Product ID</th><th>Name</th><th>Image</th></tr>
                    <?php
                      $product=new \app\models\Product();
                      $products = $product->getAll();
                      foreach($data as $product){
                        echo "<tr>
                              <td type=name>$product->product_id</td>
                              <td type=name>$product->name</td>
                              <td <img src='/images/blank.jpg' style='max-width:200px;max-height:200px'id='image_preview'/></td>
                              </tr>";

                              // <img src="/images/blank.jpg" style="max-width:200px;max-height:200px" id="profile_pic_preview" />
                      }
                    ?>

                    <!-- <script>
                      file = "" + "<?= $data['product']->images ?>"
                      if (file != "") {
                        document.getElementById("image_preview").src = "/images/" + file;
                      }
                    </script> -->
                  </table>
                </div>
                
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>