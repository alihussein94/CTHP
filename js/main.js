
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
