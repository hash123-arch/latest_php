

<?php

include_once 'classes/product.php';

global $conn;

if (isset($_POST['delete'])) {

  if(count($_POST["id"])>0){

    # separate each id (checkbox) since it is an array. For this we use the implode function

              $extract_id = implode(',' , $_POST['id']);

              $query="DELETE FROM product WHERE Product_ID = '".$extract_id."'";

              $result = $conn->query($query);
             
              if($result === TRUE){

                header('Location:index.php');

              } else {

                echo '<h2 class="text-danger display-5 fs-3">Please Select a Record in order to delete</h2>';
              }

            }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

      <div class="container mt-5">

          <h2 class="text-left display-5">Product List

          <div class="float-end">
            <form method="POST">
            <button type="button" class="btn btn-primary"><a href="add_product.php" class="text-white text-decoration-none">Add</a></button>
            <input type="submit" value="Delete" class="btn btn-danger" name="delete"/>
          </div>

          </h2>

          <hr/>


          <div class="row">
              <?php

              #  Cannot instantiate abstract classes / i.e. Products class

                  $products = Products :: get_products();

                  if($products == null){
              ?>
                    <p class="card-text text-center"> Sorry, no products found in database.</p>

                  <?php

                  }else{

                    foreach($products as $product ){

                    

                  ?>

              <div class="col-lg-3 mt-5">
								<div class="card p-2">
									<div class="card-body">
										<input type="checkbox" name="id[]" value="<?php $product['main']['Product_ID'];?>">
										<p class="card-title text-center mt-4"><?php echo $product['main']['name']; ?></h5>
										<p class="card-text text-center"><?php echo $product['main']['sku']; ?></p>
										<p class="card-text text-center"><?php echo $product['main']['price']; ?>$</p>
										<?php
											if(isset($product['special']['weight'])){
										?>
												<p class="card-text text-center">Weight : <?php echo $product['special']['weight']; ?> KG</p>
										<?php
											}
										?>

                    <?php
											if(isset($product['special']['size'])){
										?>
												<p class="card-text text-center">Size : <?php echo $product['special']['size']; ?> MB</p>
										<?php
											}
										?>
										<?php
											if(isset($product['special']['height']) && $product['special']['width'] && $product['special']['length']){
										?>
												<p class="card-text text-center">Dimension : <?php echo $product['special']['height']; ?> 
                            X <?php echo $product['special']['width']; ?> X <?php echo $product['special']['length']; ?> CM 
                        </p>
										<?php
											}
										?>
									
									</div>
								</div>
							</div>


              
        

              

      

      
        
      <?php
                    }

                  }

      ?>
      
      <hr class="mt-5"/>
        <footer class="p-5 text-center">Scandiweb Test Assignment</footer>
      </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

