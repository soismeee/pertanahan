<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_user', 'password', 'email', 'level', 'foto_user', 'no_hp', 'nip', 'bagian'];
    public function getUser()
    {
        return $this->db->table('users')
            ->get()
            ->getResultArray();
    }
}
?>