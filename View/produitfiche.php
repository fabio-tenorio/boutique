<?php

/*
Affiche 1 produit, avec photo, descriptif et AVIS

C'est la même vue pour chaque produit, seul le contenu change
*/

var_dump($this->ficheproduit);

?>
<div class="container">
<section class="my-5 mb-5">
  <div class="row">
    <div class="col-md-6 mb-4 mb-md-0">

      <div id="mdb-lightbox-ui"></div>

      <div class="mdb-lightbox">

        <div class="row product-gallery mx-1">

          <div class="col-12 mb-0">
            <figure class="view overlay rounded z-depth-1 main-img">
              <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                data-size="710x823">
                <img src="<?=IMAGES;?><?=$this->ficheproduit->imageproduit;?>"
                  class="img-fluid z-depth-1">
              </a>
            </figure>
            <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
              <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                data-size="710x823">
                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                  class="img-fluid z-depth-1">
              </a>
            </figure>
            <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
              <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                data-size="710x823">
                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                  class="img-fluid z-depth-1">
              </a>
            </figure>
            <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
              <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                data-size="710x823">
                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                  class="img-fluid z-depth-1">
              </a>
            </figure>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-3">
                <div class="view overlay rounded z-depth-1 gallery-item">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                    class="img-fluid">
                  <div class="mask rgba-white-slight"></div>
                </div>
              </div>
              <div class="col-3">
                <div class="view overlay rounded z-depth-1 gallery-item">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                    class="img-fluid">
                  <div class="mask rgba-white-slight"></div>
                </div>
              </div>
              <div class="col-3">
                <div class="view overlay rounded z-depth-1 gallery-item">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                    class="img-fluid">
                  <div class="mask rgba-white-slight"></div>
                </div>
              </div>
              <div class="col-3">
                <div class="view overlay rounded z-depth-1 gallery-item">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                    class="img-fluid">
                  <div class="mask rgba-white-slight"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <div class="col-md-6">

      <h5><?=$this->ficheproduit->titreproduit?></h5>
      <p class="mb-2 text-muted text-uppercase small"><?=$this->ficheproduit->id_categorie?></p>
      <ul class="rating produitstars">
        <li>
            <i class="bi bi-star bi-sm text-primary"></i>
        </li>
        <li>
            <i class="bi bi-star bi-sm text-primary"></i>
        </li>
        <li>
            <i class="bi bi-star bi-sm text-primary"></i>
        </li>
        <li>
            <i class="bi bi-star bi-sm text-primary"></i>
        </li>
        <li>
            <i class="bi bi-star bi-sm text-primary"></i>
        </li>
      </ul>
      <p><span class="mr-1"><strong><?=$this->ficheproduit->prix?> &#8364;</strong></span></p>
      <p class="pt-1"><?=$this->ficheproduit->produit;?></p>
      <hr>
      <!-- <div class="table-responsive mb-2">
        <table class="table table-sm table-borderless">
          <tbody>
            <tr>
              <td class="pl-0 pb-0 w-25">Quantity</td>
            </tr>
            <tr>
              <td class="pl-0">
                <div class="def-number-input number-input safari_only mb-0">
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    class="minus"></button>
                  <input class="quantity" min="0" name="quantity" value="1" type="number">
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                    class="plus"></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div> -->
      <button type="button" class="btn btn-primary btn-md mr-1 mb-2">acheter maintenant</button>
      <button type="button" class="btn btn-light btn-md mr-1 mb-2"><i
          class="bi bi-shopping-cart pr-2"></i>ajouter au panier</button>
    </div>
  </div>
  <div class="classic-tabs border rounded px-4 pt-1">

  <ul class="nav tabs-primary nav-justified" id="advancedTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active show" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
    </li>
  </ul>
  <div class="tab-content" id="advancedTabContent">
    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
      <h5></h5>
      <!-- <p class="small text-muted text-uppercase mb-2">Shirts</p> -->
      <ul class="rating produitstars">
        <li>
          <i class="bi bi-star bi-sm text-primary"></i>
        </li>
        <li>
          <i class="bi bi-star bi-sm text-primary"></i>
        </li>
        <li>
          <i class="bi bi-star bi-sm text-primary"></i>
        </li>
        <li>
          <i class="bi bi-star bi-sm text-primary"></i>
        </li>
        <li>
          <i class="bi bi-star bi-sm text-primary"></i>
        </li>
      </ul>
      <h6><?=$this->ficheproduit->prix?></h6>
      <p class="pt-1"><?=$this->ficheproduit->produit?></p>
    </div>
    <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
      <h5>Détails techniques</h5>
      <table class="table table-striped table-bordered mt-3">
        <thead>
          <tr>
            <th scope="row" class="w-150 dark-grey-text h6">Marque</th>
            <td><em>0.3 kg</em></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="w-150 dark-grey-text h6">Poid</th>
            <td><em>50 × 60 cm</em></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
      <h5><span>1</span> les avis sur <span class=""><?=$this->ficheproduit->titreproduit?></span></h5>
      <div class="media mt-3 mb-4">
        <img class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" width="62" alt="Generic placeholder image">
        <div class="media-body">
          <div class="d-sm-flex justify-content-between">
            <p class="mt-1 mb-2">
              <strong>Marthasteward </strong>
              <span>– </span><span>January 28, 2020</span>
            </p>
            <ul class="rating mb-sm-0">
              <li>
                <i class="bi bi-star bi-sm text-primary"></i>
              </li>
              <li>
                <i class="bi bi-star bi-sm text-primary"></i>
              </li>
              <li>
                <i class="bi bi-star bi-sm text-primary"></i>
              </li>
              <li>
                <i class="bi bi-star bi-sm text-primary"></i>
              </li>
              <li>
                <i class="bi bi-star bi-sm text-primary"></i>
              </li>
            </ul>
          </div>
          <p class="mb-0">Nice one, love it!</p>
        </div>
      </div>
      <hr>
      <h5 class="mt-4">Add a review</h5>
      <p>Your email address will not be published.</p>
      <div class="my-3">
        <ul class="rating mb-0">
          <li>
            <a href="#!">
              <i class="fas fa-star fa-sm text-primary"></i>
            </a>
          </li>
          <li>
            <a href="#!">
              <i class="fas fa-star fa-sm text-primary"></i>
            </a>
          </li>
          <li>
            <a href="#!">
              <i class="fas fa-star fa-sm text-primary"></i>
            </a>
          </li>
          <li>
            <a href="#!">
              <i class="fas fa-star fa-sm text-primary"></i>
            </a>
          </li>
          <li>
            <a href="#!">
              <i class="far fa-star fa-sm text-primary"></i>
            </a>
          </li>
        </ul>
      </div>
      <div>
        <!-- Your review -->
        <div class="md-form md-outline">
          <textarea id="form76" class="md-textarea form-control pr-6" rows="4"></textarea>
          <label for="form76">Your review</label>
        </div>
        <!-- Name -->
        <div class="md-form md-outline">
          <input type="text" id="form75" class="form-control pr-6">
          <label for="form75">Name</label>
        </div>
        <!-- Email -->
        <div class="md-form md-outline">
          <input type="email" id="form77" class="form-control pr-6">
          <label for="form77">Email</label>
        </div>
        <div class="text-right pb-2">
          <button type="button" class="btn btn-primary">Add a review</button>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- Classic tabs -->

