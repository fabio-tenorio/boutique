<?php

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
              <a href="#">
                <img src="<?=IMAGES;?><?=$this->ficheproduit->imageproduit;?>"
                  class="img-fluid z-depth-1">
              </a>
            </figure>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <h5><?=$this->ficheproduit->titreproduit?></h5>
      <p class="mb-2 text-muted text-uppercase small"><?=$this->ficheproduit->id_categorie?></p>
      <p><span class="mr-1"><strong><?=$this->ficheproduit->prix?> &#8364;</strong></span></p>
      <p class="pt-1"><?=$this->ficheproduit->produit;?></p>
      <hr>
      <a href="http://<?php echo PATH; ?>/ControllerProduits/ajouterAuPanier/<?php echo $this->ficheproduit->id;?>" class="btn btn-warning btn-md mr-1 mb-2">ajouter au panier</a>
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
      <h6><?=$this->ficheproduit->prix?> &#8364;</h6>
      <p class="pt-1"><?=$this->ficheproduit->produit?></p>
    </div>
    <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
      <h5>Détails techniques</h5>
    </div>
  </div>
</div>
<!-- Classic tabs -->
</section>