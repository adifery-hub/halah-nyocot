<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JUNK TOKOKU</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #111;
            color: white;
        }
 

        .container {
            width: 95%;
            max-width: 1200px;
            margin: 20px auto;
            min-height: 95vh;

            background: #a43f3f;

            border: 5px solid #222;
            border-radius: 5px;

            padding: 25px;
        }


  
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 25px;
        }

        .logo {
            width: 180px;
        }

        .logo h1 {
            font-size: 25px;
            letter-spacing: 2px;
        }

        .logo span {
            display: block;
            font-size: 13px;
            letter-spacing: 3px;
        }


        /* SEARCH */

        .search-box {
            width: 45%;
            height: 40px;

            background: rgba(255,255,255,0.18);

            border-radius: 30px;

            display: flex;
            align-items: center;

            padding: 0 18px;
        }

        .search-box span {
            margin-right: 10px;
            opacity: 0.8;
        }

        .search-box input {
            width: 100%;

            background: transparent;
            border: none;
            outline: none;

            color: white;
        }

        .search-box input::placeholder {
            color: #eee;
        }

 
        .cart {
            position: relative;

            width: 42px;
            height: 42px;

            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 50%;

            display: flex;
            justify-content: center;
            align-items: center;

            cursor: pointer;

            transition: 0.3s;
        }

        .cart:hover {
            background: white;
            color: #a43f3f;
        }

        .cart-count {
            position: absolute;

            top: -5px;
            right: -5px;

            width: 18px;
            height: 18px;

            background: white;
            color: #a43f3f;

            border-radius: 50%;

            font-size: 11px;

            display: flex;
            align-items: center;
            justify-content: center;
        }


 

        .products {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 18px;
        }

 
        .product {
            background: #b34b4b;

            border: 1px solid rgba(255,255,255,0.2);

            border-radius: 12px;

            padding: 10px;

            transition: 0.3s;
        }

        .product:hover {
            transform: translateY(-5px);

            box-shadow:
                0 10px 30px rgba(0,0,0,0.2);
        }


        .product-image {
            width: 100%;
            height: 155px;

            border-radius: 8px;

            overflow: hidden;

            background: #111;
        }

        .product-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: 0.4s;
        }

        .product:hover img {
            transform: scale(1.05);
        }


        .product-info {
            padding-top: 10px;
        }

        .product-name {
            font-size: 14px;

            margin-bottom: 8px;
        }

        .price {
            font-size: 15px;
            font-weight: bold;

            margin-bottom: 10px;
        }
 

        .add-cart {
            width: 100%;
            height: 34px;

            border: none;
            border-radius: 8px;

            background: white;
            color: #b43f3f;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;
        }

        .add-cart:hover {
            background: #222;
            color: white;
        }
 

        .cart-overlay {
            position: fixed;

            top: 0;
            left: 0;

            width: 100%;
            height: 100%;

            background: rgba(0,0,0,0.55);

            display: none;

            z-index: 100;
        }

        .cart-overlay.active {
            display: block;
        }


        .cart-menu {
            position: absolute;

            top: 0;
            right: 0;

            width: 380px;
            height: 100%;

            background: #171717;

            padding: 25px;

            box-shadow: -10px 0 30px rgba(0,0,0,0.4);

            display: flex;
            flex-direction: column;
        }
 

        .cart-header {
            display: flex;

            justify-content: space-between;
            align-items: center;

            padding-bottom: 20px;

            border-bottom: 1px solid #333;
        }

        .cart-header h2 {
            font-size: 22px;
        }

        .close-cart {
            width: 35px;
            height: 35px;

            border: none;
            border-radius: 50%;

            background: #333;
            color: white;

            cursor: pointer;

            font-size: 18px;
        }


  

        .cart-items {
            flex: 1;

            overflow-y: auto;

            padding: 15px 0;
        }


        .empty-cart {
            text-align: center;

            color: #999;

            margin-top: 50px;
        }


        .cart-item {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 12px 0;

            border-bottom: 1px solid #333;
        }


        .cart-item img {
            width: 65px;
            height: 65px;

            object-fit: cover;

            border-radius: 8px;
        }


        .cart-item-info {
            flex: 1;
        }

        .cart-item-name {
            font-size: 13px;

            margin-bottom: 5px;
        }

        .cart-item-price {
            font-size: 13px;

            color: #ddd;
        }


        /* QUANTITY */

        .quantity {
            display: flex;

            align-items: center;

            gap: 7px;

            margin-top: 7px;
        }

        .quantity button {
            width: 23px;
            height: 23px;

            border: none;
            border-radius: 5px;

            background: #a43f3f;

            color: white;

            cursor: pointer;
        }

        .quantity span {
            font-size: 12px;
        }


        /* DELETE */

        .delete-item {
            border: none;

            background: transparent;

            color: #ff7777;

            cursor: pointer;

            font-size: 16px;
        }

 

        .cart-footer {
            border-top: 1px solid #333;

            padding-top: 20px;
        }


        .total {
            display: flex;

            justify-content: space-between;

            margin-bottom: 15px;

            font-size: 18px;
            font-weight: bold;
        }


        .checkout {
            width: 100%;

            height: 45px;

            border: none;
            border-radius: 8px;

            background: white;
            color: #a43f3f;

            font-weight: bold;

            cursor: pointer;
        }

        .checkout:hover {
            background: #a43f3f;
            color: white;
        }

 

        @media (max-width: 700px) {

            .container {
                width: 100%;

                margin: 0;

                border: none;

                border-radius: 0;

                padding: 15px;
            }

            nav {
                flex-wrap: wrap;

                gap: 15px;
            }

            .logo {
                width: 100px;
            }

            .logo h1 {
                font-size: 20px;
            }

            .search-box {
                order: 3;

                width: 100%;
            }

            .products {
                grid-template-columns: 1fr;
            }

            .product-image {
                height: 200px;
            }

            .cart-menu {
                width: 100%;
            }
        }
    </style>
