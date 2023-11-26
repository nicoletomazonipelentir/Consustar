<?php


$horaAtual = date("H:i");

// Obtém a hora do banco de dados (assumindo que '08:20' é uma string no formato "H:i")
$horaDoBanco = DateTime::createFromFormat("H:i", '08:20');

// Converte a hora atual para um objeto DateTime
$horaAtualObjeto = DateTime::createFromFormat("H:i", $horaAtual);

// Compara os objetos DateTime
if ($horaAtualObjeto > $horaDoBanco) {
    echo "A hora atual é posterior à hora do banco de dados.";
} else {
    echo "A hora atual é anterior ou igual à hora do banco de dados.";
}


