function strUcFirst(a) {
    return (a+'').charAt(0).toUpperCase() + (a+'').substr(1);
  }

function editProfile(player) {


    document.getElementById("userN").innerText=strUcFirst(player.attributs.nom) + " " + strUcFirst(player.attributs.prenom);
    document.getElementById("age").innerText=player.attributs.age;
    document.getElementById("sexe").innerText=player.attributs.categorie;
    document.getElementById("niveau").innerText=player.attributs.niveau;
    document.getElementById("pClub").innerText=player.attributs.club;
    document.getElementById("typeF").innerText=player.attributs.typeFoot;
    document.getElementById("poste").innerText=player.attributs.poste
    document.getElementById("piedF").innerText=player.attributs.piedFort
    document.getElementById("testId").innerText=player.id
    // const testImage= document.createElement
    // document.getElementById("testImg")
    if (player.attributs.biographie != "") {
        document.getElementById("bio").innerText=player.attributs.biographie
    }
  }

  if (localStorage.getItem("caract") == null) {
    // localStorage.setItem("caract", JSON.stringify(initialPlayer));
    console.log(localStorage);
    
  } else {
    initialPlayer = JSON.parse(localStorage.getItem("caract"));
    editProfile(initialPlayer[initialPlayer.length-1]);
  }