/* TYPE ASSETS */
function getAssetTypeEn(type){
  switch(type){
    case 'normal':
      return 'https://cdn2.bulbagarden.net/upload/3/39/NormalIC_Big.png';
    case 'fighting':
      return 'https://cdn2.bulbagarden.net/upload/6/67/FightingIC_Big.png';
    case 'flying':
      return 'https://cdn2.bulbagarden.net/upload/c/cb/FlyingIC_Big.png';
    case 'poison':
      return 'https://cdn2.bulbagarden.net/upload/3/3d/PoisonIC_Big.png';
    case 'ground':
      return 'https://cdn2.bulbagarden.net/upload/8/8f/GroundIC_Big.png';
    case 'rock':
      return 'https://cdn2.bulbagarden.net/upload/c/ce/RockIC_Big.png';
    case 'bug':
      return 'https://cdn2.bulbagarden.net/upload/c/c8/BugIC_Big.png';
    case 'ghost':
      return 'https://cdn2.bulbagarden.net/upload/7/73/GhostIC_Big.png';
    case 'steel':
      return 'https://cdn2.bulbagarden.net/upload/d/d4/SteelIC_Big.png';
    case 'fire':
      return 'https://cdn2.bulbagarden.net/upload/2/26/FireIC_Big.png';
    case 'water':
      return 'https://cdn2.bulbagarden.net/upload/5/56/WaterIC_Big.png';
    case 'grass':
      return 'https://cdn2.bulbagarden.net/upload/7/74/GrassIC_Big.png';
    case 'electric':
      return 'https://cdn2.bulbagarden.net/upload/4/4a/ElectricIC_Big.png';
    case 'psychic':
      return 'https://cdn2.bulbagarden.net/upload/6/60/PsychicIC_Big.png';
    case 'ice':
      return 'https://cdn2.bulbagarden.net/upload/6/6f/IceIC_Big.png';
    case 'dragon':
      return 'https://cdn2.bulbagarden.net/upload/4/48/DragonIC_Big.png';
    case 'dark':
      return 'https://cdn2.bulbagarden.net/upload/5/56/DarkIC_Big.png';
    case 'fairy':
      return 'https://cdn2.bulbagarden.net/upload/d/df/Picross_FairyIC.png';
    default:
      return 'https://cdn2.bulbagarden.net/upload/3/3c/UnknownIC_Big.png';
  }
}
function getAssetTypeEs(type){
  switch(type){
    case 'normal':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/3/32/latest/20170114100442/Tipo_normal.gif';
    case 'fighting':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/b/b7/latest/20170114100336/Tipo_lucha.gif';
    case 'flying':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/e/e1/latest/20191118232224/Tipo_volador.gif';
    case 'poison':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/1/10/latest/20191118232220/Tipo_veneno.gif';
    case 'ground':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/1/1d/latest/20191118232216/Tipo_tierra.gif';
    case 'rock':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/e/e0/latest/20170114100446/Tipo_roca.gif';
    case 'bug':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/f/fe/latest/20191118232226/Tipo_bicho.gif';
    case 'ghost':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/4/47/latest/20170114100329/Tipo_fantasma.gif';
    case 'steel':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/d/d9/latest/20191118232245/Tipo_acero.gif';
    case 'fire':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/c/ce/latest/20170114100331/Tipo_fuego.gif';
    case 'water':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/9/94/latest/20191118232235/Tipo_agua.gif';
    case 'grass':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/d/d6/latest/20170114100444/Tipo_planta.gif';
    case 'electric':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/1/1b/latest/20170114100155/Tipo_el%C3%A9ctrico.gif';
    case 'psychic':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/1/15/latest/20170114100445/Tipo_ps%C3%ADquico.gif';
    case 'ice':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/4/40/latest/20170114100333/Tipo_hielo.gif';
    case 'dragon':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/0/01/latest/20170114100154/Tipo_drag%C3%B3n.gif';
    case 'dark':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/8/82/latest/20191118232327/Tipo_siniestro.gif';
    case 'fairy':
      return 'https://images.wikidexcdn.net/mwuploads/wikidex/b/bc/latest/20170114100332/Tipo_hada.gif';
    default:
      return 'https://cdn2.bulbagarden.net/upload/3/3c/UnknownIC_Big.png';
  }
}

var numPokemon = 1;
var frontView = true;
var shiny = false;
var gender = 'male';
var urlImage = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png';
var language = 'en';
var number = null;
var clickedNumber2 = false;
var clickedNumber3 = false;
const lastPokemon = 898;

function setNameDescriptionTypes(){
  fetch("https://pokeapi.co/api/v2/pokemon/" + numPokemon)
    .then((response) => response.json())
    .then((data) => {
      // Set Name
      document.getElementById("name-screen").innerHTML= data.name;
      // Set Type
      if(data.types.length > 0){
        if(language === 'en'){
          document.getElementById("type1").src = getAssetTypeEn(data.types[0].type.name)
        }
        if(language === 'es'){
          document.getElementById("type1").src = getAssetTypeEs(data.types[0].type.name)
        }
        
      }
      if(data.types.length > 1){
        if(language === 'en'){
          document.getElementById("type2").src = getAssetTypeEn(data.types[1].type.name)
        }
        if(language === 'es'){
          document.getElementById("type2").src = getAssetTypeEs(data.types[1].type.name)
        }
        
      } else {
        document.getElementById("type2").src = ''
      }
      // Set Height and Weight
      if(language === 'en'){
        document.getElementById("extra-info-screen-1").innerHTML= 'Height: ' + data.height/10 + ' m';
        document.getElementById("extra-info-screen-2").innerHTML= 'Weight: ' + data.weight/10 + ' kg';
      }
      if(language === 'es'){
        document.getElementById("extra-info-screen-1").innerHTML= 'Altura: ' + data.height/10 + ' m';
        document.getElementById("extra-info-screen-2").innerHTML= 'Peso: ' + data.weight/10 + ' kg';
      }
    });
  fetch("https://pokeapi.co/api/v2/pokemon-species/" + numPokemon)
    .then((response) => response.json())
    .then((data) => {
      // Set description of Pokemon
      if(data.flavor_text_entries.find((text_entry) => text_entry.language.name === language)){
        var description = data.flavor_text_entries.find((text_entry) => text_entry.language.name === language).flavor_text;
        description = description.replace(/\n/g, ' ').replace(/\f/g, ' ');
        document.getElementById("screen-description").innerHTML= description;
      } else {
        var description = data.flavor_text_entries.find((text_entry) => text_entry.language.name === 'en').flavor_text;
        description = description.replace(/\n/g, ' ').replace(/\f/g, ' ');
        document.getElementById("screen-description").innerHTML= description;
      }
    });
}

