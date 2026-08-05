const deAjaxFilter = document.querySelectorAll('.de-af-selection-wrapper.de-af-dropdown');
const deAjaxSearch = document.querySelectorAll('.de-af-selection-wrapper.de-af-search');
const deAfRadioInputs = document.querySelectorAll('.de-af-input-radio');
const deAFChekboxInputs = document.querySelectorAll('.de-af-input-checkboxes');
const deAFButtonsInputs = document.querySelectorAll('.de-af-input-button-layout');
const deAjaxReset = document.querySelectorAll('.de-reset-ajax-filter-field');
const deAjaxSearchButton = document.querySelectorAll('.de-search-ajax-filter-field');
let deCurrentSearch = new URLSearchParams(window.location.search);

// Create an object to store data in for the search
const deFiltersObj = {};
window.deFiltersObj = deFiltersObj;

const deFiltersRel = {};
window.deFiltersRel = deFiltersRel;

function deConstructUrl(el = false) {

    // Searh button

    let buttonType = false;
    if(el && el.classList.contains('de-search-ajax-filter-field')) {
        buttonType = 'search';
    }

    deCurrentSearch = new URLSearchParams(window.location.search);
    let currentLocation = window.location.origin + window.location.pathname;
    let postType = '';
    if(destinyAFObj.isFrontPage) {
        if(destinyAFObj.postType == "product" || destinyAFObj.postType == "post") {
            postType = `&post_type=${destinyAFObj.postType}`;
        } else {
            currentLocation = window.location.origin + '/' + destinyAFObj.slug + '/';
        }
    }

    if (deFiltersObj.search === undefined || deFiltersObj.search == 'null' || deFiltersObj.search == null) deFiltersObj.search = '';

    let url = `${destinyAFObj.postTypeLink}?s=${deFiltersObj.search}`;

    if(deFiltersObj.search === '' && Object.values(deFiltersObj).length == 1 && !destinyAFObj.isFrontPage) { 
        url = `${destinyAFObj.postTypeLink}`;
    };

    if(destinyAFObj.redirectIsEnabled) {
        url = destinyAFObj.redirectURL + '?s=' + deFiltersObj.search;
    };

    url = deRemovePageFromUrl(url);
    url += postType;

    Object.entries(deFiltersObj).forEach(([key, value]) => {
        if (value == 'null' || value == null || key == 'search' || 'de_' + key == 'post_type') return;

        if(key == 'search') {
            url += `${key.replace('search', 's')}=${value}`;
        } else {
            // we use chilren with dec_ instead of passing normal taxonmy
            if(('tag' in deFiltersObj)) {
                url = `${deAjaxFilterPostUrl}`;
            }    

            if(key.startsWith("dec_")) {
                    url += `&${key.replace('dec_', 'de_')}=${value}`;
            } else {
                url += `&${'de_' + key}=${value}`;
            }

        }
    });

    if(el) {
        let keyForRelation = el.querySelector('[data-key]');
        if(keyForRelation) {
            keyForRelation =  keyForRelation.getAttribute('data-key');
        }
        const relation = el.getAttribute('data-relation');
        
        if(!keyForRelation) {
            keyForRelation = el.getAttribute('aria-labelledby');
        }
        if(relation && keyForRelation) deFiltersRel[keyForRelation] = relation;
    }

    if( Object.entries(deFiltersRel).length > 0) url += '&de_filter_rel=';

    const relations = [];
    Object.entries(deFiltersRel).forEach(([key, value]) => {
        relations.push(`${key.replace('acf_', '').replace('mb_', '')}:${value}`);
    });

    url += relations.join(',');

    // if(el) {
    //     const filter = el.closest('.de-ajax-filter');

    //     if(filter && filter.getAttribute('data-combined-relation') && !el.classList.contains('de-ajax-filter-reset')) {
    //         url += `&de_combined_rel=${filter.getAttribute('data-combined-relation')}`;
    //     }
    // }
    deAjaxFilterFetch(url, buttonType);
}


function deDecodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}



let deAjaxFilterTimeout;

deAjaxSearch.forEach(el => {

    const searchInput = el.querySelector('input');
     // Insert the search parameters if there are any setup
    if (deCurrentSearch != '') {
        deFiltersObj.search = deCurrentSearch.get('s');
        searchInput.value = deFiltersObj.search;
    }

    const searchButton = el.querySelector('.de-af-search-icon');

    if(searchButton) {
        searchButton.addEventListener('click', function() {
            searchInput.focus();
        });
    }

    searchInput.addEventListener('input', function() {
        const input = searchInput.value;

        if(input.length > 0) {
            el.classList.add('selected');
        } else {
            el.classList.remove('selected');
        }


        // Clear the previous timeout
        if (deAjaxFilterTimeout) clearTimeout(deAjaxFilterTimeout);

        // Set a new timeout
        deAjaxFilterTimeout = setTimeout(async function() {
           
            deFiltersObj.search = input;
            deConstructUrl(el);

        }, 300);  // The AJAX request will be called 300ms after the user has stopped typing
    });

})

