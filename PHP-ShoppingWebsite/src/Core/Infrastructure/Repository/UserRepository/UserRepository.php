<?php

    namespace CQRS\Core\Domain\Infrastructure\Repository\UserRepository;

    use CQRS\Core\Domain\Model\User\UserRepositoryInterface;
    use CQRS\Core\Infrastructure\Database\Database;

    class UserRepository implements UserRepositoryInterface {

        private $db;

        public function __construct(Database $db) {

            $this->db = $db;
        
        }

        #[\Override]
        public function findById(string $id): ?User {

            $table = 'users';

            $sql = "SELECT *
                    FROM $table
                    WHERE id='$id'";

            $result = $this->db->query($sql);

            if($result->num_rows > 0) {

                $user = $result->fetch_all(MYSQLI_ASSOC);
                return $user;
            }

            return null;
        }

        #[\Override]
        public function findByEmail(string $email): ?User {

            $table = 'users';
            $sql = "SELECT *
                    FROM $table
                    where email='$email'";

            $result = $this->db->query($sql);

            if($result->num_rows > 0) {

                $user = $result->fetch_all(MSQLI_ASSOC);
                return $user;
            }

            return null;

        }

        #[\Override]
        public function save(User $user): void {

            $table = 'users';
            $sql = "INSERT
                        INTO $table(
                            name,
                            surname,
                            email,
                            phone,
                            city,
                            password
                        ) VALUES(
                            '{$user->getName()}',
                            '{$user->getSurname()}',
                            '{$user->getEmail()}',
                            '{$user->getPhone()}',
                            '{$user->getCity()}',
                            '{$user->getPassword()}'
                        )";

            if(!$this->db->query($sql)) {
                die('Unable to insert records into the database!');
            }

        }

    }