</head>


<body>

    <div class="container">
 

        <nav>

            <div class="logo">
                <span>JUNK</span>
                <h1>TOKOKU</h1>
            </div>


            <div class="search-box">

                <span>⌕</span>

                <input
                    type="text"
                    id="search"
                    placeholder="Cari..."
                >

            </div>


    
            <div class="cart" id="cartButton">

                🛒

                <div
                    class="cart-count"
                    id="cartCount"
                >
                    0
                </div>

            </div>

        </nav>
 
        <div
            class="products"
            id="products"
        >


  
            <div
                class="product"
                data-name="Premium Wireless Headphones"
                data-price="1299000"
                data-image="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80"
            >

                <div class="product-image">

                    <img
                        src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80"
                        alt="Wireless Headphones"
                    >

                </div>


                <div class="product-info">

                    <div class="product-name">
                        Premium Wireless Headphones
                    </div>

                    <div class="price">
                        Rp 1.299.000
                    </div>

                    <button class="add-cart">
                        Add to cart
                    </button>

                </div>

            </div>
 

            <div
                class="product"
                data-name="Smart Watch Series 7"
                data-price="2499000"
                data-image="https://images.unsplash.com/photo-1544117519-31a4b719223d?auto=format&fit=crop&w=800&q=80"
            >

                <div class="product-image">

                    <img
                        src="https://images.unsplash.com/photo-1544117519-31a4b719223d?auto=format&fit=crop&w=800&q=80"
                        alt="Smart Watch"
                    >

                </div>


                <div class="product-info">

                    <div class="product-name">
                        Smart Watch Series 7
                    </div>

                    <div class="price">
                        Rp 2.499.000
                    </div>

                    <button class="add-cart">
                        Add to cart
                    </button>

                </div>

            </div>

 
            <div
                class="product"
                data-name="Premium Gaming Chair"
                data-price="1899000"
                data-image="https://images.unsplash.com/photo-1592078615290-033ee584e267?auto=format&fit=crop&w=800&q=80"
            >

                <div class="product-image">

                    <img
                        src="https://images.unsplash.com/photo-1592078615290-033ee584e267?auto=format&fit=crop&w=800&q=80"
                        alt="Gaming Chair"
                    >

                </div>


                <div class="product-info">

                    <div class="product-name">
                        Premium Gaming Chair
                    </div>

                    <div class="price">
                        Rp 1.899.000
                    </div>

                    <button class="add-cart">
                        Add to cart
                    </button>

                </div>

            </div>
 

            <div
                class="product"
                data-name="Mechanical Keyboard RGB"
                data-price="799000"
                data-image="https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=800&q=80"
            >

                <div class="product-image">

                    <img
                        src="https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=800&q=80"
                        alt="Mechanical Keyboard"
                    >

                </div>


                <div class="product-info">

                    <div class="product-name">
                        Mechanical Keyboard RGB
                    </div>

                    <div class="price">
                        Rp 799.000
                    </div>

                    <button class="add-cart">
                        Add to cart
                    </button>

                </div>

            </div>

        </div>

    </div>


 

    <div
        class="cart-overlay"
        id="cartOverlay"
    >

        <div class="cart-menu">

 

            <div class="cart-header">

                <h2>
                    Keranjang
                </h2>

                <button
                    class="close-cart"
                    id="closeCart"
                >
                    ×
                </button>

            </div>




            <div
                class="cart-items"
                id="cartItems"
            >

                <div class="empty-cart">
                    Keranjang masih kosong 🛒
                </div>

            </div>

 

            <div class="cart-footer">

                <div class="total">

                    <span>
                        Total
                    </span>

                    <span id="totalPrice">
                        Rp 0
                    </span>

                </div>


                <button class="checkout">
                    Checkout
                </button>

            </div>

        </div>

    </div>



    <script>

 
        let cart = [];

 

        const cartButton =
            document.getElementById("cartButton");

        const cartOverlay =
            document.getElementById("cartOverlay");

        const closeCart =
            document.getElementById("closeCart");

        const cartItems =
            document.getElementById("cartItems");

        const cartCount =
            document.getElementById("cartCount");

        const totalPrice =
            document.getElementById("totalPrice");
 

        cartButton.addEventListener("click", function() {

            cartOverlay.classList.add("active");

        });

 

        closeCart.addEventListener("click", function() {

            cartOverlay.classList.remove("active");

        });

 

        cartOverlay.addEventListener("click", function(event) {

            if (event.target === cartOverlay) {

                cartOverlay.classList.remove("active");

            }

        });
 

        function formatRupiah(number) {

            return new Intl.NumberFormat(
                "id-ID",
                {
                    style: "currency",
                    currency: "IDR",
                    maximumFractionDigits: 0
                }
            ).format(number);

        }

 

        const buttons =
            document.querySelectorAll(".add-cart");


        buttons.forEach(function(button) {

            button.addEventListener("click", function() {

                const product =
                    button.closest(".product");


                const name =
                    product.dataset.name;


                const price =
                    Number(product.dataset.price);


                const image =
                    product.dataset.image;
 

                const existingProduct =
                    cart.find(function(item) {

                        return item.name === name;

                    });


                if (existingProduct) {

                    existingProduct.quantity++;

                } else {

                    cart.push({

                        name: name,

                        price: price,

                        image: image,

                        quantity: 1

                    });

                }


                updateCart();


                button.textContent =
                    "Added ✓";


                setTimeout(function() {

                    button.textContent =
                        "Add to cart";

                }, 800);

            });

        });

 
        function updateCart() {

            cartItems.innerHTML = "";


 

            if (cart.length === 0) {

                cartItems.innerHTML = `
                    <div class="empty-cart">
                        Keranjang masih kosong 🛒
                    </div>
                `;

            }


            let total = 0;

            let totalQuantity = 0;


            cart.forEach(function(item, index) {

                total +=
                    item.price * item.quantity;


                totalQuantity +=
                    item.quantity;


                const cartItem =
                    document.createElement("div");


                cartItem.className =
                    "cart-item";


                cartItem.innerHTML = `

                    <img
                        src="${item.image}"
                        alt="${item.name}"
                    >

                    <div class="cart-item-info">

                        <div class="cart-item-name">
                            ${item.name}
                        </div>

                        <div class="cart-item-price">
                            ${formatRupiah(item.price)}
                        </div>

                        <div class="quantity">

                            <button
                                onclick="decreaseQuantity(${index})"
                            >
                                -
                            </button>

                            <span>
                                ${item.quantity}
                            </span>

                            <button
                                onclick="increaseQuantity(${index})"
                            >
                                +
                            </button>

                        </div>

                    </div>

                    <button
                        class="delete-item"
                        onclick="removeItem(${index})"
                    >
                        🗑
                    </button>

                `;


                cartItems.appendChild(cartItem);

            });


            /* update jumlah */

            cartCount.textContent =
                totalQuantity;


            /* update total */

            totalPrice.textContent =
                formatRupiah(total);

        }


        /* =================================
           TAMBAH QUANTITY
        ================================= */

        function increaseQuantity(index) {

            cart[index].quantity++;

            updateCart();

        }


        /* =================================
           KURANGI QUANTITY
        ================================= */

        function decreaseQuantity(index) {

            cart[index].quantity--;


            if (cart[index].quantity <= 0) {

                cart.splice(index, 1);

            }


            updateCart();

        }


        /* =================================
           HAPUS PRODUK
        ================================= */

        function removeItem(index) {

            cart.splice(index, 1);

            updateCart();

        }


        /* =================================
           SEARCH
        ================================= */

        const search =
            document.getElementById("search");


        const products =
            document.querySelectorAll(".product");


        search.addEventListener("input", function() {

            const keyword =
                search.value.toLowerCase();


            products.forEach(function(product) {

                const name =
                    product
                    .querySelector(".product-name")
                    .textContent
                    .toLowerCase();


                if (name.includes(keyword)) {

                    product.style.display =
                        "block";

                } else {

                    product.style.display =
                        "none";

                }

            });

        });


        /* =================================
           CHECKOUT
        ================================= */

        document
            .querySelector(".checkout")
            .addEventListener("click", function() {

                if (cart.length === 0) {

                    alert(
                        "Keranjang masih kosong!"
                    );

                    return;

                }


                alert(
                    "Checkout berhasil! 🚀"
                );

            });

    </script>

</body>
</html>