function deManageNumberDropDowns(el, clear = false) {

     // Manage Min Max Numbers
     const isNumberDropdown = el.classList.contains('de-af-number-dropdown');

     if(isNumberDropdown) {
        if(clear && el.classList.contains('de-af-min-dropdown')) {
            const maxValueOptions = el.parentElement.querySelector('.de-af-max-dropdown .de-af-dropdown-box').querySelectorAll('.de-af-otpion');
            maxValueOptions.forEach(maxOption => {
                maxOption.style.display = 'block';
            });
            
            return;
        };

         // manage min input from dropdown
         if(el.classList.contains('de-af-min-dropdown')) {
             const minInputOptions = el.querySelectorAll('.de-af-dropdown-box .de-af-otpion');
             minInputOptions.forEach(option => {
                 option.addEventListener('click', function() {
                     const minValue = Number(option.getAttribute('data-value'));
                     const maxValueOptions = el.parentElement.querySelector('.de-af-max-dropdown .de-af-dropdown-box').querySelectorAll('.de-af-otpion');
 
                 
                    const selectedMinValue = minValue;
                    const selectedMaxValue = Number(el.parentElement.querySelector('.de-af-max-dropdown input').value.replace(/[^0-9]/g, ''));

                    if(selectedMinValue > selectedMaxValue) {
                        const maxInput = el.parentElement.querySelector('.de-af-max-dropdown input');
                        maxInput.value = '';
                        
                        const dataKey = maxInput.getAttribute('data-key');
                        delete deFiltersObj[dataKey];

                    };
 
                     maxValueOptions.forEach(maxOption => {
                         const maxValue = Number(maxOption.getAttribute('data-value'));
                         if(minValue < maxValue) {
                             maxOption.style.display = 'block';
                         } else {
                             maxOption.style.display = 'none';
                         }
                     });
 
                 });
             })
         }
     };
};


deAjaxFilter.forEach(el => {

    deManageNumberDropDowns(el);

    const selectBox = el.querySelector('.de-af-input');

    el.addEventListener('focusout', function (e) {
        setTimeout(function () {
            if (!el.contains(document.activeElement)) {
                el.classList.remove('active');
                el.querySelector('input').setAttribute('aria-expanded', false)
            }
        }, 0);
    });

    function toggleDropdown(el) {
         el.classList.toggle('active');
            if(el.classList.contains('active')) {
                el.querySelector('input').setAttribute('aria-expanded', true);
            } else {
                el.querySelector('input').setAttribute('aria-expanded', false);
        }
    };

    // manage children for the dropdowns inputs

    function checkSelected(dropdown) {
        document.querySelectorAll('.de-af-dropdown[data-child=false]').forEach(dropdown => {

            // parent taxonomy calue
            const tax = dropdown.querySelector('.de-af-input input').getAttribute('data-key');

            // add in here the active options from the dropdown options
            const selected = [];
            dropdown.querySelectorAll('.de-af-otpion').forEach(option => {
                if(option.classList.contains('active')) selected.push(option.getAttribute('data-value'));
            });

            // Check the child options, and enable those to be availbale
            document.querySelectorAll('.de-af-dropdown[data-child=true]').forEach(child => {
                if(child.querySelector(`#${tax}`)) {

                    if(dropdown.classList.contains('selected')) {
                        child.classList.add('de-available');
                        child.querySelectorAll('.de-child-of-parent').forEach(childOption => {
                            const key = childOption.getAttribute('data-parent');

                            if(selected.includes(key)) {
                                childOption.style.display = 'block';
                            } else {
                                childOption.style.display = 'none';
                                childOption.querySelectorAll('.de-af-otpion').forEach(childOption2 => {
                                    childOption2.classList.remove('active')
                                }); 
                            }
                        })
                    } else {
                        child.classList.remove('de-available');
                        child.classList.remove('selected');
                        child.querySelectorAll('.de-af-otpion').forEach(childOption2 => {
                            childOption2.classList.remove('active')
                        }); 
                        child.querySelector('input').value = '';
                    }
                }
            })

        });
    }
    

    // Trigger inout droodown on click, or enter or space keys
    selectBox.addEventListener('click', function () {
        if(el.getAttribute('data-child') == 'true' && !el.classList.contains('de-available')) {
            return;
        } else {
            toggleDropdown(el);
            checkSelected(el);
        }
        return;
    });

    selectBox.addEventListener('keydown', function (event) {
        if(el.getAttribute('data-child') == 'true' && !el.classList.contains('de-available')) {
            return;
        } else {
            // Space & Enter
            if (event.keyCode == 13 || event.keyCode == 32) {
                event.preventDefault();
                 toggleDropdown(el);
                 checkSelected(el);
            }
        }
    });


    // Select the correct options if the URL parametrs exist
    if (deCurrentSearch != '' || destinyAFObj.taxonomy != false) {
        let dataKey = 'de_' + el.querySelector('input').getAttribute('data-key');
        let currentSearch = deCurrentSearch.getAll(dataKey);
        let currentSelectionHTML = '';

        if(destinyAFObj.taxonomy != false) {
            dataKey = 'de_' + destinyAFObj.taxonomy;
            currentSearch = [];
            currentSearch.push(destinyAFObj.taxonomyValue);
        }
        

        currentSearch.forEach(current => {

              // check if currentSearch contains multiple values
            if (current && current.includes(',')) {
                // split currentSearch into an array
                let currentSearchArray = current.split(',');


                currentSearchArray.forEach(searchItem => {
                    let currentSelection;
                    if (searchItem) {
                        currentSelection = el.querySelector(`[data-value='${searchItem.replace('de_', '')}']`);
                        if (currentSelection) {
                            el.classList.add('selected');
                            el.classList.add('de-available');
                            currentSelection.classList.add('active');
                            currentSelectionHTML += currentSelection.querySelector('.de-af-text').innerHTML + ', ';
                        }
                    }
                });

                deFiltersObj[dataKey.replace('de_', '')] = current;
            } else {
                let currentSelection;
                if (current) {
                    currentSelection = el.querySelector(`[data-value='${current.replace('de_', '')}']`);
                    if (currentSelection) {
                        el.classList.add('selected')
                        el.classList.add('de-available');
                        currentSelection.classList.add('active');
                        currentSelectionHTML = currentSelection.querySelector('.de-af-text').innerHTML;
                        deFiltersObj[dataKey.replace('de_', '')] = current;
                    }
                }
            }

        })

        checkSelected(el);
    
        // Remove trailing comma and space, then set as innerHTML
        if(currentSelectionHTML != '') el.querySelector('input').value = deDecodeHtml(currentSelectionHTML.replace(/, $/, ''));
    }
    

    el.querySelectorAll('.de-af-otpion').forEach(option => {


        option.addEventListener('keydown', function (event) {
            if (event.keyCode == 13 || event.keyCode == 32) {
                event.preventDefault();
                deAjaxFilterDropDownFun(el, option);
                checkSelected(el);
            };
        });

        option.addEventListener('click', function () {
            deAjaxFilterDropDownFun(el, option);
            checkSelected(el);
        });
    });


});


