const options = document.querySelector(".container-options");
const iconOptions = document.querySelector("#icon-options");
const iconDarkmode = document.querySelector("#icon-dark");
const textDarkmode = document.querySelector("#text-mode-dark");


iconOptions.addEventListener("click", () =>{
  options.classList.toggle("shown");
  document.addEventListener('click', event => {
    if(!options.contains(event.target) && event.target !== iconOptions){
      options.classList.remove("shown");
      document.removeEventListener('click', event);
    }
  });
});


textDarkmode.addEventListener("click", ()=>{
    
  if(iconDarkmode.innerHTML == "light_mode"){
    iconDarkmode.innerHTML = "dark_mode";
    textDarkmode.innerHTML = "Dark mode";
  }else{
    iconDarkmode.innerHTML = "light_mode";
    textDarkmode.innerHTML = "Light mode";
  }
});

const iconMenu = document.querySelector(".icon-menu");
const optionsMenu = document.querySelector(".options-menu");
const main = document.querySelector("#main");

iconMenu.addEventListener("click", ()=>{

    iconOptions.addEventListener("click", ()=>{
      options.classList.toggle("shown");   
    });

    optionsMenu.classList.toggle("shown");
    main.classList.toggle("hidden");   

    if(iconMenu.innerHTML == "menu"){
        iconMenu.innerHTML = "close";
    }else{
        iconMenu.innerHTML = "menu";
    }
});


//Cambio de idioma en la página
const flagsElement = document.querySelector("#flags");
const textsToChange = document.querySelectorAll("[data-section]");
 
const changeLanguage = async (language)=>{
  const requestJson = await fetch(`./languages/${language}.json`);//Solicitud a json dependiendo del idioma que sea
  const texts = await requestJson.json();//Convierto el archivo json a un objeto

  //Itero sobre todos los elementos que tienen un atributo data-section
  for(const textToChange of textsToChange){
    const section = textToChange.dataset.section;
    const value = textToChange.dataset.value;

    textToChange.innerHTML = texts[section][value];
  }
}

flagsElement.addEventListener("click", (event)=>{
  changeLanguage(event.target.parentElement.dataset.language);

  const selectedFlag = event.target.closest(".flag__item");
  if(selectedFlag.classList.contains("selected")){ // si ya está seleccionada no hago nada
    return;
  }
  
  //Elimino la clase "selected" de todas las banderas
  for (const flag of flagsElement.children) {
    flag.classList.remove("selected");
  }

  //Agrego la clase "selected" a la bandera seleccionada
  selectedFlag.classList.add("selected");

  changeLanguage(selectedFlag.dataset.language);
});

