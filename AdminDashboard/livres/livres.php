<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livres</title>
    <link rel="stylesheet" href="../styles/livres.css">
    
</head>
<body>
    <h3>Livres</h3>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Photo de couverture</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Quantité</th>
            <th>Actions</th> <!-- remove / modification -->
        </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>0001</td>
                <td>Le premier jour</td>
                <td>Marc Levy</td>
                <td>
                    <img src="Photos/LePremierJourMarcLevy.jpg">
                </td>
                <td>54.500</td>
                <td>mmmm</td>
                <td>3</td>
                <td class="actions">
                    <button>supprimer</button>
                    <button>modifier</button>
                </td>
            </tr>

            <tr>
                <td>0002</td>
                <td>Les miserables</td>
                <td>Victor Hugo</td>
                <td>
                    <img src="Photos/LesMiserableVictorHugo.jpg" />
                </td>
                <td>60.000</td>
                <td>khorma</td>
                <td>5</td>
                <td class="actions">
                    <button>supprimer</button>
                    <button>modifier</button>
                </td>
            </tr>

        </tbody>
        
    </table>

</body>
</html>