// manage the options for the multiple checkboxes in the dropdown
function deAjaxFilterDropDownFun(el,option) {


    let dataKey = el.querySelector('input').getAttribute('data-key');

    // if(el.getAttribute('data-child') && el.getAttribute('data-child') == 'true' || option.classList.contains('de-child')) {
    //     dataKey = 'dec_' + el.querySelector('input').getAttribute('data-key');
    // }

    const dataValue = option.getAttribute('data-value');

    const deDropbodownCheckboxes = el.querySelector('.de-af-dropdown-box').classList.contains('has-checkboxes');

    if (dataValue == 'null') return;

    if (deDropbodownCheckboxes) {
        option.classList.toggle('active');
    } else {
        el.classList.remove('active');
    }

    if (dataValue == 'de-all') {
        delete deFiltersObj[dataKey];
        delete deFiltersRel[dataKey];
        el.querySelectorAll('.de-af-otpion').forEach(check => {
            check.classList.remove('active');
        });
        el.querySelector('input').value = '';
        el.classList.remove('selected');
        el.classList.remove('active');
    } else {
        // Push taxonomiy values into an object that are selected
        if (deDropbodownCheckboxes) {
            let keySlugs = [];
            let keyLabels = [];
            el.querySelectorAll('.de-af-otpion').forEach(check => {
                if (check.classList.contains('active')) {
                    keySlugs.push(check.getAttribute('data-value'));
                    keyLabels.push(check.querySelector('.de-af-text').innerHTML);
                }
            });
            if (keySlugs.length == 0) {
                el.querySelector('input').value = '';
                el.classList.remove('selected');
                if(el.getAttribute('data-child') && el.getAttribute('data-child') == 'true') {
                    dataKey = 'dec_' + el.querySelector('input').getAttribute('data-key');
                    delete deFiltersObj[dataKey];
                    delete deFiltersRel[dataKey];
                } else {
                    delete deFiltersObj[dataKey];
                    delete deFiltersRel[dataKey];
                }
            } else {
                el.querySelector('input').value = deDecodeHtml(keyLabels.join(', '));
                el.classList.add('selected');
                deFiltersObj[dataKey] = keySlugs.join(',');
            }
        } else {
            el.classList.add('selected');
            deFiltersObj[dataKey] = dataValue;
            el.querySelector('input').value = deDecodeHtml(option.querySelector('.de-af-text').innerHTML);
            el.querySelectorAll('.de-af-otpion').forEach(option => option.classList.remove('active'));
            option.classList.add('active');
        }
    }

    deConstructUrl(el);
   
};

async function deAjaxFilterFetch(url, searchButton = false) {

    if(destinyAFObj.redirectIsEnabled && !destinyAFObj.redirectSearchButton) {
        window.location = url;
        return;
    };

    if(destinyAFObj.redirectIsEnabled && searchButton == 'search') {
        window.location = url;
        return;
    }

    if(destinyAFObj.redirectIsEnabled) {
        return;
    }

    let posts;
    if(document.querySelector('.destiny-filtered-posts')) {
        posts = document.querySelector('.destiny-filtered-posts')
    } else if (document.querySelector('.bde-wooproductslist')) {
        posts = document.querySelector('.bde-wooproductslist');
        postType = 'woo-list';
    } else if (document.querySelector('.bde-post-list')) {
        posts = document.querySelector('.bde-post-list')
        postType = 'post-list';
    } else if (document.querySelector('.bde-post-loop')) {
        posts = document.querySelector('.bde-post-loop')
        postType = 'post-loop';
    } else if (document.querySelector('.bde-wooshoppage')) {
        posts = document.querySelector('.bde-wooshoppage')
        postType = 'woo-loop';
    } 

    if(!posts) {
        console.error('No Posts Query found on the page.')
        return;
    };

    posts.classList.add('de-loading-filtered-posts');
    history.pushState({}, '', url);

    const response = await fetch(url);
    const newContent = await response.text();

    // Parse the HTML string into a document
    const parser = new DOMParser();
    const newDocument = parser.parseFromString(newContent, 'text/html');


    // Extract only the part of interest
    let newPosts;

    if(newDocument.querySelector('.destiny-filtered-posts')) {
        newPosts = newDocument.querySelector('.destiny-filtered-posts')
    } else if (newDocument.querySelector('.bde-wooproductslist')) {
        newPosts  = newDocument.querySelector('.bde-wooproductslist');
    } else if (newDocument.querySelector('.bde-post-list')) {
        newPosts  = newDocument.querySelector('.bde-post-list')
    } else if (newDocument.querySelector('.bde-post-loop')) {
        newPosts  = newDocument.querySelector('.bde-post-loop')
    } else if (newDocument.querySelector('.bde-wooshoppage')) {
        newPosts =  newDocument.querySelector('.bde-wooshoppage')
    } 

    if (newPosts) {
        posts.innerHTML = newPosts.innerHTML;
        posts.classList.remove('de-loading-filtered-posts');

        // Add support for MoreConvert wishlist

        const htmlChangeEvent = new CustomEvent('deContentLoaded', { bubbles: true });
        posts.dispatchEvent(htmlChangeEvent);

    } else {
        console.error('Could not find filtered posts');
    }
};


