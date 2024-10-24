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


let initialPlayer = [];



let newId = initialPlayer.length + 1;
const addPlayer = document.getElementById("addPlayer");

const playersList = document.getElementById("container");

const newPlayerList = (element) => {
  const newPlayerProfile = document.createElement("div");
  newPlayerProfile.setAttribute("class", "player");

  const newPlayerImage = document.createElement("img");
  newPlayerImage.setAttribute("src", "photoplayer.avif");
  newPlayerImage.setAttribute("class", "imagePlayer");

  const newPlayerTitle = document.createElement("p");
  newPlayerTitle.innerText = element.attributs.nom;
  newPlayerTitle.innerText += " " + element.attributs.prenom;

  const newPlayerAttribut = document.createElement("p");
  newPlayerAttribut.innerText = element.attributs.age;
  newPlayerAttribut.innerText += "   " + element.attributs.categorie;

  const newNiveau = document.createElement("p");
  newNiveau.innerText += element.attributs.niveau;
  newNiveau.innerText += " " + element.attributs.club;

  const typeFootball = document.createElement("p");
  typeFootball.innerText += element.attributs.typeFoot;

  const postePied = document.createElement("p");
  postePied.innerText += element.attributs.poste;
  postePied.innerText += element.attributs.piedFort;

  newPlayerProfile.appendChild(newPlayerImage);
  newPlayerProfile.appendChild(newPlayerTitle);
  newPlayerProfile.appendChild(newPlayerAttribut);
  newPlayerProfile.appendChild(newNiveau);
  newPlayerProfile.appendChild(typeFootball);
  console.log(newPlayerProfile);

  playersList.appendChild(newPlayerProfile);
};

if (localStorage.getItem("caract") == null) {
  localStorage.setItem("caract", JSON.stringify(initialPlayer));
} else {
  initialPlayer = JSON.parse(localStorage.getItem("caract"));
}

let attributsPlayer = " ";

function maFonction() {
  let tabPlayer = JSON.parse(localStorage.getItem("caract"));
  newPlayerList(tabPlayer[tabPlayer.length-1]);

}

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

function clickLink() {
    initialPlayer = JSON.parse(localStorage.getItem("caract"));
  initialPlayer.forEach(i => {
    newPlayerList(i)
  })
}