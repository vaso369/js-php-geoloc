
let x = document.getElementById("feedback");
getLocation();
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.enableHighAccuracy = "true";
    navigator.geolocation.getCurrentPosition(sendPosition);
  } else {
    x.innerHTML = "Geolocation nije podrzana u ovom browser8u";
  }
}

function sendPosition(position) {
  
    let link = `https://www.google.rs/maps/place/${position.coords.latitude},${position.coords.longitude}`
    let forSend = {
        link
    }
  $.ajax({
      url:"php/sendMail.php",
      method:"POST",
      data: forSend,
      success:function(){
          console.log("poslato");
      },
      error:function(xhr){
          console.log(xhr);
      }

  })
}