function deRemovePageFromUrl(url) {
    const parts = url.split('/');
    
    if (parts.indexOf('page') !== -1) {
        parts.splice(parts.indexOf('page'), 2);
    }
    return parts.join('/');
}

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        deAjaxFilter.forEach(dropdown => {
            dropdown.classList.remove('active');
            dropdown.querySelector('input').setAttribute('aria-expanded', false);
        });
    }
});

/**
 * Clear Button Inside Input
 */

document.querySelectorAll('.de-af-clear-icon').forEach(el => {

    el.addEventListener('click', function (event) {
        event.preventDefault();
        
        const parent = el.parentNode.parentNode;
        parent.classList.remove('selected');
        parent.querySelector('input').value = "";
        parent.querySelector('input').setAttribute('aria-expanded', false)
        parent.querySelectorAll('.de-af-otpion').forEach(check => {
            check.classList.remove('active');
        });

        let dataKey = parent.querySelector('input').getAttribute('data-key');

        deManageNumberDropDowns(parent, true);


        if(parent.getAttribute('data-child') && parent.getAttribute('data-child') == 'true') {
            dataKey = 'dec_' + parent.querySelector('input').getAttribute('data-key');
            delete deFiltersObj[dataKey];
            delete deFiltersRel[dataKey];
        } else {
             delete deFiltersObj[dataKey];
             delete deFiltersRel[dataKey];
        }


        // Removed values from Chilren
        document.querySelectorAll('.de-af-selection-wrapper[data-child=true]').forEach(child => {
            const childKey = child.querySelector('input').getAttribute('data-key');
            if(childKey === dataKey) {
                 delete deFiltersObj['dec_' + child.querySelector('input').getAttribute('data-key')];
                 delete deFiltersRel['dec_' + child.querySelector('input').getAttribute('data-key')];
                 child.querySelector('input').value = '';
            }
        });

        deConstructUrl(el);

    });
});

/**
 * Date Picker
 */

function deAFDatePicker(type) {

    if (deCurrentSearch != '') {
        deFiltersObj.start_date = deCurrentSearch.get('de_start_date');
        deFiltersObj.end_date = deCurrentSearch.get('de_end_date');
    }
    
    document.querySelectorAll('.de-af-date input').forEach(datePicker => {
        const dateID = datePicker.id;
        const minDate = datePicker.dataset.minDate;
        const maxDate = datePicker.dataset.maxDate;
        const dateFormat = datePicker.dataset.dateFormat;
        const rangeSeparator = datePicker.dataset.rangeSeperator;

        const defaultDate = (deFiltersObj.start_date && deFiltersObj.end_date) 
                        ? deFiltersObj.start_date + (rangeSeparator ? rangeSeparator : ' to ') + deFiltersObj.end_date 
                        : "2016-10-10 to 2016-10-20";

        if (dateID) {  // Check if dateID is truthy
            const fpInstance = flatpickr('#' + dateID, {
                mode: "range",
                minDate: minDate,
                maxDate: maxDate,
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: dateFormat,
                defaultDate: defaultDate,
                locale: {rangeSeparator: rangeSeparator ? rangeSeparator : ' to '},
                onChange: function(selectedDates, dateStr, instance) {
                    if(selectedDates.length == 2) {
                        const offset = selectedDates[0].getTimezoneOffset()
                        const startDate = new Date(selectedDates[0].getTime() - (offset * 60 * 1000)).toISOString().split('T')[0];
                        const endDate = new Date(selectedDates[1].getTime() - (offset * 60 * 1000)).toISOString().split('T')[0];

                        deFiltersObj.start_date = startDate;
                        deFiltersObj.end_date = endDate;

                        deConstructUrl(datePicker);

                        datePicker.parentElement.classList.add('selected');
                        
                    };
                },
            });

            if(type == 'reset') {
                fpInstance.clear();
                datePicker.parentElement.classList.remove('selected');
            }
        }
    });
}

deAFDatePicker();

