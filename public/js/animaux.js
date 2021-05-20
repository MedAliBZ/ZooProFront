
$(".tblRows").click(function () {
  let row_data1 = $(this).attr("data");
  console.log(row_data1);
  //here
  
  localStorage.setItem("vOneLocalStorage", row_data1);
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
