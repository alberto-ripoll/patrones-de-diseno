<?php

interface DescuentoStrategy
{
        public function calcularDescuento(): float;
}

class DescuentoTemporadaAlta implements DescuentoStrategy
{
        public function calcularDescuento(): float
        {
                return 0.05;
        }
}

class DescuentoTemporadaBaja implements DescuentoStrategy
{
        public function calcularDescuento(): float
        {
                return 0.15;
        }
}

class SinDescuento implements DescuentoStrategy
{
        public function calcularDescuento(): float
        {
                return 0.0;
        }
}

class TicketVuelo
{
        private DescuentoStrategy $estrategiaDescuento;

        public function __construct(private readonly float $precioBase)
        {
                $this->estrategiaDescuento =  $this->getEstrategiaDescuento();
        }

        public function getEstrategiaDescuento()
        {
                $mes = date('n');
                $esTemporadaAlta = in_array($mes, [6, 7, 8]);
                $esTemporadaBaja = in_array($mes, [1, 2, 11, 12]);

                return match (true) {
                        $esTemporadaAlta => new DescuentoTemporadaAlta(),
                        $esTemporadaBaja => new DescuentoTemporadaBaja(),
                        default => new SinDescuento()
                };
        }

        public function calcularPrecioFinal(): float
        {
                return $this->precioBase * (1 - $this->estrategiaDescuento->calcularDescuento());
        }
}

$ticket = new TicketVuelo(1000);
echo "Precio final del ticket del vuelo: " . $ticket->calcularPrecioFinal() . "€\n";
