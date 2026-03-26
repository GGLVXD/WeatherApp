
// couldve just done it with php, but the main project didnt do anything similar too soo....
// (and api key is already public)
function getData() {
  const query = document.getElementById("searchInput").value.trim() || "Riga";
  if (!query) return;

  fetch("https://api.weatherapi.com/v1/current.json?key=1f8a5c56a5744e389e741625240111&q=" + encodeURIComponent(query) + "&aqi=yes")
    .then(r => r.json())
    .then(data => {
        // no catina since es nekur neatradu normalu convertion un pats galigi nevareju.
        const raw = data.location.localtime; // 2026-03-26 03:03
        const time24 = raw.split(" ")[1]; // 03:03
        const parts = time24.split(":");
        const h = Number(parts[0]);
        const m = parts[1];

        const ampm = h >= 12 ? "PM" : "AM";
        const h12 = h % 12 || 12;
        const localtime = String(h12).padStart(2, "0") + ":" + m + " " + ampm; // 03:03 AM

        document.getElementById("localtime").innerHTML = localtime;
    })
    .catch(err => console.error(err));

  fetch("https://api.weatherapi.com/v1/forecast.json?key=1f8a5c56a5744e389e741625240111&q=" + encodeURIComponent(query) + "&aqi=yes")
    .then(r => r.json())
    .then(data => console.log(data))
    .catch(err => console.error(err));

  fetch("https://api.weatherapi.com/v1/astronomy.json?key=1f8a5c56a5744e389e741625240111&q==" + encodeURIComponent(query))
    .then(r => r.json())
    .then(data => console.log(data))
    .catch(err => console.error(err));

}
