window.addEventListener('load', function () {

    const deAjaxSearch = document.querySelectorAll('.de-advanced-search');
    const searchElements = document.querySelectorAll('.de-search-input');

    document.addEventListener('click', function (event) {
        if (!event.target.closest('.de-search-input') && !event.target.closest('.de-search-results-wrapper')) {
            document.querySelectorAll('.de-search-results-wrapper').forEach(el => {
                el.style.display = 'none';
            });
        };

        if (!event.target.closest('.de-dropdown-input') && !event.target.closest('.de-search-tax-wrapper')) {
            document.querySelectorAll('.de-dropdown-input').forEach(el => {
                el.classList.remove('active');
            });
            document.querySelectorAll('.de-search-tax-wrapper').forEach(el => {
                el.classList.remove('active');
            });
        };

    });

    deAjaxSearch.forEach((el, index) => {
        const search = searchElements[index];
        let dropdownInput = el.querySelector('.de-dropdown-input');
        const dropdownWrapper = el.querySelector('.de-search-tax-wrapper')
        const dropdownOptions = el.querySelectorAll('.de-option');
        const searchButton = el.querySelector('.de-advanced-search-button');
        const resultsWrapper = el.querySelector('.de-search-results-wrapper');
        const searchinput = el.querySelectorAll('.de-search-input');

        search.addEventListener("focusin", function() {
            resultsWrapper.style.display = "block";
        });

        search.addEventListener("click", function() {
            resultsWrapper.style.display = "block";
        });


        if (dropdownInput) {
            dropdownInput.addEventListener('click', function () {
                deToggleDropDown(dropdownInput, dropdownWrapper, resultsWrapper);
            });
        } else {
            dropdownInput = false;
        }

        if (search) {
            search.addEventListener('input', deSearchResults);

            // NEW: Listen for the Enter key
            search.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    deAdvancedSearchButtonClick(searchButton, search, dropdownInput);
                }
            });
            
        }

        if (searchButton) {
            searchButton.addEventListener('click', function () {
                deAdvancedSearchButtonClick(searchButton, search, dropdownInput);
            });
        }

        dropdownOptions.forEach(el => {
            el.addEventListener('click', function () {
                dePopulateSearchDropDown(el, dropdownInput, dropdownWrapper);
            });
        });
    });

    function deAdvancedSearchButtonClick(searchButton, search, dropdownInput) {
        // searchButton.preventDefault();
        const searchURL = deAjaxAddionalData.searchURL.replace('{{search-term}}', search.value) + '&post_type=' + (typeof deAjaxQuerySearch.post_type !== 'undefined' ? deAjaxQuerySearch.post_type.join(',') : 'post');
        let category;
        if (dropdownInput && dropdownInput.getAttribute('data-value') && dropdownInput.getAttribute('data-value') != 'all') {
            category = dropdownInput.getAttribute('data-value');
            if (deAjaxAddionalData.taxonomyTerm == 'product_cat') {
                window.location = searchURL + '&product_cat=' + category;
            } else if (deAjaxAddionalData.taxonomyTerm == 'product_tag') {
                window.location = searchURL + '&product_tag=' + category;
            } else if (deAjaxAddionalData.taxonomyTerm == 'category') {
                window.location = searchURL + '&category_name=' + category;
            } else if (deAjaxAddionalData.taxonomyTerm == 'post_tag') {
                window.location = searchURL + '&tag=' + category;
            } else {
                window.location = searchURL;
            }
            return;
        }

        window.location = searchURL;

    }

    function dePopulateSearchDropDown(el, dropdownInput, dropdownWrapper) {
        dropdownInput.querySelector('.de-dropdown-value').innerHTML = el.innerHTML;
        dropdownInput.setAttribute('data-value', el.getAttribute('value'));
        dropdownWrapper.classList.remove('active');
        dropdownInput.classList.remove('active');
    };

    let timeoutID;

    function deSearchResults(event) {
        event.preventDefault();
        const input = event.target.value;
        const startSearchWithLength = 2;
        const selector = event.target.parentNode.parentNode.parentNode.querySelector('.de-search-results-wrapper');
        let dropDownInput = event.target.parentNode.parentNode.parentNode.querySelector('.de-dropdown-input');

        if (!dropDownInput) {
            dropDownInput = false;
        }

        let category = '';

        if (dropDownInput && dropDownInput.getAttribute('data-value') && dropDownInput.getAttribute('data-value') != 'all') {
            category = dropDownInput.getAttribute('data-value');
        }

        if (input.length < startSearchWithLength) {
            selector.innerHTML = '';
            return;
        };

        if (timeoutID) clearTimeout(timeoutID);

        // Set a new timeout for 300ms
        timeoutID = setTimeout(() => {
            deFetchResults(selector, input, category);
        }, 200);

    };

    /**
     * Dropdown
     */

    function deToggleDropDown(dropdownInput, dropdownWrapper, resultsWrapper) {
        dropdownInput.classList.toggle('active');
        if (dropdownWrapper) dropdownWrapper.classList.toggle('active');
        resultsWrapper.style.display = "none";
    }



    let controller = new AbortController();
    let signal = controller.signal;

    function deFetchResults(selector, search, category) {


        controller = new AbortController();
        signal = controller.signal;

        selector.style.display = "block";
        selector.innerHTML = ''; 
        document.querySelectorAll('.de-ajax-spinner')[0].style.display = "block";

        let ajaxUrl = window.BreakdanceFrontend.data.ajaxUrl;
        let ajaxNonce = 'breakdance_ajax';
        console.log(ajaxNonce);

        fetch(ajaxUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: 'action=de_ajax_search'
                + '&nonce='
                + ajaxNonce
                + '&search_term='
                + search
                + '&post_type='
                + deAjaxQuerySearch.post_type
                + '&posts_per_page='
                + deAjaxQuerySearch.posts_per_page
                + '&order='
                + deAjaxQuerySearch.order
                + '&orderby='
                + deAjaxQuerySearch.orderby
                + '&sticky_posts='
                + deAjaxQuerySearch.ignore_sticky_posts
                + '&get_taxonomy_term='
                + deAjaxAddionalData.taxonomyTerm
                + '&featured_image='
                + deAjaxAddionalData.featuredImage
                + '&show_results='
                + deAjaxAddionalData.showResults
                + '&no_results_msg='
                + deAjaxAddionalData.noResultMessage
                + '&show_prices='
                + deAjaxAddionalData.showPrices
                + '&show_all_results_btn='
                + deAjaxAddionalData.allResultsBtn
                + '&results_count_name='
                + deAjaxAddionalData.resultsCountName
                + '&cat_name='
                + category
                + '&excerpt='
                + deAjaxAddionalData.excerptDisable
                + '&excerpt_length='
                + deAjaxAddionalData.excerptLength
                + '&all_results_text='
                + deAjaxAddionalData.showAllResultsText
                + '&sku='
                + deAjaxAddionalData.sku
                + '&sku_n_s='
                + deAjaxAddionalData.skuAndS
                + '&sku_heading='
                + deAjaxAddionalData.skuHeading,
                 signal: signal
        })
            .then((response) => response.text())
            .then((data) => {
                if (data.endsWith("0")) {
                    data = data.slice(0, -1);
                }
                try {
                    // Try to parse the data as JSON
                    const jsonData = JSON.parse(data);

                    // Check if the parsed JSON object has a 'success' property
                    if (jsonData.hasOwnProperty('success')) {
                        console.warn(jsonData.success + ': ' + jsonData.data);
                        selector.innerHTML = '';
                        return;
                    }
                } catch (error) {
                    // If an error is thrown, it means the data is not a JSON string
                }
                // If the function hasn't returned yet, it means the data is not a JSON string
                selector.innerHTML = data;
                document.querySelectorAll('.de-ajax-spinner')[0].style.display = "none";
            })
            .catch((error) => {
                if (error.name === 'AbortError') {
                    console.log('Fetch aborted');
                } else {
                    console.log(error);
                }
            });
    }
});