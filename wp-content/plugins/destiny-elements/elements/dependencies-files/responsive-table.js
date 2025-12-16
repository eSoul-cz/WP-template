function deResponsiveTable() {
    const deAdvancedTabless = document.querySelectorAll('.de-advanced-table');

    deAdvancedTabless.forEach(table => {
        const storeTable = table.innerHTML;
        const storeCols = table.getAttribute('aria-colcount');
        const storeRows = table.getAttribute('aria-rowcount');
        const parentNode = table.parentNode;
        const tableSize = Number(table.getAttribute('data-breakpoint'));
        const tableID = Number(table.getAttribute('table-id'));
        let isAccordion = false;

        const resizeHandler = function () {
            const currentWidth = window.innerWidth;

            if (!isAccordion && currentWidth <= tableSize) {
                isAccordion = true;
                table.classList.add('accordion');
                table.removeAttribute('role');
                table.removeAttribute('aria-colcount');
                table.removeAttribute('aria-rowcount');
                // create temporary div element to store the original HTML
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = storeTable;
      
                const colHeaders = tempDiv.querySelectorAll('.de-col-header');
                const rowHeaders = tempDiv.querySelectorAll('.de-row-header');
                const cells = tempDiv.querySelectorAll('.de-cell');
      
                // create add panel div
                let accPanel = document.createElement('div');
                accPanel.classList.add('de-table-acc-panel');
                // accPanel.setAttribute('aria-labelledby', );
      
                // create accordion row header panel
                let accRowHeaders = document.createElement('div');
                accRowHeaders.classList.add('de-table-acc-row-headers');
                rowHeaders.forEach(header => accRowHeaders.appendChild(header));
      
                // create accordion cell panel
                let accCellsPanel = document.createElement('div');
                accCellsPanel.classList.add('de-table-acc-cells');

      
                table.innerHTML = '';
                // add all headers to the element
                colHeaders.forEach((header, index) => {
                    if (!header.classList.contains('hidden')) {
                        table.appendChild(header);
                        accPanel.setAttribute('aria-controls', tableID + '-' + index);

                        let clonedAccRowHeaders;
                        if (rowHeaders) {
                            clonedAccRowHeaders = accRowHeaders.cloneNode(true);
                        };
                        const clonedAccPanel = accPanel.cloneNode(true);
                        const clonedAccCellPanel = accCellsPanel.cloneNode(true);
    
                        header.insertAdjacentElement('afterend', clonedAccPanel);
                        if (rowHeaders) {
                            clonedAccPanel.appendChild(clonedAccRowHeaders);
                        }
                        clonedAccPanel.appendChild(clonedAccCellPanel);
          
                        cells.forEach(cell => {
                            if (header.getAttribute('aria-colindex') == cell.getAttribute('aria-colindex')) {
                                clonedAccCellPanel.appendChild(cell);
                                cell.removeAttribute('aria-rowindex');
                                cell.removeAttribute('aria-colindex');
                                cell.removeAttribute('role');
                            }
                        });
                        header.setAttribute('role', 'button');
                        header.setAttribute('tabindex', '0');
                        header.setAttribute('aria-expanded', 'false');
                        header.setAttribute('aria-controls', tableID + '-' + index);
                        header.removeAttribute('aria-colindex');
                        header.removeAttribute('aria-rowindex');
          
                    }
                });
                          
                // insert accordion row header panel after each column header
                // colHeaders.forEach(colHeader => colHeader.insertAdjacentElement('afterend', accRowHeaders.cloneNode(true)));
      
      
   

            } else if (isAccordion && currentWidth > tableSize) {
                isAccordion = false;
                // table.classList.remove('accordion');
                table.innerHTML = storeTable;
                table.setAttribute('aria-colcount', storeCols);
                table.setAttribute('aria-rowcount', storeRows);
                table.setAttribute('role', 'table');
            }
        }

        addEventListener("resize", resizeHandler);
        resizeHandler();
    });


    document.addEventListener('click', function (event) {
        let obj = event.target;
        let tableData = obj.parentNode;
        let tableSize = Number(tableData.getAttribute('data-breakpoint'));
        let tableAcc = tableData.getAttribute('data-acc');

        // check if obj contains trigger, and the size is correct
        if (!obj.closest('.de-col-header')) return;
        if (screen.width >= tableSize) return;
        event.preventDefault();


        if (tableAcc == 'true') {
            tableData.querySelectorAll('.de-col-header').forEach(el => {
                el.classList.remove('active');
                el.setAttribute('aria-expanded', false);
            });

            tableData.querySelectorAll('.de-table-acc-panel').forEach(el => {
                el.classList.remove('active');
            });

            obj.classList.add('active');
            obj.setAttribute('aria-expanded', true);
        } else {

            obj.classList.toggle('active');
            if (obj.classList.contains('active')) {
                obj.setAttribute('aria-expanded', true);
            } else {
                obj.setAttribute('aria-expanded', false);
            }
        }
        obj.nextSibling.classList.toggle('active');
    });
}