deAjaxReset.forEach(el => {

    el.addEventListener('click', async function () {
        
        // remove all cheboxes if there are any
        document.querySelectorAll('.de-af-otpion').forEach(check => {
            check.classList.remove('active');
        });   

        document.querySelectorAll('.de-af-radio').forEach(radio => {
            if(radio.getAttribute('data-value') && radio.getAttribute('data-value') == 'de-all') {
                radio.classList.add('active');
                radio.setAttribute('aria-checked', true);
            } else {
                radio.classList.remove('active');
                radio.setAttribute('aria-checked', false);
            }
        });   

        document.querySelectorAll('.de-af-checkbox-option').forEach(radio => {
            if(radio.getAttribute('data-value') && radio.getAttribute('data-value') == 'de-all') {
                radio.classList.add('active');
                radio.setAttribute('aria-checked', true);
            } else {
                radio.classList.remove('active');
                radio.setAttribute('aria-checked', false);
            }
        });  

        document.querySelectorAll('.de-af-button-option').forEach(radio => {
            if(radio.getAttribute('data-value') && radio.getAttribute('data-value') == 'de-all') {
                radio.classList.add('active');
                radio.setAttribute('aria-checked', true);
            } else {
                radio.classList.remove('active');
                radio.setAttribute('aria-checked', false);
            }
        }); 

        //reset price
        document.querySelectorAll('.de-af-price').forEach(price => {
            const minInput = price.querySelector('.de-range-min');
            const maxInput = price.querySelector('.de-range-max');
            minInput.value = minInput.getAttribute('min');
            maxInput.value = maxInput.getAttribute('max');

            const minPrice = price.querySelector('.de-price-min .de-price-number')
            const maxPrice = price.querySelector('.de-price-max .de-price-number')
            minPrice.innerHTML = deAjaxFormatNumber(minInput.getAttribute('min'), price);
            maxPrice.innerHTML =    deAjaxFormatNumber(maxInput.getAttribute('max'), price);

            const range = price.querySelector(".de-slider .de-progress");
            range.style.left = "0%";
            range.style.right = "0%";
        });

        // Clear Date
        deAFDatePicker('reset');

        Object.entries(deFiltersObj).forEach(([key, value]) => {
            delete deFiltersObj[key];
        });

        Object.entries(deFiltersRel).forEach(([key, value]) => {
            delete deFiltersRel[key];
        });

        deAjaxFilter.forEach(dropdown => {
            dropdown.querySelector('input').value = "";
            dropdown.querySelector('input').setAttribute('aria-expanded', false);
            dropdown.classList.remove('selected');
            dropdown.classList.remove('active');
        });

        deAfRadioInputs.forEach(radio => {
            radio.classList.remove('active');
            radio.classList.remove('selected');
        });


        deAjaxSearch.forEach(search => {
            search.querySelector('input').value = '';
        });
       
        deConstructUrl(el);

    });
})

deAjaxSearchButton.forEach(el => {
    el.addEventListener('click', function() {
        deConstructUrl(el);
    });
});

/**
 * Radio Buttons
 */

deAfRadioInputs.forEach(el => {

    const radioButtons = el.querySelectorAll('.de-af-radio');
    const key = el.getAttribute('aria-labelledby');
    const deAll = el.querySelector('[data-value=de-all]');


    // Select the correct options if the URL parametrs exist
    if (deCurrentSearch != '' || destinyAFObj.taxonomy != false) {
        let dataKey = 'de_' + el.getAttribute('aria-labelledby');
        let currentSearch = deCurrentSearch.get(dataKey);
        let currentSelectionHTML = '';

        if(destinyAFObj.taxonomy != false) {
            dataKey = 'de_' + destinyAFObj.taxonomy;
            currentSearch =  destinyAFObj.taxonomyValue;
        }
    
        // check if currentSearch contains multiple values
        if (currentSearch && currentSearch.includes(',')) {
            if(deAll) {
                deAll.classList.remove('active');
                deAll.setAttribute('aria-checked', false)
            }
            // split currentSearch into an array
            let currentSearchArray = currentSearch.split(',');
    
            currentSearchArray.forEach(searchItem => {
                let currentSelection;
                if (searchItem) {
                    currentSelection = el.querySelector(`[data-value='${searchItem.replace('de_', '')}']`);
                    if (currentSelection) {
                        el.classList.add('selected')
                        currentSelection.classList.add('active');
                        currentSelection.setAttribute('aria-checked', true)
                    }
                }
            });

            deFiltersObj[dataKey.replace('de_', '')] = currentSearch;
        } else {
            let currentSelection;
            if (currentSearch) {
                if(deAll) {
                    deAll.classList.remove('active');
                    deAll.setAttribute('aria-checked', false)
                }
                currentSelection = el.querySelector(`[data-value='${currentSearch.replace('de_', '')}']`);
                if (currentSelection) {
                    el.classList.add('selected')
                    currentSelection.classList.add('active');
                    currentSelection.setAttribute('aria-checked', true)
                    deFiltersObj[dataKey.replace('de_', '')] = currentSearch;
                }
            }
        }
    }

    radioButtons.forEach(radio => {
        radio.addEventListener('click', function() {
            radioButtons.forEach(radioBtn => {
                radioBtn.classList.remove('active')
                radioBtn.setAttribute('aria-checked', false);
            });
            this.classList.add('active');
            this.setAttribute('aria-checked', true);
            deAjaxFilterPassElementData(el, this);
        });

        radio.addEventListener('keydown', function(event) {
            if(event.key == ' ' || event.key == 'Enter') {
                event.preventDefault();
                radioButtons.forEach(radioBtn => {
                    radioBtn.classList.remove('active')
                    radioBtn.setAttribute('aria-checked', false);
                });
                this.classList.add('active');
                this.setAttribute('aria-checked', true);
                deAjaxFilterPassElementData(el, this);
            }
        });
    });
});

/**
 * 
 * CheckBox Inputs
 */

