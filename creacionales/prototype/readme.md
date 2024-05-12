El patrón de diseño Prototype es un patrón creacional que se utiliza para crear nuevos objetos clonando un prototipo existente. En lugar de crear un objeto desde cero, el patrón Prototype permite crear copias de un objeto existente, conocido como prototipo, y luego modificar las copias según sea necesario.

----

Ejemplo: Actualización masiva de usuarios
En este ejemplo, implementaremos el patrón Prototype para clonar objetos de usuario con la misma información, excepto por la imagen, y correo electrónico, que debemos aplicar para todos uno por defecto.
Esto nos permitirá evitar la creación costosa de objetos de usuario desde una consulta a la base de datos cada vez que necesitemos actualizar varios usuarios con los mismos detalles.