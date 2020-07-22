<?php
class Buku_model extends CI_Model {
	public function getBuku() {

		$query = array(
			array(
					'judul' => 'Buku1',
					'pengarang' => 'Bukunya Andi',
					'penerbit' => 'Penerbitnya Andi'
			),
			array(
					'judul' => 'Buku2',
					'pengarang' => 'Bukunya Andi2',
					'penerbit' => 'Penerbitnya Andi2'
			)
		);
		return $query;
	}
}