<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Sales Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="salesChart" width="400" height="200"></canvas>
    <script src="script.js"></script>
<script>
    const data = [
    { Product_ID: 1, Product_Name: 'Apple', Quantity_Sold: 500 },
    { Product_ID: 2, Product_Name: 'Carrot', Quantity_Sold: 300 },
    { Product_ID: 3, Product_Name: 'Banana', Quantity_Sold: 1000 },
    { Product_ID: 4, Product_Name: 'Potato', Quantity_Sold: 600 },
    { Product_ID: 5, Product_Name: 'Tomato', Quantity_Sold: 450 }
];

// Prepare labels and data
const labels = data.map(item => item.Product_Name);
const quantities = data.map(item => item.Quantity_Sold);

// Create the chart
const ctx = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(ctx, {
    type: 'bar', // You can change this to 'line', 'pie', etc.
    data: {
        labels: labels,
        datasets: [{
            label: 'Quantity Sold',
            data: quantities,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>


</body>

</html>
