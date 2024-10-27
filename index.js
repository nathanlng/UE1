let playerName = document.getElementById("profileNom");
let playerPrenom = document.getElementById("profilePrenom");
let playerAge = document.getElementById("playerAge");
let sexePlayer = document.getElementById("sexePlayer");
let niveauPlayer = document.getElementById("niveauPlayer");
let playerClub = document.getElementById("playerClub");
let footCategoriePlayer = document.getElementById("footCategoriePlayer");
let postePlayer = document.getElementById("postePlayer");
let piedFortPlayer = document.getElementById("piedFortPlayer");

console.log(localStorage);
// localStorage.clear()

let initialPlayer = [];

let newId = initialPlayer.length + 1;
const addPlayer = document.getElementById("addPlayer");

const playersList = document.getElementById("container");

if (localStorage.getItem("caract") == null) {
  localStorage.setItem("caract", JSON.stringify(initialPlayer));
} else {
  initialPlayer = JSON.parse(localStorage.getItem("caract"));
}

let attributsPlayer = " ";

// function maFonction() {
//   let tabPlayer = JSON.parse(localStorage.getItem("caract"));

//   newPlayerList(tabPlayer[tabPlayer.length-1]);

// }

const submitButton = document.getElementById("submitButton");

submitButton.addEventListener("click", () => {
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
    },
  };
  console.log(newPlayer);

  initialPlayer.push(newPlayer);
  console.log(initialPlayer);

  newId += 1;

  localStorage.setItem("caract", JSON.stringify(initialPlayer));
  console.log(localStorage);
  // console.log(initialPlayer);
});

document.getElementsByClassName("menuBurger").addEventListener("click", () => {
  
});
