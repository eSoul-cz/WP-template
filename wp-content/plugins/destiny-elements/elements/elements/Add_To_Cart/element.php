<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\AddToCart",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class AddToCart extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'SquareIcon';
    }

    static function tag()
    {
        return 'div';
    }

    static function tagOptions()
    {
        return [];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'Add To Cart';
    }

    static function className()
    {
        return 'de-add-to-cart';
    }

    static function category()
    {
        return 'other';
    }

    static function badge()
    {
        return false;
    }

    static function slug()
    {
        return __CLASS__;
    }

    static function template()
    {
        return file_get_contents(__DIR__ . '/html.twig');
    }

    static function defaultCss()
    {
        return file_get_contents(__DIR__ . '/default.css');
    }

    static function defaultProperties()
    {
        return false;
    }

    static function defaultChildren()
    {
        return false;
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [getPresetSection(
      "EssentialElements\\AtomV1ButtonDesign",
      "Button",
      "button",
       ['type' => 'popout']
     )];
    }

    static function contentControls()
    {
        return [c(
        "button",
        "Button",
        [c(
        "text",
        "Text",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "adding_button_message",
        "Adding Button Message",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      )];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return ['0' =>  ['title' => 'AddToCart','inlineScripts' => ['function updateMiniCart() {
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
});'],],];
    }

    static function settings()
    {
        return false;
    }

    static function addPanelRules()
    {
        return ['alwaysHide' => true];
    }

    static public function actions()
    {
        return false;
    }

    static function nestingRule()
    {
        return ["type" => "final",   ];
    }

    static function spacingBars()
    {
        return false;
    }

    static function attributes()
    {
        return false;
    }

    static function experimental()
    {
        return true;
    }

    static function order()
    {
        return 0;
    }

    static function dynamicPropertyPaths()
    {
        return false;
    }

    static function additionalClasses()
    {
        return false;
    }

    static function projectManagement()
    {
        return false;
    }

    static function propertyPathsToWhitelistInFlatProps()
    {
        return ['design.styles.styles.size.full_width_at', 'design.button.custom.size.full_width_at', 'design.button.styles'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
