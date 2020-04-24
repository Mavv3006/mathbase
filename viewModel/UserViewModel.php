<?php

class UserViewModel extends ViewModel
{

    /**
     * UserViewModel constructor
     */
    public function __construct()
    {
        $this->database = new UserDatabase();
    }

    /**
     * Queries the database and returns the User with the given ID
     *
     * @param integer $id The ID of the User in the database
     * @return User The queried User
     */
    public function get_by_id(int $id): User
    {
        $stmt = $this->database->query_by_id($id);
        $user_array = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = User::from_pdo_statement($stmt);
            array_push($user_array, $user);
        }

        if (count($user_array) == 1) {
            return $user_array[0];
        } else {
            // throw  irgendeinen Error;
        }
    }
}
