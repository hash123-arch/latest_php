

<?php

include_once 'classes/product.php';

# Add a Book

if(isset($_POST['submit'])){

switch($_POST['Type']){

case 'book' :
  
$book = new Book();

$book->set_id($_POST['id']);

$book->set_sku($_POST['sku']);

$book->set_name($_POST['name']);

$book->set_price($_POST['price']);

$book->set_weight($_POST['weight']);

$book->add_product();

break;

# Add a dvd

case 'dvd':

$dvd = new DVD();

$dvd->set_id($_POST['id']);

$dvd->set_sku($_POST['sku']);

$dvd->set_name($_POST['name']);

$dvd->set_price($_POST['price']);

$dvd->set_size($_POST['size']);

$dvd->add_product();

break;

# Add a furniture

case 'furniture':

$FUR = new FURNITURE();

$FUR->set_id($_POST['id']);

$FUR->set_sku($_POST['sku']);

$FUR->set_name($_POST['name']);

$FUR->set_price($_POST['price']);

$FUR->set_height($_POST['height']);

$FUR->set_width($_POST['width']);

$FUR->set_length($_POST['length']);

$FUR->add_product();

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
  <style>
       hr {
        margin: 2rem 0;
       }

        #DVD{
            display: none;
        }

        #BOOK1{
            display: none;
        }

        #FURNITURE{
            display: none;
        }
  </style>
  <body>

      <div class="container mt-5">

          <h3 class="float-start display-5">Product Add  </h3>

     
          <form method="POST" role="form" class="needs-validation"  id="product_form"  novalidate>
            
            <button type="reset" class="btn btn-danger float-end mt-1" style="margin:5px;">Cancel</button>

            <button class="btn btn-primary float-end mt-1" type="submit" name="submit" style="margin:5px;">Save</button>
         
            <br/><br/>
        

          <hr/>

        <input type="hidden" name="id" class="form-control" value=<?php echo rand();?>>

        <div class="mb-3 row mt-5">
            <label class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
            <input type="text" class="form-control w-50" id="sku" name="sku" required>
            <div class="invalid-feedback">
               Sku Field cannot be empty !
            </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control w-50" id="name" name="name" required>
            <div class="invalid-feedback">
               Name Field cannot be empty !
            </div>
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
            <input type="number" class="form-control w-50" id="price" name="price" required>
            <div class="invalid-feedback">
               Price Field cannot be empty !
            </div>
            </div>
            
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Type Switcher</label>
            <div class="col-sm-10">
            <select class="form-select w-50" name="Type" id="productType" required onchange="selectProduct()">
            <option class="text-center" selected disabled value="">--Type Switcher--</option>
            <option class="text-center" value="dvd">DVD</option>
            <option class="text-center"  value="book" >Book</option>
            <option class="text-center" value="furniture">Furniture</option>
            </select>
            <div class="invalid-feedback">Please select a type.</div>
        </div>

        <div class="row mb-3" id="DVD" style="padding: 1em;">
                  <label for="inputDVD3" class="col-sm-2 col-form-label">Size (MB)</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control w-25" id="size" name="size" required >
                      
                      <div class="invalid-feedback">Please fill out the size.</div>
                      <p class="text-muted mt-3">Please Provide the size in Numerical Megabytes</p> 
                    </div>
                  <!-- Javascript to disable validation for size input This was done because if I choose only size in the select dropdown the other 
                  fields validation will prevent me from inputing form vales to database -->
                    <script>
                            document.getElementById("size").required = false;
                    </script>
                </div>
        
                <div class="row mb-3" id="BOOK1" style="padding: 1em;">

                  <label for="inputbook3" class="col-sm-2 col-form-label">Weight (KG)</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control w-25" id="weight" name="weight" required>
                      
                      <div class="invalid-feedback">Please fill out the weight.</div>
                      <p class="text-muted mt-3">Please Provide the weight in KG</p> 
                    </div>
                    <!-- Javascript to disable validation for weight input This was done because if I choose only size in the select dropdown the other 
                  fields validation will prevent me from inputing form vales to database -->
                  <script>
                      document.getElementById("weight").required = false;
                  </script>
                </div>

                <div class="row mb-3" id="FURNITURE" style="padding:1em;">
                  <label for="inputfur3" class="col-sm-2 col-form-label mt-2 ">Height (CM)</label>
                  <div class="col-sm-10">
                      <input type="number" class="form-control w-25" id="height" name="height" required >
                      
                      <script>
                          document.getElementById("height").required = false;
                      </script>
                    <div class="invalid-feedback">Please fill out the height.</div>
                  </div>

                  <label for="inputfur3" class="col-sm-2 col-form-label mt-2">Width (CM)</label>

                  <div class="col-sm-10">
                      <input type="number" class="form-control w-25" id="width" name="width" required>
                      
                      <script>
                          document.getElementById("width").required = false;
                      </script>
                    <div class="invalid-feedback">Please fill out the width.</div>
                  </div>

                  <label for="inputfur3" class="col-sm-2 col-form-label mt-2">Length (CM)</label>

                  <div class="col-sm-10">
                      <input type="number" class="form-control w-25" id="length" name="length" required >
                     
                      
                      <div class="invalid-feedback">Please fill out the length.</div>
                        <script>
                            document.getElementById("length").required = false;
                        </script>
                      </div>
                  <p class="text-muted mt-3">Please Provide diminsions in HxLxW format when type furniture is selected</p> 
            
    </div>
         
      
         </form>
         <hr class="mt-5"/>
        <footer class="p-3 text-center">Scandiweb Test Assignment</footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()


const selectProduct = () =>{

    //The selectedIndex property sets or returns the index of the selected option in a drop-down list.

    //The index starts at 0.

    let product = document.getElementById('productType').selectedIndex;

    let value = document.getElementsByTagName('option')[product].value;

    if(value=='dvd'){

        document.getElementById('DVD').style.display = 'flex';
        document.getElementById('BOOK1').style.display = 'none';
        document.getElementById('FURNITURE').style.display = 'none';

        }else if(value=='book'){

        document.getElementById('DVD').style.display = 'none';
        document.getElementById('BOOK1').style.display = 'flex';
        document.getElementById('FURNITURE').style.display = 'none';

        }else if(value=='furniture'){

        document.getElementById('DVD').style.display = 'none';
        document.getElementById('BOOK1').style.display = 'none';
        document.getElementById('FURNITURE').style.display = 'flex';

    }

}


  </script>


</html>