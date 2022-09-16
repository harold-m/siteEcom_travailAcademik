<?php session_start();
    session_regenerate_id(true);
        //include 'session.php';
      include('login-client.php');
     var_dump($_SESSION["nom"]);
?>

<!-- debut Navbar -->
<script src="recherche.js"></script>
<nav class="navbar">
    <div class="nav">
        <a href="home.php"><img src="images/logo.png" class="brand-logo" alt="" ></a>
        <div class="nav-items">
            <form method="GET" action="search.php" name="produit">
                <div class="search">
                    <input type="text" name="produit" class="search-box" placeholder="search brand, product">
                    <input class="search-btn" type="submit" value="search">
                </div>
            </form>
            <a href="wishlist.php"><img src="images/heart-empty.png" alt=""></a>
            <?php
            if($isConned=false) {
               echo ' <a href="login.php"><img src="images/user.png" alt=""></a>';
                }
                else
                {
                    echo '<a><div><select onchange="document.location.href=this.value"><option selected disabled hidden>'.$_SESSION["nom"].'</option>
                         <option value="monCompte.php">Mon compte</option>
                         <option value="signout.php">Deconnexion</option>
                         </select></div></a>';
                }
                ?>
            
            <a href="cart.php"><img src="images/cart.png\" alt=""></a>
        </div>

    </div>
        
    <ul class="links-container">
        <button><a href="home.php">Home</a></button>

    <!-- Rechercehe par catégorie -->
        <select name="recherche_categorie" id="Catégorie" onchange="rechercheP(this.value)">
            <option selected value="" hidden> Catégorie </option>
            <option value="téléphone">Téléphone</option>
            <option value="tablette">Tablette</option>
            <option value="écouteurs">Ecouteurs</option>
        </select>   
    <!-- Fin de recherche par catégorie-->

    <!-- Rechercehe par nom -->
        <select name="recherche_nom" id="nom" onchange="rechercheP(this.value)">
            <option selected value="" hidden>Nom du produit</option>
            <option value="Galaxy S9 ">Galaxy S9</option>
            <option value="Galaxy S10E">Galaxy S10E</option>
            <option value="iPhone X">Iphone X</option>
            <option value="Oxygen">Oxygen</option>
            <option value="airPods v1 ">airsPods</option>
            <option value="iPad Air">Ipad Air</option>
        </select>
        <!-- Fin recherche par nom-->

        <!-- Fin recherche par brands-->

        <select name="recherche_marque" id="brands" onchange="rechercheP(this.value)">
            <option selected value="" hidden>Brands</option>
            <option value="Samsung">Samsung</option>
            <option value="Apple">Apple</option>
            <option value="Archos">Archos</option>
        </select>


    </ul>
</nav>
<div id="elementChoisi"></div>