deAFChekboxInputs.forEach(el => {

    const checkButtons = el.querySelectorAll('.de-af-checkbox-option');
    const dataAll = el.querySelector('[data-value=de-all]')
    const deAll = el.querySelector('[data-value=de-all]');

    // Select the correct options if the URL parametrs exist
    if (deCurrentSearch != '' || destinyAFObj.taxonomy != false) {
        let dataKey = 'de_' + el.getAttribute('aria-labelledby');
        let currentSearch = deCurrentSearch.get(dataKey);

        if(destinyAFObj.taxonomy != false) {
            dataKey = 'de_' + destinyAFObj.taxonomy;
            currentSearch =  destinyAFObj.taxonomyValue;
        }
    
        // check if currentSearch contains multiple values
        if (currentSearch && currentSearch.includes(',')) {
            if(deAll) {
                deAll.classList.remove('active');
                deAll.setAttribute('aria-checked', false)
            }
            // split currentSearch into an array
            let currentSearchArray = currentSearch.split(',');
    
            currentSearchArray.forEach(searchItem => {
                let currentSelection;
                if (searchItem) {
                    currentSelection = el.querySelector(`[data-value='${searchItem.replace('de_', '')}']`);
                    if (currentSelection) {
                        el.classList.add('selected')
                        currentSelection.classList.add('active');
                        currentSelection.setAttribute('aria-checked', true);
                    }
                }
            });

            deFiltersObj[dataKey.replace('de_', '')] = currentSearch;
        } else {
            let currentSelection;
            if (currentSearch) {
                if(deAll) {
                    deAll.classList.remove('active');
                    deAll.setAttribute('aria-checked', false)
                }
                currentSelection = el.querySelector(`[data-value='${currentSearch.replace('de_', '')}']`);
                if (currentSelection) {
                    el.classList.add('selected')
                    currentSelection.classList.add('active');
                    currentSelection.setAttribute('aria-checked', true)
                    deFiltersObj[dataKey.replace('de_', '')] = currentSearch;
                }
            }
        }
    }

    checkButtons.forEach(check => {
        check.addEventListener('click', function() {
            this.classList.toggle('active');
            if(dataAll) {
                if(this.getAttribute('data-value') == 'de-all') {
                    dataAll.classList.add('active');
                    dataAll.setAttribute('aria-checked', true);
                } else {
                    dataAll.classList.remove('active');
                    dataAll.setAttribute('aria-checked', false);
                }
            }
            if(this.classList.contains('active')) {
                this.setAttribute('aria-checked', true);
            } else {
                this.setAttribute('aria-checked', true);
            }
            deAjaxFilterPassElementData(el, this);
        });

        check.addEventListener('keydown', function(event) {
            if(event.key == ' ' || event.key == 'Enter') {
                event.preventDefault();
                this.classList.toggle('active');
                if(dataAll) {
                    if(this.getAttribute('data-value') == 'de-all') {
                        dataAll.classList.add('active');
                        dataAll.setAttribute('aria-checked', true);
                    } else {
                        dataAll.classList.remove('active');
                        dataAll.setAttribute('aria-checked', false);
                    }
                }
                if(this.classList.contains('active')) {
                    this.setAttribute('aria-checked', true);
                } else {
                    this.setAttribute('aria-checked', true);
                }
                deAjaxFilterPassElementData(el, this);
            }
        });
    });
});

/**
 * 
 * Button Input
 */

deAFButtonsInputs.forEach(el => {

    const checkButtons = el.querySelectorAll('.de-af-button-option');
    const dataAll = el.querySelector('[data-value=de-all]')
    const deAll = el.querySelector('[data-value=de-all]');

    // Select the correct options if the URL parametrs exist
    if (deCurrentSearch != '' || destinyAFObj.taxonomy != false) {
        let dataKey = 'de_' + el.getAttribute('aria-labelledby');
        let currentSearch = deCurrentSearch.get(dataKey);
        let currentSelectionHTML = '';

        if(destinyAFObj.taxonomy != false) {
            dataKey = 'de_' + destinyAFObj.taxonomy;
            currentSearch =  destinyAFObj.taxonomyValue;
        }
    
        // check if currentSearch contains multiple values
        if (currentSearch && currentSearch.includes(',')) {
            if(deAll) {
                deAll.classList.remove('active');
                deAll.setAttribute('aria-checked', false)
            }
            // split currentSearch into an array
            let currentSearchArray = currentSearch.split(',');
    
            currentSearchArray.forEach(searchItem => {
                let currentSelection;
                if (searchItem) {
                    currentSelection = el.querySelector(`[data-value='${searchItem.replace('de_', '')}']`);
                    if (currentSelection) {
                        el.classList.add('selected')
                        currentSelection.classList.add('active');
                        currentSelection.setAttribute('aria-checked', true);
                    }
                }
            });

            deFiltersObj[dataKey.replace('de_', '')] = currentSearch;
        } else {
            let currentSelection;
            if (currentSearch) {
                if(deAll) {
                    deAll.classList.remove('active');
                    deAll.setAttribute('aria-checked', false)
                }
                currentSelection = el.querySelector(`[data-value='${currentSearch.replace('de_', '')}']`);
                if (currentSelection) {
                    el.classList.add('selected')
                    currentSelection.classList.add('active');
                    currentSelection.setAttribute('aria-checked', true)
                    deFiltersObj[dataKey.replace('de_', '')] = currentSearch;
                }
            }
        }
    }

    checkButtons.forEach(check => {
        check.addEventListener('click', function() {
            let singleSelection = false;
            if(this.closest('.de-af-input-button-layout') && this.closest('.de-af-input-button-layout').getAttribute('data-single-select') == 'true') {
                singleSelection = true;
            }

            if(!singleSelection) this.classList.toggle('active');

            if(dataAll) {
                if(this.getAttribute('data-value') == 'de-all') {
                    dataAll.classList.add('active');
                    dataAll.setAttribute('aria-checked', true);
                } else {
                    dataAll.classList.remove('active');
                    dataAll.setAttribute('aria-checked', false);
                }
            } else {
                if(singleSelection) {
                    console.log(this.closest('.de-af-input-button-layout').querySelectorAll('.de-af-button-option'));
                    this.closest('.de-af-input-button-layout').querySelectorAll('.de-af-button-option').forEach(button => {
                        button.classList.remove('active')
                        button.setAttribute('aria-checked', false);
                    });

                    this.classList.add('active');
                    this.setAttribute('aria-checked', true);
                } else {
                    if(this.classList.contains('active')) {
                        this.setAttribute('aria-checked', true);
                    } else {
                        this.setAttribute('aria-checked', true);
                    }
                }
            }
            deAjaxFilterPassElementData(el, this);
        });

        check.addEventListener('keydown', function(event) {
            if(event.key == ' ' || event.key == 'Enter') {
                event.preventDefault();

                let singleSelection = false;
                if(this.closest('.de-af-input-button-layout') && this.closest('.de-af-input-button-layout').getAttribute('data-single-select') == 'true') {
                    singleSelection = true;
                }

                if(!singleSelection) this.classList.toggle('active');
                
                if(this.getAttribute('data-value') == 'de-all') {
                    dataAll.classList.add('active');
                    dataAll.setAttribute('aria-checked', true);
                } else {

                    if(singleSelection) {
                        this.closest('.de-af-input-button-layout').querySelectorAll('.de-af-button-option').forEach(button => {
                            button.classList.remove('active')
                            button.setAttribute('aria-checked', false);
                        });
                        
                        this.classList.add('active');
                        this.setAttribute('aria-checked', true);
                    } else {
                        dataAll.classList.remove('active');
                        dataAll.setAttribute('aria-checked', false);
                    }
                }


                if(this.classList.contains('active')) {
                    this.setAttribute('aria-checked', true);
                } else {
                    this.setAttribute('aria-checked', false);
                }
                deAjaxFilterPassElementData(el, this);
            }
        });
    });
});

