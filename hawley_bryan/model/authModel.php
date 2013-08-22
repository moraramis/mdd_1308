<?php
class authModel {
    public $db;

    public function __construct($dsn, $user, $pass){
        $this->db = new \PDO($dsn, $user, $pass);
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getUserByNamePass($name, $pass) {
        mysql_real_escape_string($name);
        mysql_real_escape_string($pass);

        $stmt = $this->db->prepare("
			SELECT userId AS id, userName AS name, firstName AS fullname
			FROM users
			WHERE (userName = :name)
			-- AND (userPassword = MD5(CONCAT(userSalt, :pass)))

		");
        if ($stmt->execute(array(':name' => $name, ':pass' => $pass))) {
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            if (count($rows) ===1) {
                return $rows[0];
            }
        }
        return FALSE;
    }
}
?>