if(location.href == "http://localhost/appWord/start.php"){
  //-----------------------TRADUCTOR----------------------------
  //Objeto con los idiomas
  const countries = {
    "en-GB": "English",
    "es-ES": "Spanish",
  }

  const fromText = document.querySelector(".from-text");
  const toText = document.querySelector(".to-text");
  const exchangeIcon = document.querySelector(".exchange");
  const selectTag = document.querySelectorAll("select");
  const icons = document.querySelectorAll(".row i");
  const translateBtn = document.querySelector("button");

  //Me recorre el objeto countries para saber cual esta marcado y en que posición 
  selectTag.forEach((tag, id) => {
    for (let country_code in countries) {
        let selected = id == 0 ? country_code == "en-GB" ? "selected" : "" : country_code == "es-ES" ? "selected" : "";
        let option = `<option ${selected} value="${country_code}">${countries[country_code]}</option>`;
          tag.insertAdjacentHTML("beforeend", option);
    }
  });

  exchangeIcon.addEventListener("click", () => {
    //Variable temporal para guardar el valor del texto de to-text
    let tempText = fromText.value;
    //Variable temporal para guardar el idioma que esta en to-text
    let tempLang = selectTag[0].value;
    //Hace el intercambio del valor entre cada caja
    fromText.value = toText.innerText;
    toText.innerText = tempText;
    //Hace el intercambio de los select que tienen el idioma English y Spanish
    selectTag[0].value = selectTag[1].value;
    selectTag[1].value = tempLang;
    
  });

  //Cuando no hay nada escrito en from-text me lo borra de to-text
  fromText.addEventListener("keyup", () => {
    if(!fromText.value) {
        toText.innerText = "";
    }
  });

  //**********************************************************
  //Solicitud HTTP a la API
  const opciones = {
  method: 'POST',
  headers: {
    'content-type': 'application/json',
    'X-RapidAPI-Key': 'c2432b444dmsh909f603234f0c69p1a0e09jsne64b3c285be3',
    'X-RapidAPI-Host': 'ultra-fast-translation.p.rapidapi.com'
  },
  body: '{"from":"auto","to":"ar","e":"","q":""'
  };
  //**********************************************************


  translateBtn.addEventListener("click", () => {
    let text = fromText.value.trim();//Texto que quiero traducir
    let translateFrom = selectTag[0].value;//idioma que quiero traducir
    let translateTo = selectTag[1].value;//Idioma al que quiero traducir
    
    //Para controlar si el valor del texto que se quiere traducir esta vacio y si lo esta no devuelve nada
    if(text === ""){
      return;
    }

    //Cuando se esta traduciendo aparece Translating tanto en el placeholder del to-text como en el boton de traducir
    toText.setAttribute("placeholder", "Translating...");
    translateBtn.innerText = "Translating...";
    //Modifico el body del objeto opciones de la lolicitud HTTP
    opciones.body =JSON.stringify(
      {
        "from":translateFrom,
        "to":translateTo,
        "e":"",
        "q":text.split('\n')
      }
    );
    //Realizo una solicitud a la API para traducir el texto
    let apiUrl = `https://ultra-fast-translation.p.rapidapi.com/t`;
    fetch(apiUrl, opciones).then(res => res.json()).then(data => {
      //Si hay algun error me lo pone en rojo y me dice el mensaje de error y si no me guarda el texto traducido en un map
        if(data.message){
          toText.style.color = "red";
          toText.innerHTML = data.message;
          return;
        }else{
          toText.style.color = "black";
          //Mapea cada elemento 'e' del array original, y si existe 'e[0]' lo devuelve y sino devuelve el mismo valor de entrada. Con join uno los elementos del nuevo array separados por un salto de línea
          toText.innerHTML = data.map(e => (e||e[0])).join('<br>');//Si no tiene valor la e me pone el valor inicial
        }
        
        toText.setAttribute("placeholder", "Translation");
        translateBtn.innerText = "Translate";//El texto vuelve a lo que ponian al principio
    });
  });
    
    
  //Maneja los iconos de copiar el texto y el audio
  icons.forEach(icon => {
    icon.addEventListener("click", ({target}) =>{
        if(!fromText.value || !toText.innerText){
          return
        }
        if(target.classList.contains("fa-copy")){
            if(target.id == "from"){
                navigator.clipboard.writeText(fromText.value);
            } else {
                navigator.clipboard.writeText(toText.innerText);
            }
        } else {
            let utterance;
            if(target.id == "from"){
                utterance = new SpeechSynthesisUtterance(fromText.value);
                utterance.lang = selectTag[0].value;
            } else {
                utterance = new SpeechSynthesisUtterance(toText.innerText);
                utterance.lang = selectTag[1].value;
            }
            speechSynthesis.speak(utterance);
        }
    });
  });
}


if (location.href == "http://localhost/appWord/course_basic.php"){
  const btn = document.querySelector("#btn-vocabulary");
  const sectionEn = document.querySelector("#section1En");
  const sectionSp = document.querySelector("#section1Sp");
  let wordsShown = false;//Para que no se muestren las palabras segun entras

  btn.addEventListener("click", ()=>{
      if (wordsShown) {
          sectionEn.innerHTML = "";
          sectionSp.innerHTML = "";
          wordsShown = false;
      } else {
          //Enviar los datos al servidor
          const xhr = new XMLHttpRequest();
          xhr.open("GET", "php/search_words.php", true);//A traves del metodo GET (sin valor), la url y si es asincrono (true) se comunica con el servidor para que traiga las palabras de la base de datos

          //Obtener la información del servidor
          xhr.onload = function() {//Es como el .then. Es una funcion y con .parse me lo pasa a un json para que se pueda leer
              if (xhr.status === 200) {
                  const englishSpanishWords = JSON.parse(xhr.responseText);

                  // Crear arreglos separados para las palabras en inglés y español
                  const englishWords = [];
                  const spanishWords = [];

                  for (let i = 0; i < englishSpanishWords.length; i++) {
                      englishWords.push(englishSpanishWords[i].english_word);
                      spanishWords.push(englishSpanishWords[i].spanish_word);
                  }

                  // Mostrar las palabras en inglés y español en sus respectivas secciones
                  sectionEn.innerHTML = englishWords.join("<br>");//Convierto cada palabra de la base de datos en un string con salto para hacer una columna
                  sectionSp.innerHTML = spanishWords.join("<br>");
                  sectionEn.classList.add("show-border");
                  sectionSp.classList.add("show-border");
                  wordsShown = true;
              } else {
                  console.log("Error al recuperar las palabras en inglés y español");
              }
          };

          xhr.send();
      }
  });

  document.addEventListener("click", (event) => {
      if (!btn.contains(event.target)) {
          sectionEn.innerHTML = "";
          sectionSp.innerHTML = "";
          sectionEn.classList.remove("show-border");
          sectionSp.classList.remove("show-border");
          wordsShown = false;
      }
  });
}