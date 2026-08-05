;(function () {
  function truncateContent(content, numWords, endText, button) {
    let wordsArray = content.trim().split(/\s+/)
    if (wordsArray.length <= numWords) {
      if (button.disable == "true") button.selector.style.display = "none"
      return content
    } else {
      let truncatedContent = ""
      let numTags = 0
      let i = 0
      while (i < wordsArray.length && i < numWords) {
        if (wordsArray[i].indexOf("<") === 0) {
          numTags++
        }
        if (wordsArray[i].indexOf(">") === wordsArray[i].length - 1) {
          numTags--
        }
        truncatedContent += wordsArray[i] + " "
        i++
      }
      if (numTags > 0) {
        truncatedContent += "</" + wordsArray[i - 1].substr(wordsArray[i - 1].indexOf("<") + 1) + ">"
      }

      // remove trailing whitespace before appending ellipsis
      truncatedContent = truncatedContent.trimEnd()

      // add ellipsis
      if (endText) truncatedContent += endText

      return truncatedContent
    }
  }

  window.deOriginalContent = {}

  function calculateNumWordsToShow(desktop, tabletLan, tabletPor, phoneLan, phonePor) {
    let screenWidth = window.innerWidth
    let numWordsToShowCalculate = desktop !== 0 ? desktop : false

    if (screenWidth <= 1119 && screenWidth > 1023) {
      numWordsToShowCalculate = tabletLan !== 0 ? tabletLan : desktop !== 0 ? desktop : false
    } else if (screenWidth <= 1023 && screenWidth > 767) {
      numWordsToShowCalculate = tabletPor !== 0 ? tabletPor : tabletLan !== 0 ? tabletLan : desktop !== 0 ? desktop : false
    } else if (screenWidth <= 767 && screenWidth > 479) {
      numWordsToShowCalculate = phoneLan !== 0 ? phoneLan : tabletPor !== 0 ? tabletPor : tabletLan !== 0 ? tabletLan : desktop !== 0 ? desktop : false
    } else if (screenWidth <= 479) {
      numWordsToShowCalculate = phonePor !== 0 ? phonePor : phoneLan !== 0 ? phoneLan : tabletPor !== 0 ? tabletPor : tabletLan !== 0 ? tabletLan : desktop !== 0 ? desktop : false
    }
    return numWordsToShowCalculate
  }

  const deReadMoreContainer = document.querySelectorAll(".de-read-more")

  deReadMoreContainer.forEach((el, index) => {
    breakpointsToggle = Number(el.getAttribute("data-breakpoints"))
    const desktop = Number(el.getAttribute("data-base"))
    const tabletLan = Number(el.getAttribute("data-tablet-landscape"))
    const tabletPor = Number(el.getAttribute("data-tablet-portrait"))
    const phoneLan = Number(el.getAttribute("data-phone-landscape"))
    const phonePor = Number(el.getAttribute("data-phone-portrait"))
    valueFromCurrentBreakpoint = calculateNumWordsToShow(desktop, tabletLan, tabletPor, phoneLan, phonePor)

    const btn = el.querySelector(".de-read-more button")
    const content = el.querySelector(".de-read-more-content")
    let customEndText = el.getAttribute("data-end-text")
    const dataType = el.getAttribute("data-type")
    const disableBtn = el.getAttribute("exclude-button")

    const id = `de-read-more-${index}`
    el.setAttribute('data-id', id)
    const selector = `.de-read-more[data-id="${id}"] .de-read-more-content`
    const numWordsToShow = breakpointsToggle === 0 ? Number(el.getAttribute("data-word-count")) : valueFromCurrentBreakpoint

    let innerContent = content.innerHTML

    deOriginalContent[id] = {
      selector: selector,
      contentInner: innerContent ? innerContent : "No Content Found",
      state: true,
      words: numWordsToShow ? numWordsToShow : false,
      endText: customEndText ? customEndText : false,
      dataType: el.getAttribute("data-type"),
      closeName: btn.getAttribute("data-close-name"),
      openName: btn.getAttribute("data-open-name"),
    }
    // jestesmy w kodzie
    if (!customEndText) customEndText = false

    if (dataType == "text") {
      let truncatedContent = truncateContent(deOriginalContent[id].contentInner, deOriginalContent[id].words, customEndText, { selector: btn, disable: disableBtn })
      content.innerHTML = truncatedContent
    }
    // Funkcja obsługująca zmianę rozmiaru okna dla konkretnego kontenera
    function handleResize() {
      valueFromCurrentBreakpoint = calculateNumWordsToShow(desktop, tabletLan, tabletPor, phoneLan, phonePor)
      deOriginalContent[id].words = valueFromCurrentBreakpoint

      let truncatedContent = truncateContent(deOriginalContent[id].contentInner, deOriginalContent[id].words, customEndText, { selector: btn, disable: disableBtn })
      content.innerHTML = truncatedContent
    }

    if (breakpointsToggle === 1) {
      // Dodanie event listenera na zdarzenie resize tylko gdy breakpointsToggle wynosi 1
      window.addEventListener("resize", handleResize)
    }
  })

  document.addEventListener("click", function (event) {
    const obj = event.target
    if (!obj.closest(".de-read-more-button")) return
    event.stopPropagation()

    const id = obj.closest('.de-read-more').getAttribute('data-id')
    let content = document.querySelector(deOriginalContent[id].selector)

    // set state to true if closed, and false to open
    if (deOriginalContent[id].state == true) {
      deOriginalContent[id].state = false
    } else {
      deOriginalContent[id].state = true
    }

    let dataType = deOriginalContent[id].dataType

    // when it's open
    if (deOriginalContent[id].state == false) {
      // show all content when "Read Less" button is clicked
      if (dataType == "text") content.innerHTML = deOriginalContent[id].contentInner // set back to original content
      obj.innerHTML = deOriginalContent[id].closeName
      content.classList.add("active")
      //when it's closed
    } else {
      // truncate content when "Read More" button is clicked
      if (dataType == "text") content.innerHTML = truncateContent(deOriginalContent[id].contentInner, deOriginalContent[id].words, deOriginalContent[id].endText, { disable: false })
      obj.innerHTML = deOriginalContent[id].openName
      content.classList.remove("active")
    }
  })

  window.truncateContent = truncateContent
})()
