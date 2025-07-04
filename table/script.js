function changeTitle() {
  const titleElement = document.getElementById("tittle");
  titleElement.textContent = "TABEL BIODATA SAYA - DIUBAH DENGAN JAVASCRIPT";
  titleElement.classList = "m-4 badge bg-danger text-wrap fs-3";
}

function changeTitleBack() {
  const titleElement = document.getElementById("tittle");
  titleElement.textContent = "TABEL BIODATA SAYA";
  titleElement.classList = "m-4 badge bg-primary text-wrap fs-3";
}

const btn = document.getElementById("ubahJudulBtn");
let isChanged = false;
btn.onclick = function () {
  if (!isChanged) {
    changeTitle();
    btn.textContent = "Kembalikan Judul Awal";
    btn.className = "btn btn-danger";
    isChanged = true;
  } else {
    changeTitleBack();
    btn.textContent = "Ubah Judul Tabel";
    btn.className = "btn btn-primary";
    isChanged = false;
  }
};

const modalDetails = document.querySelector("#modal-details");
// const modalDetails = document.getElementById("modal-details");
const btnDetails = document.getElementById("modal-details-btn");
const closeDetails = document.getElementById("closed-modal");

btnDetails?.addEventListener("click", () => {
  const modalDetail = document.getElementById("modal-details");
  modalDetail.classList.remove("d-none");
  modalDetail.classList.add("hidden");
});

closeDetails?.addEventListener("click", () => {
  const modal = document.getElementById("modal-details");
  modal.classList.add("d-none");
  modal.classList.remove("flex");
});
