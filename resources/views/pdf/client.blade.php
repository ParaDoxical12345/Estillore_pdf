<!DOCTYPE html>
<html>
<head>
    <title>Client Summary</title>
    <style>
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif';
            font-size: 10pt;
        }

        h1 {
            font-size: 22pt;
        }

        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #777;
            padding: 2px;
        }
    </style>
</head>
<body>
    <p style="text-align: center; margin-bottom: 18pt">
        <img src="{{public_path('images/GreenBanking_logo.jpg')}}" style="width: 200px;" alt=""> <br>
        {{-- <strong style="font-size: 16pt">Greener Banking, Inc.</strong> <br> --}}
        WillFord ,Calapefornia, Bohol <br>
        Tel. No.: 555-666-7890, 223-129-9089
    </p>

    <h1>Client Summary</h1>
    <br>
    <br>
    <strong>Name</strong> {{$client->first_name}} {{$client->middle_name}} {{$client->last_name}} <br>
    
    <strong>Address</strong> {{$client->address}} <br>
    
        
    <strong>Phone</strong> {{$client->phone_number}} <br>
    
            
    <br>

    <table style="width: 100%">
        <thead>
            <tr style="background-color: #efefef">
                <th>Date</th>
                <th>Deposit</th>
                <th>Withdrawal</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3">Balance</td>
                <td style="text-align: right">{{number_format($client->initial_deposit,2)}}</td>
            </tr>
            <?php $bal = $client->initial_deposit; ?>
            @foreach($client->transactions as $txn)
            <tr>
                <td style="text-align: right">{{ number_format($bal += $txn->deposit ? $txn->amount : (0-$txn->amount), 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
