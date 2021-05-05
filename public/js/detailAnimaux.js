
var vOneLS = localStorage.getItem("vOneLocalStorage");
let chaine = vOneLS;
console.log(chaine);
let data= chaine.split("-"); 

//set name
document.querySelector("#animalName").innerHTML = data[1];
//set picture
let pic=document.getElementById('animalImage').src;
console.log(pic);
document.getElementById('animalImage').src=pic+"/public/Images/"+data[7];
//set status
document.querySelector("#status").innerHTML = data[5];
if(data[5].localeCompare("endanger")==0)
{
    document.getElementById('status').style.color='red'; 
}
if(data[5].localeCompare("Menacé")==0)
{
    document.getElementById('status').style.color='yellow'; 
}

//set id
document.querySelector("#idAnimal").innerHTML = data[0];
//set name in list
document.querySelector("#nomAnimal").innerHTML = data[1];
//set type
document.querySelector("#typeAnimal").innerHTML = data[2];
//set age
document.querySelector("#ageAnimal").innerHTML = data[3];
//set pays
document.querySelector("#paysAnimal").innerHTML = data[4];
//set id
document.querySelector("#idRegime").value = data[6];

//set QR code pic
dataQR="id animal : "+data[0]+", Nom animal : "+data[1] + " , type animal : "+data[2]+" , Age animal : "+data[3] +" , Pays animal : "+data[4]+" , statut de conservation de l'animal : "+data[5]+" , id regime alimentaire : "+data[6]+", Nom image : "+data[7];
document.getElementById('QRCodePic').src="http://api.qrserver.com/v1/create-qr-code/?data="+dataQR;


//form email
//set email
document.querySelector("#email").value = data[8];



function validateString(str) {
    if (str.match(/[a-z]/g))
      return true;
    else
      return false
  }

  

document.getElementById('submit').addEventListener('click', (e) => {

    let reclamation = document.getElementById("reclamation").value;
    console.log(reclamation);
    let errormsg1 = document.getElementById("errormsg1");
  
    
    if (!validateString(reclamation) || reclamation.length<10 ) {

        errormsg1.style.display = "flex";
        errormsg1.innerHTML = "merci d'ecrire juste des lettres alphabétiques et supérieur à 10";
        document.getElementById("reclamation").parentElement.style.border = "1px solid red";
        e.preventDefault();
      }
    

})



function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.036 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
