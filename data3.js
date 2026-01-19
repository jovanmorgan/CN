// reload sub jenis saat jenis diganti di modal edit
document
  .getElementById("edit_id_jenis_perangkat")
  .addEventListener("change", function () {
    loadSubJenisEdit(this.value, null);
  });

// fungsi load sub jenis (EDIT)
function loadSubJenisEdit(idJenis, selectedSubJenis = null) {
  const subSelect = document.getElementById("edit_id_sub_jenis_perangkat");
  subSelect.innerHTML = '<option value="">Loading...</option>';

  if (!idJenis) {
    subSelect.innerHTML = '<option value="">-- Pilih Sub Jenis --</option>';
    return;
  }

  fetch(
    "proses/data_sub_jenis_perangkat/get_sub_jenis.php?id_data_jenis_perangkat=" +
      idJenis,
  )
    .then((res) => res.text())
    .then((html) => {
      subSelect.innerHTML = html;

      // set sub jenis terpilih (saat edit)
      if (selectedSubJenis) {
        subSelect.value = selectedSubJenis;
      }
    })
    .catch(() => {
      subSelect.innerHTML = '<option value="">Gagal memuat data</option>';
    });
}
