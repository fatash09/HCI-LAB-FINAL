<html>
   <head>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
            let shoppingCart = [];
            let totalBill = 0;

            function updateBill(price, itemName) {
                totalBill += price;
                shoppingCart.push({ name: itemName, price: price });
            }

            function buyNow(price, itemName) {
                updateBill(price, itemName);
                alert("Item added to the cart: " + itemName + ". Total Bill: Rs" + totalBill.toFixed(2));
            }

            function showFinalBill() {
                let finalBillList = document.getElementById("final-bill-list");
                let finalBillAmount = document.getElementById("final-bill-amount");

                // Clear previous content
                finalBillList.innerHTML = "";

                // Display purchased items
                shoppingCart.forEach(function (item) {
                    let listItem = document.createElement("li");
                    listItem.textContent = item.name + " - Rs" + item.price.toFixed(2);
                    finalBillList.appendChild(listItem);
                });

                // Display total bill amount
                finalBillAmount.textContent = totalBill.toFixed(2);

                // Display the final bill section
                document.getElementById("final-bill-section").style.display = "block";
            }

            // Attach event listeners to Buy Now buttons
            document.querySelectorAll('.buy-now-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    let price = parseFloat(button.getAttribute('data-price'));
                    let itemName = button.getAttribute('data-item-name');
                    buyNow(price, itemName);
                });
            });

            // Attach event listener to Show Final Bill button
            document.getElementById('show-final-bill-btn').addEventListener('click', function () {
                showFinalBill();
            });
        });
    </script>
    </head>
    </html>