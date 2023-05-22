// function find_book(imageUrl) {
//     // Make an AJAX request to your server-side script
//     fetch('database.php?thumbnail=' + encodeURIComponent(imageUrl))
//       .then(response => response.json())
//       .then(data => {
//         // Redirect to a new page to display the search results
//         window.location.href = 'search_results.html?' + encodeURIComponent(JSON.stringify(data));
//       })
//       .catch(error => {
//         // Handle any errors that occur during the request
//         console.error(error);
//       });
//   }
  


function find_book(){
    var thumbnail = document.getElementById("thumbnail").src;
    var title = document.getElementById("title");
    var subtitle = document.getElementById("subtitle");
    var author = document.getElementById("author");
    var year = document.getElementById("year");
    var description = document.getElementById("description");    


    var xml = new XMLHttpRequest();


    xml.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            alert(this.responseText);
            var ans = JSON.parse(this.responseText);
            thumbnail.src = ans[0];
            title = ans[1];
            subtitle = ans[2];
            author = ans[3];
            year = ans[4];
            description = ans[5];

        }
    }

    xml.open("GET", "database.php?thumbnail=" + thumbnail, true);
    xml.send();

}     