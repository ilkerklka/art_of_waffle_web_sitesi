

    const fontSelect = document.getElementById("fontSelect");
    const sizeSelect = document.getElementById("sizeSelect");
    const colorSelect = document.getElementById("colorSelect");
    const boldCheck = document.getElementById("boldCheck");
    const italicCheck = document.getElementById("italicCheck");
    const underlineCheck = document.getElementById("underlineCheck");
    const textarea = document.getElementById("myTextarea");
    const insertBoldButton = document.getElementById("insertBoldButton");
    const insertItalicButton = document.getElementById("insertItalicButton");
    const insertUnderlineButton = document.getElementById("insertUnderlineButton");
    const insertLinkButton = document.getElementById("insertLinkButton");

fontSelect.addEventListener("change", function() {
  textarea.style.fontFamily = this.value;
});

sizeSelect.addEventListener("change", function() {
  textarea.style.fontSize = this.value;
});

colorSelect.addEventListener("change", function() {
  textarea.style.color = this.value;
});

boldCheck.addEventListener("change", function() {
    if (this.checked) {
        textarea.style.fontWeight = "bold";
      } else {
        textarea.style.fontWeight = "normal";
      }
    });
    
    italicCheck.addEventListener("change", function() {
      if (this.checked) {
        textarea.style.fontStyle = "italic";
      } else {
        textarea.style.fontStyle = "normal";
      }
    });
    
    underlineCheck.addEventListener("change", function() {
      if (this.checked) {
        textarea.style.textDecoration = "underline";
      } else {
        textarea.style.textDecoration = "none";
      }
    });
    
    insertBoldButton.addEventListener("click", function() {
      let text = textarea.value;
      let selectedText = text.substring(textarea.selectionStart, textarea.selectionEnd);
      let newText = "<b>" + selectedText + "</b>";
      let replacedText = text.substring(0, textarea.selectionStart) + newText + text.substring(textarea.selectionEnd);
      textarea.value = replacedText;
    });
    
    insertItalicButton.addEventListener("click", function() {
      let text = textarea.value;
      let selectedText = text.substring(textarea.selectionStart, textarea.selectionEnd);
      let newText = "<i>" + selectedText + "</i>";
      let replacedText = text.substring(0, textarea.selectionStart) + newText + text.substring(textarea.selectionEnd);
      textarea.value = replacedText;
    });
    
    insertUnderlineButton.addEventListener("click", function() {
      let text = textarea.value;
      let selectedText = text.substring(textarea.selectionStart, textarea.selectionEnd);
      let newText = "<u>" + selectedText + "</u>";
      let replacedText = text.substring(0, textarea.selectionStart) + newText + text.substring(textarea.selectionEnd);
      textarea.value = replacedText;
    });
    insertAltSatir.addEventListener("click", function() {
        let text = textarea.value;
        let selectedText = text.substring(textarea.selectionStart, textarea.selectionEnd);
        let newText = "<br>" + selectedText ;
        let replacedText = text.substring(0, textarea.selectionStart) + newText + text.substring(textarea.selectionEnd);
        textarea.value = replacedText;
      });
    
    insertLinkButton.addEventListener("click", function() {
      let url = prompt("Lütfen bir URL girin:");
      if (url != null && url != "") {
        let text = textarea.value;
        let selectedText = text.substring(textarea.selectionStart, textarea.selectionEnd);
        let newText = "<a href='" + url + "'>" + selectedText + "</a>";
        let replacedText = text.substring(0, textarea.selectionStart) + newText + text.substring(textarea.selectionEnd);
        textarea.value = replacedText;
      }
    });


    

  
    