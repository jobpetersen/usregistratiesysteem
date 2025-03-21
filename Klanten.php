<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "csv_db 5";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

$sql = "SELECT * FROM Klanten"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrenRegistratieSysteem</title>
    <style>
        /* Algemene styling voor de body */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #222271; 
            color: white;
            display: flex;
            flex-direction: column; /* Zorg ervoor dat de inhoud onder elkaar komt */
            height: 100vh; /* Maak de body de volledige hoogte van het scherm */
        }


        /* Styling voor de topbar (navbar) */
        .topbar {
            background-color: #fe48d4;
            color: rgb(255, 255, 255);
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed; /* Maak de topbar vast bovenaan */
            width: 100%; /* Zorg dat de topbar over de gehele breedte komt */
            top: 0; /* Zet de topbar bovenaan het scherm */
            left: 0;
            z-index: 100; /* Zorg ervoor dat de topbar boven andere elementen komt */
        }

        button {
    background-color: #007BFF;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 8%;
}

button:hover {
    background-color: #0056b3;
}


        .search-container {
            margin-right: 20px;
        }

        input[type="text"] {
            padding: 5px;
            border: none;
            border-radius: 5px;
        }

        .Button {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: rgb(255, 255, 255);
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Algemene styling voor de tabel */
        table {
            width: 80%; /* Geef de tabel een breedte van 80% van het scherm */
            margin: 10% auto; /* Zet de tabel in het midden van de pagina */
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        /* Styling voor de tabelkoppen */
        th {
            background-color: #3498db; /* Blauw */
            color: white;
            padding: 10px;
            text-align: left;
        }

        /* Styling voor de tabelcellen */
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* Afwisselende kleuren voor de rijen */
        tr:nth-child(odd) {
            background-color: rgb(240, 150, 175); /* Lichtroze voor oneven rijen */
        }

        tr:nth-child(even) {
            background-color: rgb(240, 150, 175); /* Lichte grijstint voor even rijen */
        }

        /* Styling voor de tabelranden */
        table, th, td {
            border: 1px solid #ddd;
        }

        /* Styling voor hover-effecten */
        tr:hover {
            background-color: #ec407a; /* Donkerder roze bij hover */
            color: white;
        }

        @media (max-width: 768px) {
    /* Verklein de topbar */
    .topbar {
        flex-direction: column;
        padding: 15px;
        text-align: center;
    }

    /* Maak de knoppen in de topbar verticaal en smaller */
    .Button {
        flex-direction: column;
        margin-top: 20px;
    }

    button {
        width: 100%;
        padding: 12px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    /* Verklein de tabel breedte voor kleinere schermen */
    table {
        width: 90%; /* 90% van het scherm */
        margin-top: 55%; /* Zet de tabel een beetje lager */
    }

    th, td {
        padding: 8px;
    }

    /* Verklein de tekst in de tabelkoppen */
    th {
        font-size: 14px;
    }

    /* Zorg ervoor dat de tabel leesbaar blijft */
    td {
        font-size: 12px;
    }
}

    </style>
</head>
<body>
    <div class="topbar">
        <h2>UrenRegistratieSysteem</h2>
        <div class="Button">
         <a href="klanten.php" target="self"> <button> Klanten  </button></a>
         <a href="medewerkers.php" target="self"> <button> Medewerkers </button></a>
         <a href="opdrachten.php" target="self"> <button> Opdrachten </button></a>
         <a href="urenreg.php" target="self"> <button> Werkzaamheden </button></a>
        </div>
    </div>

    <button onclick="window.print()">Download als PDF</button>


    

    <?php
    echo "<table>";
    echo "<tr>";

    if ($result->num_rows > 0) {
        $columns = $result->fetch_fields();
        foreach ($columns as $column) {
            echo "<th>" . $column->name . "</th>";
        }
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='100%'>Geen gegevens gevonden</td></tr>";
    }
    echo "</table>";

    $conn->close();
    ?>


</body>



</html>