async function setURLimage(){
  var url = ''
  if(gender === 'male'){
    url = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon";
    if (!frontView) {
      url = url + "/back";
    }
    if (shiny) {
      url = url + "/shiny";
    }
    url = url + "/" + numPokemon + ".png";
  } else {
     await fetch("https://pokeapi.co/api/v2/pokemon/" + numPokemon)
      .then((response) => response.json())
      .then((data) => {
        if(data.sprites.front_female !== null && gender === 'female'){
          console.log('Entro en el primer if')
          if(frontView){
            if(shiny){
              url = data.sprites.front_shiny_female;
            } else {
              url = data.sprites.front_female;
            }
          } else {
            if(shiny){
              url = data.sprites.back_shiny_female;
            } else {
              url = data.sprites.back_female;
            }
          }
        } else {
          if(frontView){
            if(shiny){
              url = data.sprites.front_shiny;
            } else {
              console.log(data.sprites.front_default);
              url = data.sprites.front_default;
            }
          } else {
            if(shiny){
              url = data.sprites.back_shiny;
            } else {
              url = data.sprites.back_default;
            }
          }
        }
      });
  }
  document.getElementById("picture").src= url
}

function getNumLength(number) {
    return number.toString().length;
}

function setNumPokemon(num){
  if(num > lastPokemon || num === 0){
    numPokemon = 1;
  } else {
    numPokemon = num;
  }
  if(getNumLength(numPokemon) === 1){
    document.getElementById("number-pokemon").innerHTML = '00' + numPokemon;
  } else if(getNumLength(numPokemon) === 2){
    document.getElementById("number-pokemon").innerHTML = '0' + numPokemon;
  } else {
   document.getElementById("number-pokemon").innerHTML = numPokemon; 
  }
}

function setGender(gen){
  gender = gen;
  if(gender === 'female'){
    document.getElementById("male-icon").classList.remove("gender-active");
    document.getElementById("female-icon").classList.add("gender-active");
  } else {
    document.getElementById("male-icon").classList.add("gender-active");
    document.getElementById("female-icon").classList.remove("gender-active");
  }
  setURLimage();
}

function clickLeftRight(){
  frontView = !frontView;
  setURLimage();
}

function clickUp(){
  if (numPokemon === 1) {
    setNumPokemon(lastPokemon)
  } else {
    setNumPokemon(numPokemon - 1)
  }
  setURLimage();
  setNameDescriptionTypes();
}

function clickBottom(){
  if (numPokemon === lastPokemon) {
    setNumPokemon(1);
  } else {
    setNumPokemon(numPokemon + 1);
  }
  setURLimage();
  setNameDescriptionTypes();
}

function clickNormalColor(){
  shiny = false;
  setURLimage();
  document.getElementById("light-button-red").classList.remove("off");
  document.getElementById("light-button-red").classList.add("on");
  document.getElementById("light-button-blue").classList.add("off");
  document.getElementById("light-button-blue").classList.remove("on");
}

function clickShinyColor(){
  shiny = true;
  setURLimage();
  document.getElementById("light-button-red").classList.remove("on");
  document.getElementById("light-button-red").classList.add("off");
  document.getElementById("light-button-blue").classList.add("on");
  document.getElementById("light-button-blue").classList.remove("off");
}

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

function clickNumber(num){
  if(!clickedNumber3){
    if(number === null){
      number = num;
    } else {
      if(number.length < 3){
        number = number + num;
      }
      if(number.length === 2){
        clickedNumber2 = true;
      }
      if(number.length === 3){
        clickedNumber3 = true;
      }
    }
    if(language === 'en'){
      document.getElementById("screen-description").innerHTML = "Search for pokémon: " + number;
    }
    if(language === 'es'){
      document.getElementById("screen-description").innerHTML = "Buscar pokémon: " + number;
    }
    sleep(3000).then(() => {
      if((number.length === 1 && !clickedNumber2) || (number.length === 2 && !clickedNumber3) || number.length === 3){
        if(language === 'en'){
          document.getElementById("screen-description").innerHTML = "Searching...";
        }
        if(language === 'es'){
          document.getElementById("screen-description").innerHTML = "Buscando...";
        }
        setNumPokemon(parseInt(number, 10));
        number = null;
        setURLimage();
        setNameDescriptionTypes();
        clickedNumber2 = false;
        clickedNumber3 = false;
      } 
    });
  }
}

function changeLanguage(newLanguage){
  language = newLanguage.value;
  setNameDescriptionTypes();
}

setURLimage()
setNameDescriptionTypes()