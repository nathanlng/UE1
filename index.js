let playerName = document.getElementById("profileNom");
let playerPrenom = document.getElementById("profilePrenom");
let playerAge = document.getElementById("playerAge");
let sexePlayer = document.getElementById("sexePlayer");
let niveauPlayer = document.getElementById("niveauPlayer");
let playerClub = document.getElementById("playerClub");
let footCategoriePlayer = document.getElementById("footCategoriePlayer");
let postePlayer = document.getElementById("postePlayer");
let piedFortPlayer = document.getElementById("piedFortPlayer");
let description = document.getElementById("descriptionButton")
let imagePlayer= document.getElementById("imagePlayer")


console.log(localStorage);
// localStorage.clear()

let initialPlayer = [];

let newId = initialPlayer.length + 1;
const addPlayer = document.getElementById("addPlayer");



if (localStorage.getItem("caract") == null) {
  // localStorage.setItem("caract", JSON.stringify(initialPlayer));
  console.log(localStorage);
  
} else {
  initialPlayer = JSON.parse(localStorage.getItem("caract"));
}

let attributsPlayer = " ";

const submitButton = document.getElementById("submitButton");

submitButton.addEventListener("click",() => {

  const newPlayer = {
    id: newId,
    attributs: {
      nom: playerName.value,
      prenom: playerPrenom.value,
      age: parseInt(playerAge.value),
      categorie: sexePlayer.value,
      niveau: niveauPlayer.value,
      club: playerClub.value,
      typeFoot: footCategoriePlayer.value,
      poste: postePlayer.value,
      piedFort: piedFortPlayer.value,
      biographie: description.value,
      photo: imagePlayer.value,
    },
  };

  initialPlayer.push(newPlayer);
  console.log(initialPlayer);

  newId += 1;

  localStorage.setItem("caract", JSON.stringify(initialPlayer));
  console.log(localStorage);


  document.getElementById("profile").style.display = "flex";
  document.getElementById("editProfile").style.display = "none";
});



document.getElementById("editButton").addEventListener("click", () => {
  document.getElementById("profile").style.display = "none";
  document.getElementById("editProfile").style.display = "flex";
});



// document.getElementsByClassName("navabar").getElementsByClassName("menuBurger").addEventListener("click", () => {
//   document.getElementsByClassName("lien").style.display="flex"
// });

// document.getElementsByClassName("lien").addEventListener("click", () => {
//   document.getElementsByClassName("lien").style.display="none"
// });


document.getElementById("delete").addEventListener("click" , ()=>{
// localStorage.clear()
console.log(fesdg);
})