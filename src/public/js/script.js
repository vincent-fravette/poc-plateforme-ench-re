function triggerClick(event) {

  document.querySelector('#profileImage').click();

}

function displayImage(event) {

  if (event.files[0]) {

    var reader = new FileReader();
    reader.onload = function(e){

      document.querySelector('#profileDisplay').setAttribute('src', event.target.result);

    }
    reader.readAsDataURL(event.files[0]);

  }
  
}