function deAjaxFilterPassElementData(el, option) {
    const dataKey = el.getAttribute('aria-labelledby');;
    const dataValue = option.getAttribute('data-value');
    const checkboxes = el.classList.contains('de-af-input-checkboxes');
    const buttons = el.classList.contains('de-af-input-button-layout');

    let checkSelector = '.de-af-radio';

    if(checkboxes) {
        checkSelector = '.de-af-checkbox-option';
    }

    if(buttons) {
        checkSelector = '.de-af-button-option';
    }


    if (dataValue == 'null') return;

    if (dataValue == 'de-all') {
        delete deFiltersObj[dataKey];
        delete deFiltersRel[dataKey];
        el.querySelectorAll(checkSelector).forEach(check => {
            check.classList.remove('active');
        });
        option.classList.add('active');
        el.classList.remove('selected');
        el.classList.remove('active');
    } else {
        // Push taxonomies into an object that are selected
        if (checkboxes || buttons) {
            let keySlugs = [];
            let keyLabels = [];
            el.querySelectorAll(checkSelector).forEach(check => {
                if (check.classList.contains('active')) {
                    keySlugs.push(check.getAttribute('data-value'));
                    keyLabels.push(check.querySelector('.de-af-text').innerHTML);
                }
            });
            if (keySlugs.length == 0) {
                el.classList.remove('selected');
                if(el.querySelector('[data-value=de-all]')) {
                    el.querySelector('[data-value=de-all]').classList.add('active');
                    el.querySelector('[data-value=de-all]').setAttribute('aria-checked', true);
                }
            } else {
                el.classList.add('selected');
                if(el.querySelector('[data-value=de-all]')) {
                    el.querySelector('[data-value=de-all]').classList.remove('active');
                    el.querySelector('[data-value=de-all]').setAttribute('aria-checked', false);
                }
            }
            deFiltersObj[dataKey] = keySlugs.join(',');
        } else {
            el.classList.add('selected');
            deFiltersObj[dataKey] = dataValue;
        }
    }


    deConstructUrl(el);
}

/**
 * Range Slider for Price
 */
 
const deAFPriceFilter = document.querySelectorAll('.de-af-price');
let dePriceGap = 10;

function deAjaxFormatNumber(
    number, 
    filter, 
) {

    let decimals = 0;
    let decimalSeparator = '';
    let thousandsSeparator = '';
    if(filter.getAttribute('data-decimals') && filter.getAttribute('data-decimals') !== '') {
        decimals = filter.getAttribute('data-decimals');
    };

    if(filter.getAttribute('data-decimal-sep') && filter.getAttribute('data-decimal-sep') !== '') {
        decimalSeparator = filter.getAttribute('data-decimal-sep');
    };

    if(filter.getAttribute('data-thousand') && filter.getAttribute('data-thousand') !== '') {
        thousandsSeparator = filter.getAttribute('data-thousand');
    };


    // First, format the number with the desired separators
    let formattedNumber = new Intl.NumberFormat('custom', {
        style: 'decimal',
        minimumFractionDigits: decimals,
        maximumFractionDigits: decimals,
        useGrouping: true,
        numberingSystem: 'latn',
        currencyDisplay: 'symbol',
        currency: 'USD',
    })
    .format(number)
    .replace(",", "temporary")
    .replace(".", decimalSeparator)
    .replace("temporary", thousandsSeparator);

    // Next, prepend using the filter's data-prepend attribute, if it exists
    if (filter.getAttribute('data-prepend') && filter.getAttribute('data-prepend') !== '') {
        formattedNumber = filter.getAttribute('data-prepend') + formattedNumber;
    }

    if (filter.getAttribute('data-append') && filter.getAttribute('data-append') !== '') {
        formattedNumber = formattedNumber + filter.getAttribute('data-append') ;
    }

    return formattedNumber;
}

