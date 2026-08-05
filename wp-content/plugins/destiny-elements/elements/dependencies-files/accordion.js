const deAccordion = () => {
    const deAccordion = document.querySelectorAll(".de-accordion");
    deAccordion.forEach(acc => {
        let deAccTrigger = acc.querySelectorAll('.de-accordion-trigger');
        let deAccPanel = acc.querySelectorAll(".de-accordion-panel");
        let deAccType = acc.getAttribute('data-acc');
        let deAnim = acc.getAttribute('data-animate');
        let deClickClose = acc.getAttribute('data-close-on-click');
        let deOpen = acc.getAttribute('data-open');
        let deTran = Number(acc.getAttribute('data-tran')) + 1;

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // required to get the panel height before it closes
                    deAccPanel.forEach(panel => {              
                        panel.classList.remove('hidden');
                        panel.style.height = "auto";
                        panel.setAttribute('data-height', panel.offsetHeight);
                        panel.classList.add('hidden');
                        panel.style.height = panel.getAttribute('data-height') + "px";
                    });

                    // add aria label to closed
                    deAccTrigger.forEach(trigger => {
                        trigger.classList.remove('active');
                        trigger.setAttribute('aria-expanded', false);
                    });

                    if (deAccTrigger[0]) {
                        // open first panel if enabled
                        if (deOpen == 'true') {
                            deAccTrigger[0].classList.add('active');
                            deAccTrigger[0].setAttribute('aria-expanded', true);
                            deAccPanel[0].style.height = Number(deAccPanel[0].getAttribute("data-height")) + "px";
                            deAccPanel[0].classList.remove('hidden');
                        } else {
                            deAccPanel[0].style.height = Number(deAccPanel[0].getAttribute("data-height")) + "px";
                            deAccPanel[0].classList.add('hidden');
                            deAccTrigger[0].classList.remove('active');
                            deAccTrigger[0].setAttribute('aria-expanded', false);
                        }
                    }

                    if (typeof ScrollTrigger !== "undefined") ScrollTrigger.refresh(); // Refresh scroll trigger after it has been inisiated
                    observer.unobserve(acc);
                }
            });
        });
        
        observer.observe(acc);

        deAccTrigger.forEach((tab, index) => {

            tab.addEventListener("click", function (event) {
                event.preventDefault();
                
                deAccTrigger = acc.querySelectorAll('.de-accordion-trigger');
                deAccPanel = acc.querySelectorAll(".de-accordion-panel");
                deAccType = acc.getAttribute('data-acc');
                deAnim = acc.getAttribute('data-animate');
                deOpen = acc.getAttribute('data-open');
                deTran = Number(acc.getAttribute('data-tran')) + 1;
            
                if(deClickClose == 'true' && this.classList.contains('active')) {
                    this.classList.remove("active");
                    this.setAttribute('aria-expanded', 'false');
            
                    if (deAnim == "smooth") {
                        deAccPanel[index].style.height = "0px";
                        deAccPanel[index].style.paddingTop = "0px";
                        deAccPanel[index].style.paddingBottom = "0px";
                        setTimeout(() => {
                            deAccPanel[index].classList.add('hidden');
                        }, deTran);
                    } else {
                        deAccPanel[index].classList.add('hidden');
                    }
            
                    return;
                }

                if (deAccType == 'true') {
                    // first remove all tabs active and aria labels when clicke on it
                    deAccTrigger.forEach(tab => {
                        tab.classList.remove("active");
                        tab.setAttribute('aria-expanded', 'false');
                    });

                    // add active and aria to clicked tab
                    this.classList.add("active");
                    this.setAttribute('aria-expanded', 'true');
                    
                    deAccPanel.forEach((content, x) => {
                        if (deAnim == "smooth") {
                            content.style.height = "0px"
                            content.style.paddingTop = "0px";
                            content.style.paddingBottom = "0px";
                            setTimeout(() => {
                                if (!deAccPanel[index]) content.classList.add('hidden');
                            }, deTran);
                        } else {
                            content.classList.add('hidden');
                            content.style.height = "0px";
                            content.style.paddingTop = "0px";
                            content.style.paddingBottom = "0px";
                        }
                    });


                    if (deAnim == "smooth") {
                        deAccPanel[index].classList.remove('hidden');
                        setTimeout(() => {
                            deAccPanel[index].style.height = deAccPanel[index].getAttribute('data-height') + "px";
                            deAccPanel[index].style.paddingTop = null;
                            deAccPanel[index].style.paddingBottom = null;
                        }, 1);
                    } else {
                        deAccPanel[index].classList.remove('hidden');
                        deAccPanel[index].style.height = "100%";
                        deAccPanel[index].style.paddingTop = null;
                        deAccPanel[index].style.paddingBottom = null;
                    }

                    // For later to be added with animation
                    //deAccPanel[index].style.height = deAccPanel[index].getAttribute('data-height') + "px";

                }
                
                if(deAccType == 'false') {
                    this.classList.toggle("active");
                    (this.getAttribute('aria-expanded') == 'true')
                        ? this.setAttribute('aria-expanded', 'false')
                        : this.setAttribute('aria-expanded', 'true');
                    
                    if (this.classList.contains('active')) {
                        if (deAnim == "smooth") {
                            deAccPanel[index].classList.remove('hidden');
                            deAccPanel[index].style.height = "0px";
                            deAccPanel[index].style.paddingTop = "0px"
                            deAccPanel[index].style.paddingBottom = "0px";
                            setTimeout(() => {
                                deAccPanel[index].style.height = deAccPanel[index].getAttribute('data-height') + "px";
                                deAccPanel[index].style.paddingTop = null;
                                deAccPanel[index].style.paddingBottom = null;
                            }, 1);
                        } else {
                            deAccPanel[index].style.height = "100%";
                             deAccPanel[index].style.paddingTop = null;
                            deAccPanel[index].style.paddingBottom = null;
                            deAccPanel[index].classList.remove('hidden');
                           
                        }
                    } else {
                        deAccPanel[index].style.height = "0px";
                        deAccPanel[index].style.paddingTop = "0px"
                        deAccPanel[index].style.paddingBottom = "0px";
                        if (deAnim == "smooth") {
                            deAccPanel[index].style.height = "0px";
                            deAccPanel[index].style.paddingTop = "0px"
                            deAccPanel[index].style.paddingBottom = "0px";
                            setTimeout(() => {
                                deAccPanel[index].classList.remove('hidden');
                            }, deTran);
                        } else {
                            deAccPanel[index].classList.add('hidden');
                        }
                    }
                }

                setTimeout(() => {
                    if (typeof ScrollTrigger !== "undefined") ScrollTrigger.refresh(); // Refresh scroll trigger after it has been inisiated
                }, deTran);

            });
        });
    });

    // Fix the scroll location to, incase there is a hash in the URL
    if (window.location.hash) {
        let id = window.location.hash.slice(1); // remove #
        let element = document.getElementById(id);
        if (element) {
            element.scrollIntoView();
        }
    }

};

let deFaqData = [];