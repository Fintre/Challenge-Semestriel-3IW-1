<?php namespace App\Controllers; ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-g6R+2qH1I8hzl6fXExdSN3R/xkA6r0/KRXC5WAPtzIiq/T6NoD2efpZ/KisK/AJUp" crossorigin="anonymous">

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" /> 
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<h1>Tous les utilisateurs</h1>
<section class="users-table">
<div class="user-table">
    <table class="responsive-table" id="myTable">
        <thead class="responsive-th">
            <tr>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- <tbody class="responsive-tb">
            <tr>
                <td>user1</td>
                <td>user@gmail.com</td>
                <td id="adminCell" class="adminCell"></td>
                <td><a href="#" class="link-danger">supprimer</a></td>
            </tr>
            <tr>
                <td>user2</td>
                <td>user@gmail.com</td>
                <td>admin</td>
                <td><a href="#" class="link-danger">supprimer</a></td>
            </tr>
            <tr>
                <td>user3</td>
                <td>user@gmail.com</td>
                <td>admin</td>
                <td><a href="#" class="link-danger">supprimer</a></td>
            </tr>
            <tr>
                <td>user4</td>
                <td>user@gmail.com</td>
                <td>admin</td>
                <td><a href="#" class="link-danger">supprimer</a></td>
            </tr>
        </tbody> -->

        <tbody class="responsive-tb">
            <?php 

                $userController = new \App\Controllers\User();
                $allUsers = $userController->getUsers();

                foreach ($allUsers as $userData): ?>
                <tr>
                    <td><?php echo $userData['firstname']; ?></td>
                    <td><?php echo $userData['email']; ?></td>
                    <td><?php echo $userData['status']; ?></td>
                    <td><a href="#" class="link-danger">supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</section>

<script>
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            "rowCallback": function(row, data, index) {
                // Vérifiez si l'index de la ligne est pair
                if (index % 2 === 0) {
                    $(row).css("background-color", "white");
                } else {
                    $(row).css("background-color", "");
                }
            },
            "drawCallback": function(settings) {
                // Réappliquez la couleur d'arrière-plan après chaque redessin
                var rows = table.rows({ page: 'current' }).nodes();
                $(rows).each(function(index) {
                    if (index % 2 === 0) {
                        $(this).css("background-color", "white");
                    } else {
                        $(this).css("background-color", "");
                    }
                });
            }
        });
    });

    var adminTd = document.getElementById('adminCell');

    // Créer un élément <select>
    var selectElement = document.createElement('select');

    // Ajouter des options à la liste déroulante
    var options = ['Admin', 'Utilisateur', ''];

    for (var i = 0; i < options.length; i++) {
        var option = document.createElement('option');
        option.value = options[i];
        option.text = options[i];
        selectElement.appendChild(option);
    }

    // Remplacer le contenu du <td> par la liste déroulante
    adminTd.innerHTML = '';
    adminTd.appendChild(selectElement);

</script>
