
$(".tblRows").click(function () {
  var row_data1 = $(this).attr("data");
  console.log(row_data1);
  //here
  let emailString = document.getElementById("email").textContent;
 
  let UserNameString = document.getElementById("userName").textContent;
  console.log(UserNameString);
  let ImageUserString = document.getElementById("imageUser").textContent;
  console.log(ImageUserString);
  var row_data = row_data1 + "-" + emailString + "-" + UserNameString+"-"+ImageUserString;
  
  localStorage.setItem("vOneLocalStorage", row_data);
}) 


//recherche function
let nomAnimal = Array.from(document.querySelectorAll("a[data-label='Nom']"));

document.getElementById('rechercher').addEventListener('keyup', (e) => {
  nomAnimal.map(el => {
    if (el.innerHTML.toLowerCase().search(e.target.value.toLowerCase()) == -1) {
      el.parentElement.style.display = 'none';
    }
    else {
      el.parentElement.style.display = 'flex';
    }
  })
})
