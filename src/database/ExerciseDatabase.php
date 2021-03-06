<?php

require_once('Database.php');

class ExerciseDatabase extends Database
{
    /**
     * ExerciseDatabase constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tablename = "exercise";
    }

    /**
     * Inserts a new exercise into the database and returns a query with the corresponding ID. 
     *
     * @param array $exercise An array representation of an exercise object
     * @return PDOStatement The Statement returned from querying the database
     */
    public function create(array $exercise): PDOStatement
    {
        extract($exercise);

        $query = '
            INSERT INTO ' . $this->tablename . ' (user_id, description, solution, title, category, subcategory, difficulty)
            VALUES (:user_id, :description, :solution, :title, :category, :subcategory, :difficulty);
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":solution", $solution);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":category", $category);
        $stmt->bindParam(":subcategory", $subcategory);
        $stmt->bindParam(":difficulty", $difficulty);

        $stmt->execute();

        $id = $this->connection->prepare('SELECT LAST_INSERT_ID() as "id";');
        $id->execute();
        return $id;
    }

    /**
     * Updates an existing exercise. 
     *
     * @param array $exercise An array representation of an exercise object
     * @return boolean True on success, False on failure
     */
    public function update(array $exercise): bool
    {
        extract($exercise);

        $query = '
            UPDATE ' . $this->tablename . '
            SET description=:description, solution=:solution, title=:title, category=:category, subcategory=:subcategory, difficulty=:difficulty
            WHERE id=:id
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":solution", $solution);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":category", $category);
        $stmt->bindParam(":subcategory", $subcategory);
        $stmt->bindParam(":difficulty", $difficulty);

        return $stmt->execute();
    }

    /**
     * Updates the picture of the exercise with the ID.
     *
     * @param integer $id The ID of the exercise
     * @param string $picture The path to the exercise
     * @return void
     */
    public function insertPicture(int $id, string $picture)
    {
        $query = 'UPDATE ' . $this->tablename . ' SET picture = :picture WHERE id = :id';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":picture", $picture);

        $stmt->execute();
    }
}
