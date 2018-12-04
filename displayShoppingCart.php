<div id="shopping-cart" align="center">
    <div class="txt-heading">Shopping Cart</div>

    <a id="btnEmpty" href="<?php echo $GLOBALS['page'];?>.php?action=empty">Empty Cart</a>
    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_quantity = 0;
        $total_price = 0;
        ?>	
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
                <tr>
                    <th style="text-align:center;">Name</th>                                    
                    <th style="text-align:center;" width="5%">Quantity</th>
                    <th style="text-align:center;" width="10%">Unit Price</th>
                    <th style="text-align:center;" width="10%">Price</th>
                    <th style="text-align:center;" width="5%">Remove</th>
                </tr>	
                <?php
                foreach ($_SESSION["cart_item"] as $item) {
                    $item_price = $item["quantity"] * $item["price"];
                    ?>
                    <tr>
                        <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>                                        
                        <td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
                        <td  style="text-align:center;"><?php echo "$ " . $item["price"]; ?></td>
                        <td  style="text-align:center;"><?php echo "$ " . number_format($item_price, 2); ?></td>
                        <td style="text-align:center;"><a href="<?php echo $GLOBALS['page'];?>.php?action=remove&id=<?php echo $item["id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                    </tr>
                    <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"] * $item["quantity"]);
                }
                ?>

                <tr>
                    <td align="right">Total Quantity: &nbsp</td>
                    <td align="center"><?php echo $total_quantity; ?></td> 
                    <td align="center">Total Price:</td>
                    <td align="center" colspan="3"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
                    
                </tr>
            </tbody>
        </table>		
        <?php
    } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php
    }
    ?>
</div>