<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toevoegen</title>
    <link href="css/form.css" rel="stylesheet">
</head>
<body>
    <h1>
        Voeg hier uw filmpjes toe
    </h1>

    <form method="post" action="verwerken.php">
        <table>
            <tr>
                <td>
                    <label for="naam-filmpje">Naam van het filmpje *</label>
                </td>
                <td>
                    <input type="text" name="title" id="naam-filmpje" placeholder="Voorbeeld filmpje" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="path">Pad naar het filmpje *</label>
                </td>
                <td>
                    <input type="text" name="path" id="path" placeholder="filmpjes/filmpje.mp4" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="category"> Categorie * </label>
                </td>
                <td>
                    <select id="category" name="category">
                        <option value="dobbelsteen">Dobbelsteen</option>
                        <option value="blikjespers">Blikjespers</option>
                        <option value="brug">Brug</option>
                        <option value="vuurkorf">Vuurkorf</option>
                        <option value="stenenklem">Stenenklem</option>
                        <option value="Lampje">Lampje</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="send" value="Toevoegen">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>