<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    var_dump($user);
}
?>
<!-- Vous êtes connecté en tant que <?php // $_SESSION['user']->prenom; ?> -->
<!-- Souhaitez-vous récuperer les informations de votre profil pour faire le paiement? -->
<div class="container">
    <h2 class="text-center my-5">Commande</h2>
    <div class="row">
        <section class="col-sm-8 my-2">
            <?php if (isset($user) and !isset($_POST['oui']) || !isset($_POST['non'])) { ?>
                <h3>Vous êtes connecté en tant que <?=$user->prenom." ".$user->nom." (login:".$user->login.")";?></h3>
                <h4>Souhaitez-vous récupérer les informations de votre profil pour la commande?</h4>
                <form action="#" method="POST">
                    <div class="form-group col-md-6">
                        <button type="submit" name="oui" class="btn btn-primary" id="oui">oui</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" name="non" class="btn btn-warning" id="non">non</button>
                    </div>
                </form>
            <?php } ?>
            <?php if (isset($user) and isset($_POST['oui'])) { ?>
                <form id ="payment-form" action="http://<?php echo PATH;?>/ControllerProduits/stripe/" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="<?=$user->prenom;?>" value="<?=$user->prenom;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="<?=$user->nom;?>" value="<?=$user->nom;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mail">Votre e-mail</label>
                        <input type="mail" name="mail" class="form-control" id="mail" placeholder="<?=$user->mail;?>" value="<?=$user->mail;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">téléphone</label>
                        <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="<?=$user->telephone;?>" value="<?=$user->telephone;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="commentaire">Note de commande (facultatif)</label>
                    <textarea class="form-control" id="commentaire" name="commentaire" rows="3"></textarea>
                </div>
                <div class="form-row">
                        <div id="card-element" class="StripeElement form-control my-4">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>
                
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                </div>
                    <button name="payer" class="btn btn-primary col-sm-12 m-auto">payer</button>
                </form>
            <?php } else { ?>
                <form id ="payment-form" action="http://<?php echo PATH;?>/ControllerProduits/stripe/" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="votre prénom">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="votre nom de famille">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mail">Votre e-mail</label>
                        <input type="email" name="mail" class="form-control" id="mail" placeholder="example@example.fr">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">téléphone</label>
                        <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="ex: +33 6 78 90 12 34">
                    </div>
                </div>
                <div class="form-group">
                    <label for="commentaire">Note de commande (facultatif)</label>
                    <textarea class="form-control" id="commentaire" name="commentaire" rows="3"></textarea>
                </div>
                <div class="form-row">
                        <div id="card-element" class="StripeElement form-control my-4">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>
                
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                </div>
                    <button name="payer" class="btn btn-primary col-sm-12 m-auto">payer</button>
                </form>
            <?php } ?>
        </section>
        <section class="col my-2 commande">    
            <table class="table">
                <thead class="thead-light">Votre commande</thead>
                <tr>
                    <th>Produit</th>
                    <th>Sous-total</th>
                </tr>
                <?php foreach($_SESSION['panier'] as $produit) { ?>
                <tr>
                    <td><?=$produit->titreproduit?><span> x <?=$produit->quantite?></span></td>
                    <td><?=$this->panierTotal[$produit->id];?> &#8364;</td>
                </tr>
                <?php } ?>
                <tr>
                    <td>total (sans TVA)</td>
                    <td><?=$this->total?> &#8364;</td>
                </tr>
                <!-- <tr>
                    <td>total (avec TVA)</td>
                    <td>&#8364; prix total</td>
                </tr> -->
            </table>
        </section>
    </div>
</div>

<script>
// Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/apikeys
var stripe = Stripe(

'pk_test_51If0n8GAVfFRDcyqjWIHbtoqbnIX1HNGLbjcROcO06pXsB6lWVwtlHAayVG5WOWa87YDPtH5idvd8yIy92LgHOvI00aNza0Xsi'
);
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: '#32325d',
  },
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

// Create a Stripe client.
var stripe = Stripe('pk_test_51If0n8GAVfFRDcyqjWIHbtoqbnIX1HNGLbjcROcO06pXsB6lWVwtlHAayVG5WOWa87YDPtH5idvd8yIy92LgHOvI00aNza0Xsi');
  
  // Create an instance of Elements.
  var elements = stripe.elements();
    
  // Custom styling can be passed to options when creating an Element.
  // (Note that this demo uses a wider set of styles than the guide below.)
  var style = {
      base: {
          color: '#32325d',
          fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
          fontSmoothing: 'antialiased',
          fontSize: '16px',
          '::placeholder': {
              color: '#aab7c4'
          }
      },
      invalid: {
          color: '#fa755a',
          iconColor: '#fa755a'
      }
  };
    
  // Create an instance of the card Element.
  var card = elements.create('card', {style: style});
    
  // Add an instance of the card Element into the `card-element` <div>.
  card.mount('#card-element');
    
  // Handle real-time validation errors from the card Element.
  card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
          displayError.textContent = event.error.message;
      } else {
          displayError.textContent = '';
      }
  });
    
  // Handle form submission.
  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
      event.preventDefault();
    
      stripe.createToken(card).then(function(result) {
          if (result.error) {
              // Inform the user if there was an error.
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;
          } else {
              // Send the token to your server.
              stripeTokenHandler(result.token);
          }
      });
  });
    
  // Submit the form with the token ID.
  function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);
    
      // Submit the form
      form.submit();
  }
</script>