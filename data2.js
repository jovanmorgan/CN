document
  .getElementById("tambah_id_jenis_perangkat")
  .addEventListener("change", function () {
    const idJenis = this.value;
    const subJenisSelect = document.getElementById(
      "tambah_id_sub_jenis_perangkat",
    );

    subJenisSelect.innerHTML = '<option value="">Loading...</option>';

    if (idJenis === "") {
      subJenisSelect.innerHTML =
        '<option value="">-- Pilih Sub Jenis --</option>';
      return;
    }

    fetch(
      "proses/data_sub_jenis_perangkat/get_sub_jenis.php?id_data_jenis_perangkat=" +
        idJenis,
    )
      .then((response) => response.text())
      .then((data) => {
        subJenisSelect.innerHTML = data;
      })
      .catch(() => {
        subJenisSelect.innerHTML =
          '<option value="">Gagal memuat data</option>';
      });
  });
