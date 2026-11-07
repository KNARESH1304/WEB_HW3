<?php
require "./order_functions.php";

// Cookie (bonus): must be sent before any output. Recognition only; the order lives in the session.
setcookie('lastVisit', date('l, F j, Y g:i a'), time() + 86400, '/');

$orderSummary = order();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Chez Session | Receipt</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="card">
   <h1>Your Receipt</h1>

   <div class="receipt-card"><?= $orderSummary; ?></div>

   <div class="insight-card">
      <h2>Order feedback</h2>
      <p><?= htmlspecialchars(completionMessage()); ?></p>
      <p class="insight-note"><?= htmlspecialchars(pairingSuggestion()); ?></p>
   </div>

   <div class="insight-card pricing-grid">
      <div>
         <h2>Estimated total</h2>
         <p class="price-figure"><?= htmlspecialchars(formattedTotal()); ?></p>
      </div>
      <div>
         <h2>Order profile</h2>
         <p><?= htmlspecialchars(orderProfile()); ?></p>
      </div>
      <p class="insight-note full-width-note"><?= htmlspecialchars(pricingNote()); ?></p>
   </div>

   <p class="actions">
      <a class="button" href="index.php">Order Again</a>
      <a class="button secondary" href="forget_order.php">Forget Order</a>
   </p>
</main>
</body>
</html>
