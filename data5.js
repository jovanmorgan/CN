function openEditModal(
  id,
  nama_perangkat,
  id_jenis_perangkat,
  id_sub_jenis_perangkat,
  id_data_ruangan,
  merek,
  kondisi,
  tahun_peroleh,
  tanggal_masuk,
) {
  document.getElementById("edit_id").value = id;
  document.getElementById("edit_nama_perangkat").value = nama_perangkat;
  document.getElementById("edit_id_jenis_perangkat").value = id_jenis_perangkat;
  document.getElementById("edit_merek").value = merek;
  document.getElementById("edit_kondisi").value = kondisi;
  document.getElementById("edit_tahun_peroleh").value = tahun_peroleh;
  document.getElementById("edit_tanggal_masuk").value = tanggal_masuk;
  document.getElementById("edit_id_data_ruangan").value = id_data_ruangan;

  // LOAD SUB JENIS + SELECT YANG LAMA
  loadSubJenisEdit(id_jenis_perangkat, id_sub_jenis_perangkat);

  let modal = new bootstrap.Modal(document.getElementById("editModal"));
  modal.show();
}
