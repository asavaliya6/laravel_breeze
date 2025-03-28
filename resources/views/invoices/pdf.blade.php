<!DOCTYPE html>
<html>
<head>
    <title>Invoice PDF</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            padding: 40px; 
            background-color: #f8f9fa;
        }
        .invoice-container {
            background-color: #fff;
            padding: 30px;
            border: 2px solid #007bff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2);
        }
        h1 { 
            text-align: center; 
            color: #007bff; 
            margin-bottom: 20px; 
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .details {
            margin: 20px 0;
            line-height: 1.6;
        }
        .details p {
            margin: 8px 0;
            font-weight: bold;
        }
        .total-amount {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            color: #28a745;
            margin-top: 20px;
            border-top: 2px solid #28a745;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <h1>Invoice Number #{{ $invoice->invoice_number }}</h1>
        <div class="details">
            <p>Customer Name: {{ $invoice->customer_name }}</p>
            <p>Invoice Date: {{ $invoice->invoice_date }}</p>
        </div>
        <div class="total-amount">
            Total Amount: ${{ $invoice->total_amount }}
        </div>
    </div>
</body>
</html>
