<div class="container my-5">
    <div class="row">
            <?php foreach($this->searchResult as $product) { ?>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top produit-img" src="<?=IMAGES;?><?=$product->imageproduit;?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?=$product->titreproduit;?></h5>
                        <p class="card-text"><?=$product->produit;?></p>
                        <a href="#" class="btn btn-primary col-sm-12">Go somewhere</a>
                    </div>
                </div>
            </div>
            <?php }
            ?>
    </div>
</div>