function limitCheckboxes() {
    var checkboxes = document.getElementsByName("cikolata[]");
    var checkedCount = 0;
    
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        checkedCount++;
      }
      
      if (checkedCount >= 3) {
        for (var j = 0; j < checkboxes.length; j++) {
          if (!checkboxes[j].checked) {
            checkboxes[j].disabled = true;
          }
        }
      } else {
        for (var j = 0; j < checkboxes.length; j++) {
          checkboxes[j].disabled = false;
        }
      }
    }
  }

  function limitCheckboxes2() {
    var checkboxes = document.getElementsByName("meyve[]");
    var checkedCount = 0;
    
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        checkedCount++;
      }
      
      if (checkedCount >= 3) {
        for (var j = 0; j < checkboxes.length; j++) {
          if (!checkboxes[j].checked) {
            checkboxes[j].disabled = true;
          }
        }
      } else {
        for (var j = 0; j < checkboxes.length; j++) {
          checkboxes[j].disabled = false;
        }
      }
    }
  }
  
  


  

  function limitCheckboxes3() {
    var checkboxes = document.getElementsByName("sekerlemeler[]");
    var checkedCount = 0;
    
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        checkedCount++;
      }
      
      if (checkedCount >= 3) {
        for (var j = 0; j < checkboxes.length; j++) {
          if (!checkboxes[j].checked) {
            checkboxes[j].disabled = true;
          }
        }
      } else {
        for (var j = 0; j < checkboxes.length; j++) {
          checkboxes[j].disabled = false;
        }
      }
    }
  }
  function limitCheckboxes4() {
    var checkboxes = document.getElementsByName("suslemeler[]");
    var checkedCount = 0;
    
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        checkedCount++;
      }
      
      if (checkedCount >= 4) {
        for (var j = 0; j < checkboxes.length; j++) {
          if (!checkboxes[j].checked) {
            checkboxes[j].disabled = true;
          }
        }
      } else {
        for (var j = 0; j < checkboxes.length; j++) {
          checkboxes[j].disabled = false;
        }
      }
    }
  }

  function limitCheckboxes5() {
    var checkboxes = document.getElementsByName("yemis[]");
    var checkedCount = 0;
    
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        checkedCount++;
      }
      
      if (checkedCount >= 3) {
        for (var j = 0; j < checkboxes.length; j++) {
          if (!checkboxes[j].checked) {
            checkboxes[j].disabled = true;
          }
        }
      } else {
        for (var j = 0; j < checkboxes.length; j++) {
          checkboxes[j].disabled = false;
        }
      }
    }
  }
  
  function limitCheckboxes6() {
    var checkboxes = document.getElementsByName("soslar[]");
    var checkedCount = 0;
    
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        checkedCount++;
      }
      
      if (checkedCount >= 2) {
        for (var j = 0; j < checkboxes.length; j++) {
          if (!checkboxes[j].checked) {
            checkboxes[j].disabled = true;
          }
        }
      } else {
        for (var j = 0; j < checkboxes.length; j++) {
          checkboxes[j].disabled = false;
        }
      }
    }
  }
  