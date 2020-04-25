<?php

class UserViewModel extends ViewModel
{

    private UserDatabase $database;

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
        $user_array = $this->fetchData($stmt);

        $count = count($user_array);
        if ($count == 0) {
            // TODO: throw NoDatabaseEntryFoundException
        } else if ($count == 1) {
            return $user_array[0];
        } else {
            // TODO: throw DatabaseException
        }
    }


    /**
     * Queries the database for a given username.
     *
     * @param string $username The username of the User
     * @return User The User with the given username
     */
    public function get_by_name(string $username): User
    {
        $stmt = $this->database->query_user($username);
        $user_array = $this->fetchData($stmt);
        return $this->returnModel($user_array);
    }

    /**
     * Fetches the User from a database query and returns them in an array.
     *
     * @param PDOStatement $stmt The PDOStatement returned from a database query
     * @return array Returns an Array of Users
     */
    protected function fetchData(PDOStatement $stmt): array
    {
        $user_array = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = User::from_pdo_statement($stmt);
            array_push($user_array, $user);
        }
        return $user_array;
    }

    /**
     * Returns only one User from an array of Users.
     *
     * @param array $array An array with Users
     * @return User Returns only one User. If there are more or less than one element in the array the method
     * throws an exception
     */
    protected function returnModel(array $array): User
    {
        $count = count($array);
        if ($count == 0) {
            // TODO: throw NoDatabaseEntryFoundException
        } else if ($count == 1) {
            return $array[0];
        } else {
            // TODO: throw DatabaseException
        }
    }
}
