<?php // Controllo se il form è stato inviato 
$is_submitted = $_SERVER["REQUEST_METHOD"] === "POST"; 
$name = $is_submitted ? $_POST["nome"] : ""; 
$piatto = $is_submitted ? $_POST["piatto"] : ""; 
$allergie = $is_submitted && ($_POST["allergie"]) ? $_POST["allergie"] : []; 
// Recupero IP del cliente 
$ip_cliente = $_SERVER["REMOTE_ADDR"]; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Menù Digi-Ristorante </title>
</head>
<body>
    <header> 
        <h1>Ristorante Risto-Digi</h1> 
        <p>Ogni piatto creato solo per te</p> 
    </header>
    <main>
        <?php if ($_SERVER["REQUEST_METHOD"] !== "POST") : ?> 
            <!-- FORM --> 
            <h2>Compila il tuo ordine</h2> 
            <form method="post"> 
                <div> 
                    <label for="nome">Il tuo nome:</label>
                    <input type="text" name="nome" id="nome"> 
                </div> 
                
                <div> 
                    <label for="piatto">Il tuo piatto preferito:</label> 
                    <input type="text" name="piatto" id="piatto"> 
                </div> 
                
                <div class="allergie"> 
                    <label>Allergie alimentari (seleziona se presenti):</label>
                    <label><input type="checkbox" name="allergie[]" value="Glutine"> Glutine</label>
                    <label><input type="checkbox" name="allergie[]" value="Lattosio"> Lattosio</label> 
                    <label><input type="checkbox" name="allergie[]" value="Frutta secca"> Frutta secca</label> 
                    <label><input type="checkbox" name="allergie[]" value="Crostacei"> Crostacei</label> 
                </div> 
                
                <button type="submit">Invia ordine</button> 
            </form>
            <?php else: ?> 
                <div class="risultato">
                    <p> 
                        <?php if ($name): ?> 
                            Ciao <?php echo $name; ?>, Benvenuto nel nostro ristorante! 
                        <?php else: ?> Benvenuto ospite misterioso! 
                        <?php endif; ?> 
                        </p> 
                    <p> 
                        <?php if ($piatto): ?>
                            Ottima scelta! Prepareremo subito il tuo <?php echo $piatto; ?>. 
                        <?php else: ?> Non hai indicato un piatto... ti sorprenderemo con una specialità segreta! 
                            <?php endif; ?> 
                    </p> 
                    <p> 
                        <?php if (!empty($allergie)): ?> 
                            Abbiamo annotato le tue allergie: 
                            <ul> 
                                <?php foreach ($allergie as $a): ?>
                                    <li><?php echo ($a); ?></li> 
                                <?php endforeach; ?> 
                            </ul> 
                        <?php else: ?> Nessuna allergia segnalata: cucineremo senza pensieri! 
                            <?php endif; ?> 
                    </p> 
                    <p> 
                        Curiosità digitale: la tua richiesta ci è arrivata dall’indirizzo 
                        <strong>
                            <?php echo $ip_cliente; ?>
                        </strong>. 
                    </p> 
                    <a href="" class="back-button">
                        <button>Torna al modulo</button>
                    </a> 
                </div> 
            <?php endif; ?>
    </main>


</body>
</html>