</section>
<!--Section: Block Content-->
<!-- Classic tabs -->
<!--Section: Block Content-->
<section class="text-center">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-6 col-lg-3 mb-5">

      <!-- Card -->
      <div class="">

        <div class="view zoom overlay z-depth-2 rounded">
          <img class="img-fluid w-100"
            src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
          <a href="#!">
            <div class="mask">
              <img class="img-fluid w-100"
                src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg">
              <div class="mask rgba-black-slight"></div>
            </div>
          </a>
        </div>

        <div class="pt-4">

          <h5>Fantasy T-shirt</h5>
          <h6>12.99 $</h6>
        </div>

      </div>
      <!-- Card -->

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-6 col-lg-3 mb-5">

      <!-- Card -->
      <div class="">

        <div class="view zoom overlay z-depth-2 rounded">
          <img class="img-fluid w-100"
            src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
          <a href="#!">
            <div class="mask">
              <img class="img-fluid w-100"
                src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg">
              <div class="mask rgba-black-slight"></div>
            </div>
          </a>
        </div>

        <div class="pt-4">

          <h5>Fantasy T-shirt</h5>
          <h6>12.99 $</h6>

        </div>

      </div>
      <!-- Card -->

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-6 col-lg-3 mb-5">

      <!-- Card -->
      <div class="">

        <div class="view zoom overlay z-depth-2 rounded">
          <img class="img-fluid w-100"
            src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg" alt="Sample">
          <h4 class="mb-0"><span class="badge badge-primary badge-pill badge-news">Sale</span></h4>
          <a href="#!">
            <div class="mask">
              <img class="img-fluid w-100"
                src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14.jpg">
              <div class="mask rgba-black-slight"></div>
            </div>
          </a>
        </div>

        <div class="pt-4">

          <h5>Fantasy T-shirt</h5>
          <h6>
            <span class="text-danger mr-1">$12.99</span>
            <span class="text-grey"><s>$36.99</s></span>
          </h6>

        </div>

      </div>
      <!-- Card -->

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-6 col-lg-3 mb-5">

      <!-- Card -->
      <div class="">

        <div class="view zoom overlay z-depth-2 rounded">
          <img class="img-fluid w-100"
            src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg" alt="Sample">
          <h4 class="mb-0"><span class="badge badge-primary badge-pill badge-news">Sale</span></h4>
          <a href="#!">
            <div class="mask">
              <img class="img-fluid w-100"
                src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14.jpg">
              <div class="mask rgba-black-slight"></div>
            </div>
          </a>
        </div>

        <div class="pt-4">

          <h5>Fantasy T-shirt</h5>
          <h6>
            <span class="text-danger mr-1">$12.99</span>
            <span class="text-grey"><s>$36.99</s></span>
          </h6>

        </div>

      </div>
      <!-- Card -->

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
<!--Section: Block Content-->
</div>