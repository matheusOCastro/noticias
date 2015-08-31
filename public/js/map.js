// *
// * Adicionar multiplos marcadores
// * 2013 - www.marnoto.com
// *

// Váriáveis necessárias
var map;
var infoWindow;

// A variável markersData guarda a informação necessária a cada marcador
// Para utilizar este código basta alterar a informação contida nesta variável
var markersData = [
   {
      lat: -27.24900,
      lng: -53.03500,
      nome: "Alpestre"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.36100,
      lng: -53.18200,
      nome: "Ametista do Sul" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.19200,
      lng: -53.71000,
      nome: "Barra do Guarita"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.92300,
      lng: -53.03900,
      nome: "Barra Funda"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.66300,
      lng: -53.31400,
      nome: "Boa Vista das Missões" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.27400,
      lng: -53.43200,
      nome: "Caiçara"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -28.28400,
      lng: -52.78600,
      nome: "Carazinho"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.60600,
      lng: -53.16700,
      nome: "Cerro Grande" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -28.05500,
      lng: -53.06800,
      nome: "Chapada"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.73500,
      lng: -52.99200,
      nome: "Constantina"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -28.11900,
      lng: -52.78300,
      nome: "Coqueiros do Sul" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.71600,
      lng: -53.70100,
      nome: "Coronel Bicaco"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.45400,
      lng: -53.24600,
      nome: "Cristal do Sul"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.26500,
      lng: -53.86100,
      nome: "Derrubadas" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.65900,
      lng: -53.53100,
      nome: "Dois Irmãos das Missões"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.70800,
      lng: -52.91300,
      nome: "Engenho Velho"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.54900,
      lng: -53.50400,
      nome: "Erval Seco" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.35900,
      lng: -53.39400,
      nome: "Frederico Westphalen"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.44400,
      lng: -52.91800,
      nome: "Gramado dos Loureiros"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.19400,
      lng: -53.25100,
      nome: "Iraí" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.63100,
      lng: -53.27700,
      nome: "Jaboticaba"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.68900,
      lng: -53.18200,
      nome: "Lajeado do Bugre"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.60000,
      lng: -53.07300,
      nome: "Liberato Salzano" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.49400,
      lng: -53.68600,
      nome: "Miraguaí"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.36200,
      lng: -52.77100,
      nome: "Nonoai"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.99400,
      lng: -52.77100,
      nome: "Nova Boa Vista" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.56300,
      lng: -53.18200,
      nome: "Novo Tiradentes"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.90900,
      lng: -53.10800,
      nome: "Novo Barreiro"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.89900,
      lng: -53.31400,
      nome: "Palmeira das Missões" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.35500,
      lng: -53.55500,
      nome: "Palmitinho"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -28.26300,
      lng: -52.40700,
      nome: "Passo Fundo"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.51100,
      lng: -53.21500,
      nome: "Pinhal" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.21000,
      lng: -53.61200,
      nome: "Pinheirinho do Vale"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.32900,
      lng: -53.05900,
      nome: "Planalto"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -28.05900,
      lng: -52.67700,
      nome: "Pontão" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.66400,
      lng: -53.63800,
      nome: "Redentora"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.30000,
      lng: -52.84100,
      nome: "Rio dos Indios"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.47100,
      lng: -53.16900,
      nome: "Rodeio Bonito" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.76700,
      lng: -52.80200,
      nome: "Ronda Alta"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.82800,
      lng: -52.91000,
      nome: "Rondinha"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.70700,
      lng: -53.13600,
      nome: "Sagrada Família" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -28.39600,
      lng: -52.69100,
      nome: "Santo Antônio do Planalto"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.78000,
      lng: -53.12200,
      nome: "São José das Missões"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.94400,
      lng: -52.92300,
      nome: "Sarandi" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.47800,
      lng: -53.40300,
      nome: "Seberi"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.40000,
      lng: -53.46700,
      nome: "Taquaruçu do Sul"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.37100,
      lng: -53.75800,
      nome: "Tenente Portela" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.61500,
      lng: -52.84100,
      nome: "Três Palmeiras"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.52200,
      lng: -52.89400,
      nome: "Trindade do Sul"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.16200,
      lng: -53.40500,
      nome: "Vicente Dutra" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.36700,
      lng: -53.49000,
      nome: "Vista Alegre"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.29100,
      lng: -53.70200,
      nome: "Vista Gaúcha"// não colocar virgula no último item de cada maracdor
   },
   {
      lat: -28.11300,
      lng: -52.90900,
      nome: "Almirante Tamandaré do Sul" // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -27.74700,
      lng: -53.05500,
      nome: "Novo Xingú"// não colocar virgula no último item de cada maracdor
   }, // não colocar vírgula no último marcador
   {
      lat: -27.77100,
      lng: -53.25500,
      nome: "São Pedro das Missões"// não colocar virgula no último item de cada maracdor
   }// não colocar vírgula no último marcador
];


function initialize() {
   var mapOptions = {
      center: new google.maps.LatLng(40.601203,-8.668173),
      zoom: 9,
      mapTypeId: 'roadmap',
   };

   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

   // cria a nova Info Window com referência à variável infowindow
   // o conteúdo da Info Window será atribuído mais tarde
   infoWindow = new google.maps.InfoWindow();

   // evento que fecha a infoWindow com click no mapa
   google.maps.event.addListener(map, 'click', function() {
      infoWindow.close();
   });

   // Chamada para a função que vai percorrer a informação
   // contida na variável markersData e criar os marcadores a mostrar no mapa
   displayMarkers();
}
google.maps.event.addDomListener(window, 'load', initialize);

// Esta função vai percorrer a informação contida na variável markersData
// e cria os marcadores através da função createMarker
function displayMarkers(){

   // esta variável vai definir a área de mapa a abranger e o nível do zoom
   // de acordo com as posições dos marcadores
   var bounds = new google.maps.LatLngBounds();
   
   // Loop que vai estruturar a informação contida em markersData
   // para que a função createMarker possa criar os marcadores 
   for (var i = 0; i < markersData.length; i++){

      var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
      var nome = markersData[i].nome;

      createMarker(latlng, nome);

      // Os valores de latitude e longitude do marcador são adicionados à
      // variável bounds
      bounds.extend(latlng);  
   }

   // Depois de criados todos os marcadores
   // a API através da sua função fitBounds vai redefinir o nível do zoom
   // e consequentemente a área do mapa abrangida.
   map.fitBounds(bounds);
}

// Função que cria os marcadores e define o conteúdo de cada Info Window.
function createMarker(latlng, nome, morada1, morada2, codPostal){
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: nome
   });

   // Evento que dá instrução à API para estar alerta ao click no marcador.
   // Define o conteúdo e abre a Info Window.
   google.maps.event.addListener(marker, 'click', function() {
      
      // Variável que define a estrutura do HTML a inserir na Info Window.
      var iwContent = '<div id="iw_container">' +
            '<div class="iw_title">' + nome + '</div>';
      
      // O conteúdo da variável iwContent é inserido na Info Window.
      infoWindow.setContent(iwContent);

      // A Info Window é aberta.
      infoWindow.open(map, marker);
   });
}