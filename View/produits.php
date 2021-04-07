<?php
var_dump($_POST);
$listeProduits = $this->allProduits();
// $this->bonne_affichage($listeProduits);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <?php foreach($listeProduits as $value) { ?>
                <div class="card" style="width: 18rem;">
                <?php foreach ($value as $propertyName => $property) {
                    if ($propertyName == 'imageproduit') { ?>
                    <div>
                        <img card="card-img-top" src="IMAGES<?=$property?>" alt="image du produit">
                    </div>
                <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php
                            if ($propertyName == 'titreproduit') {
                                echo $property;
                            }
                        ?>
                        </h5>
                            <p class="card-text">
                        <?php
                            if ($propertyName == 'produit') {
                                echo $property;
                            }
                            ?>
                            </p>
                            <p class="card-text">
                            <?php
                            if ($propertyName == "prix") {
                                echo $property.'&#8364;';
                            }
                            ?>
                            </p>
                            <!-- <form action="" method="POST">
                                <input type="number" placeholder="qte.">
                                <button class="btn btn-primary" name="panier" value="<?=$value->id;?>" type="submit">ajouter au panier</button>
                                <button class="btn btn-warning" name="commande" value="<?=$value->id;?>" type="submit">passer à la commande</button>
                            </form> -->
                        </div>
                    <?php } ?>        
                </div>
            <?php
            }
        ?>
        </div>
    </div>
</div>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div>
    <section class="container produits">
            
    </section>
</div>