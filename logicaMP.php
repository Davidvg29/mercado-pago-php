<?php
require __DIR__ . '/vendor/autoload.php'; // Asegúrate de que autoload esté configurado correctamente

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

header('Content-Type: application/json');

// Configura el token de acceso
MercadoPagoConfig::setAccessToken("YOUR_ACCESS_TOKEN");

// Crea la preferencia
$client = new PreferenceClient();
$preference = $client->create([
    "items" => [
        [
            "title" => "My product",
            "quantity" => 1,
            "unit_price" => 2000
        ]
    ]
]);

// Devuelve el ID de la preferencia en JSON
echo json_encode([
    "preferenceId" => $preference->id
]);
?>
