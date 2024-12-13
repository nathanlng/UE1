let playerName = document.getElementById("profileNom");
let playerSurname = document.getElementById("profilePrenom");
let playerAge = document.getElementById("playerAge");
let playerSexe = document.getElementById("sexePlayer");
let niveauPlayer = document.getElementById("niveauPlayer");
let playerClub = document.getElementById("playerClub");
let footCategoriePlayer = document.getElementById("footCategoriePlayer");
let postePlayer = document.getElementById("postePlayer");
let piedFortPlayer = document.getElementById("piedFortPlayer");
let description = document.getElementById("descriptionButton");
let imagePlayer = document.getElementById("imagePlayer");

var sidenav = document.getElementById("sideNav");
sidenav.classList.remove("active");

console.log(localStorage);
// localStorage.clear()

let initialPlayer = [];

if (localStorage.getItem("caract") == null) {
  localStorage.setItem("caract", JSON.stringify(initialPlayer));
} else {
  initialPlayer = JSON.parse(localStorage.getItem("caract"));
}

console.log(initialPlayer);


let newId = initialPlayer.length + 1;
const addPlayer = document.getElementById("addPlayer");



let attributsPlayer = " ";

const submitButton = document.getElementById("submitButton");

// création d'un nouveau player

submitButton.addEventListener("click", () => {
  if (playerName.value != '' && playerSurname.value != '') {
    console.log("test1");
    
    const newPlayer = {
      id: newId,
      attributs: {
        nom: playerName.value,
        prenom: playerSurname.value,
        age: parseInt(playerAge.value),
        categorie: playerSexe.value,
        niveau: niveauPlayer.value,
        club: playerClub.value,
        typeFoot: footCategoriePlayer.value,
        poste: postePlayer.value,
        piedFort: piedFortPlayer.value,
        biographie: description.value,
        photo: imagePlayer.value,
      },
    };
  
    if (newPlayer.attributs.photo == "") {
      newPlayer.attributs.photo =
        "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
    }
  
    initialPlayer.push(newPlayer);
    console.log(initialPlayer);
  
    newId += 1;
  
    localStorage.setItem("caract", JSON.stringify(initialPlayer));
    console.log(localStorage);

    editProfile(initialPlayer[initialPlayer.length - 1])
  }
  
 

  document.getElementById("profile").style.display = "flex";
  document.getElementById("editProfile").style.display = "none";
});

document.getElementById("editButton").addEventListener("click", () => {
  document.getElementById("profile").style.display = "none";
  document.getElementById("editProfile").style.display = "flex";
});

// fonctionalitées menu burger

var openBtn = document.getElementById("openBtn");

openBtn.addEventListener("click", () => {
  openNav();
});

function openNav() {
  sidenav.classList.add("active");
}

function clickPlayer(element){
  console.log(element);
  console.log(initialPlayer[element-1]);
}

function removePlayer(element) {
  initialPlayer.splice(element-1,1)
  localStorage.setItem("caract", JSON.stringify(initialPlayer));
}

function strUcFirst(a) {
  return (a + "").charAt(0).toUpperCase() + (a + "").substr(1);
}

// mise à jour du profil du joueur

function editProfile(player) {
  document.getElementById("userN").innerText =
    strUcFirst(player.attributs.nom) +
    " " +
    strUcFirst(player.attributs.prenom);
  document.getElementById("age").innerText = player.attributs.age;
  document.getElementById("sexe").innerText = player.attributs.categorie;
  document.getElementById("niveau").innerText = player.attributs.niveau;
  document.getElementById("club").innerText = player.attributs.club;
  document.getElementById("typeF").innerText = player.attributs.typeFoot;
  document.getElementById("poste").innerText = player.attributs.poste;
  document.getElementById("piedF").innerText = player.attributs.piedFort;
  if (player.attributs.biographie != "") {
    document.getElementById("bio").innerText = player.attributs.biographie;
  }
  document.getElementById(
    "photoContainer"
  ).style.backgroundImage = `url(${player.attributs.photo})`;
}

if (localStorage.getItem("caract") == null) {
  // localStorage.setItem("caract", JSON.stringify(initialPlayer));
  console.log(localStorage);
} else {
  initialPlayer = JSON.parse(localStorage.getItem("caract"));
  editProfile(initialPlayer[initialPlayer.length - 1]);;
}