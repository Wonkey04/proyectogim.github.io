<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Mensual</title>
    <!-- Incluye el SDK de Mercado Pago -->
    <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" async></script>
</head>
<body>

    <h1>Pago Mensual</h1>

    <!-- Formulario de Pago -->
    <form id="payment-form">
        <!-- Campos del formulario (puedes personalizar según tus necesidades) -->
        <label for="cardholder">Titular de la Tarjeta</label>
        <input type="text" id="cardholder" name="cardholder" required>

        <label for="card-number">Número de Tarjeta</label>
        <input type="text" id="card-number" name="card-number" required>

        <label for="expiration-date">Fecha de Vencimiento</label>
        <input type="text" id="expiration-date" name="expiration-date" required>

        <label for="security-code">Código de Seguridad</label>
        <input type="text" id="security-code" name="security-code" required>

        <!-- Botón de Pago -->
        <button type="button" onclick="payWithMercadoPago()">Pagar</button>
    </form>

    <!-- Función para iniciar el pago con Mercado Pago -->
    <script>
        function payWithMercadoPago() {
            // Configura tus credenciales de Mercado Pago
            const mp = new MercadoPago('TU_CLIENT_ID', {
                locale: 'es-AR'
            });

            // Crea un objeto de preferencias de pago
            const checkout = mp.checkout({
                preference: {
                    items: [
                        {
                            title: 'Pago Mensual',
                            quantity: 1,
                            currency_id: 'ARS', // Moneda (Peso Argentino)
                            unit_price: 1000, // Precio en centavos
                        }
                    ]
                }
            });

            // Abre la ventana de pago de Mercado Pago
            checkout.open();
        }
    </script>

</body>
</html>

</x-app-layout>