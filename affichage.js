// creation de la vignette sur la page link du joueur enregistré

const playersList = document.getElementById("container");

const newPlayerList = (element) => {
  const newPlayerProfile = document.createElement("div");
  newPlayerProfile.setAttribute("class", "player");

  const newPlayerImage = document.createElement("img");
  newPlayerImage.setAttribute("src", element.attributs.photo);
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

  playersList.appendChild(newPlayerProfile);
};

if (localStorage.getItem("caract") == null) {
  localStorage.setItem("caract", JSON.stringify(initialPlayer));
} else {
  let initialPlayer = JSON.parse(localStorage.getItem("caract"));
  initialPlayer.forEach((element) => {
    newPlayerList(element);
  });
}
