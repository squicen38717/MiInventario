function initMap() {
    // Coordenadas del centro del mapa
    const centro = { lat: 4.663462, lng: -74.055061 };

    // Crear un mapa centrado en las coordenadas anteriores
    const mapa = new google.maps.Map(document.getElementById("map"), {
        zoom: 10, // Nivel de zoom
        center: centro, // Ubicación central
        mapTypeId: "roadmap", // Tipo de mapa (puede ser roadmap, satellite, terrain, hybrid)
    });

    // Añadir un marcador en el centro
    const marcador = new google.maps.Marker({
        position: centro,
        map: mapa,
        title: "MiInventario"
    });

    // Agregar un infowindow (ventana de información) al marcador
    const infoWindow = new google.maps.InfoWindow({
        content: "<h3>Universidad Ean</h3><p>Ubicación central del mapa.</p>"
    });

    // Mostrar el infowindow cuando el marcador es clickeado
    marcador.addListener("click", () => {
        infoWindow.open(mapa, marcador);
    });
}