function mobilnav() {

       var element = document.getElementById("navul");

    if (element.classList.contains("hidmobil")) {

         element.classList.remove("hidmobil");
    } else {
         element.classList.add("hidmobil");
    }
}
//
//user chart
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["#b91d47", "#00aba9", "#2b5797", "#e8c3b9", "#1e7145"];

new Chart("myChartright", {
    type: "doughnut",
    data: {
        labels: xValues,
        datasets: [
            {
                backgroundColor: barColors,
                data: yValues,
            },
        ],
    },
    options: {
        title: {
            display: true,
            text: "Maximum Global Security",
        },
    },
});


//the end


//
//userlefchart

var xValues2 = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues2 = [55, 49, 44, 24, 15];
var barColors2 = ["red", "green", "blue", "orange", "brown"];

new Chart("myChartleft", {
    type: "bar",
    data: {
        labels: xValues2,
        datasets: [
            {
                backgroundColor: barColors2,
                data: yValues2,
            },
        ],
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: "Maximum Global Security",
        },
    },
});



//the end
// /category
function category() {
  var element = document.getElementById("opencategory");

  if (element.classList.contains("opencategory")) {
      element.classList.remove("opencategory");
  } else {
      element.classList.add("opencategory");
  }
}
//search
function search() {
    //
   var element = document.getElementById("showsearch");

   if (element.classList.contains("showsearch")) {
       element.classList.remove("showsearch");
   } else {
       element.classList.add("showsearch");
   }
}


// pluscart

// Get the input field element

