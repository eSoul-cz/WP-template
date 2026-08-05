function updateMiniCart() {
    fetch(wc_add_to_cart_params.ajax_url, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "action=de_update_mini_cart"
    })
    .then(response => response.text())
    .then(html => {
        let miniCartContainer = document.querySelector(".widget_shopping_cart_content");
        if (miniCartContainer) {
            miniCartContainer.innerHTML = html;
        }

        // Update Cart Counter
        let cartCounter = document.querySelector(".bde-mini-cart-toggle__counter");
        let cartSubtotal = document.querySelector(".bde-mini-cart-toggle__subtotal");

        let tempDiv = document.createElement("div");
        tempDiv.innerHTML = html;
        
        let newCartCounter = tempDiv.querySelector(".woocommerce-mini-cart-item") ? tempDiv.querySelectorAll(".woocommerce-mini-cart-item").length : 0;
        let newCartSubtotal = tempDiv.querySelector(".woocommerce-Price-amount") ? tempDiv.querySelector(".woocommerce-Price-amount").innerHTML : "$0.00";

        if (cartCounter) cartCounter.innerText = newCartCounter;
        if (cartSubtotal) cartSubtotal.innerHTML = newCartSubtotal;
    });
}


document.querySelectorAll(".de-add-to-cart").forEach(buttonContainer => {
  let button = buttonContainer.querySelector(".button-atom");
  let productId = buttonContainer.querySelector("[de-add-to-cart-button-id]").getAttribute("de-add-to-cart-button-id");

  button.addEventListener("click", function (event) {
    event.preventDefault();
    event.stopPropagation();

    button.innerText = buttonContainer.querySelector("[de-add-to-cart-adding-message]") 
      ? buttonContainer.querySelector("[de-add-to-cart-adding-message]").getAttribute("de-add-to-cart-adding-message")
    : "Adding...";
    button.disabled = true;

    fetch(wc_add_to_cart_params.ajax_url, {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `action=de_add_to_cart&product_id=${productId}`
    })
      .then(response => response.json())
      .then(data => {
      if (data.success) {
        button.innerText = "Added!";
        updateMiniCart();
        setTimeout(() => {
          button.innerText = "Add To Cart";
          button.disabled = false;
        }, 2000);
      } else {
        button.innerText = "Error!";
        setTimeout(() => {
          button.innerText = "Add To Cart";
          button.disabled = false;
        }, 2000);
      }
    });
  });
});