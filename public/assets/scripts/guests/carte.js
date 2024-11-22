let regionM = document.getElementById("region-M");
let regionP = document.getElementById("region-P");
let regionC = document.getElementById("region-C");
let regionK = document.getElementById("region-K");
let regionS = document.getElementById("region-S");

let regionMDesc = document.getElementById("maritime-desc");
let regionPDesc = document.getElementById("plateau-desc");
let regionCDesc = document.getElementById("centrale-desc");
let regionKDesc = document.getElementById("kara-desc");
let regionSDesc = document.getElementById("savanes-desc");

let regionMPath = regionM.querySelector(".map_path")
let regionPPath = regionP.querySelector(".map_path")
let regionCPath = regionC.querySelector(".map_path")
let regionKPath = regionK.querySelector(".map_path")
let regionSPath = regionS.querySelector(".map_path")

regionM.addEventListener("mouseenter", () => {
  regionMDesc.style.visibility = "visible";
  regionMDesc.style.opacity = "1";
  regionMPath.style.fill = "#036c89";
});

regionM.addEventListener("mouseleave", () => {
  regionMDesc.style.visibility = "hidden";
  regionMDesc.style.opacity = "0";
  regionMPath.style.fill = "#212447";
});

regionMDesc.addEventListener("mouseenter", () => {
    regionMDesc.style.visibility = "visible";
    regionMDesc.style.opacity = "1";
    regionMPath.style.fill = "#036c89";
})
regionMDesc.addEventListener("mouseleave", () => {
    regionMDesc.style.visibility = "hidden";
    regionMDesc.style.opacity = "0";
    regionMPath.style.fill = "#212447";
})

regionP.addEventListener("mouseenter", () => {
  regionPDesc.style.visibility = "visible";
  regionPDesc.style.opacity = "1";
  regionPPath.style.fill = "#036c89";
});

regionP.addEventListener("mouseleave", () => {
  regionPDesc.style.visibility = "hidden";
  regionPDesc.style.opacity = "0";
  regionPPath.style.fill = "#212447";
});

regionPDesc.addEventListener("mouseenter", () => {
    regionPDesc.style.visibility = "visible";
    regionPDesc.style.opacity = "1";
    regionPPath.style.fill = "#036c89";
})

regionPDesc.addEventListener("mouseleave", () => {
    regionPDesc.style.visibility = "hidden";
    regionPDesc.style.opacity = "0";
    regionPPath.style.fill = "#212447";
})

regionC.addEventListener("mouseenter", () => {
  regionCDesc.style.visibility = "visible";
  regionCDesc.style.opacity = "1";
  regionCPath.style.fill = "#036c89";
});

regionC.addEventListener("mouseleave", () => {
  regionCDesc.style.visibility = "hidden";
  regionCDesc.style.opacity = "0";
  regionCPath.style.fill = "#212447";
});

regionCDesc.addEventListener("mouseenter", () => {
    regionCDesc.style.visibility = "visible";
    regionCDesc.style.opacity = "1";
    regionCPath.style.fill = "#036c89";
})

regionCDesc.addEventListener("mouseleave", () => {
    regionCDesc.style.visibility = "hidden";
    regionCDesc.style.opacity = "0";
    regionCPath.style.fill = "#212447";
})

regionK.addEventListener("mouseenter", () => {
  regionKDesc.style.visibility = "visible";
  regionKDesc.style.opacity = "1";
  regionKPath.style.fill = "#036c89";
});

regionK.addEventListener("mouseleave", () => {
  regionKDesc.style.visibility = "hidden";
  regionKDesc.style.opacity = "0";
  regionKPath.style.fill = "#212447";
});

regionKDesc.addEventListener("mouseenter", () => {
    regionKDesc.style.visibility = "visible";
    regionKDesc.style.opacity = "1";
    regionKPath.style.fill = "#036c89";
})

regionKDesc.addEventListener("mouseleave", () => {
    regionKDesc.style.visibility = "hidden";
    regionKDesc.style.opacity = "0";
    regionKPath.style.fill = "#212447";
})

regionS.addEventListener("mouseenter", () => {
  regionSDesc.style.visibility = "visible";
  regionSDesc.style.opacity = "1";
  regionSPath.style.fill = "#036c89";
});

regionS.addEventListener("mouseleave", () => {
  regionSDesc.style.visibility = "hidden";
  regionSDesc.style.opacity = "0";
  regionSPath.style.fill = "#212447";
});

regionSDesc.addEventListener("mouseenter", () => {
    regionSDesc.style.visibility = "visible";
    regionSDesc.style.opacity = "1";
    regionSPath.style.fill = "#036c89";
})

regionSDesc.addEventListener("mouseleave", () => {
    regionSDesc.style.visibility = "hidden";
    regionSDesc.style.opacity = "0";
    regionSPath.style.fill = "#212447";
})
