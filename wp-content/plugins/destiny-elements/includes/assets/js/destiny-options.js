document.addEventListener("DOMContentLoaded", function () {

    // Utility function to format data for POST
    function formatData(data) {
        return Object.keys(data).map(key => `${key}=${encodeURIComponent(data[key])}`).join('&');
    }

    // Utility function to send a POST request
    async function sendPost(action, data) {
        const response = await fetch(deScript.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: formatData({ action, ...data })
        });
        return await response.text();
    }

    function setSelectState(){
        if(!preloaderCheckbox) return;
        if (preloaderCheckbox.checked) {
            globalBlockSelect.style.display = 'block';
        } else {
            globalBlockSelect.style.display = 'none';
        }
    }

    async function loadSelect() {
        // get current preloader
        const currentPreloaderResponse = await sendPost('destiny_get_current_preloader');
        const currentPreloader = JSON.parse(currentPreloaderResponse);

        const response = await sendPost('destiny_get_global_blocks');
        const posts = JSON.parse(response);
        if (posts && posts.length !== 0) {
            const select = document.createElement('select');
            select.id = "post-select";

            // add default option
            const defaultOption = document.createElement('option');
            defaultOption.value = 0;
            defaultOption.text = "Select preloader";
            select.appendChild(defaultOption);

            posts.forEach((post) => {
                const option = document.createElement('option');
                option.value = post.ID;
                option.text = post.post_title;
                // set the current preloader as selected
                if (currentPreloader && currentPreloader.id == post.ID) {
                    option.selected = true;
                }
                select.appendChild(option);
            });

            select.addEventListener('change', function () {
                document.getElementById('destiny_preloader_id').value = this.value;
                // sendPost('destiny_update_preloader_id', { blockId: this.value });
            });

            if(!globalBlockSelect) return;
            globalBlockSelect.innerHTML = '<p>Choose a Breakdance Global Block: </p>';
            globalBlockSelect.appendChild(select);
        } else {
            if(!globalBlockSelect) return;
            globalBlockSelect.innerHTML = '<p>No Breakdance Global Blocks found. Create preloader <a href="' + deScript.baseurl + '/wp-admin/admin.php?page=breakdance_block' + '">here</a>.</p>';
        }

    }

    const preloaderCheckbox = document.getElementById('destiny_preloader_enabled');
    const globalBlockSelect = document.getElementById('global-block-select');
    setSelectState()
    loadSelect()
    // Load the select if the checkbox is checked
    if (preloaderCheckbox && preloaderCheckbox.checked) loadSelect();

        if(preloaderCheckbox) {
        preloaderCheckbox.addEventListener('change', async function () {
            setSelectState()
        });

    }

});
