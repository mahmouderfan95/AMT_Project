function myFunction() {
  let element = document.querySelector(".modal");
  if (element.style.display === "flex") {
    element.style.display = "none";
  } else {
    element.style.display = "flex";
  }
}

function myFunction_edit_profile() {
    let element = document.querySelector(".edit_profile");
    if (element.style.display === "flex") {
        element.style.display = "none";
    } else {
        element.style.display = "flex";
    }
}

function closeModal(){
    let close_btn = document.querySelector('.btn-close'),
        element = document.querySelector(".modal");
    if (element.style.display === "flex"){
        element.style.display = "none";
    }
}

function closeModalEdit(){
    let close_btn = document.querySelector('#btn-close-edit'),
        element = document.querySelector("#edit_profile");
    if (element.style.display === "flex"){
        element.style.display = "none";
    }
}
