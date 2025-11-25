async function initMap() {
  const response = await fetch("/api/category/" + category_id + "/location");
  const locations = await response.json();

  // Create map (temporary center, will be replaced by fitBounds)
  const map = L.map("map").setView([0, 0], 2);

  // Load free OSM tiles
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: "© OpenStreetMap contributors",
  }).addTo(map);

  // Create bounds object
  const bounds = L.latLngBounds();

  // Add markers
  locations.forEach((loc) => {
    const marker = L.marker([loc.latitude, loc.longitude]).addTo(map);

    // extend bounds for each marker
    bounds.extend([loc.latitude, loc.longitude]);

    marker.bindPopup(`
            <strong>${loc.name}</strong><br>${loc.latitude}, ${loc.longitude}
        `);
  });

  // Fit map to bounds
  if (locations.length > 0) {
    map.fitBounds(bounds, {
      padding: [40, 40], // optional padding
    });
  }
}
initMap();
