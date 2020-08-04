-- Create syntax for VIEW 'view_akun_admin'
CREATE VIEW `view_akun_admin`
AS SELECT
   `data_akun`.`id_akun` AS `id_akun`,
   `data_akun`.`username` AS `username`,
   `data_akun`.`password` AS `password`,
   `data_akun`.`tgl_entry` AS `tgl_entry`,
   `data_akun`.`terakhir_login` AS `terakhir_login`,
   `data_detail_admin`.`id_detail_admin` AS `id_detail_admin`
FROM (`data_akun` join `data_detail_admin` on((`data_akun`.`id_akun` = `data_detail_admin`.`id_akun`)));

-- Create syntax for VIEW 'view_akun_guru'
CREATE VIEW `view_akun_guru`
AS SELECT
   `data_akun`.`id_akun` AS `id_akun`,
   `data_akun`.`username` AS `username`,
   `data_akun`.`password` AS `password`,
   `data_akun`.`tgl_entry` AS `tgl_entry`,
   `data_akun`.`terakhir_login` AS `terakhir_login`,
   `data_detail_guru`.`id_detail_guru` AS `id_detail_guru`,
   `data_detail_guru`.`nip` AS `nip`,
   `data_detail_guru`.`karpeg` AS `karpeg`,
   `data_detail_guru`.`nuptk` AS `nuptk`,
   `data_detail_guru`.`nrg` AS `nrg`,
   `data_detail_guru`.`nama` AS `nama`,
   `data_detail_guru`.`tmp_lahir` AS `tmp_lahir`,
   `data_detail_guru`.`tgl_lahir` AS `tgl_lahir`,
   `data_detail_guru`.`jenis_kelamin` AS `jenis_kelamin`,
   `data_detail_guru`.`pendidikan` AS `pendidikan`,
   `data_detail_guru`.`jurusan_pendidikan` AS `jurusan_pendidikan`,
   `data_detail_guru`.`tahun_pendidikan` AS `tahun_pendidikan`,
   `data_detail_guru`.`pendidikan_baru` AS `pendidikan_baru`,
   `data_detail_guru`.`jurusan_pendidikan_baru` AS `jurusan_pendidikan_baru`,
   `data_detail_guru`.`tahun_pendidikan_baru` AS `tahun_pendidikan_baru`,
   `data_detail_guru`.`tmt_gol` AS `tmt_gol`,
   `data_detail_guru`.`tmt_jab` AS `tmt_jab`,
   `data_detail_guru`.`nama_pengguna` AS `nama_pengguna`,
   `data_detail_guru`.`id_jabatan` AS `id_jabatan`,
   `data_detail_guru`.`id_gol_pangkat` AS `id_gol_pangkat`,
   `data_detail_guru`.`id_jenjang` AS `id_jenjang`,
   `data_detail_guru`.`gelar_depan` AS `gelar_depan`,
   `data_detail_guru`.`gelar_belakang` AS `gelar_belakang`,
   `data_detail_guru`.`nama_tanpa_gelar` AS `nama_tanpa_gelar`
FROM (`data_akun` join `data_detail_guru` on((`data_akun`.`id_akun` = `data_detail_guru`.`id_akun`)));

-- Create syntax for VIEW 'view_akun_penilai'
CREATE VIEW `view_akun_penilai`
AS SELECT
   `data_akun`.`id_akun` AS `id_akun`,
   `data_akun`.`username` AS `username`,
   `data_akun`.`password` AS `password`,
   `data_akun`.`tgl_entry` AS `tgl_entry`,
   `data_akun`.`terakhir_login` AS `terakhir_login`,
   `data_detail_penilai`.`id_detail_penilai` AS `id_detail_penilai`
FROM (`data_akun` join `data_detail_penilai` on((`data_akun`.`id_akun` = `data_detail_penilai`.`id_akun`)));


-- Create syntax for VIEW 'view_versi_usulan'
CREATE VIEW `view_versi_usulan`
AS SELECT
   `transaksi_usulan`.`id_usulan_pertama` AS `id_usulan_pertama`,max(`transaksi_usulan`.`usul_ke`) AS `usul_ke`
