<?php

interface Mensaje
{
    public function contenido(): string;
}

// Componente concreto: implementa el envío de un mensaje simple
class MensajeSimple implements Mensaje
{
    public function contenido(): string
    {
        return "Mensaje enviado sin cifrar";
    }
}

// Decorador abstracto: proporciona una interfaz común para todos los decoradores
abstract class MensajeDecorator implements Mensaje
{

    public function __construct(protected readonly Mensaje $message)
    {
    }

    public function contenido(): string
    {
        return $this->message->contenido();
    }
}

class AESDecorator extends MensajeDecorator
{
    public function contenido(): string
    {
        $contenido = parent::contenido();
        // Cifrar el mensaje con AES
        $contenido = "Mensaje cifrado con AES";
        return $contenido;
    }
}

class RSADecorator extends MensajeDecorator
{
    public function contenido(): string
    {
        $contenido = parent::contenido();
        // Cifrar el mensaje con RSA
        $contenido = "Mensaje cifrado con RSA";
        return $contenido;
    }
}

// Uso
$message = new MensajeSimple();
echo $message->contenido() . "\n";

$encryptedMessage = new AESDecorator($message);
echo $encryptedMessage->contenido() . "\n";

$doubleEncryptedMessage = new RSADecorator($encryptedMessage);
echo $doubleEncryptedMessage->contenido() . "\n";
