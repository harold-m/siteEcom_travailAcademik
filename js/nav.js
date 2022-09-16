const createNav = () => {
    let nav = document.querySelector('.navbar');
    nav.innerHTML = `
        <div class="nav">
            <img src="img/Logo.png" class="brand-logo" alt="">
            <div class="nav-items">
                <div class="search">
                    <input type="text" class="search-box" placeholder="search brand, product">
                    <button class="search-btn">search</button>
                </div>
                <a href="#"><img src="img/heart-empty.png" alt=""></a>
                <a href="#"><img src="img/user.png" alt=""></a>
                <a href="#"><img src="img/cart.png\" alt=""></a>
            </div>

        </div>
        
        <ul class="links-container">
            <li class="link-item"><a href="#" class="link">Home</a></li>
            <li class="link-item"><a href="#" class="link">Categories</a></li>
            <li class="link-item"><a href="#" class="link">Age</a></li>
            <li class="link-item"><a href="#" class="link">Brands</a></li>
            <li class="link-item"><a href="#" class="link">New</a></li>
            <li class="link-item"><a href="#" class="link">Cloths</a></li>
            <li class="link-item"><a href="#" class="link">Food & Candy</a></li>
            <li class="link-item"><a href="#" class="link">Toys</a></li>
            <li class="link-item"><a href="#" class="link">Accessories</a></li>
        </ul>
    `;
}

createNav();