FROM `transaksi_usulan` group by `transaksi_usulan`.`id_usulan_pertama`;

-- Create syntax for VIEW 'view_histori_usulan'
CREATE VIEW `view_histori_usulan`
AS SELECT
   `transaksi_usulan`.`id_usulan` AS `id_usulan`,
   `transaksi_usulan`.`id_usulan_pertama` AS `id_usulan_pertama`,
   `transaksi_usulan`.`id_akun_pengusul` AS `id_akun_pengusul`,
   `transaksi_usulan`.`usul_ke` AS `usul_ke`,
   `data_pak_guru`.`jumlah_total_lama` AS `jumlah_total_lama`,
   `data_pak_guru`.`jumlah_total_baru` AS `jumlah_total_baru`,
   `data_pak_guru`.`jumlah_total_hasil` AS `jumlah_total_hasil`,
   `transaksi_usulan`.`tgl_entri` AS `tgl_entri`,
   `transaksi_usulan`.`tgl_validasi` AS `tgl_validasi`,
   `transaksi_usulan`.`status` AS `status`
FROM (`data_pak_guru` join `transaksi_usulan` on((`data_pak_guru`.`id_pak` = `transaksi_usulan`.`id_pak`)));

-- Create syntax for VIEW 'view_unit_kerja_sekarang'
CREATE VIEW `view_unit_kerja_sekarang`
AS SELECT
   `data_unit_kerja`.`id_akun` AS `id_akun`,max(`data_unit_kerja`.`id_unit_kerja`) AS `id_unit_kerja_sekarang`
FROM `data_unit_kerja` group by `data_unit_kerja`.`id_akun`;

-- Create syntax for VIEW 'view_histori_usulan_mutakhir'
CREATE VIEW `view_histori_usulan_mutakhir`
AS SELECT
   `histori`.`id_usulan` AS `id_usulan`,
   `histori`.`id_usulan_pertama` AS `id_usulan_pertama`,
   `histori`.`id_akun_pengusul` AS `id_akun_pengusul`,
   `histori`.`usul_ke` AS `usul_ke`,
   `histori`.`jumlah_total_lama` AS `jumlah_total_lama`,
   `histori`.`jumlah_total_baru` AS `jumlah_total_baru`,
   `histori`.`jumlah_total_hasil` AS `jumlah_total_hasil`,
   `histori`.`tgl_entri` AS `tgl_entri`,
   `histori`.`tgl_validasi` AS `tgl_validasi`,
   `histori`.`status` AS `status`
FROM (`view_histori_usulan` `histori` join `view_versi_usulan` `versi` on(((`histori`.`id_usulan_pertama` = `versi`.`id_usulan_pertama`) and (`histori`.`usul_ke` = `versi`.`usul_ke`))));

-- Create syntax for VIEW 'view_lokasi_entri_usulan'
CREATE VIEW `view_lokasi_entri_usulan`
AS SELECT
   `view_unit_kerja_sekarang`.`id_akun` AS `id_akun`,
   `ref_provinsi`.`nama_provinsi` AS `nama_provinsi`
FROM ((`view_unit_kerja_sekarang` join `data_unit_kerja` on((`data_unit_kerja`.`id_unit_kerja` = `view_unit_kerja_sekarang`.`id_unit_kerja_sekarang`))) join `ref_provinsi` on((`data_unit_kerja`.`id_provinsi` = `ref_provinsi`.`id_provinsi`)));

-- Create syntax for VIEW 'view_lokasi_guru_sekarang'
CREATE VIEW `view_lokasi_guru_sekarang`
AS SELECT
   `view_unit_kerja_sekarang`.`id_akun` AS `id_akun`,
   `ref_provinsi`.`nama_provinsi` AS `nama_provinsi`
FROM ((`view_unit_kerja_sekarang` join `data_unit_kerja` on((`data_unit_kerja`.`id_unit_kerja` = `view_unit_kerja_sekarang`.`id_unit_kerja_sekarang`))) join `ref_provinsi` on((`data_unit_kerja`.`id_provinsi` = `ref_provinsi`.`id_provinsi`)));


