<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <title>MercadoPago Integration</title>
</head>
<body>
    <div id="wallet_container"></div>

    <script>
        // Instancia de MercadoPago
        const mp = new MercadoPago('YOUR_PUBLIC_KEY', {
            locale: 'es-AR'
        });

        // Solicita el preferenceId desde el backend
        fetch('logicaMP.php')
            .then(response => response.json())
            .then(data => {
                if (data.preferenceId) {
                    // Inicializa el widget con el preferenceId recibido
                    mp.bricks().create("wallet", "wallet_container", {
                        initialization: {
                            preferenceId: data.preferenceId,
                        },
                    });console.log(data)
                } else {
                    console.error("No se pudo obtener el preferenceId");
                }
            })
            .catch(error => {
                console.error("Error al obtener el preferenceId:", error);
            });
    </script>
</body>
</html>
