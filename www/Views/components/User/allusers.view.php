<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-g6R+2qH1I8hzl6fXExdSN3R/xkA6r0/KRXC5WAPtzIiq/T6NoD2efpZ/KisK/AJUp" crossorigin="anonymous">

    <!-- JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" type="text/css" href="/Views/CSS/output.css">
    <title>Gofindme.org</title>
</head>
<body>
<div class="central"><h1>Tous les utilisateurs</h1></div>
<div class="container">
    <table class="responsive-table" id="myTable">
        <thead class="responsive-th">
        <tr>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Statut</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody class="responsive-tb">
        <tr>
            <td>user1</td>
            <td>user@gmail.com</td>
            <td>admin</td>
            <td><i class="fa fa-times" aria-hidden="true"></i></td>
        </tr>
        <tr>
            <td>user2</td>
            <td>user@gmail.com</td>
            <td>admin</td>
            <td><i class="fa fa-times" aria-hidden="true"></i></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "rowCallback": function(row, data, index) {
                if (index % 2 === 0) {
                    // Ligne paire (index est 0-indexé)
                    $(row).addClass('even-row');
                } else {
                    // Ligne impaire
                    $(row).addClass('odd-row');
                }
            }
        });
    });
</script>
