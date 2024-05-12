<?php

// Prototipo base: Usuario
class User
{

    public function __construct(
        public readonly int $id,
        private readonly ?string $name,
        private readonly ?string $otroCampoMas,
        private readonly ?string $otroCampoCostosoMas,
        private readonly ?string $email,
        private readonly ?string $image = ''
    ) {
    }

    // Método para clonar el usuario
    public function copyWith(
        ?int $id = null,
        ?string $name = null,
        ?string $email = null,
        ?string $otroCampoMas = null,
        ?string $otroCampoCostosoMas = null,
        ?string $image = null
    ): User {
        return new User(
            $id ?? $this->id,
            $name ?? $this->name,
            $otroCampoMas ?? $this->otroCampoMas,
            $otroCampoCostosoMas ?? $this->otroCampoCostosoMas,
            $email ?? $this->email,
            $image ?? $this->image
        );
    }
}

// DAO (Data Access Object) para actualizar usuarios en la base de datos
class UserDAO
{
    public function update(User $user): void
    {
        // Simulación de actualización en la base de datos
        echo "Actualizando usuario con ID: " . $user->id . "\n";
    }

    // Método para actualizar varios usuarios con los mismos detalles, excepto el ID
    public function updateMultipleUsers(User $prototype, array $userIds): void
    {
        foreach ($userIds as $userId) {
            $user = $prototype->copyWith(
                id: $userId,
                image: 'default.jpg'
            );
            $this->update($user);
        }
    }
}

$userPrototype = new User(0, null, null, null,  "default.jpg"); // Crear un prototipo de usuario con los mismos detalles
$userDAO = new UserDAO();

$userIdsToUpdate = [1, 2, 3, 4, 5]; // IDs de usuarios a actualizar
$userDAO->updateMultipleUsers($userPrototype, $userIdsToUpdate);