deAFPriceFilter.forEach(filter => {
    const rangeInput = filter.querySelectorAll(".de-range-input input")
    const range = filter.querySelector(".de-slider .de-progress");

    const minPriceText = filter.querySelector('.de-price-min .de-price-number');
    const maxPriceText = filter.querySelector('.de-price-max .de-price-number');

    // Insert the search parameters if there are any setup
    if (deCurrentSearch != '') {

        if(deCurrentSearch.get('de_min_price') && deCurrentSearch.get('de_max_price')) {
            deFiltersObj.min_price = deCurrentSearch.get('de_min_price');
            deFiltersObj.max_price = deCurrentSearch.get('de_max_price');

            minPriceText.innerHTML = deAjaxFormatNumber(deFiltersObj.min_price, filter);
            maxPriceText.innerHTML = deAjaxFormatNumber(deFiltersObj.max_price, filter);

            const rangeMinValue = parseInt(deFiltersObj.min_price);
            const rangeMaxValue = parseInt(deFiltersObj.max_price);

            filter.querySelector('.de-range-min').value = rangeMinValue;
            filter.querySelector('.de-range-max').value = rangeMaxValue;

            range.style.left = ((parseInt(filter.querySelector('.de-range-min').value) - parseInt(filter.querySelector('.de-range-min').min)) / (parseInt(filter.querySelector('.de-range-min').max) - parseInt(filter.querySelector('.de-range-min').min))) * 100 + "%";
            range.style.right = 100 - ((parseInt(filter.querySelector('.de-range-max').value) - parseInt(filter.querySelector('.de-range-max').min)) / (parseInt(filter.querySelector('.de-range-max').max) - parseInt(filter.querySelector('.de-range-max').min))) * 100 + "%";

        }

        if(filter.getAttribute('data-min-key')) {
            const dataKey = filter.getAttribute('data-min-key');

            deFiltersObj[dataKey] = deCurrentSearch.get('de_' + dataKey);


            if(!deFiltersObj[dataKey]) {
                // range.style.left = '100%';
            } else {
                minPriceText.innerHTML = deAjaxFormatNumber(deFiltersObj[dataKey], filter);
                const rangeMinValue = parseInt(deFiltersObj[dataKey]);
                filter.querySelector('.de-range-min').value = rangeMinValue;
                range.style.left = ((parseInt(deFiltersObj[dataKey]) - parseInt(filter.querySelector('.de-range-min').min)) / (parseInt(filter.querySelector('.de-range-min').max) - parseInt(filter.querySelector('.de-range-min').min))) * 100 + "%";
            }

        }
        

        if(filter.getAttribute('data-max-key')) {
            const dataKey = filter.getAttribute('data-max-key');

            deFiltersObj[dataKey] = deCurrentSearch.get('de_' + dataKey);

            if(!deFiltersObj[dataKey]) {
                // range.style.right = '100%';
            } else {
                maxPriceText.innerHTML = deAjaxFormatNumber(deFiltersObj[dataKey], filter);
                const rangeMaxValue = parseInt(deFiltersObj[dataKey]);
                filter.querySelector('.de-range-max').value = rangeMaxValue;
                range.style.right = 100 - ((parseInt(deFiltersObj[dataKey]) - parseInt(filter.querySelector('.de-range-max').min)) / (parseInt(filter.querySelector('.de-range-max').max) - parseInt(filter.querySelector('.de-range-max').min))) * 100 + "%";
            }

        }

    }

    rangeInput.forEach((input) => {
        input.addEventListener("input", (e) => {
          let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);

            // z-index changes
            if(minVal > rangeInput[0].max * 0.5){
                rangeInput[0].style.zIndex = 1;
                rangeInput[1].style.zIndex = 0;
            } 
            if(maxVal < rangeInput[1].max * 0.5){
                rangeInput[1].style.zIndex = 1;
                rangeInput[0].style.zIndex = 0;
            }
            
          if (maxVal - minVal < dePriceGap) {
            if (e.target.className === "de-range-min") {
              rangeInput[0].value = maxVal - dePriceGap;
            } else {
              rangeInput[1].value = minVal + dePriceGap;
            }
          } else {
            minPriceText.innerHTML = deAjaxFormatNumber(minVal, filter);
            maxPriceText.innerHTML = deAjaxFormatNumber(maxVal, filter)
            // Update filters
            deUpdateFilters(minVal, maxVal, filter);
          }

            range.style.left = ((minVal - rangeInput[0].min) / (rangeInput[0].max - rangeInput[0].min)) * 100 + "%";
            range.style.right = 100 - ((maxVal - rangeInput[1].min) / (rangeInput[1].max - rangeInput[1].min)) * 100 + "%";
    
        });
      });
    


});


function deUpdateFilters(minPrice, maxPrice, filter) {
    // Clear the previous timeout
    if (deAjaxFilterTimeout) clearTimeout(deAjaxFilterTimeout);

    // Set a new timeout
    deAjaxFilterTimeout = setTimeout(async function() {

        if((filter.getAttribute('data-min-key') && filter.getAttribute('data-min-key') !== '') && (filter.getAttribute('data-max-key') && filter.getAttribute('data-max-key') !== '')) {
            deFiltersObj[filter.getAttribute('data-min-key')] = minPrice;
            deFiltersObj[filter.getAttribute('data-max-key')] = maxPrice;
        } else {
            // Push taxonomies into an object that are selected for WooCommerce
            deFiltersObj.min_price = minPrice;
            deFiltersObj.max_price = maxPrice;
        }

       deConstructUrl();

    }, 300);
}


