<?php

    require_once "dbConnexion.php";
    require_once "get_admin.php";

    class users {
        private static $db;
        private $users; 
        
        function __construct() {
            self::$db  = new database();
            $this->users  = new admin(); 
        }

        function check_if_exists_User($email) {
            $found = false;
            $allUsers = $this->users->getUsers();
            foreach($allUsers as $user) {
                if ($user->email === $email) {
                    $found = true;
                    break;
                }
            }
            return $found;
        }

        function update($nom, $prenom, $age, $tel, $email, $password, $iduser) {
            $pdo = self::$db -> returnDB();
            $val = $this->check_if_exists_User($email);
            try {
                if ($val === false) {
                    $stmt = $pdo->prepare("update user set nom = ?, prenom = ?, age = ?, telephone = ?, email = ?, password = ? where iduser = ?");
                    $stmt->execute([$nom, $prenom, $age, $tel, $email, $password, $iduser]);

                    echo $iduser;
                    echo "<script>";
                    echo "alert('Données modifiées avec succès');";
                    echo "document.location.href = '../views/user/profile.php';";
                    echo "</script>";
                }
                else {
                    echo "<script>";
                    echo "alert('Données déjà utilisées');";
                    echo "document.location.href = '../views/user/update.php';";
                    echo "</script>";
                }
                
            } catch (Exception $e) {
                echo "<script>";
                echo "alert('Echec');";
                echo "</script>";
                echo "Erreur : " . $e->getMessage()."<>A la ligne : ".$e->getLine();
            }
        }


        function insert($nom, $prenom, $age, $tel, $sexe, $email, $password, $role) {
            $pdo = self::$db -> returnDB();
            $val = $this->check_if_exists_User($email);
            try {
                if ($val === false) {
                    $stmt = $pdo->prepare("insert into user(nom, prenom, age, telephone, sexe, email, password, role) values(?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$nom, $prenom, $age, $tel, $sexe, $email, $password, $role]);
                    
                    $_SESSION["access"] = "oui";
                    $_SESSION['superadmin'] = ["", ""];
                    $_SESSION['admin'] = ["", ""];

?>

<div id="message" onclick="load('<?php echo $nom; ?>', '../views/user/accueil.php')"></div>

<script src="../js/sign_alerts.js"></script>;
<script>
    let container = document.querySelector('#message');
    var even = new MouseEvent("click", {
        bubbles: true,
        cancelable: true,
        view: window
    });

    container.dispatchEvent(even);
</script>

<?php
                }
                else {
                    echo "<script>";
                    echo "alert('Données déjà utilisées');";
                    echo "alert('Connectez-vous à la place');";
                    echo "document.location.href = '../views/user/connexion.php';";
                    echo "</script>";
                }
                
            } catch (Exception $e) {
                $pdo->rollBack();
                echo "<script>";
                echo "alert('Echec');";
                echo "</script>";
                echo "Erreur : " . $e->getMessage()."<>A la ligne : ".$e->getLine();
            }
        }

        
        function get_iduser_by_email($email) {
            $pdo = self::$db -> returnDB();
            try {
                $sql = "select iduser from user where email = ?";
                $req = $pdo-> prepare($sql);
                $req -> execute([$email]);
                
                return $req -> fetchAll();
            } catch(Exception $e) {
                echo "<script>alert('Erreur');</script>";
                echo "Erreur : " . $e->getMessage() . "<br> A la ligne " .$e -> getLine();
            }
        }
        
        
        function get_user_by_email($email) {
            $pdo = self::$db -> returnDB();
            try {
                $sql = "select * from user where email = ?";
                $req = $pdo-> prepare($sql);
                $req -> execute([$email]);
                
                return $req -> fetchAll();
            } catch(Exception $e) {
                echo "<script>alert('Erreur');</script>";
                echo "Erreur : " . $e->getMessage() . "<br> A la ligne " .$e -> getLine();
            }
        }
        
        function searchUser($email, $password) {
            $found = false;
            $admin = false;
            $super_admin = false;

            $allUsers = $this->users->getUsers();
            foreach($allUsers as $user) {
                if ($user->email === $email && $user->password === $password) {
                    $found = true;
                    
                    if ($user->role === "Super administrateur") {
                        $super_admin = true;
                        $admin = true;
                        
                        break;
                    }
                    elseif ($user->role === "Administrateur") {
                        $admin = true;
                        
                        break;
                    }
                    break;
                }
            }
            return [$found, $admin, $super_admin];
        }

        function checkUser($nom, $email, $password) {
            $result = $this->searchUser($email, $password);
            $_SESSION['superadmin'] = ["", ""];
            $_SESSION['admin'] = ["", ""];
            if ($result[0] === true) {
                $_SESSION["access"] = "oui";

?>

<div id="message" onclick="load('<?php echo $nom; ?>', '../views/user/accueil.php')"></div>

<script src="../js/login_alerts.js"></script>;
<script>
    let div = document.querySelector('#message');
    var even = new MouseEvent("click", {
        bubbles: true,
        cancelable: true,
        view: window
    });

    div.dispatchEvent(even);
</script>
<?php
            if($result[1] == true && $result[2] == true) {
                $_SESSION['superadmin'] = ["<a href='../superadmin/admins_list.php' class='fa fa-users' title='Super administrateur' target='bank'></a>", true];
                $_SESSION['admin'] = ["<a href='../admin/users/users_list.php' class='fa fa-cog' title='Administrateur' target='bank'></a>", true];
            }
            elseif($result[1] == true && $result[2] == false) {
                $_SESSION['admin'] = ["<a href='../admin/users/users_list.php' class='fa fa-cog' title='Administrateur' target='bank'></a>", true];
            }
        }
        else {
            echo "<script>";
            echo "alert('Compte inexistant, inscrivez-vous !!');";
            echo "document.location.href = '../views/user/connexion.php';";
            echo "</script>";
        }
    }
}