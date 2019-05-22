
var i = 0;

function addFields(){
  i++;
          //Create an input type dynamically.

          var div1 = document.createElement("div");
          var div2 = document.createElement("div");

          var element1 = document.createElement("input");

          //Assign different attributes to the element1.
          element1.setAttribute("type", "text");
          element1.setAttribute("name", "report-drug-name-" + i);
          element1.setAttribute("class", "form-control");
          element1.setAttribute("placeholder", "Drug Name");

          //put element 1 inside div
          div1.appendChild(element1);

          var element2 = document.createElement("input");

          //Assign different attributes to the element2.
          element2.setAttribute("type", "text");
          element2.setAttribute("name", "report-drug-dosage-" + i);
          element2.setAttribute("class", "form-control");
          element2.setAttribute("placeholder", "Dosage Form");

          //put element 2 inside div
          div2.appendChild(element2);


          var container = document.getElementById("newFieldContainer");

          container.appendChild(div1);
          container.appendChild(div2);

        }

// note: IE8 doesn't support DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {

  var suggestions = document.getElementById("suggestions");
  var form = document.getElementById("search-form");
  var search = document.getElementById("search");

  function suggestionsToList(json) {
    // <li><a href="search.php?q=alpha">Alpha</a></li>
    var output = '';

    for(i=0; i < json.length; i++) {
      output += '<li>';
      output += '<a href="search.php?search=' + json[i].name + '">';
      output += json[i].name + ' ' + json[i].dosage;
      output += '</a>';
      output += '</li>';
    }

    return output;
  }

  function showSuggestions(json) {
    var li_list = suggestionsToList(json);
    suggestions.innerHTML = li_list;
    suggestions.style.display = 'block';
  }

  function getSuggestions() {
    var q = search.value;

    if(q.length < 3) {
      suggestions.style.display = 'none';
      return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'autosuggest.php?search=' + q, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        var json = JSON.parse(result);
        console.log(json);
        showSuggestions(json);
      }
    };
    xhr.send();
  }

  search.addEventListener("input", getSuggestions);

});

// function validateForm() {
//   var x = document.querySelector('#content form.ward-form input[name="report-name"]').value;
//   if (x == "") {
//     alert("Please enter your name");
//     return false;
//   }
// }
//
// function validateDate() {
//   var x = document.querySelector('#reports-filter form input[id="filter-date-input"]').value;
//   if (x == "") {
//     alert("Please enter date");
//     return false;
//   }
// }
